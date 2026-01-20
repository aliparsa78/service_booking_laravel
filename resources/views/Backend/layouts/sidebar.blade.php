<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a href="dashboard" style="text-decoration: none; color: white"><h4>Hotel Reservation</h4></a>  
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="backend/assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal"> {{Auth::user()->name}} {{Auth::user()->lastname}} </h5>
                    <span>{{Auth::user()->role}}</span>
                  </div>
              </div>
              
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-f" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Form Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-f">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('hotel.create')}}">Hotel</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('room.create')}}">Rooms</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('glry')}}">Gallery</a></li>
              </ul>
            </div>
          </li>
            <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-t" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Table Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-t">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/hotel">Hotel</a></li>
                <li class="nav-item"> <a class="nav-link" href="/room">Rooms</a></li>
              </ul>
            </div>
          </li>
          
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="/reservations">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Order Status</span>
            </a>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>