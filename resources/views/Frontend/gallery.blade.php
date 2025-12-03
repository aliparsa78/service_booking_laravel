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
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery1.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery2.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery3.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery4.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery5.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery6.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery7.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="images/gallery8.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end gallery -->
    
     @endsection
   </body>
</html>