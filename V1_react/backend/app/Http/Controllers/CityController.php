<?php

namespace App\Http\Controllers;
use App\Models\City;


use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        if($cities) {
            return response()->json(['number' => count($cities),'cities' => $cities], 201);
        }
        return response()->json(['message' => 'No cities found'], 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'zipcode' => 'required|string',
        ]);

        $city = City::create([
            'name' => $request->name,
            'zipcode' => $request->zipcode,
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'city created successfully' , 'city' => $city], 201);
    }

   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);
        if($city) {
            return response()->json(['city' => $city], 201);
        }

        return response()->json(['message' => 'something happen maybe this city not found'], 404);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $city = City::find($id);
        if ($city){
            $city->update($request->all());
            return response()->json(['message' => ' city updated sucssefuly','city' => $city], 201);
        }
        
        return response()->json(['message' => ' something happen maybe this city not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (City::destroy($id)){
            return response()->json(['message' => ' city deleted sucssefuly'], 201);
        }
        
        return response()->json(['message' => ' something happen maybe this city not found'], 404);
    }
}
