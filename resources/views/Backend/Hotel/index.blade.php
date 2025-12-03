
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
                    <h4 class="card-title">Hotel Table</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Address </th>
                            <th> Description </th>
                            <th> Rate </th>
                            <th> Profile </th>
                            <th> Edite </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                          <tr>
                              <td>{{$hotel->name}} </td>
                              <td>{{$hotel->address}}</td>
                                <td id="description"> {{$hotel->description}} </td>
                                <td> {{$hotel->rating == ''? 'null' :$hotel->rating}} </td>
                                <td class="">
                                  <img src="{{asset('images/hotel/'.$hotel->profile)}}" alt="image" />
                                </td>
                                <td>
                                    <a href="{{route('hotel.edit',$hotel->id)}}">Edite</a>
                                </td>
                                <td>
                                  <form action="{{route('hotel.destroy',$hotel->id)}}" method="post">
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