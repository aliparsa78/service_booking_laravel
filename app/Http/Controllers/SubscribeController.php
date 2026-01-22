<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;
use Auth;

class SubscribeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email'=>'required',
        ]);
        if(Auth::check())
        {
            $user = Auth::user();
            $subscribe = new Subscribe();
            $subscribe->email = $request->email;
            $subscribe->user_id = $user->id;
            $subscribe->save();
            return redirect('/')->with('success','Email sent. Thankyou !');
            
        }else{
            return redirect('/login');
        }
    }
}
