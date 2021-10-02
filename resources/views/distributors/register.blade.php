<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Register Page</title>
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
        <header class="bg-image bg-image-2 inset-bottom-3 header-custom">
            <!--RD Navbar-->
            @include('admin.loginregister_header')
            <div class="text-center">
                <div class="jumbotron text-center margin-large">
                    <h1><small>Register Page</small>Let's Create Something Together!</h1>
                </div>
                <!-- Breadcrumbs-->
                <section class="section section-border">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Extras</a></li>
                        <li class="active">Register Page</li>
                    </ol>
                </section>
            </div>
            <div class="section-sm">
                <div class="container">
                    <div class="row row-30 justify-content-center">
                        <div class="col-lg-8">
                            <div class="button-shadow inset-md-min bg-default round-large py-5 px-4">
                                <h5 class="text-center">Create an Account</h5>
                                <form class="text-start" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row row-20 align-items-end">
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-name">Name</label>
                                                <input class="form-input" id="forms-name" type="text" name="name"
                                                    placeholder="Your First Name" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-last-name">Sponsor Tracking
                                                    ID</label>
                                                <input class="form-input" id="forms-last-name" type="text"
                                                    name="sponsor_tracking_id" value="{{$sponsor_tracking_id}}"
                                                    placeholder="Your Last Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-name">Mobile</label>
                                                <input class="form-input" id="forms-name" type="text" name="mobile"
                                                    placeholder="Mobile No." Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-last-name">OTP</label>
                                                <input class="form-input" id="forms-last-name" type="text" name="otp"
                                                    placeholder="OTP" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-last-name">Address</label>
                                                <input class="form-input" id="forms-last-name" type="text"
                                                    name="address" placeholder="Address" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-last-name">Nominee</label>
                                                <input class="form-input" id="forms-last-name" type="text"
                                                    name="nominee" placeholder="Nominee" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap form-wrap-validation validation-with-outside-label">
                                                <label class="form-label-outside" for="forms-email">E-mail</label>
                                                <input class="form-input" id="forms-email" type="email" name="email"
                                                    placeholder="example@domain.com" Required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button
                                                class="button button-primary button-xs round-xl button-block form-el-offset-1"
                                                type="submit">Save Register</button>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p
                                                class="small text-uppercase text-light-clr font-secondary max-width separate">
                                                or</p>
                                            <div class="button-elements-group-2"><a
                                                    class="button button-facebook button-xs round-small button-icon-left button-min-width"
                                                    href="#"><span class="icon fa-facebook"></span> facebook</a><a
                                                    class="button button-twitter button-xs round-small button-icon-left button-min-width"
                                                    href="#"><span class="icon fa-twitter"></span> Twitter</a><a
                                                    class="button button-google button-xs round-small button-icon-left button-min-width"
                                                    href="#"><span class="icon fa-google-plus"></span> Google+</a></div>
                                        </div>
                                    </div>
                                </form>
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
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>