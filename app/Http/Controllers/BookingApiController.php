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
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Terminal;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Booking $bookings){
        return DB::table('bookings')
             ->join('users', 'bookings.user_id','=','users.id')
             ->join('units', 'bookings.unit_id','=','units.id')
             ->join('rooms', 'bookings.room_id','=','rooms.id')
             ->select('bookings.id','bookings.agenda', 'bookings.person', 'bookings.start',
                 'bookings.end', 'bookings.invite', 'users.name as user_name', 'rooms.name as room_name',
                 'units.code as unit_code')
             ->orderBy('bookings.id', 'desc')
             ->where('bookings.status_active', 1)
             ->get();
    }

    // show data inProgress
    public function inProgress(Request $request){
        $time = Carbon::now()->toDateTimeString();
        $result = DB::table('bookings')
                ->select('bookings.id','bookings.agenda', 'bookings.start',
                 'bookings.end', 'rooms.name as room_name')
                 ->join('rooms', 'bookings.room_id','=','rooms.id')
                 ->where('start', '<=', $time)
                ->where('end', '>=', $time)
                ->where('bookings.status_active', 1)
                ->orderBy('bookings.id', 'desc')
                ->get();
        if ($result->isEmpty()){
            $message = "Is Empty";
        }
        else{
            $message = "In Progress";
        }
        return response()->json(['message' => $message ],  201);
    }

    // Show available in day with in signage room
    public function signage(Booking $bookings, Request $request){
        $time = Carbon::now()->toDateTimeString();
        $result = DB::table('bookings')
                ->select('bookings.id','bookings.agenda', 'bookings.start',
                 'bookings.end', 'rooms.name as room_name')
                ->join('rooms', 'bookings.room_id','=','rooms.id')
                ->where('start', '<=', $time)
                ->where('end', '>=', $time)
                ->where('bookings.status_active', 1)
                ->orderBy('bookings.id', 'desc')
                ->get();
        if ($result->isEmpty()){
            $message = "Available";
        }
        else{
            $message = "Not Available";
        }
        return response()->json(['message' => $message ],  201);
    }

    // Show data Previus and Next signage
    public function upcomings(){
      $time = Carbon::now()->toDateTimeString();
      return DB::table('bookings')
        ->select('bookings.id','bookings.agenda','bookings.start', 'bookings.end')
        ->where('bookings.status_active', 1)
        ->groupBy('bookings.id')
        ->having('bookings.start', '>=', $time)
        ->having('bookings.end', '>=', $time)
        ->orderBy('bookings.id', 'desc')
        ->get();
    }

    // show data Inprogress
    public function data(Booking $bookings )
    {
        $time = Carbon::now()->toDateTimeString();
        return DB::table('bookings')
        ->select('bookings.id','bookings.agenda', 'bookings.start',
         'bookings.end', 'rooms.name as room')
         ->join('rooms', 'bookings.room_id','=','rooms.id')
         ->where('start', '<=', $time)
        ->where('end', '>=', $time)
        ->where('bookings.status_active', 1)
        ->orderBy('bookings.id', 'desc')
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
            'drink_id' => ['required'],
            'invite' => ['required']
        ]);

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
                'invite' => implode(",",$request->invite),
                'status_active' => true
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Booking $bookings ,Request $request, $id)
    {
        $bookings = Booking::find($id);
        $validator = Validator::make($request->all(), [
            'agenda' => ['required', 'string', 'max:30'],
            'person' => ['required', 'integer'],
            'start' => ['required'],
            'end' => ['required'],
            'room_id' => ['required'],
            'unit_id' => ['required'],
            'invite' => ['required']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $bookings->update([
            'agenda' => $request->agenda,
            'person' => $request->person,
            'start' => $request->start,
            'end' => $request->end,
            'room_id' => $request->room_id,
            'unit_id' => $request->unit_id,
            'invite' => implode(",",$request->invite)
        ]);

        return new BookingResource($bookings);
    }

    public function search($query)
    {
        return Booking::Where("agenda", "ilike", "%" . $query . "%")
            ->orWhere("person", "ilike", "%" . $query . "%")
            ->orWhere("user_id", "like", "%" . $query . "%")
            ->get();
    }
}
