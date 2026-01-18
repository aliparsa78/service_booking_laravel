<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $about = Hotel::get()->first();
        $rooms = Room::all();
        return view('Frontend/index',compact('rooms','about'));
    }

    public function acount(Request $request)
    {
        $user = Auth::user();
        $Bookings = Booking::where('user_id',$user->id)->get();
        $count = Booking::where('user_id',$user->id)->count();
        return view('Frontend/Acount/index',compact('user','Bookings','count'));
    }

    public function book_now(Request $request)
    {
        $data = $request->only(['arrival','departure']);
        session(['temp_date'=>$data]);
        $rooms = Room::get();
        return view('Frontend/room',compact('rooms'));
    }
    public function book(Request $request, $id)
    {   $room = Room::find($id);
        $arrival  = session('temp_date.arrival');
        $departure  = session('temp_date.departure');
        $user_id = Auth::user()->id;
        $book = new Booking();
        $book->user_id = $user_id;
        $book->room_id = $id;
        $book->check_in = $arrival;
        $book->check_out = $departure;
        $book->total_price = $room->price;
         session(['temp_book'=>$book]);

        
        return view('Frontend/Book/index');
    }
    public function submit_book(Request $request)
    {
        $request->validate([
            'check_in'=>'required|date|after-or-equal:today',
            'check_out'=>'required|date|after:check_in',

        ]);

        $checkIn = Carbon::parse($request->check_in);
        $checkout = Carbon::parse($request->check_out);
        $days = $checkIn->diffInDays($checkout);
        $total_price = $days * $request->price;
        $user_id = Auth::user()->id;
        $book = new Booking();
        $book->user_id = $user_id;
        $book->room_id = $request->room_id;
        $book->check_in = $request->check_in;
        $book->check_out = $request->check_out;
        $book->total_price = $total_price;
        $book->save();
        session()->forget('temp_book');
        session()->forget('temp_date');
        
        return redirect('acount')->with('success','Booking registered successfuly ');
    }

    public function edit_booking(Request $request, $id){
        $book = Booking::find($id);
        return view('Frontend/Book/edit',compact('book'));
    }
    public function update_book(Request $request, $id)
    {
        $book = Booking::find($id);
        $book->check_in = $request->check_in;
        $book->check_out = $request->check_out;
        $book->update();
        return redirect('/acount')->with('success','Booking Date updated successfuly ');
    }
    public function delete_book($id)
    {
        if(Auth::check())
        {
            $book = Booking::find($id);
            $book->delete();
            return back()->with('danger','Booking information deleted');
        }
    }
}
