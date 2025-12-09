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
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
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
                    <h4 class="card-title text-center">Basic form elements for Rooms</h4>
                    <form class="forms-sample" action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <select class="form-select form-control" name="hotel_id" aria-label="Default select example">
                        @foreach($hotels as $hotel)
                        <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                        @endforeach                        
                    </select><br>
                      <div class="form-group">
                        <label for="exampleInputName1">Type</label>
                        <input type="text" name="type" class="form-control" id="exampleInputName1" placeholder="The room type..">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputName1" placeholder="The room price..">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Capacity</label>
                        <input type="text" name="capacity" class="form-control" id="exampleInputName1" placeholder="The room capacity..">
                      </div>
                      
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">                     
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                      </div>

                      <div class="form-check form-switch">
                        <input class="form-check-input" name="is_active" type="hidden" value="off" id="flexSwitchCheckDefault">
                        <input class="form-check-input" name="is_active" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
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