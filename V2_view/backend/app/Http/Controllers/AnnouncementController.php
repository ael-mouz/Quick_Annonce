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
        $category = Category::all();
        $city = City::all();
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->paginate(7);
        return view('pages.announcement.index', compact('announcement', 'category', 'city'));
    }
    public function index_one()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('category.cat', '=', 'immobilier')
            ->paginate(7);
        return view('pages.immobilier', compact('announcement'));
    }
    public function index_two()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('category.cat', '=', 'multimedia')
            ->paginate(7);
        return view('pages.multimedia', compact('announcement'));
    }
    public function index_tree()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('category.cat', '=', 'maison')
            ->paginate(7);
        return view('pages.maison', compact('announcement'));
    }
    public function index_four()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('category.cat', '=', 'vehicules')
            ->paginate(7);
        return view('pages.vehicules', compact('announcement'));
    }
    public function index_five()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('category.cat', '=', 'emploi & services')
            ->paginate(7);
        return view('pages.emploi', compact('announcement'));
    }
    public function index_six()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('category.cat', '=', 'objects personnels')
            ->paginate(7);
        return view('pages.objects', compact('announcement'));
    }

    public function My_announcement()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('announcement.username', '=', auth()->user()->username)
            ->paginate(7);
        return view('pages.objects', compact('announcement'));
    }
    public function filter_announcement(Request $request)
    {
        $category = Category::all();
        $city = City::all();
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('announcement.city', 'LIKE', '%'.$request->input('city').'%' )
            ->where('announcement.category', 'LIKE', '%'.$request->input('category').'%')
            ->orderBy('announcement.'.$request->input('sort'), $request->input('order') == 'asc' ? 'asc' : 'desc')
            ->paginate(7);
        return view('pages.announcement.index', compact('announcement', 'category', 'city'));
    }
    public function search_announcement(Request $request)
    {
        $category = Category::all();
        $city = City::all();
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
            ->where('announcement.is_validated', true)
            ->where('announcement.title', 'LIKE', '%'.$request->input('search').'%' )
            ->paginate(7);
        return view('pages.announcement.index', compact('announcement', 'category', 'city'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $city = City::all();
        return view('pages.announcement.create', compact('category', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'category' => 'required|exists:category,id',
            'city' => 'required|exists:city,id',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'picture_1' => 'required|image',
            'picture_2' => 'required|image',
            'picture_3' => 'required|image',
            'picture_4' => 'required|image',
            'picture_5' => 'required|image',
        ]);

        $announcement = new Announcement;
        $announcement->username = $request->input('username');
        $announcement->email = $request->input('email');
        $announcement->category = $request->input('category');
        $announcement->city = $request->input('city');
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        $announcement->price = $request->input('price');

        // Upload and store the files
        $picturePaths = [];
        for ($i = 1; $i <= 5; $i++) {
            $file = $request->file("picture_$i");
            $path = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $path);
            $picturePaths["picture_$i"] = $path;
        }

        $announcement->picture_1 = $picturePaths['picture_1'];
        $announcement->picture_2 = $picturePaths['picture_2'];
        $announcement->picture_3 = $picturePaths['picture_3'];
        $announcement->picture_4 = $picturePaths['picture_4'];
        $announcement->picture_5 = $picturePaths['picture_5'];

        $announcement->save();

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
        $category = Category::all();
        $city = City::all();
        $announcement = Announcement::find($id);
        return view('pages.announcement.edit', compact('announcement', 'category', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'category' => 'required|exists:category,id',
            'city' => 'required|exists:city,id',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'picture_1' => 'image',
            'picture_2' => 'image',
            'picture_3' => 'image',
            'picture_4' => 'image',
            'picture_5' => 'image',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->username = $request->input('username');
        $announcement->email = $request->input('email');
        $announcement->category = $request->input('category');
        $announcement->city = $request->input('city');
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        $announcement->price = $request->input('price');

        // Upload and store the files
        $picturePaths = [];
        for ($i = 1; $i <= 5; $i++) {
            $file = $request->file("picture_$i");
            if ($file) {
                $path = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $path);
                $picturePaths["picture_$i"] = $path;
            }
        }

        // Update the picture paths if new files were uploaded
        if (!empty($picturePaths)) {
            $announcement->picture_1 = $picturePaths['picture_1'] ?? $announcement->picture_1;
            $announcement->picture_2 = $picturePaths['picture_2'] ?? $announcement->picture_2;
            $announcement->picture_3 = $picturePaths['picture_3'] ?? $announcement->picture_3;
            $announcement->picture_4 = $picturePaths['picture_4'] ?? $announcement->picture_4;
            $announcement->picture_5 = $picturePaths['picture_5'] ?? $announcement->picture_5;
        }

        $announcement->save();

        return redirect()->route('announcement')->with('success', 'Announcement updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyPage()
    {
        $announcement = Announcement::join('city', 'announcement.city', '=', 'city.id')
            ->join('category', 'announcement.category', '=', 'category.id')
            ->select('announcement.*', 'announcement.id as ann_id', 'city.*', 'category.*')
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
