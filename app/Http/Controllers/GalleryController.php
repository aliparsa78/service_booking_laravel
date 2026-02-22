<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Services\GalleryService;

class GalleryController extends Controller
{
    protected GalleryService $galleryService;

    public function __construct(GalleryService $galleryService){
        $this->galleryService = $galleryService;
    }
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
    public function store(GalleryRequest $request, GalleryService $galleryService)
    {

        $this->galleryService->store($request);

        return redirect('glry')->with('success','Gallery information added successfuly ');
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

        $this->galleryService->update($request,$id);
        
        return redirect('/glry')->with('success','Information of Gallery updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $this->galleryService->destroy($request,$id);
        return back()->with('danger','Gallery information has been deleted');
    }
}
