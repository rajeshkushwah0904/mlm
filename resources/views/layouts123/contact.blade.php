<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Rightway Future</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Pacifico%7CLato:400,100,100italic,300,300italic,700,400italic,900,700italic,900italic%7CMontserrat:400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .ie-panel {
        display: none;
        background: #212121;
        padding: 10px 0;
        box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
        clear: both;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
        display: block;
    }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!--The Main Wrapper-->
    <div class="page">
        @include('admin.internal_header')
        <section>
            <!--Swiper-->
            <div class="swiper-container swiper-slider" data-swiper='{"autoplay":{"delay":5000},"effect":"fade"}'>
                <div class="jumbotron text-center">
                    <h1><small>Pricing tables</small>In All Kind of Colors & Sizes
                    </h1>
                    <p class="big"></p>
                </div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-slide-bg="images/header-1.jpg">
                        <div class="swiper-slide-caption"></div>
                    </div>
                    <div class="swiper-slide" data-slide-bg="images/header-3.jpg">
                        <div class="swiper-slide-caption"></div>
                    </div>
                    <div class="swiper-slide" data-slide-bg="images/header-4.jpg">
                        <div class="swiper-slide-caption"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumbs-->

        <section class="section section-sm">
            <div class="container">
                <div class="row row-30">
                    <div class="col-lg-4 text-center text-lg-start">
                        <address class="contact-block">
                            <dl>
                                <dt class="heading-6">ADDRESS</dt>
                                <dd>C-9 ,HANUMAN COLONY
                                    GOLE KA MANDIR
                                    Gwalior,Madhya Pradesh-474005</dd>
                                <dt class="heading-6">PHONE</dt>
                                <dd><a href="tel:#">9098442841</a></dd>
                                <dt class="heading-6">E-MAIL</dt>
                                <dd><a href="mailto:#">rightwayfuture2021@gmail.com</a></dd>
                            </dl>
                            <ul class="list-inline list-inline-3">
                                <li><a href="#"></a></li>
                            </ul>
                        </address>
                    </div>
                    <div class="col-lg-8">
                        <div class="button-shadow py-5 px-3 round-large">
                            <h5 class="text-center">GET IN TOUCH</h5>
                            <form class="rd-mailform text-start" data-form-output="form-output-global"
                                data-form-type="forms" method="post" action="bat/rd-mailform.php">
                                <div class="row row-20 align-items-end">
                                    <div class="col-md-6">
                                        <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                            <label class="form-label-outside" for="forms-name">Your Name</label>
                                            <input class="form-input" id="forms-name" type="text" name="name"
                                                placeholder="Your Name" data-constraints="@Required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                            <label class="form-label-outside" for="forms-last-name">Your Mobile
                                                No.</label>
                                            <input class="form-input" id="forms-last-name" type="text" name="last-name"
                                                placeholder="Your Mobile No." data-constraints="@Required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                            <label class="form-label-outside" for="forms-message">Enter Your
                                                Comment</label>
                                            <textarea class="form-input" id="forms-message" name="message"
                                                placeholder="Enter Your Comment"
                                                data-constraints="@Required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                            <label class="form-label-outside" for="forms-email">Your E-mail</label>
                                            <input class="form-input" id="forms-email" type="email" name="email"
                                                placeholder="example@domain.com" data-constraints="@Email @Required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button
                                            class="button button-primary button-xs round-xl button-block form-el-offset-1"
                                            type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!--Footer-->
        @include('admin.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!--Scripts-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>