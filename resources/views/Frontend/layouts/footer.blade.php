<footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-4">
                     <h3>Contact US</h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Kabul, Afghanistan</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +93 76 4941467</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> aliparsa883@gmail.com</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>Menu Link</h3>
                     <ul class="link_menu">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="about"> about</a></li>
                        <li><a href="rooms">Our Room</a></li>
                        <li><a href="front_glry">Gallery</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <h3>News letter</h3>
                     <form class="bottom_form" action="subscribe" method="post">
                        @csrf
                        @if($errors->any())
                           @foreach($errors->all() as $error)
                              <p class="text-danger text-center">{{$error}} </p>
                           @endforeach
                        @endif
                        <input class="enter" placeholder="Enter your email" type="text" name="email">
                        <button class="sub_btn" type="submit">subscribe</button>
                     </form>
                     <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </footer>