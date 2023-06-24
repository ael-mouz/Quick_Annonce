<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\City;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->paginate(7);
        return view('pages.announcement.index', compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('pages.announcement.create', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'category' => 'required|exists:categories,id',
            'city' => 'required|exists:cities,id',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'picture_1' => 'required',
            'picture_2' => 'required',
            'picture_3' => 'required',
            'picture_4' => 'required',
            'picture_5' => 'required',
            'is_validated' => 'required|boolean',
        ]);

        Announcement::create($validatedData);

        return redirect()->route('announcement')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Announcement::find($id);
        return view('pages.announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = Announcement::find($id);
        return view('pages.announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'category' => 'required|exists:categories,id',
            'city' => 'required|exists:cities,id',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'picture_1' => 'required',
            'picture_2' => 'required',
            'picture_3' => 'required',
            'picture_4' => 'required',
            'picture_5' => 'required',
            'is_validated' => 'required|boolean',
        ]);

        Announcement::find($id)->update($validatedData);

        return redirect()->route('announcement')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPage()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*','announcement.id as ann_id', 'city.*', 'category.*')
            ->paginate(7);
        return view('pages.announcement.delete', compact('announcement'));
    }
    public function destroy(string $id)
    {
        Announcement::find($id)->delete();
        return redirect()->back()->with('success', 'Announcement deleted successfully.');
    }

    public function validateAnnouncementPage()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', false)
            ->paginate(7);
        return view('pages.announcement.validate', compact('announcement'));
    }
    public function validateAnnouncement(string $id)
    {
        $announcement = Announcement::where('id', '=', $id)->get()->first();
        if ($announcement) {
            $announcement->update(['is_validated' => true]);
            return redirect()->back()->with('success', 'Announcement validated successfully.');
        } else {
            return redirect()->back()->with('error', 'Announcement not found.');
        }
    }
}
