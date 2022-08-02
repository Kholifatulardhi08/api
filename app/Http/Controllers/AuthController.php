<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:6'
        ]);

        if ($token = Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = User::where('email', $request['email'])->select('id', 'email', 'role', 'status_verified')->first()->toArray();

            if($user['status_verified'] === 0){
                return response()->json(["status" => Response::HTTP_UNAUTHORIZED, "message" => "you need to be approved"], Response::HTTP_UNAUTHORIZED);
            }
            
            $user += ['jwt_token' => $token];

            // return redirect()->intended('/home');
            return response()->json($user, Response::HTTP_CREATED);
        }
        return response()->json(["status" => Response::HTTP_UNAUTHORIZED, "message" => "email/password wrong"], Response::HTTP_UNAUTHORIZED);

    	// $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:6',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }
        // if (! $token = auth()->attempt($validator->validated())) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        // // return $this->createNewToken($token);
        // return response()->json(['token' => $token], 201);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:3,150',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|max:15',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        auth()->logout();
       //$request->user()->currentAccessToken()->delete()
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'data' => [
                'user' => auth()->user(),
                'access_token' => $token,
                'expires_in' => auth()->factory()->getTTL() * 60,]
        ]);
    }
}
