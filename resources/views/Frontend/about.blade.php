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
      <!-- loader  -->
   @extends('../Frontend/layouts/app')
   @section('content')
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
                     <h2>About Us</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about -->
      <div class="about">
         <div class="container-fluid">
            <h1 class="text-center text-info text-bold">{{$about->name}}</h1><br>
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                    
                     <p class="margin_0">{{$about->description}} </p>
                     <a class="read_more" href="Javascript:void(0)"> Read More</a>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="{{asset('images/hotel/'.$about->profile)}}" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
   @endsection
   </body>
</html>