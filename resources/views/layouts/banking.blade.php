<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Banking</title>
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

        <!-- Breadcrumbs-->
        <section class="section section-sm text-center text-md-start section-border">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 bg-default text-center">
                        <h1 class="fw-bold">Banking Details</h1>
                        <p class="lead">We worked out an amazing combination of vast functionality and user's comfort.
                            It will totally impress you with its power!</p>
                    </div>
                </div>
                <div class="row margin-1 row-11">
                    @foreach($banks as $bank)
                    <div class="col-md-6">
                        <div class="box-sm box-skin-1 bg-lighter box-skin-left-offset-negative">
                            <div class="box__left box-md-inset-1"><span
                                    class="icon icon-md icon-primary line-height-1 fa-code"></span></div>
                            <div class="box__body box__middle">
                                <h5><a href="#">{{$bank->bank_name}}</a></h5>
                                <p>
                                    <li>Account Holder Name: {{$bank->account_holder_name}}</li>
                                    <li>Branch Name: {{$bank->account_holder_name}}</li>
                                    <li>Account Type: {{$bank->account_type}}</li>
                                    <li>Account Number: {{$bank->account_number}}</li>
                                    <li>IFSC code: {{$bank->ifsc_code}}</li>
                                </p>

                            </div>
                        </div>
                    </div>
                    @endforeach


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