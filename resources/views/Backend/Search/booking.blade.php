
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
                    <h4 class="card-title">Search Result</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-resposive table-dark">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> User Name</th>
                            <th> Check in </th>
                            <th> Checkout </th>
                            <th> Total_price </th>
                            <th> status </th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                        @foreach($result as $booking)
                          <tr>
                              <td>{{$id++}}</td>
                              <td>{{$booking->user->name}}</td>
                              <td>{{$booking->check_in}}</td>
                              <td>{{$booking->check_out}}</td>
                              <td>{{$booking->total_price}}</td>
                              <td>{{$booking->status}}</td>
                              
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