<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MealResource;
use App\Models\Meal;

class MealApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Meal::where('status_active', 1)
            ->select('id', 'name', 'total')
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
            'name' => ['required', 'string', 'max:30'],
            'total' => ['required', 'integer']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $meals = Meal::create([
            'name' => $request->name,
            'total' => $request->total,
            'status_active' => true
        ]);

        return new MealResource($meals);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Meal $meals, Request $request, $id)
    {
        $meals = Meal::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30'],
            'total' => ['required', 'integer']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $meals->update([
            'name' => $request->name,
            'total' => $request->total
        ]);

        return new MealResource($meals);
    }

    /**
     * Search the specified resource.
     *
     * @param  string  $query
     * @return \Illuminate\Http\Response
     */

    public function search($query)
    {
        return Meal::select('id', 'name', 'total')
            ->Where("name", "ilike", "%" . $query . "%")
            ->get();
    }
}
