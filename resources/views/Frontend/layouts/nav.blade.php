<style>
  .log_out{
    background-color: transparent;
    border: none;
    outline: none;
    text-color: #ccc;
    cursor: pointer;
  }
</style>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                                 <a class="nav-link" href="/">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{request()->is('about*') ? 'active' : ''}}" href="about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{request()->is('rooms*') ? 'active' : ''}}" href="rooms">rooms</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link  {{request()->is('gallery*') ? 'active' : ''}}" href="gallery">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link {{request()->is('blog*') ? 'active' : ''}}" href="blog">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link  {{request()->is('contact*') ? 'active' : ''}}" href="contact">Contact</a>
                              </li>
                              @auth
                              <li class="nav-item">
                                 <a class="nav-link {{request()->is('order*') ? 'active' : ''}}" href="order">Orders</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="acount">Acount</a>
                              </li>
                              <li class="nav-item">
                                 <form method="POST" class="nav-link" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="submit" value="Log out" class="log_out">
                                 </form>
                              </li>
                              @else
                              <li class="nav-item">
                                 <a class="nav-link" href="/login">Sign in</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/register">Sign Up</a>
                              </li>
                              @endif
                             
                              
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      