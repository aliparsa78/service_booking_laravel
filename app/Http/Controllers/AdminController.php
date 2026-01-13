<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Reject_Booking;
use Auth;
use App\Notifications\RejectionNotification;

use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() && $user->role ==='admin')
            {
                $books = Booking::where('status','pending')->get();
                
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

    public function rejected_book(Request $request,$id)
    {
        $book = Booking::find($id);    
        return view('Backend/Reservations/reject',compact('book'));
    }
    public function accept_reject(Request $request)
    {
        $book_id = $request->book_id;
        $book = Booking::find($book_id);
        $book->status = 'cancelled';
        $book->update();

        $user = User::where('id',$book->user_id)->first();

        $reject = new Reject_Booking();
        $reject->user_id = $user->id;
        $reject->book_id = $request->book_id;
        $reject->reason = $request->message;
        $reject->save();

        
       
        $user = User::find($user->id)->first();

        $user->notify(new RejectionNotification($request->message));
        return redirect('/admin')->with('success','User`s booking rejected successfuly!');
    }

    public function reservations(Request $request)
    {
        $Month_orders = Booking::where('status','confirmed')->where('created_at','>=',Carbon::now()->subMonth())->get();
        $Day_orders = Booking::where('status','confirmed')->whereDate('created_at',today())->get();
        $monthTotal = BooKing::where('status','confirmed')->whereMonth('created_at',now()->month())->sum('total_price');
        $dayTotal = BooKing::where('status','confirmed')->whereDate('created_at',today())->sum('total_price');
        return view('Backend/Reservations/index',compact('Month_orders','Day_orders','monthTotal','dayTotal'));
    }

    

    public function  week_reservation(Request $request)
    {
        $week_reservations = Booking::where('created_at','>=',Carbon::now()->subWeek())->get();
        $week_total = Booking::where('status','confirmed')->where('created_at','>=',Carbon::now()->subWeek())->sum('total_price');
        return view('Backend/Reservations/week',compact('week_reservations','week_total'));

    }
    public function month_reservation()
    {
        $month_reservations = Booking::where('created_at','>=',Carbon::now()->subMonth())->get();
        $month_total = Booking::where('status','confirmed')->where('created_at','>=',Carbon::now()->subMonth())->sum('total_price');
        return view('Backend/Reservations/month',compact('month_reservations','month_total'));
    }

    public function rejected_reservations(Request $request)
    {
        $rejected = Reject_Booking::get();
        return view('Backend/Reservations/rejected_reservations',compact('rejected'));
    }
}
