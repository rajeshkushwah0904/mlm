 <header class="page-header">
     <!--RD Navbar-->
     <div class="rd-navbar-wrap rd-navbar-wrap-absolute">
         <nav class="rd-navbar top-panel-none-items" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
             data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed"
             data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
             data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
             data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
             <div class="rd-navbar-top-panel">
                 <div class="rd-navbar-inner">
                     <button class="rd-navbar-collapse-toggle"
                         data-rd-navbar-toggle=".list-inline, .fa-envelope, .fa-phone, .fa-shopping-cart"><span></span></button><a
                         class="fa-envelope" href="mailto:#">demomail@domail.com</a><a class="fa-phone" href="tel:#">+1
                         (126) 598-89-75</a>
                     <ul class="list-inline pull-right">
                         <li><a class="fa-facebook" href="#"></a></li>
                         <li><a class="fa-pinterest-p" href="#"></a></li>
                         <li><a class="fa-twitter" href="#"></a></li>
                         <li><a class="fa-google-plus" href="#"></a></li>
                         <li><a class="fa-instagram" href="#"></a></li>
                     </ul>
                 </div>
             </div>
             @include('admin.navbar')
         </nav>
     </div>
     <section>
         <!--Swiper-->
         <div class="swiper-container swiper-slider" data-swiper='{"autoplay":{"delay":5000},"effect":"fade"}'>
             <div class="jumbotron text-center">
                 <h1>Welcome on board!
                 </h1>
                 <p class="big">Join our mission to make India unemployment free!
                     <br> Let’s walk you through Who? Why? How?
                 </p>
             </div>
             <div class="swiper-wrapper">
                 <div class="swiper-slide" data-slide-bg="images/Home-Header2.png">
                     <div class="swiper-slide-caption"></div>
                 </div>

                 <div class="swiper-slide" data-slide-bg="images/home_header3.jpeg">
                     <div class="swiper-slide-caption"></div>
                 </div>
             </div>
         </div>
     </section>

 </header>