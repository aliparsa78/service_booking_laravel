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
     <base href="../public">
   </head>
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
                      <h2>Confirm Your Booking Information</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  contact -->
      <div class="contact">
         <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <form id="request" action="submit_book" class="main_form" method="POST">
                     @csrf
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="">Room Number</label>
                            <input type="text" class="contactus" value="{{session('temp_book.room_id')}}"  name="room_id" readonly> 
                            </div>
                            
                            <div class="col-md-12">
                               @if(session()->has('temp_date'))
                                 <label for="">Check In</label>
                                 <input type="text" class="contactus" value="{{session('temp_book.check_in')}}"  name="check_in" readonly> 
                               @else
                                 <label for="">Check In <i class="text-danger">*</i></label>
                                 <input type="date" class="contactus"   name="check_in" required >                              
                                 @endif
                            </div>

                            <div class="col-md-12">
                              @if(session()->has('temp_date'))
                                 <label for="">Check Out</label>
                               <input type="text" class="contactus" value="{{session('temp_book.check_out')}}"  name="check_out" readonly>                          
                              @else
                              <label for="">Check Out <i class="text-danger">*</i></label>
                               <input type="date" class="contactus"   name="check_out" required>
                              @endif 
                              </div>
                             
                            </div>

                            <div class="col-md-12">
                              <label for="">Total Price</label>
                              <input  class="contactus" value="{{session('temp_book.total_price')}}"    name="price" readonly> 
                            </div>
                            <div class="col-md-12">
                            <button class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>


               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
      <!--  footer -->
     @endsection
   </body>
</html>