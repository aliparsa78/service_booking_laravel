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
   <body class="main-layout inner_page">
      @extends('../Frontend/layouts/app')
   @section('content')
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
  
      <!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                    <h2>gallery</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- gallery -->
      <div  class="gallery">
         <div class="container">
           
            <div class="row">
               @foreach($galleries as $gallery)
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <a href="rooms">
                     <figure><img src="{{asset('Gallery/'.$gallery->image_path)}}" alt="Gallery" title="{{$gallery->title}}" /></figure>
                     </a>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- end gallery -->
    
     @endsection
   </body>
</html>