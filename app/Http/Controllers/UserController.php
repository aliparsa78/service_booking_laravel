<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($user->role ==='customer'){
            return redirect('/customer');
        }elseif($user->role === 'admin')
        {
            return view('Backend/index');
        }
    }
}
