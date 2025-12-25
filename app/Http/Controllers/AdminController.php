<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Auth;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() && $user->role ==='admin')
            {
                $books = Booking::get();
                
                return view('Backend/index',compact('books'));
            }   
    }
    public function approve(Request $request, $id)
    {
        $book = Booking::find($id);
        $book->status = $request->status;
        $book->update();
        return back()->with('success','Information has been updated successfuly !');
    }

    public function reservations(Request $request)
    {
        $books = Booking::all();
        $total_earn = BooKing::where('status','confirmed')->sum('total_price');

        return view('Backend/Reservations/index',compact('books','total_earn'));
    }
}
