<header class="page-header subpage_header">
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
                <h1><small>{{$title}}</small></h1>
                <h2>{{$page_content}}</h2>

                <p class="big"></p>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-slide-bg="{{asset('images/header-1.jpg')}}">
                    <div class="swiper-slide-caption"></div>
                </div>
                <div class="swiper-slide" data-slide-bg="{{asset('images/header-3.jpg')}}">
                    <div class="swiper-slide-caption"></div>
                </div>
                <div class="swiper-slide" data-slide-bg="{{asset('images/header-4.jpg')}}">
                    <div class="swiper-slide-caption"></div>
                </div>
            </div>
        </div>
    </section>
</header>