<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Product Detail</title>
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
        @include('admin.internal_header')


        <section class="section section-border text-center text-lg-start">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Product Detail</a></li>
                    <li class="active"><a class="text-gray-light" href="#">Product Detail</a></li>
                </ol>
            </div>
        </section>
        <section class="section section-sm section-border single-product">
            <div class="container">
                <div class="row product">
                    <div class="col-lg-7 text-center">
                        <div class="slider swiper-product-gallery">
                            <div class="swiper-container gallery-top" data-lightgallery="group">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide rem_class">
                                        <div class="swiper-slide-caption"><a href="{{asset($product->image)}}"
                                                data-lightgallery="item"><img src="{{asset($product->image)}}"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-caption"><a href="{{asset($product->image)}}"
                                                data-lightgallery="item"><img class="img_zoom"
                                                    src="{{asset($product->image)}}" alt="" /></a></div>
                                    </div>
                                    <div class="swiper-slide first">
                                        <div class="swiper-slide-caption"><a href="{{asset($product->image)}}"
                                                data-lightgallery="item"><img class="img_zoom"
                                                    src="{{asset($product->image)}}" alt="" /></a></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-caption"><a href="{{asset($product->image)}}"
                                                data-lightgallery="item"><img class="img_zoom"
                                                    src="{{asset($product->image)}}" alt="" /></a></div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-caption"><a href="{{asset($product->image)}}"
                                                data-lightgallery="item"><img class="img_zoom"
                                                    src="{{asset($product->image)}}" alt="" /></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide rem_class">
                                        <div class="swiper-slide-caption"><img src="{{asset($product->image)}}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-caption"><img src="{{asset($product->image)}}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide first-el">
                                        <div class="swiper-slide-caption"><img src="{{asset($product->image)}}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-caption"><img src="{{asset($product->image)}}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-caption"><img src="{{asset($product->image)}}"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center text-lg-start">
                        <h1 class="fw-bold h1-variant-2">{{$product->name}}</h1><a class="rating" href="#"><span
                                class="fa-star"></span><span class="fa-star"></span><span class="fa-star"></span><span
                                class="fa-star"></span><span class="fa-star-o"></span></a><a class="text-light-clr"
                            href="#">1 customer review</a>
                        <p class="big margin-6 line-height-2">


                        </p>
                        <div class="caption"><span class="text-uppercase text-light-clr small">quantity</span><span
                                class="quantity round-xl">
                                <input type="number" value="1"></span><span class="price">
                                <del>Rs.{{$product->product_price->mrp}}</del></span><span class="price sale">Rs.
                                {{$product->product_price->distributor_price}}</span><a
                                href="{{route('addtocarts.add_to_cart',$product->id)}}"
                                class="button button-success round-xl button-sm button-block margin-6" href="#">Add to
                                cart</a>
                            <dl class="info-list margin-5">
                                <dt>SKU</dt>
                                <dd>036895</dd>
                                <dt>Categories</dt>
                                <dd>{{$product->category->name}}, {{$product->subcategory->name}}</dd>
                                <dt>Tags</dt>
                                <dd>Black, Cotton</dd>
                            </dl>
                            <div class="share margin-6"><span
                                    class="small font-secondary text-uppercase text-light-clr">Share this</span>
                                <ul class="list-inline list-inline-4 pull-md-right">
                                    <li><a class="fa-facebook text-info" href="#"></a></li>
                                    <li><a class="fa-pinterest-p text-danger" href="#"></a></li>
                                    <li><a class="fa-twitter text-primary" href="#"></a></li>
                                    <li><a class="fa-google-plus text-danger" href="#"></a></li>
                                    <li><a class="fa-instagram text-info" href="#"></a></li>
                                    <li><a class="fa-rss" href="#"></a></li>
                                    <li><a class="fa-envelope text-info" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 margin-3">
                        <!--Tabs-->
                        <div class="tabs-custom tabs-horizontal tabs-corporate product" id="tabs-1">
                            <ul class="nav nav-tabs text-center myTabs" role="tablist">
                                <li class="nav-item round-large text-dark-variant-3" role="presentation"><a
                                        class="nav-link active round-large" href="#tab0" data-bs-toggle="tab"
                                        aria-controls="tab0" role="tab">Description</a></li>
                                <li class="nav-item round-large text-dark-variant-3" role="presentation"><a
                                        class="nav-link round-large" href="#tab1" data-bs-toggle="tab"
                                        aria-controls="tab1" role="tab">Additional information</a></li>
                                <li class="nav-item round-large text-dark-variant-3" role="presentation"><a
                                        class="nav-link round-large" href="#tab2" data-bs-toggle="tab"
                                        aria-controls="tab2" role="tab">Reviews <span>(2)</span></a></li>
                            </ul>
                            <!--Tab panes-->
                            <div class="tab-content text-md-start">
                                <div class="tab-pane active fade show" role="tabpanel" id="tab0">
                                    <p class="lead text-base">
                                        Short sleeve t-shirts in black, crewneck collar. Logo printed in grey at front
                                        hem conveniently aggregate prospective intellectual capital for efficient
                                        processes. Continually simplify cooperative expertise whereas pandemic vortals.
                                        Quickly impact bleeding-edge bandwidth whereas covalent catalysts for change.
                                        Tonal stitching. 98% cotton, 2% elastane. Made in Italy.

                                    </p>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="tab1">
                                    <!--Table-striped-->
                                    <div class="table-custom-responsive">
                                        <table class="table-custom table-striped-odd">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Size</td>
                                                    <td>Small, Medium & Large</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Color</td>
                                                    <td>Pink & White</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Waist</td>
                                                    <td>26 cm</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Length</td>
                                                    <td>40 cm</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Chest</td>
                                                    <td>33 inches</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Fabric</td>
                                                    <td>Cotton, Silk & Synthetic</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="small font-secondary text-uppercase letter-spacing-1 text-light-clr">
                                                        Warranty</td>
                                                    <td>3 Months</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade comments text-end" role="tabpanel" id="tab2">
                                    <blockquote class="box-sm">
                                        <div class="box__left text-center"><img class="rounded-circle"
                                                src="images/blog-26.jpg" alt="" />
                                        </div>
                                        <div class="box__body box__middle button-shadow round-small comments-rating">
                                            <h6>John Doe</h6>
                                            <time class="meta" datetime="2020">April 24, 2020 at 10:46 am</time><a
                                                class="rating pull-right" href="#"><span class="fa-star"></span><span
                                                    class="fa-star"></span><span class="fa-star"></span><span
                                                    class="fa-star"></span><span class="fa-star-o"></span></a>
                                            <p class="big text-light-clr">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores,
                                                eveniet, eligendi et nobis neque minus mollitia sit repudiandae ad
                                                repellendus recusandae blanditiis praesentium

                                            </p>
                                        </div>
                                    </blockquote>
                                    <blockquote class="box-sm margin-5">
                                        <div class="box__left text-center"><img class="rounded-circle"
                                                src="images/blog-26.jpg" alt="" />
                                        </div>
                                        <div class="box__body box__middle button-shadow round-small comments-rating">
                                            <h6>Mary Jane</h6>
                                            <time class="meta" datetime="2020">June 16, 2020 at 6:00PM</time><a
                                                class="rating pull-right" href="#"><span class="fa-star"></span><span
                                                    class="fa-star"></span><span class="fa-star"></span><span
                                                    class="fa-star"></span><span class="fa-star-o"></span></a>
                                            <p class="big text-light-clr">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores,
                                                eveniet, eligendi et nobis neque minus mollitia sit repudiandae ad
                                                repellendus recusandae blanditiis praesentium

                                            </p>
                                        </div>
                                    </blockquote><a class="button button-primary round-xl button-sm margin-5"
                                        href="#">Add a review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-sm text-center">
            <div class="container">
                <h4 class="text-dark-variant-4">Related Products</h4>
                <div class="row row-30 margin-5">
                    <div class="col-6 col-lg-3">
                        <div class="product tumbnail thumbnail-3"><a href="single-product.html"><img
                                    src="images/shop-1.jpg" alt="" /></a>
                            <div class="caption">
                                <h6><a href="single-product.html">Short Sleeve T-Shirt</a></h6><span class="price">
                                    <del>$24.99</del></span><span class="price sale">$12.49</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product tumbnail thumbnail-3"><a href="single-product.html"><img
                                    src="images/shop-2.jpg" alt="" /></a>
                            <div class="caption">
                                <h6><a href="single-product.html">Short Sleeve T-Shirt</a></h6><span class="price">
                                    <del>$24.99</del></span><span class="price sale">$12.49</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product tumbnail thumbnail-3"><a href="single-product.html"><img
                                    src="images/shop-3.jpg" alt="" /></a>
                            <div class="caption">
                                <h6><a href="single-product.html">Short Sleeve T-Shirt</a></h6><span
                                    class="price">$12.49</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product tumbnail thumbnail-3"><a href="single-product.html"><img
                                    src="images/shop-4.jpg" alt="" /></a>
                            <div class="caption">
                                <h6><a href="single-product.html">Short Sleeve T-Shirt</a></h6><span class="price">
                                    <del>$24.99</del></span><span class="price sale">$12.49</span>
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
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>