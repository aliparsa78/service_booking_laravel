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
     <base href="{{asset('../public')}}">
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
                      <h2>Edit Your Booking Information</h2>
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
                    <form id="request" action="update_book/{{$book->id}}" class="main_form" method="POST">
                     @csrf
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="">Room Number</label>
                            <input type="text" class="contactus" value="{{$book->room_id}}"  name="room_id" readonly> 
                            </div>
                            
                            <div class="col-md-12">
                                 <label for="">Check In</label>
                                 <input type="date" class="contactus" value="{{$book->check_in}}"  name="check_in" > 
                              
                            </div>

                            <div class="col-md-12">
                                 <label for="">Check Out</label>
                               <input type="date" class="contactus" value="{{$book->check_out}}"  name="check_out" >                          
                            
                              </div>
                             
                            </div>

                            <div class="col-md-12">
                            <button class="send_btn">Update </button>
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