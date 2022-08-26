<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            $user = User::where('email', $request['email'])->select('id', 'email', 'role', 'status_verified')->first()->toArray();

            if($user['status_verified'] == 0){
                return response()->json(["status" => Response::HTTP_UNAUTHORIZED, "message" => "you need to be approved"], Response::HTTP_UNAUTHORIZED);
            }

            $user += ['jwt_token' => $token];

            return response()->json($user, Response::HTTP_CREATED);
        }
        return response()->json(["status" => Response::HTTP_UNAUTHORIZED, "message" => "email/password wrong"], Response::HTTP_UNAUTHORIZED);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'phone_number' => ['required', 'string', 'max:15'],
            'role' => ['required', 'in:Admin,Guest,Pantry']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //save to database
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'status_verified' => false,
            'role' => $request->role
        ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $users
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
        return $this->createRefreshToken(auth()->refresh());
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
    protected function createRefreshToken($token){
        return response()->json([
            'user' => auth()->user(),
            'access_token' => $token,
            'expires_in' => 20160 * 60
        ]);
    }
}
