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
                    <h4 class="fw-bold">Founder Message</h4>
                    <hr class="short bg-accent">
                    <p>We take the motive to return something back to our society and nation. It's our sole aim to
                        promote products at a very affordable cost. We give you an exceptional business opportunity
                        free/optional to become self-sufficient, and achieve luxury living, but the highest standards of
                        your wish, obtain on your actual potential by expanding our mission to masses you can accomplish
                        anything in terms of wealth, prosperity, and wellness.</p>
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