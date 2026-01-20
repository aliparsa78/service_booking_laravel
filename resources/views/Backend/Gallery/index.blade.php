
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
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <x-breadcrumn-component />
                </ol>
              </nav>
            </div>
            <div class="row">
                             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Gallery Table</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <a href="{{route('glry.create')}}" class="text-white btn btn-info">Create New Gallery</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive ">
                      <table class="table table-striped table-dark ">
                        <thead>
                          <tr >
                            <th>#</th>
                            <th> Title </th>
                            <th> Room Id </th>
                            <th> Image </th>
                            <th> Is_Active </th>
                            <th> Edite </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                            <tr>
                                <td>{{$gallery->id}}</td>
                                <td>{{$gallery->title}}</td>
                                <td>{{$gallery->room_id}}</td>
                                <td>
                                    <img src="{{asset('Gallery/'.$gallery->image_path)}}" alt="">
                                </td>
                                <td>{{$gallery->is_active}}</td>
                                <td>
                                    <a href="{{route('glry.edit',$gallery->id)}}" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('glry.destroy',$gallery->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
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