<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href="../public">
  </head>
  <body>
    @extends('Backend/layouts/app')     <!-- partial -->
        @section('content')
    
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Table / </a></li>
                    <x-breadcrumn-component />

                </ol>
              </nav>
            </div>
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  @if($errors->any())
                    @foreach($errors->all() as $error)
                      <p class="text-danger text-center">{{$error}}</p>
                    @endforeach
                  @endif
                  <div class="card">
                    <div class="card-header text-white">
                      <h3>Room: {{$book->room->type}}</h3>
                      <h5>Capacity: {{$book->room->capacity}} Person/s</h5>
                      <h5>Total_Price: {{$book->total_price}} $</h5>
                      <h5>
                          image: <br><br> <img src="{{asset('images/rooms/'.$book->room->image)}}" alt="" width="100px">
                      </h5>
                    </div>
                    <div class="card-body">
                      <form action="accept_reject" method="post">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$book->id}}">
                        <label for="" class="text-white">Reason For Rejection</label>
                        <textarea name="message" id="" class="form-control text-white" placeholder="Enter the message" Required></textarea>
                        <br>
                        <input type="submit" class="btn btn-info" value="Reject Booking">
                      </form>
                    </div>
                  </div>                    
                      
                      <div class="form-group">
                        <label>Image</label>
                                             
                      </div>
                     
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
         
        </div>
          </div>
          <!-- content-wrapper ends -->
       
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @endsection
    <!-- container-scroller -->
   
  </body>
</html>