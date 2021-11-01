 <div class="rd-navbar-inner">
     <!--RD Navbar Panel-->
     <div class="rd-navbar-panel">
         <!--RD Navbar Toggle-->
         <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar"><span></span></button>
         <!--RD Navbar Brand-->
         <div class="rd-navbar-brand">
             @if($site_logo)
             <a class="brand" href="{{url('/')}}"><img class="brand-logo-dark" src="{{asset($site_logo->image)}}" alt=""
                     width="155" height="35" /><img class="brand-logo-light" src="{{asset($site_logo->image)}}" alt=""
                     width="155" height="35" /></a>
             @else
             <a class="brand" href="{{url('/')}}"><img class="brand-logo-dark" src="{{asset('logo.png')}}" alt=""
                     width="155" height="35" /><img class="brand-logo-light" src="{{asset('logo.png')}}" alt=""
                     width="155" height="35" /></a>
             @endif
         </div>
     </div>
     <div class="rd-navbar-nav-wrap"><a class="fa-shopping-cart" href="{{route('cart')}}">
             @if(\Auth::user())
             <?php
$addtocarts = \App\Addtocart::where('distributor_id', \Auth::user()->distributor_id)->get();
?>
             <sup style="border-radius:50%; border:solid black 1px;padding:2px">
                 {{count($addtocarts)}}
             </sup>
             @endif
         </a>
         <!--RD Navbar Search-->
         <div class="rd-navbar-search">
             <form class="rd-search rd-navbar-search-form" action="search-results.html"
                 data-search-live="rd-search-results-live" method="GET">
                 <label class="rd-navbar-search-form-input">
                     <input type="text" name="s" placeholder="Search.." autocomplete="off">
                 </label>
                 <button class="rd-navbar-search-form-submit" type="submit"></button>
                 <div class="rd-search-results-live" id="rd-search-results-live"></div>
             </form>
             <button class="rd-navbar-search-toggle"
                 data-rd-navbar-toggle=".rd-navbar-search, .rd-navbar-live-search-results"></button>
         </div>
         <!--RD Navbar Nav-->
         <ul class="rd-navbar-nav">
             <li class="rd-nav-item active"><a class="rd-nav-link" href="{{route('home')}}">Home</a>
             </li>
             <li class="rd-nav-item"><a class="rd-nav-link" href="#">Who we are</a>
                 <ul class="rd-menu rd-navbar-dropdown">
                     <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{route('about')}}">About Us</a>
                     </li>
                     <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="founder_message">Message
                             From CEO </a>
                     </li>
                 </ul>
             </li>

             <li class="rd-nav-item"><a class="rd-nav-link" href="{{route('package')}}">Packages</a>
             </li>

             <li class="rd-nav-item"><a class="rd-nav-link" href="{{route('allproducts')}}">Product</a>
             </li>

             <li class="rd-nav-item"><a class="rd-nav-link" href="#">Resources</a>
                 <ul class="rd-menu rd-navbar-dropdown">
                     <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{route('gallery')}}">Gallery</a>
                     </li>
                     <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{route('banking')}}">Banking</a>
                     </li>
                     <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{route('faq')}}">FAQ</a>
                     </li>
                     <li class="rd-dropdown-item"><a class="rd-dropdown-link"
                             href="{{route('terms_and_condition')}}">Terms &
                             conditions</a>
                     </li>
                 </ul>
             </li>

             <li class="rd-nav-item"><a class="rd-nav-link" href="{{route('contact')}}">Contact</a></li>
             @guest
             <li class="rd-nav-item"><a class="rd-nav-link" href="{{route('distributors.login')}}">login</a>
             </li>
             @else
             <li class="rd-nav-item"><a class="rd-nav-link" href="{{route('backend.dashboard')}}">Dashboard</a>
             </li>
             @endif

             <!--  <li class="rd-nav-item"><a class="rd-nav-link" href="extras.html">Extras</a>
                    <ul class="rd-menu rd-navbar-dropdown">
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="404.html">404</a>
                      </li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="coming-soon.html">Coming Soon</a>
                      </li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="login-page.html">Login Page</a>
                      </li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="maintenance-page.html">Maintenance page</a>
                      </li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="register-page.html">Register Page</a>
                      </li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="search-results.html">Search Results</a>
                      </li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="terms-of-service.html">Terms of Service</a>
                      </li>
                    </ul>
                  </li> -->

         </ul>
     </div>
 </div>