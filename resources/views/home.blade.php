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
    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>
    <div class="ie-panel"><a href=""><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
        <img src="images/header-6.jpg" height="42" width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        <img src="images/slider1.jpg" height="42" width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        <img src="images/image-3.jpg" height="42" width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
    </div>


    <!-- <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div> -->
    <!--The Main Wrapper-->
    <div class="page">
        @include('admin.header')



        <!--What We Offer-->
        <section class="section section-sm">
            <div class="container">
                <div class="">
                    <div class="col-xl-12">
                        <div class="row justify-content-center">
                            <h3 class="fw-bold text-center">About Our Company</h3>
                            <hr class="short bg-accent">
                        </div>
                        <div>
                            <p>Rightway Future company is a multi-level marketing company with the primary goal of
                                providing a high level of financial benefits to its company shareholders and a few
                                individual participants at the top stories of the MLM pyramid.<br>

                                Our team believes that every individual has the power to be successful and that having a
                                good understanding of your financial situation is one of the first steps. Therefore,
                                they provide services to empower people financially by demonstrating the marketing plan
                                and utilizing it upto your willingness. <br>

                                We guess you know multi-level marketing (MLM). It is a distribution-based marketing
                                network that contains two or more levels. Our MLM programs allow you to make money on
                                two or more levels, so there will be incentives for each distributor's level. Examples
                                of MLM businesses include LuLaRoe, Magnetic Sponsoring, and Amway. But here we are far
                                way different from the existing MLM companies not only in terms of Vision, mission but
                                also the way we cater to our distributors.<br>

                                We solely help not only you but also your next generation. Decision in your and action
                                is our.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-sm bg-lighter relative text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <h3 class="fw-bold text-center">Why do you need to join Rightway Future?</h3>
                    <hr class="short bg-accent">
                    <div class="lead">We offer a type of business opportunity that is very popular with people looking
                        for part-time, flexible businesses. </div>
                </div>

                <br><br>

                <!--Owl Carousel-->
                <div class="owl-carousel" data-items="1" data-md-items="1" data-lg-items="2" data-margin="30"
                    data-autoplay="true" data-loop="true" data-owl='{"dots":true}'>
                    <article class="row">
                        <div class="col-12 col-lg-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Business opportunity</h4>
                                    <p>We emphasize that when you have signed up as a Rightway Future Distributor,
                                        please read the Marketing Plan and understand the opportunity.</p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/7.png"
                                        alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Certified training</h4>
                                    <p>We are providing certification training for the candidates who are interested in
                                        learning new skills to improve their career prospects. </p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/5.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="row">
                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Marketing plan</h4>
                                    <p>The Rightway Future Marketing Plan is an accumulative plan where you never drop
                                        from the level of achievement and keep on achieving higher levels.</p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/8.png"
                                        alt="">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20"> Become entrepreneurs</h4>
                                    <p>Entrepreneurship is not just about making money! It's also about making the world
                                        a better place by sharing your knowledge and creativity. </p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/1.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="row">
                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Life-time earning</h4>
                                    <p>Yes because the nomination is the method by which the policyholder selects a
                                        person or persons to receive policy benefits in case of a death claim.</p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/2.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Get Benefits</h4>
                                    <p>With our software, you don't need any relevant skills, just an idle contact, and
                                        a computer and you are on your way to getting a satisfactory income.</p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/3.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="row">


                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Privacy</h4>
                                    <p>When you join us it becomes an interest-bearing asset that provides powerful
                                        privacy protections. You can now avail of funds transfer aid.</p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/4.png"
                                        alt="">

                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="thumbnail">
                                <div class="caption" style="background-color: white; padding: 20px;">
                                    <h4 class="f_600 f_size_20 l_height28 t_color2 mb_20">Utility</h4>
                                    <p>By Helping each other we can make a new community more brilliant and more
                                        accurate. Give the best services and products for you & your family.</p>
                                    <img class="float-right"
                                        src="https://d1vkxdclx6uggs.cloudfront.net/7ca974e2-bf7d-4f10-83e3-6b4da7c2159e/images/4.png"
                                        alt="">

                                </div>
                            </div>
                        </div>

                    </article>

                </div>
            </div>
    </div>
    </section>

    <!--  <section class="section section-sm text-center text-md-start">
        <div class="container">

          <div class="row row-30">
          <h2 class="fw-bold text-center">What We Do</h2>
          <hr class="short bg-accent">
          <br>
          <div class="small-border wow zoomIn animated" data-wow-delay=".3s" data-wow-duration=".3s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: zoomIn;"></div>
            <div class="col-md-4"><span class="icon icon-xxl icon-primary fa-desktop"></span>
              <h5><a href="#">Get Benefit?</a></h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div>
            <div class="col-md-4"><span class="icon icon-xxl icon-primary fa-puzzle-piece"></span>
              <h5><a href="#">Make Better</a></h5>
              <p>We sincerely hope you make the most of the Income info Opportunity and we welcome your valuable, long-term participation.</p>
            </div>
            <div class="col-md-4"><span class="icon icon-xxl icon-primary fa-envelope-o"></span>
              <h5><a href="#">We Built A</a></h5>
              <p>
                Rightway Future is a best experienced people's community where they can build social platform and gives best opportunity.
               </p>

          </div>
          </div>
        </div>
      </section> -->

    <section class="section section-sm text-center">
        <div class="container isotope-wrap">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <div class="row justify-content-center">
                            <h3 class="fw-bold text-center">How Can We Help You Get Your Financial Freedom?</h3>
                            <hr class="short bg-accent">
                            <div class="lead">It is the opportunity to invite your friends, family, and other personal
                                contacts without any investment. You will start getting a % commission at the primary
                                and secondary levels as per the joining plan.
                            </div>

                        </div>
                        <div class="isotope" data-isotope-layout="fitRows" data-isotope-group="gallery"
                            data-lightgallery="group">
                            <div class="row">
                                <div class="col-6 col-md-6 col-lg-4 isotope-item" data-filter="type-1">
                                    <div class="thumbnail-variant-2 thumbnail-4 text-center"><img
                                            src="images/gallery-1.jpg" alt="" />
                                        <h5 style="color: white;">Active Hustle</h5>
                                        <div class="caption">
                                            <h5 class="text-white">Active Hustle is an online resource and business
                                                development portal that assists those who want to upgrade their sales
                                                techniques in the fast-paced business market. They provide a detailed
                                                plan for their certified training so that the participants can gain the
                                                required knowledge in no time.</small></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4 isotope-item" data-filter="type-1">
                                    <div class="thumbnail-variant-2 thumbnail-4 text-center"><img
                                            src="images/gallery-2.jpg" alt="" />
                                        <h5 style="color: white;">Leverage</h5>
                                        <div class="caption">
                                            <h5 class="text-white">Leverage is an online training platform where you can
                                                learn and train yourself on the ground floor of your dream. We provide a
                                                systematic structure for you to understand the importance of MLM
                                                Marketing.</small></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4 isotope-item" data-filter="type-1">
                                    <div class="thumbnail-variant-2 thumbnail-4 text-center"><img
                                            src="images/gallery-3.jpg" alt="" />
                                        <h5 style="color: white;">Passive income</h5>
                                        <div class="caption">
                                            <h5 class="text-white">Once you start purchasing the products either with
                                                your ID or your reference distributor then you will be getting the
                                                income as per the opted subscription plan. The median revenue from
                                                passive income sources according to a 2017 survey is $19,000. It is
                                                possible to make a very decent amount of passive income with
                                                marketing.</small></h5>
                                        </div>
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