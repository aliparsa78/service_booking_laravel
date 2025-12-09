
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <base href="../public">
  </head>
  <style>
    #description{
      max-width:150px;
      word-wrap:break-word;
      white-space: normal;
    }
    .delete{
      background:none;
      outline:none;
      border:none;
      color:red;
      cursor: pointer;
    }
  </style>
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
                  <li class="breadcrumb-item active" aria-current="page">Hotel tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Rooms Table</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Hotel Name</th>
                            <th> Type </th>
                            <th> Price </th>
                            <th> Capacity </th>
                            <th> Description </th>
                            <th> Image </th>
                            <th> Is_Active </th>
                            <th> Edite </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($rooms as $room)
                          <tr>
                            <td>{{$room->hotel->name}}</td>
                            <td>{{$room->type}} </td>
                            <td>{{$room->price}}</td>
                            <td>{{$room->capacity}}</td>
                            <td id="description"> {{$room->description}} </td>
                            <td class="">
                              <img src="{{asset('images/rooms/'.$room->image)}}" alt="image" />
                            </td>
                            <td>{{$room->is_active}}</td>
                            <td>
                                <a href="{{route('room.edit',$room->id)}}">Edite</a>
                            </td>
                                <td>
                                  <form action="{{route('room.destroy',$room->id)}}" method="post">
                                     @csrf
                                     @method('DELETE')
                                    <input type="submit" class="delete" value="Delete">
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