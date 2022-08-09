<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DrinkResource;
use App\Models\Drink;

class DrinkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Drink::where('status_active', 1)
            ->select('id', 'name', 'total')
            ->orderBy('id', 'asc')
            ->get();
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
        $drinks = Drink::create([
            'name' => $request->name,
            'total' => $request->total,
            'status_active' => true
        ]);

        return new DrinkResource($drinks);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new DrinkResource(Drink::find($id));
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
    public function update(Drink $drinks ,Request $request, $id)
    {
        $drinks = Drink::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30'],
            'total' => ['required', 'integer']
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $drinks->update([
            'name' => $request->name,
            'total' => $request->total
        ]);

        return new DrinkResource($drinks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drinks = Drink::find($id);
        $drinks->delete();

        return new DrinkResource($drinks);
    }

    public function search($query)
    {
        return Drink::select('id', 'name', 'total')
            ->Where("name", "ilike", "%" . $query . "%")
            ->get();
    }
}
