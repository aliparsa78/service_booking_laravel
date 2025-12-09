<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::get();
        return view('Backend/Room/index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::get();
        return view('Backend/Room/create',compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'price'=>'required|numeric|min:100|max:600',
            'capacity'=>'required|numeric|min:1|max:5',
            'description'=>'required',
        ]);
        $room = new Room();
        $room->hotel_id = $request->hotel_id;
        $room->type = $request->type;
        $room->price=$request->price;
        $room->capacity = $request->capacity;
        $room->description = $request->description;
        $room->is_active = $request->is_active;
        if($request->hasFile('image'))
        {
            $image = time().$request->image->extension();
            $request->image->move(public_path('images/rooms'),$image);
            $room->image=$image;
        }
        $room->save();
        return redirect('room')->with('success','Room`s information added successfuly. ');
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
        $hotels = Hotel::get();
        $room = Room::find($id);
        return view('Backend/Room/edit',compact('room','hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $room->hotel_id = $request->hotel_id;
        $room->type = $request->type;
        $room->price=$request->price;
        $room->capacity = $request->capacity;
        $room->description = $request->description;
        $room->is_active = $request->is_active;
        if($request->hasFile('image'))
        {
            $image = time().$request->image->extension();
            $request->image->move(public_path('images/rooms'),$image);
            $room->image=$image;
        }
        $room->update();
        return redirect('/room')->with('success','Room`s information updated successfuly !');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();
        return back()->with('danger','Room`s information had been deleted');
    }
}

