<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::get();
        return view('Frontend/index',compact('rooms'));
    }
}
