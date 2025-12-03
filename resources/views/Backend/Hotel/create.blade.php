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
                    <h4 class="card-title text-center">Basic form elements for Hotel</h4>
                    <form class="forms-sample" action="{{route('hotel.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputName1" placeholder="Address">
                      </div>
                      
                      
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="profile" class="form-control">
                        
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
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