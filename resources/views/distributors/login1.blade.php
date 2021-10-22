<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Pacifico%7CLato:400,100,100italic,300,300italic,700,400italic,900,700italic,900italic%7CMontserrat:400,700">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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

    #rcorners1 {
        border-radius: 100px 0px 0px 100px;
        height: 50px;
        color: #a7b0b4;
        background-color: #f5f5f5;
        background-image: none;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        padding: 12px 25px;

    }

    #rcorners2 {
        border-radius: 0px 100px 100px 0px;
        height: 50px;

    }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
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
        <header class="bg-image bg-image-2 inset-bottom-3 header-custom">
            <!--RD Navbar-->
            @include('admin.loginregister_header')
            <div class="text-center" style="margin-top: -60px">
                <div class="jumbotron text-center margin-large">
                    <h1><small>Login Page</small>Let's Create Something Together!</h1>
                </div>

            </div>
            <div class="section-sm" style="margin-top: -60px">
                <div class="container">
                    <div class="row row-30 justify-content-center">
                        <div class="col-lg-6">
                            <div class="button-shadow bg-default py-5 px-3 round-large">
                                <h5 class="text-center">Sign in</h5>
                                <form class="max-width" method="POST" action="{{ route('distributors.login') }}">
                                    @csrf
                                    <div class="row row-20 align-items-end">
                                        <div class="col-md-12">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-sub-name">Distributor
                                                    Tracking ID</label>
                                                <input class="form-input" id="forms-sub-name" type="text"
                                                    name="distributor_tracking_id" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside"
                                                    for="forms-sub-password">Password</label>
                                                <input class="form-input" id="forms-sub-password" type="password"
                                                    name="password" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button
                                                class="button button-primary button-xs round-xl button-block form-el-offset-1"
                                                type="submit">Sign
                                                in</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="small text-uppercase text-light-clr font-secondary max-width separate">or
                                    </p>
                                    <div class="button-elements-group-2">
                                        <a class="button button-facebook button-xs round-small button-icon-left button-min-width"
                                            href="#"><span class="icon fa-facebook"></span> facebook</a>
                                        <a class="button button-twitter button-xs round-small button-icon-left button-min-width"
                                            href="#"><span class="icon fa-twitter"></span> Twitter</a>
                                        <a class="button button-google button-xs round-small button-icon-left button-min-width"
                                            href="#"><span class="icon fa-google-plus"></span> Google+</a>
                                        <br>

                                    </div>
                                    <div class="button-elements-group-2">
                                        <br>
                                        <a class="button button-primary button-xs round-xl button-block form-el-offset-1"
                                            href="{{route('distributors.register')}}">Click here For Registration</a>
                                        <a class="button button-primary button-xs round-xl button-block form-el-offset-1"
                                            href="{{route('login')}}">Click here For Admin Login</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Footer-->
        @include('admin.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!--Scripts-->
    <script href="{{asset('js/core.min.js')}}"></script>
    <script href="{{asset('js/script.js')}}"></script>
</body>

</html>