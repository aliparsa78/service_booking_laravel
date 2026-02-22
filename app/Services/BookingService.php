<?php
namespace App\Services;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;



class BookingService{

    public function submit_book(Request $request)
    {
        $checkIn = Carbon::parse($request->check_in);
        $checkout = Carbon::parse($request->check_out);
        // How many days are there between them?
        $days = $checkIn->diffInDays($checkout);

        $total_price = $days * $request->price;

        $user_id = Auth::user()->id;
        Booking::create([
            'user_id'=>$user_id,
            'room_id'=>$request->room_id,
            'check_in'=>$request->check_in,
            'check_out'=>$request->check_out,
            'total_price'=>$total_price,
        ]);
        
        session()->forget('temp_book');
        session()->forget('temp_date');
    }
}

?>