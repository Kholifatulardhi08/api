<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Room;
use App\Models\Drink;
use App\Models\Meal;
use App\Models\Booking;
use App\Models\Pantry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class deleteController extends Controller
{
    public function delete(Request $req)
    {
        if ($req->type === 'Unit'){
            $data = Unit::where('id', $req->id)->first();
            $data->status_active = false;
            $data->save();

            return response()->json(['data' => $data], Response::HTTP_OK);
        }
        else if ($req->type === 'Room'){
            $data = Room::where('id', $req->id)->first();
            $data->status_active = false;
            $data->save();

            return response()->json(['data' => $data], Response::HTTP_OK);
        }
        else if ($req->type === 'Drink'){
            $data = Drink::where('id', $req->id)->first();
            $data->status_active = false;
            $data->save();

            return response()->json(['data' => $data], Response::HTTP_OK);
        }
        else if ($req->type === 'Meal'){
            $data = Meal::where('id', $req->id)->first();
            $data->status_active = false;
            $data->save();

            return response()->json(['data' => $data], Response::HTTP_OK);
        }
        else if ($req->type === 'Booking'){
            $bookings = Booking::where('id', $req->id)->first();
            $bookings->status_active = false;
            $bookings->save();

            $pantries = Pantry::where('booking_id', $req->id)->first();
            $pantries->status_active = false;
            $pantries->save();
            return response()->json(['bookings' => $bookings, 'pantries' => $pantries], Response::HTTP_OK);
        }

    }
    public function deleteBooking(Request $req, $id)
    {
        $bookings = Booking::find($id);
        $bookings->delete();
        return response()->json('successfully deleted');
    }
}
