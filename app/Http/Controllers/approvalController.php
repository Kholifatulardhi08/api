<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class approvalController extends Controller
{
    public function approve(Request $req)
    {
        $data = User::where('id', $req->id)->first();
        $data->status_verified = true;
        $data->save();

        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
