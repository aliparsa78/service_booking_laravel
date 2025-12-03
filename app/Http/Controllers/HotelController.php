<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::get();
        return view('/Backend/Hotel/index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend/Hotel/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        if($request->hasFile('profile'))
        {
            $profile = time().$request->profile->extension();
            $request->profile->move(public_path('images/hotel'),$profile);
            $hotel->profile = $profile;
        }
        $hotel->save();
        return redirect('/dashboard');
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
        $hotel = Hotel::find($id);
        return view('Backend/Hotel/edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        if($request->hasFile('profile'))
        {
            $profile = time().$request->profile->extension();
            $request->profile->move(public_path('images/hotel'),$profile);
            $hotel->profile = $profile;
        }
        $hotel->update();
        return redirect('/hotel')->with('success','Hotel information updated successfuly.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $hotel = Hotel::find($id);
        $hotel->delete();
        return back()->with('danger','Hotel information deleted.');
    }
}
