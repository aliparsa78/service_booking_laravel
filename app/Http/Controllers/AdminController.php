<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Reject_Booking;
use Auth;
use Carbon\Carbon;


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

    public function decline_book(Request $request,$id)
    {
        $book = Booking::find($id);
        $book->status = $request->status;
        $book->update();
        // return $book;
        $reject = new Reject_Booking();
        return view('Backend/Reservations/reject',compact('book'));
        // return back()->with('success','Information has been updated successfuly !');
    }

    public function reservations(Request $request)
    {
        $Month_orders = Booking::where('status','confirmed')->where('created_at','>=',Carbon::now()->subMonth())->get();
        $Day_orders = Booking::where('status','confirmed')->whereDate('created_at',today())->get();
        $monthTotal = BooKing::where('status','confirmed')->whereMonth('created_at',now()->month())->sum('total_price');
        $dayTotal = BooKing::where('status','confirmed')->whereDate('created_at',today())->sum('total_price');
        return view('Backend/Reservations/index',compact('Month_orders','Day_orders','monthTotal','dayTotal'));
    }
}
