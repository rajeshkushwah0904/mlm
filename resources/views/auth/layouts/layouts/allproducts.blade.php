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
     <style>
    ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
    </style>
</head>

<body>
 
    <div class="page">
        @include('admin.internal_header')


        <section class="section section-sm text-center text-lg-start section-border">
            <div class="container">
                <div class="row justify-content-between flex-lg-row-reverse row-50">
                    <div class="col-lg-10">

                        <div class="row">

                            <section class="section text-center margin-1">


                                <div class="row row-50">
                                    @foreach($products as $key=>$product)
                                    <div class="col-6 col-lg-3">
                                        <div class="product tumbnail thumbnail-3"><a
                                                href="{{route('product_detail',$product->id)}}"><img
                                                    src="{{asset($product->image)}}"  style="height: 306px; max-width:270px" alt="" /></a>
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
                   

 <div class="col-lg-2 sidebar">
               <?php
                    $categories = \App\Category::all();
                     ?>
              <h5>Categories</h5>
                <ul id="myUL">
                     @foreach($categories as $category)
  <li><span class="caret"><a href="{{route('layout.category',$category->id)}}">  {{$category->name}}</a></span>
    <ul class="nested">
         @foreach($category->subcategories as $subcategory)
      <li>{{$subcategory->name}}</li>
        @endforeach
     
      </ul>
      </li> 
        @endforeach 
    </ul>
  </li>
</ul>
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
    <script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}
</script>
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>