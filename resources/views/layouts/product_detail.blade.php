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
   
   
    <!--The Main Wrapper-->
    <div class="page">
        @include('admin.internal_header')


        <section class="section section-border text-center text-lg-start" style="margin-top: -350px">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="https://rightwayfuture.com/">Home</a></li>
                    <li><a href="https://rightwayfuture.com/allproducts">All Product</a></li>
                    
                </ol>
            </div>
        </section>
        <section class="section section-sm section-border single-product">
            <div class="container">
                 <div class="row d-flex justify-content-center">
        <div class="col-md-11">
                <div class="row product">
                    <div class="col-lg-6 text-center">
                        <div class="slider swiper-product-gallery" style="background-color: #F8F8F8;">
                            <div class="swiper-container gallery-top" data-lightgallery="group">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide rem_class">
                                        <div class="swiper-slide-caption"><a href="{{asset($product->image)}}"
                                                data-lightgallery="item"><img src="{{asset($product->image)}}"
                                                   width="500" height="600"  alt="" /></a>
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
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="fw-bold h1-variant-2">{{$product->name}}</h1>
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
                                <dt>HSNCODE</dt>
                                <dd>{{$product->hsn_code}}</dd>
                                <dt>Categories</dt>
                                <dd>{{$product->category->name}}, {{$product->subcategory->name}}</dd>
                               
                            </dl>
                            
                             <div class="tabs-custom tabs-horizontal tabs-corporate product" id="tabs-1">
                            <ul class="nav nav-tabs text-center myTabs" role="tablist">
                                <li class="nav-item round-large text-dark-variant-3" role="presentation"><a
                                        class="nav-link active round-large" href="#tab0" data-bs-toggle="tab"
                                        aria-controls="tab0" role="tab">Description</a></li>
                               
                            </ul>
                            <!--Tab panes-->
                            <div class="tab-content text-md-start">
                                <div class="tab-pane active fade show" role="tabpanel" id="tab0">
                                    <p class="lead text-base">
                                       {{$product->description}}
                                    </p>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-12 margin-3">-->
                        <!--Tabs-->
                    <!--    <div class="tabs-custom tabs-horizontal tabs-corporate product" id="tabs-1">-->
                    <!--        <ul class="nav nav-tabs text-center myTabs" role="tablist">-->
                    <!--            <li class="nav-item round-large text-dark-variant-3" role="presentation"><a-->
                    <!--                    class="nav-link active round-large" href="#tab0" data-bs-toggle="tab"-->
                    <!--                    aria-controls="tab0" role="tab">Description</a></li>-->
                               
                    <!--        </ul>-->
                            <!--Tab panes-->
                    <!--        <div class="tab-content text-md-start">-->
                    <!--            <div class="tab-pane active fade show" role="tabpanel" id="tab0">-->
                    <!--                <p class="lead text-base">-->
                    <!--                    Short sleeve t-shirts in black, crewneck collar. Logo printed in grey at front-->
                    <!--                    hem conveniently aggregate prospective intellectual capital for efficient-->
                    <!--                    processes. Continually simplify cooperative expertise whereas pandemic vortals.-->
                    <!--                    Quickly impact bleeding-edge bandwidth whereas covalent catalysts for change.-->
                    <!--                    Tonal stitching. 98% cotton, 2% elastane. Made in Italy.-->

                    <!--                </p>-->
                    <!--            </div>-->
                               
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                </div>
                </div>
            </div>
        </section>
        <section class="section section-sm text-center">
            <div class="container">
                <h4 class="text-dark-variant-4">Related Products</h4>
                <div class="row row-30 margin-5">
                    @foreach($products as $product)
                    <div class="col-6 col-lg-3">
                        <div class="product tumbnail thumbnail-3"><a href="{{route('product_detail',$product->id)}}"><img
                                    src="{{asset($product->image)}}" alt="" /></a>
                            <div class="caption">
                                <h6><a href="{{route('product_detail',$product->id)}}">{{$product->name}}</a></h6><span class="price">
                                    <del>
                                        @if($product->product_price)
                                        {{$product->product_price->mrp}}
                                        @endif
                                    </del></span><span class="price sale">
                                     @if($product->product_price)
                                    {{$product->product_price->distributor_price}}
                                     @endif
                                </span>
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
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>