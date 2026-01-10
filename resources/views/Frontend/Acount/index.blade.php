<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>keto</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
     
   </head>
   <style>
    .heading{
        background-color: blue;
        color: white;
        text-align: center;
    }
    .heading tr td{
        border: 1px solid gray;

    }
    table tbody tr td{
        text-align:center;
        border: 1px solid gray;
        font-weight: bold;
    }
   </style>
   <!-- body -->
   <body class="main-layout">
      @extends('../Frontend/layouts/app')
   @section('content')
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      
      <!-- end header inner -->
      <!-- end header -->
     <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                      <h2>My Acount</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                <h1 class="text-center">Your Booking Information</h1>
                <table class="table">
                    <thead class="heading">
                        <tr>
                            <td>#</td>
                            <td>Room No</td>
                            <td>Total Price</td>
                            <td  >Statues</td>
                            <td>Check in</td>
                            <td>Check out</td>
                            <td>payment_status</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1; @endphp
                        @foreach($Bookings as $booking)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$booking->room_id}}</td>
                            <td>{{$booking->total_price}} $</td>
                            <td class="{{$booking->status=='pending' ? 'text-warning' : ($booking->status=='confirmed' ? 'text-info' : ''  ) }}">{{$booking->status}}</td>
                            <td>{{$booking->check_in}} </td>
                            <td>{{$booking->check_out}}</td>
                            <td>{{$booking->payment_status}}</td>
                            
                            <td> 
                                @if($booking->status=='pending')
                                <a href="edit_booking/{{$booking->id}}" class="btn btn-info text-center {{$booking->status=='pending' ? '' : 'disabled'}}" >Edit <p class="fa fa-edit"></p></a>
                                @else
                                <p>Edit</p>
                                @endif
                            </td>
                            <td >
                                @if($booking->status=='pending')
                                <form action="delete_book/{{$booking->id}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger {{$booking->status!='pending' ? 'disabled' : ''}}" >Delete <p class="fa fa-trash"></p> </button>
                                </form>
                                @else
                                    <p>delete</p>
                                @endif
                            </td>
                            
                        </tr>
                        
                        @endforeach
                    </tbody>

                    
                </table>
            </div>
            @if($count != 0)
            <a href="" class="btn btn-info text-center">Check Out</a>
            @else
                
            @endif
        </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
     @endsection
   </body>
</html>