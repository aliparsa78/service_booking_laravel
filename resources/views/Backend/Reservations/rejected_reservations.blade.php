
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
              <h3 class="page-title"> Rejected Reservations </h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rejected tables</li>
                </ol>
              </nav>
            </div>
            <hr>
            <div class="row">           
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Reservations Table of Rejected Reservations</h4>
                    <div class="table-responsive">
                      <x-reservation-filter />             

                      <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> Customer_name </th>
                            <th> Customers's Email </th>
                            <th> Room_id </th>
                            <th> Reason of Rejection </th>
                            <th>Created at</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                        @foreach($rejected as $rejected)
                          <tr>
                              <td>{{$id++}}</td>
                              <td>{{$rejected->user->name}}</td>
                              <td>{{$rejected->user->email}}</td>
                              <td>{{$rejected->book_id}}</td>
                              <td>{{$rejected->reason}}</td>
                              <td>{{$rejected->created_at}}</td>
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