<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Shopping cart</title>
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
        <header class="page-header subpage_header">
            <!--RD Navbar-->
            @include('admin.internal_header')
            <section>
                <!--Swiper-->
                <div class="swiper-container swiper-slider" data-swiper='{"autoplay":{"delay":5000},"effect":"fade"}'>
                    <div class="jumbotron text-center">
                        <h1><small>Shop</small>Your Shopping Cart
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
        </header>
        <section class="section-border text-center text-lg-start">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li class="active"><a class="text-gray-light" href="#">Shopping cart</a></li>
                </ol>
            </div>
        </section>
        <section class="section section-sm section-border shop-cart">
            <div class="container">
                <div class="row align-items-center row-30">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table order text-center text-lg-start">
                                <thead>
                                    <tr class="bg-lighter text-uppercase text-darker-clr font-secondary section-border">
                                        <th></th>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total=0;
                                    ?>
                                    @foreach($add_to_carts as $add_to_cart)
                                    <?php
                                    $subtotal=0;
                                    $subtotal = $add_to_cart->price*$add_to_cart->qty;
                                    $total = $total + $subtotal;
                                    ?>
                                    <tr class="section-border">
                                        <td class="text-center"><a class="fa-trash-o h5 text-light-clr" href="#"></a>
                                        </td>
                                        <td class="text-center"><a href="single-product.html"><img
                                                    src="images/shop-14.jpg" alt="" /></a></td>
                                        <td class="text-start">
                                            <h6 class="text-dark-variant-4"><a
                                                    href="single-product.html">{{$add_to_cart->product->name}}</a></h6>
                                        </td>
                                        <td><span class="price">{{$add_to_cart->price}}</span></td>
                                        <td><span class="quantity round-xl">
                                                <input type="number" value="{{$add_to_cart->qty}}"></span></td>
                                        <td><span class="price">{{$subtotal}}</span></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 text-center text-md-start">
                        <form class="form-shop">
                            <div class="form-wrap">
                                <input class="form-input round-small" type="text" placeholder="Coupon Code"
                                    id="exampleInputText1">
                            </div>
                            <button class="button button-default button-xs round-small text-dark-variant-3"
                                type="submit">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-4 text-center text-md-end"><a
                            class="button button-default button-xs round-small text-dark-variant-3" href="#">Update
                            cart</a></div>
                    <div class="col-12 margin-5">
                        <p class="text-uppercase text-darker-clr font-secondary letter-spacing-1">Cart Totals</p>
                        <table class="table cart-total">
                            <thead>
                                <tr class="font-secondary text-base section-border">
                                    <th class="bg-lighter">Subtotal</th>
                                    <th class="bg-lighter text-end"><span class="price">{{$total}}</span></th>
                                </tr>
                                <tr class="font-secondary text-base">
                                    <th class="bg-lighter">Total</th>
                                    <th class="bg-lighter total text-end"><span class="price">{{$total}}</span></th>
                                </tr>
                            </thead>
                        </table>
                        <div class="text-center text-md-end"><a class="button button-primary button-xs round-small"
                                href="{{route('checkout')}}">Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </section>
        <!--Footer-->
        <footer class="page-footer footer-centered text-center">
            <div class="footer-content">
                <div class="container">
                    <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark"
                            src="images/logo-default-311x70.png" alt="" width="155" height="35" /><img
                            class="brand-logo-light" src="images/logo-inverse-311x70.png" alt="" width="155"
                            height="35" /></a>
                    <p class="big">We believe in Simple, Creative & Flexible Design Standards.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="fa-facebook" href="#"></a></li>
                        <li class="list-inline-item"><a class="fa-pinterest-p" href="#"></a></li>
                        <li class="list-inline-item"><a class="fa-twitter" href="#"></a></li>
                        <li class="list-inline-item"><a class="fa-google-plus" href="#"></a></li>
                        <li class="list-inline-item"><a class="fa-instagram" href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p class="rights"><span>&copy;&nbsp;</span><span
                            class="copyright-year"></span><span>&nbsp;</span><span>Modicate</span><span>&nbsp;</span><span>All
                            Rights Reserved</span><span>.&nbsp;</span><a href="terms-of-service.html">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!--Scripts-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>