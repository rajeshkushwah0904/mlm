<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!--Site Title-->
    <title>About Us</title>
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
      

      <section class="section section-sm text-center text-lg-start">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6">
              <img src="images/about_us.jpg" alt="about us"/>
            </div>
            <div class="col-lg-6">
            <p>Rightway Future is a company designed to make a profit for the owners of the company and a few individual participants at the top levels of the marketing  of participants.
            <br>

            Rightway Future is an organization believing in the empowerment of the economical and financial conditions of every individual who has the power of making the right decision in their life with a desire to be a successful person.
            <br>

           We believe that every individual has the power to be successful and that having a good understanding of your financial situation is one of the first steps. With that said, they provide services in order to empower people financially by giving them a clear understanding of their current financial situation.</p>
            </div>
           
          </div><br>
          <div class="col-lg-12">We offer lifestyle products and services that will help individuals live longer and happier lives; spreading wellness. With the motto of spreading wellbeing, ie, spreading wealth through wellness, it continues to enrich the lives of everyone who is a part of the company and those who believe in its healthcare and wellness products;  has been building state-of-the-art manufacturing plants in order to introduce innovative wellness products every year. 
<br>
It is constantly expanding its product range to introduce innovative wellness products every year, manufactured at state-of-the-art manufacturing facilities. To grow to a global scale and become the benchmark in marketing business, we have been building a wide network of distributors which is constantly growing every year.
</div>
        </div>
      </section>

       <section class="section section-sm text-center text-lg-start" style="margin-top: -120px;">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-4">
              <h4 class="fw-bold">OUR MISSION</h4>
              <hr class="short bg-accent">
              <p>Rightway Future's mission is to empower every individual with information so they can make the right decisions in life.</p>
            </div>
            <div class="col-lg-4">
              <h4 class="fw-bold">OUR VISSION</h4>
              <hr class="short bg-accent">
              <p>Our vision is to provide an opportunity to make the right decision in life by providing a platform for information and knowledge which will help them in understanding how to make their life better.
              </p>
            </div>
            <div class="col-lg-4">
              <h4 class="fw-bold">OUR COMMITMENT</h4>
              <hr class="short bg-accent">
              <p>At Rightway Future, we are committed to providing a life of well living, financial freedom, and the freedom to live on your terms. We provide the tools, training, and experience-based information that helps you build a successful venture.</p>
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