<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class HomeController extends Controller
{
    public function about(Request $request)
    {
        $about = Hotel::get()->first();
        return view('Frontend/about',compact('about'));
    }
    public function rooms(Request $request)
    {
        $rooms = Room::get();
        return view('Frontend/room',compact('rooms'));
    }
}
