<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BookingResource;
use App\Mail\bookMeetingNotification;
use App\Models\Booking;
use App\Models\Pantry;
use App\Models\Drink;
use App\Models\Room;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Terminal;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::where('status_active', 1)
            ->select('id','agenda', 'person', 'start', 'end', 'user_id', 'room_id', 'unit_id')
            ->orderBy('id', 'asc')
            ->get();
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
            'unit_id' => $request->unit_id,
            'status_active' => true,
        ]);

        // Insert to pantries table
        Pantry::create([
            'booking_id' => $bookings->id,
            'drink_id' => $request->drink_id,
            'status_active' => true
        ]);

        // Update drink stock
        Drink::where('id', $request->drink_id)
            ->decrement('total', $request->person);

        // get unit name
        $unit = Unit::where('id', $request->unit_id)
            ->select('name', 'code')
            ->first();

        // get room name
        $room = Room::where('id', $request->room_id)
            ->select('name', 'code')
            ->first();


        //Mail::to(Auth::user()->email)
        //    ->send(new bookMeetingNotification($bookings, Auth::user()->name, $unit, $room));

         return response()->json(['data' => $bookings, 'message' => 'Booking Succsesfully Created'],  201);
    }

    public function search($query)
    {
        return Booking::Where("agenda", "ilike", "%" . $query . "%")
            ->orWhere("person", "ilike", "%" . $query . "%")
            ->orWhere("user_id", "like", "%" . $query . "%")
            ->get();
    }
}
