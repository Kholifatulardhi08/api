<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UnitResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Unit;

class UnitApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Unit::where('status_active', 1)
            ->select('id', 'name', 'code')
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
            'name' => ['required', 'string', 'max:100'],
            'code' => ['required', 'string', 'max:15']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $units = Unit::create([
            'name' => $request->name,
            'code' => $request->code,
            'status_active' => true
        ]);

        return new UnitResource($units);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Unit $units ,Request $request, $id)
    {
        $units = Unit::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'code' => ['required', 'string', 'max:15']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $units->update([
            'name' => $request->name,
            'code' => $request->code
        ]);

        return new UnitResource($units);
    }

    /**
     * Search the specified resource.
     *
     * @param  string  $query
     * @return \Illuminate\Http\Response
     */

    public function search($query)
    {
        return Unit::select('id', 'name', 'code')
            ->Where("name","ilike", "%" . $query . "%")
            ->orWhere("code", "ilike", "%" . $query . "%")
            ->get();
    }
}
