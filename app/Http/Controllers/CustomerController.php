<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Services\BookingService;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\User;
use App\Models\Profile;
use Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    protected BookingService $bookingService;
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }


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
    public function up_profile(Request $request)
    {
        
        $data = $request->validate(
            [
                'bio'=>'sometimes|string|max:300',
                'location'=>'sometimes|string|max:30',
                'image'=>'sometimes',
            ]);
            
            $user = Auth::user();
            if ($request->hasFile('image')) {
                $image = $request->image;
                $name = time().'.'.$image->getClientOriginalExtension();
                $path = $image->storeAs('Users',$name,'public');
                $user->image()->updateOrCreate(
                [],
                [
                    'path'=> $path,
                ]);
                return back()->with('success','Profile Image Updated Successfuly ');
            }else{
                die();
            }
            $user->profile()->updateOrCreate(
            [],
            $data);
            return back()->with('success','Bio`s information updated');
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
    public function submit_book(BookingRequest $request, BookingService $bookingService)
    {
        $this->bookingService->submit_book($request);
        
        
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
    public function cancel_booking($id)
    {
        if(Auth::check())
        {
            $book = Booking::find($id);
            $book->delete();
            return back()->with('danger','Booking information deleted');
        }
    }
}
