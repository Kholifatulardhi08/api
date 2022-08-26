<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::select('id', 'name', 'email', 'phone_number', 'status_verified', 'role')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $users ,Request $request, $id)
    {
        $users = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('users')->ignore($id)],
            'password' => ['required', 'string', 'min:6'],
            'phone_number' => ['required', 'string', 'max:15']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number
        ]);

        return new UserResource($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $query
     * @return \Illuminate\Http\Response
     */

    public function search($query)
    {
        return User::Where("name", "ilike", "%" . $query . "%")
            ->orWhere("email", "ilike", "%" . $query . "%")
            ->orWhere("phone_number", "like", "%" . $query . "%")
            ->get();
    }

    /**
     * Approve user.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $req)
    {
        $data = User::where('id', $req->id)->first();
        $data->status_verified = true;
        $data->save();

        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
