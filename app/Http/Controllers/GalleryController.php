<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::get();
        return view('Backend/Gallery/index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::where('is_active','on')->get();
        return view('Backend/Gallery/create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gallery = new Gallery();
        $gallery->room_id = $request->room_id;
        $gallery->title = $request->title;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('Gallery'),$name);
            $gallery->image_path = $name;
        }
        $gallery->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms = Room::where('is_active','on')->get();
        $gallery = Gallery::find($id);
        return view('Backend/Gallery/edit',compact('gallery','rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);
        $gallery->room_id = $request->room_id;
        $gallery->title = $request->title;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('Gallery'),$name);
            $gallery->image_path = $name;
        }
        $gallery->update();
        return redirect('/glry')->with('success','Information of Gallery updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery, string $id)
    {
        $gallery = Gallery::find($id);
        
        if(file_exists(public_path($gallery->impage_path))){
            $file = public_path('Gallery/'.$gallery->image_path);
            unlink($file);
        }
        $gallery->delete();
        return back()->with('danger','Gallery information has been deleted');
    }
}
