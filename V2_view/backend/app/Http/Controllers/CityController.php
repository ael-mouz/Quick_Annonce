<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = City::paginate(7);
        return view('pages.city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'zip_code' => 'required|integer',
        ]);

        City::create($request->all());

        return redirect()->route('show_city')->with('success', 'City created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::findOrFail($id);
        return view('pages.city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::findOrFail($id);
        return view('pages.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'zip_code' => 'required|integer',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return redirect()->route('show_city')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('show_city')->with('success', 'City deleted successfully.');
    }
}
