<?php
namespace App\Services;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelService {

    public function store(Request $request )
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
    }

    public function update(Request $request,$id)
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
    }



}


?>