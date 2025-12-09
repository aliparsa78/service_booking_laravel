<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function about(Request $request)
    {
        $about = Hotel::get()->first();
        return view('Frontend/about',compact('about'));
    }
}
