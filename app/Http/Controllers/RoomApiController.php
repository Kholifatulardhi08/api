<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RoomResource;
use App\Models\Room;

class RoomApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Room::where('status_active', 1)
            ->select('id', 'name', 'code', 'capacity')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required', 'string', 'max:50'],
            'code' => ['required', 'string', 'max:15'],
            'capacity' => ['required', 'integer'],
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $rooms = Room::create([
            'name' => $request->name,
            'code' => $request->code,
            'capacity' => $request->capacity,
            'status_active' => true
        ]);

        return new RoomResource($rooms);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new RoomResource(Room::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Room $rooms, Request $request, $id)
    {
        $rooms = Room::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
            'capacity' => 'required'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $rooms->update([
            'name' => $request->name,
            'code' => $request->code,
            'capacity' => $request->capacity,
            'status_active' => true
        ]);

        return new RoomResource($rooms);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $rooms ,$id)
    {
        $rooms = Room::find($id);
        $rooms->delete();

        return new RoomResource($rooms);
    }

    public function search($name)
    {
        return Room::Where("name","like", "%".$name."%")->get();
    }
}
