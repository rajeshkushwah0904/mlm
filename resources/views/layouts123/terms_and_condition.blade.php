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


        <section class="section section-sm text-center text-lg-start">
            <div class="container">
                <div class="col-lg-12">
                    <h4 class="fw-bold">Product Disclaimer</h4>
                    <hr class="short bg-accent">
                    <p>
                        Rightway Future Shall Be accountable for the quality of products only if such products are
                        purchased from approved distributors.

                        The buyer shall be entirely responsible for all outcomes for the purchase and use of products
                        bought from unapproved sources including unapproved websites, an E-commerce marketplace, or an
                        unapproved party.</p><br>
                    <h4 class="fw-bold">Website Disclaimer</h4>
                    <hr class="short bg-accent">

                    <p>The contents of this site are only for knowledge purposes. Users are prescribed to rely on
                        information posted herein for any purpose only after confirmation and verification of the same
                        from trustworthy and authoritative sources. Neither Rightway Future Pvt. Ltd. nor the site
                        developer is accountable for any consequences that may occur out of using such information
                        without verification/confirmation. There may be a time gap in internet/online posting/
                        transmission of knowledge and availability of such information at browsers’ end. The accurate
                        status may be verified from the source.
                        <br>
                        For any queries, suggestions regarding this website please contact -
                    </p>
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