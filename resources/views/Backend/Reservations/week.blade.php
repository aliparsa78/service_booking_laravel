
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
              <h3 class="page-title"> ALL Reservations </h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <x-breadcrumn-component />

                </ol>
              </nav>
            </div>
            <hr>
            <div class="row">           
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Reservations Table From Last Week</h4>
                     <x-reservation-filter />             

                      <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> Customer_name </th>
                            <th> Room_id </th>
                            <th> Status </th>
                            <th> Check_in </th>
                            <th> Check_out </th>
                            <th> Total_Price </th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                        @foreach($week_reservations as $book)
                          <tr>
                              <td>{{$id++}}</td>
                              <td>{{$book->user->name}}</td>
                              <td>{{$book->room->type}}</td>
                              <td>{{$book->status}}</td>
                              <td>{{$book->check_in}}</td>
                              <td>{{$book->check_out}}</td>
                              <td>{{$book->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h5 class="text-center text-white">Total amount of earn: ( {{$week_total}} $ )</h5>
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