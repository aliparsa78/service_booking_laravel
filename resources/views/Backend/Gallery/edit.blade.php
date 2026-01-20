<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href="{{asset('public')}}">
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
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <x-breadcrumn-component />
                </ol>
              </nav>
            </div>
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
                    <h4 class="card-title text-center">Basic form elements for Hotel</h4>
 
                    @if($errors->any())
                      @foreach($errors->all() as $error)
                        <p class="text-danger text-center">{{$error}}</p>
                      @endforeach
                    @endif
                    <form class="forms-sample" action="{{route('glry.update',$gallery->id)}} " method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="exampleInputName1" class="text-white">Room Id</label> <br>
                        <select name="room_id" id="" class="form-control">
                           @foreach($rooms as $room)
                            <option value="{{$room->id}}" {{$room->id == $gallery->room_id ? 'selected' :''}} >{{$room->type}}-{{$room->id}}</option>
                           @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" value="{{$gallery->title}}">
                      </div>
                      
                      
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="form-control">
                        
                      </div>
                    
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
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