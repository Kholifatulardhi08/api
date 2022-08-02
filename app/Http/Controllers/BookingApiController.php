<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookingResource;
use App\Models\Booking;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BookingResource(Booking::all());
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
    public function store(Booking $bookings, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'agenda' => ['required'],
            'snack' => ['required'],
            'date' => ['required'],
            'person' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'user_id' => ['required'],
            'room_id' => ['required'],
            'unit_id' => ['required']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $bookings = Booking::create([
            'agenda' => $request->agenda,
            'snack' => $request->snack,
            'date' => $request->date,
            'person' => $request->person,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'unit_id' => $request->unit_id
        ]);

        return new BookingResource($bookings);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BookingResource(Booking::find($id));
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
    public function update(Booking $bookings, Request $request, $id)
    {

        $bookings = Booking::find($id);
        $bookings->update($request->only([
            'agenda',
            'snack',
            'date',
            'person',
            'start_time',
            'end_time',
            'user_id',
            'room_id',
            'unit_id'
        ]));

        return new BookingResource($bookings);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $bookings, $id)
    {
        $bookings = Booking::find($id);
        $bookings->delete();

        return new BookingResource($bookings);
    }
}
