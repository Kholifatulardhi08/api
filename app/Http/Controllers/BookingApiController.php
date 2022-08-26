<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Pantry;
use App\Models\Drink;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Booking $bookings, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'agenda' => ['required', 'string', 'max:30'],
            'person' => ['required', 'integer'],
            'start' => ['required'],
            'end' => ['required'],
            'user_id' => ['required'],
            'room_id' => ['required'],
            'unit_id' => ['required'],
            'drink_id' => ['required']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Insert to bookings table
        $bookings = Booking::create([
            'agenda' => $request->agenda,
            'person' => $request->person,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'unit_id' => $request->unit_id
        ]);
        // Insert to pantries table
        Pantry::create([
            'booking_id' => $bookings->id,
            'drink_id' => $request->drink_id
        ]);
        // Update drink stock
        Drink::where('id', $request->drink_id)
            ->decrement('total', $request->person);

        return response()->json(['message' => 'succed book a meeting'], 201);
    }
}
