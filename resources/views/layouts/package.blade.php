<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!--Site Title-->
    <title>Package</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico%7CLato:400,100,100italic,300,300italic,700,400italic,900,700italic,900italic%7CMontserrat:400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
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
     
     
      <section class="section section-sm text-center section-border">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-6 bg-default">
              <h1 class="fw-bold">Choose Your Plan</h1>
              <p class="lead">
                We worked out an amazing combination of vast functionality
                and user's comfort. It will totally impress you with its power!
              </p>
            </div>
          </div>
          <div class="row margin-1 row-30 pricing-border-left">
            <div class="col-md-6 col-xl-3 pricing-box pricing-box-hover bg-default">
              <div class="thumbnail thumbnail-3">
                <h6 class="text-uppercase text-light-clr letter-spacing-1">economy</h6><span class="icon icon-xl icon-light fa-hand-pointer-o"></span>
                <div class="caption">
                  <h2 class="text-uppercase fw-bold letter-spacing-1">free</h2>
                  <p>Duis ligula turpis, placerat eget lobortis vitae, euismod vulputate orci. Suspendisse potenti. In hac habitasse platea dictumst. Quisque non consectetur lorem.</p><a class="button button-variant-1 button-default button-sm round-xl" href="#">Buy Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 pricing-box pricing-box-hover bg-default">
              <div class="thumbnail thumbnail-3">
                <h6 class="text-uppercase text-light-clr letter-spacing-1">Silver</h6><span class="icon icon-xl icon-light fa-hand-peace-o"></span>
                <div class="caption">
                  <h2 class="text-uppercase fw-bold letter-spacing-1">$20</h2>
                  <p>Duis ligula turpis, placerat eget lobortis vitae, euismod vulputate orci. Suspendisse potenti. In hac habitasse platea dictumst. Quisque non consectetur lorem.</p><a class="button button-variant-1 button-default button-sm round-xl" href="#">Buy Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 pricing-box pricing-box-hover bg-default">
              <div class="thumbnail thumbnail-3">
                <h6 class="text-uppercase text-light-clr letter-spacing-1">Gold</h6><span class="icon icon-xl icon-light fa-hand-spock-o"></span>
                <div class="caption">
                  <h2 class="text-uppercase fw-bold letter-spacing-1">$50</h2>
                  <p>Duis ligula turpis, placerat eget lobortis vitae, euismod vulputate orci. Suspendisse potenti. In hac habitasse platea dictumst. Quisque non consectetur lorem.</p><a class="button button-variant-1 button-default button-sm round-xl" href="#">Buy Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3 pricing-box pricing-box-hover bg-default">
              <div class="thumbnail thumbnail-3">
                <h6 class="text-uppercase text-light-clr letter-spacing-1">Diamond</h6><span class="icon icon-xl icon-light fa-hand-stop-o"></span>
                <div class="caption">
                  <h2 class="text-uppercase fw-bold letter-spacing-1">$100</h2>
                  <p>Duis ligula turpis, placerat eget lobortis vitae, euismod vulputate orci. Suspendisse potenti. In hac habitasse platea dictumst. Quisque non consectetur lorem.</p>
                  <a class="button button-variant-1 button-default button-sm round-xl button-block form-el-offset-1" href="#">Buy Now</a>
                  
                 
                </div>
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