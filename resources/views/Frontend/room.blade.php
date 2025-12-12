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
     
   </head>
   <!-- body -->
   <body class="main-layout">
      @extends('../Frontend/layouts/app')
   @section('content')
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
   
      <!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Our Room</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- our_room -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <p  class="margin_0">Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach($rooms as $room)
               <div class="col-md-4 col-sm-6">
                  <a href="book/{{$room->id}}" id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="{{asset('images/rooms/'.$room->image)}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$room->type}}</h3>
                        <h5>Room Number: {{$room->id}} </h5>
                        <h5>Price: {{$room->price}} $</h5>
                        <h5>Capacity: {{$room->capacity}}</h5>
                        <p>{{$room->description}} </p>
                     </div>
                  </a>
               </div>
               @endforeach
               
            </div>
         </div>
      </div>
      <!-- end our_room -->
     
     @endsection
   </body>
</html>