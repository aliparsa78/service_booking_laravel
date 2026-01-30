<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Reject_Booking;
use App\Models\Room;
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
                $books = Booking::where('status','pending')->orderBy('updated_at','desc')->get();
                $month_revenue=Booking::where('status','confirmed')->whereBetween('updated_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])
                ->sum('total_price');
                $daily_income = Booking::where('status','confirmed')->whereDate('updated_at', Carbon::today())->sum('total_price');
                //Calculating Precentage of month revenue 
                $last_month=Booking::where('status','confirmed')->whereBetween('updated_at',
                [Carbon::now()->subMonth()->startOfMonth(),Carbon::now()->subMonth()->endOfMonth()])
                ->sum('total_price');

                $this_Month = Booking::where('status','confirmed')->whereBetween('updated_at',
                [Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])
                ->sum('total_price');
                if($last_month==0)
                {
                    $percentage = $this_Month;
                }else{
                    $percentage = (($this_Month - $last_month) / $last_month)* 100 ;
                }
                // calculate the percentage of day
                $yesterday = Booking::where('status','confirmed')->whereBetween('updated_at',[Carbon::yesterday()->startOfDay(),Carbon::yesterday()->endOfDay()])->sum('total_price');
                $today = Booking::where('status','confirmed')->whereBetween('updated_at',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()])->sum('total_price');
                if($yesterday==0 )
                {
                    $today_percentage = $today; 
                }else{
                    $today_percentage = (($today-$yesterday)/$yesterday)*100;
                }
                // Today's orders amount

                $today_orders = Booking::whereDate('updated_at',Carbon::today())->where('status','confirmed')->count();
                $yesterday_orders = Booking::whereDate('updated_at',Carbon::yesterday())->where('status','confirmed')->count();
                if($yesterday_orders == 0)
                {
                    $order_percentage = $today_orders;            
                }else{
                        
                        $order_percentage = (($today_orders - $yesterday_orders)/$yesterday_orders) * 100; 
                }
                return view('Backend/index',compact('books','month_revenue','daily_income'
                ,'percentage','today_percentage','today_orders','order_percentage'));
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
        $today = Booking::where('status','confirmed')->whereDate('updated_at',today())->get();
        $dayTotal = BooKing::where('status','confirmed')->whereDate('updated_at',today())->sum('total_price');
        return view('Backend/Reservations/index',compact('today','dayTotal'));
    }

    

    public function  week_reservation(Request $request)
    {
        $week_reservations = Booking::where('updated_at','>=',Carbon::now()->subWeek())->get();
        $week_total = Booking::where('status','confirmed')->where('updated_at','>=',Carbon::now()->subWeek())->sum('total_price');
        return view('Backend/Reservations/week',compact('week_reservations','week_total'));

    }
    public function month_reservation()
    {
        $month_reservations = Booking::where('updated_at','>=',Carbon::now()->subMonth())->get();
        $month_total = Booking::where('status','confirmed')->where('updated_at','>=',Carbon::now()->subMonth())->sum('total_price');
        return view('Backend/Reservations/month',compact('month_reservations','month_total'));
    }

    public function rejected_reservations(Request $request)
    {
        $rejected = Reject_Booking::get();
        return view('Backend/Reservations/rejected_reservations',compact('rejected'));
    }


    public function search(Request $request)
    {
        $search = $request->search;
        $type = $request->category;
        if($request->category == 'room')
        {
            $result = Room::whereHas('booking')->where('type','like',"%$search%")->get();
        }
        elseif($request->category == 'user')
        {
            $result = User::whereHas('booking')->where('name','like',"%$search%")->get();
            
        }
        elseif($request->category == 'booking')
        {
            $result = Booking::where('status','like',"%$search%")->get();
            
        }
        return view('Backend/Search/result',compact('result','search','type'));
    }
}
