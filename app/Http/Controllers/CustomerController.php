<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use Auth;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $about = Hotel::get()->first();
        $rooms = Room::get();
        return view('Frontend/index',compact('rooms','about'));
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
        $user_id = Auth::user()->id;
        $book = new Booking();
        $book->user_id = $user_id;
        $book->room_id = $request->room_id;
        $book->check_in = $request->check_in;
        $book->check_out = $request->check_out;
        $book->total_price = $request->price;
        $book->save();
        session()->forget('temp_book');
        session()->forget('temp_date');
        
        return redirect('/')->with('success','Booking registered successfuly ');
    }
}
