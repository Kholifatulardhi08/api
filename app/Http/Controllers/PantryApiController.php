<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PantryResource;
use App\Models\Pantry;

class PantryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PantryResource(Pantry::all());
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
    public function store(Pantry $pantries, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_id' => ['required'],
            'meal_id' => ['required'],
            'drink_id' => ['required']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $pantries = Pantry::create([
            'booking_id' => $request->booking_id,
            'meal_id' => $request->meal_id,
            'drink_id' => $request->drink_id
        ]);

        return new PantryResource($pantries);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PantryResource(Pantry::find($id));
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
    public function update(Request $request, $id)
    {
        $pantries = Pantry::find($id);
        $pantries->update($request->only([
            'booking_id',
            'meal_id',
            'drink_id'
        ]));

        return new PantryResource($pantries);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pantry $pantries, $id)
    {
        $pantries = Pantry::find($id);
        $pantries->delete();

        return new PantryResource($pantries);
    }
}
