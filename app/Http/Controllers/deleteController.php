<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Room;
use App\Models\Drink;
use App\Models\Meal;
use App\Models\Booking;
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
            $data = Booking::where('id', $req->id)->first();
            $data->status_active = false;
            $data->save();

            return response()->json(['data' => $data], Response::HTTP_OK);
        }
    }
}
