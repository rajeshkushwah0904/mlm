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
        <!--header-->
        @include('admin.internal_header')
        <!--Breadcrumbs-->
        <!-- Breadcrumbs-->
        <section class="section section-border">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Invoice</li>
            </ol>
        </section>


        <section class="section section-sm inset-bottom-2">
            <div class="container">
                <center>
                    <h1>Invoice</h1>
                </center>
                <!--Table-striped-->
                <div class="table-custom-responsive">
                    <table class="table-custom table-custom-striped table-custom-primary">
                        <thead>
                            <tr>
                                <th>Invoice No.</th>
                                <td>{{$order->invoice_no}}</td>
                                <th>Invoice Date</th>
                                <td colspan="2">{{$order->created_at->format('d-M-Y')}}</td>
                                <th>Refrence ID</th>
                                <td>{{$order->distributor->distributor_tracking_id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$order->distributor_name}}</td>
                                <th>Address</th>
                                <td colspan="2">{{$order->address}}</td>
                                <th>Pincode</th>
                                <td>{{$order->pincode}}</td>

                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{$order->gender}}</td>
                                <th>Mobile</th>
                                <td colspan="2">{{$order->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="background: yellow">S. No.</th>
                                <th style="background: yellow">Product Description</td>
                                <th style="background: yellow">Unit Price</th>
                                <th style="background: yellow">Taxable Amount</th>
                                <th style="background: yellow">Qty</th>
                                <th style="background: yellow">GST</th>
                                <th style="background: yellow">Amount</th>
                            </tr>
                            <?php
$product_taxable_amount = 0;
?>
                            @foreach($order->order_products as $key=>$order_product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$order_product->product_name}}</td>
                                <td>{{$order_product->product_taxable_amount}}</td>
                                <td>{{$order_product->qty}}</td>
                                <td>{{$order_product->total_product_taxable_amount}}</td>>
                                <td>{{$order_product->product_gst_amount}}</td>
                                <td>{{$order_product->product_amount}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td>Subtotal</td>
                                <td>{{$order->total_taxable_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>GST Amount</td>
                                <td>{{$order->total_gst_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Delivery Amount</td>
                                <td>{{$order->delivery_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td>Your Total</td>
                                <td>{{$order->grand_total}}</td>
                            </tr>
                        </tfoot>
                    </table>
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
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>