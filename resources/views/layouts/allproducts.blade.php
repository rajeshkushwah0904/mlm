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


        <section class="section section-sm text-center text-lg-start section-border">
            <div class="container">
                 <div class="container ot-1">
          <div class="row justify-content-center">
            <div class="col-xl-10 col-xl-offset-1">
              <!--Tabs-->
              <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
<?php
$categories = \App\Category::all();
?>
                <ul class="nav nav-tabs text-center myTabs" role="tablist">
                  @foreach($categories as $category)
                  <li class="round-xl nav-item"" role="presentation"><a  class="round-xl nav-link" href="#tab{{$category->id}}" data-bs-toggle="tab" aria-controls="tab{{$category->id}}" role="tab">{{$category->name}}</a></li>
                  @endforeach
                </ul>
                <div class="tab-content text-center" style="margin-top: -60px">
                    @foreach($categories as $xkey=>$category1)
                     <div class="tab-pane fade" role="tabpanel" id="tab{{$category1->id}}">
                      @foreach($category1->subcategories as $subcategory)
                      <a class="button button-default button-xs round-xl button-shadow" href="{{route('layout.subcategory',$subcategory->id)}}">{{$subcategory->name}}</a>
                      @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
                <div class="row justify-content-between flex-lg-row-reverse row-50">
                    <div class="col-lg-10">

                        <div class="row">

                            <section class="section text-center margin-1">


                                <div class="row row-50">
                                    @foreach($products as $key=>$product)
                                    <div class="col-6 col-lg-3">
                                        <div class="product tumbnail thumbnail-3"><a
                                                href="{{route('product_detail',$product->id)}}"><img
                                                    src="{{asset($product->image)}}" alt="" /></a>
                                            <div class="caption">
                                                <h6><a
                                                        href="{{route('product_detail',$product->id)}}">{{$product->name}}</a>
                                                </h6><span class="price">
                                                    <del>Rs. {{$product->product_price->mrp}}</del></span><span
                                                    class="price sale">Rs.
                                                    {{$product->product_price->distributor_price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </section>
                            <section class="section section-sm text-center text-lg-start">
                                <div class="container">
                                    <div class="d-flex justify-content-center">
                                        <!-- Bootstrap Pagination-->
                                        <nav aria-label="Page navigation">
                                            {{$products->links()}}
                                        </nav>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                    <div class="col-lg-2">
 
                         <h5>Categories</h5>
                            
                            <div class="w3-dropdown-hover">
                                <a class="w3-button w3-black"
                                    href="">{{$category->name}}</a>
                                <div class="w3-dropdown-content w3-bar-block w3-border">
                                    @foreach($category->subcategories as $subcategory)
                                    <a href=""
                                        class="w3-bar-item w3-button">{{$subcategory->name}}</a>
                                    @endforeach
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