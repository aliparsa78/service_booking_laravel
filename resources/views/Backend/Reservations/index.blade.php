
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
              <h3 class="page-title"> ALL Reservations </h3>

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
                    <h4 class="card-title">Today's Reservations</h4>
                    <div class="table-responsive">
                     <x-reservation-filter />             
                      <table class="table table-striped table-resposive table-dark">
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
                        @foreach($today as $today_order)
                          <tr>
                              <td>{{$id++}}</td>
                              <td>{{$today_order->user->name}}</td>
                              <td>{{$today_order->room->type}}</td>
                              <td>{{$today_order->status}}</td>
                              <td>{{$today_order->check_in}}</td>
                              <td>{{$today_order->check_out}}</td>
                              <td>{{$today_order->total_price}}</td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <br>
                    <h5 class="text-center text-white">Total amount of earn: ( {{$dayTotal}} $ )</h5>
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