<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if($categories) {
            return response()->json(['number' => count($categories),'categories' => $categories], 201);
        }
        return response()->json(['message' => 'No categories found'], 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'label' => 'required|string',
            'description' => 'required|string',
        ]);

        $category = Category::create([
            'category' => $request->category,
            'label' => $request->label,
            'description' => $request->description
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'Category created successfully' , 'category' => $category], 201);
    }

   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if($category) {
            return response()->json(['category' => $category], 201);
        }

        return response()->json(['message' => 'something happen maybe this category not found'], 404);

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
        $categories = Category::find($id);
        if ($categories){
            $categories->update($request->all());
            return response()->json(['message' => ' category updated sucssefuly','Category' => $categories], 201);
        }
        
        return response()->json(['message' => ' something happen maybe this category not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Category::destroy($id)){
            return response()->json(['message' => ' category deleted sucssefuly'], 201);
        }
        
        return response()->json(['message' => ' something happen maybe this category not found'], 404);
    }
}
