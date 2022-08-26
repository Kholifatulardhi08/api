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
            'name' => ['required', 'string', 'max:50'],
            'code' => ['required', 'string', 'max:15'],
            'capacity' => ['required', 'integer'],
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
     * Search the specified resource.
     *
     * @param  string  $query
     * @return \Illuminate\Http\Response
     */

    public function search($query)
    {
        return Room::select('id', 'name', 'code', 'capacity')
            ->Where("name", "ilike", "%" . $query . "%")
            ->orWhere("code", "ilike", "%" . $query . "%")
            ->get();
    }
}
