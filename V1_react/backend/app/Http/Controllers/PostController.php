<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        if ($posts) {
            return response()->json(['number' => count($posts), 'posts' => $posts], 201);
        }
        return response()->json(['message' => 'No posts found'], 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'category' => 'required|string',
            'city' => 'required|string',
            'description' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|string',
            'picture_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'picture_5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // for($i=1 ; $i<= 5; $i++){
        //     $picture_.$i = time().'.'.$request->picture_.$i->extension(); 
        //     $request->picture_.$i->move(public_path('images'), $picture_.$i);
        // }

        $picture_1 = time() . '.' . $request->picture_1->extension();
        $request->picture_1->move(public_path('images'), $picture_1);

        $picture_2 = time() . '.' . $request->picture_2->extension();
        $request->picture_2->move(public_path('images'), $picture_2);

        $picture_3 = time() . '.' . $request->picture_3->extension();
        $request->picture_3->move(public_path('images'), $picture_3);

        $picture_4 = time() . '.' . $request->picture_4->extension();
        $request->picture_4->move(public_path('images'), $picture_4);

        $picture_5 = time() . '.' . $request->picture_5->extension();
        $request->picture_5->move(public_path('images'), $picture_5);


        $post = Post::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
            'city' => $request->city,
            'description' => $request->description,
            'title' => $request->title,
            'price' => $request->price,
            'picture_1' => 'images\\' . $picture_1,
            'picture_2' => 'images\\' . $picture_2,
            'picture_3' => 'images\\' . $picture_3,
            'picture_4' => 'images\\' . $picture_4,
            'picture_5' => 'images\\' . $picture_5,
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'post created successfully', 'post' => $post], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json(['post' => $post], 201);
        }

        return response()->json(['message' => 'something happen maybe this post not exist'], 404);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->update($request->all());
            return response()->json(['message' => ' post updated sucssefuly', 'Post' => $post], 201);
        }

        return response()->json(['message' => ' something happen maybe this post not exist'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Post::destroy($id)) {
            return response()->json(['message' => ' post deleted sucssefuly'], 201);
        }

        return response()->json(['message' => ' something happen maybe this post not found'], 404);
    }

    // search user by his name
    public function search($title)
    {
        $post = Post::where('title', 'like', '%' . $title . '%')->get();
        if ($post) {
            return response()->json(['Post' => $post], 201);
        }

        return response()->json(['message' => 'Nothing found!'], 404);
        // return $request->all();

    }

    // filter with (category , prix, city , date)
    public function filterData(Request $request)
    {
        $query = Post::query();

        // Apply filters
        if ($request->has('category')) {
            $category = $request->input('category');
            $query->where('category', $category);
        }

        if ($request->has('price')) {
            $price = $request->input('price');
            $query->where('price', $price);
        }

        if ($request->has('city')) {
            $city = $request->input('city');
            $query->where('city', $city);
        }

        if ($request->has('date')) {
            $date = $request->input('date');
            $query->whereDate('created_at', $date);
        }

        $results = $query->get();

        return response()->json($results);
    }

    public function validate(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->is_validated = 1;
            $post->save();
            return response()->json(['message' => ' post validated sucssefuly', 'post' => $post], 201);
        }

        return response()->json(['message' => ' something happen maybe this post not exist'], 404);
    }
}