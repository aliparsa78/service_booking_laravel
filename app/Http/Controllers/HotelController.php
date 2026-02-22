<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Requests\HotelRequest;
use App\Services\HotelService;

class HotelController extends Controller
{
    protected HotelService $hotelService;
    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

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
    public function store(HotelRequest $request)
    {
       $this->hotelService->store($request);
        return redirect('/hotel')->with('success','Hotel information added successfuly');
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
        $this->hotelService->update($request,$id);
        return redirect('/hotel')->with('danger','Hotel information updated successfuly.');
        
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
