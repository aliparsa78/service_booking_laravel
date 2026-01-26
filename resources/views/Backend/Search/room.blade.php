
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
        <!-- partial -->
        @extends('Backend/layouts/app')
        @section('content')
    
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Search Result </h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables  </a></li>
                  <x-breadcrumn-component />
                </ol>
              </nav>
            </div>
            <div class="row">           
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Search Result for - ({{$search}})-- type - ({{$type}})</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-resposive table-dark">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> Room Type </th>
                            <th> Price </th>
                            <th> Capacity </th>
                            <th> Description </th>
                            <th> Is Active </th>
                            <th> Image </th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                        @foreach($result as $result)
                          <tr>
                              <td>{{$id++}}</td>
                              <td>{{$result->type}}</td>
                              <td>{{$result->price}}</td>
                              <td>{{$result->capacity}}</td>
                              <td style="max-width: 100px; white-space: normal;  ">{{$result->description}}</td>
                              <td>{{$result->is_active}}</td>
                              <td>{{$result->image}}</td>
                              
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <br>
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