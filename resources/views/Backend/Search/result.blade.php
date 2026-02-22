
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
    @if($type==='user')
       @include('Backend/Search.users')
    @elseif($type==='room')
       @include('Backend/Search/room')
    @elseif($type==='booking')
       @include('Backend/Search.booking')
    @endif              
  @endsection
    <!-- container-scroller -->
   
  </body>
</html>