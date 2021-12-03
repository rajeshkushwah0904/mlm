<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Rightway Future</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
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

    <!--The Main Wrapper-->
    <div class="page">
        <header class="page-header subpage_header">
            <!--RD Navbar-->
            @include('admin.loginregister_header')
            <div class="text-center">
                <br><br>
            </div>
            <section class="section section-sm section-collapse">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <colgroup>
                                    <col class="col-12">
                                    <col class="col-12">
                                </colgroup>
                                <tbody class="text-darker-clr">
                                    <tr class="section-border-white">
                                        <td class="bg-lighter-2">Returning customer? <a class="text-primary"
                                                href="#">Click here to login</a></td>
                                        <td class="bg-lighter-2"></td>
                                    </tr>
                                    <tr class="section-border-white">
                                        <td class="bg-lighter-2">Have a coupon? <a class="text-primary" href="#">Click
                                                here to enter your code</a></td>
                                        <td class="bg-lighter-2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- <section class="section section-sm section-collapse">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-12 col-lg-6">
              <h4>Billing Details</h4>
              <form class="margin-5">
                <div class="row row-24">
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-name">First name *</label>
                      <input class="form-input round-small" id="forms-check-name" type="text" name="name" placeholder="Your First Name" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-last-name">Last name *</label>
                      <input class="form-input round-small" id="forms-check-last-name" type="text" name="last-name" placeholder="Last Name" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-company">Company Name</label>
                      <input class="form-input round-small" id="forms-check-company" type="text" name="company" placeholder="Company">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-email">Email Address *</label>
                      <input class="form-input round-small" id="forms-check-email" type="email" name="email" placeholder="E-Mail" data-constraints="@Email @Required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-phone">Phone *</label>
                      <input class="form-input round-small" id="forms-check-phone" type="text" name="phone" placeholder="Phone" data-constraints="@Numeric @Required">
                    </div>
                  </div>
                  <div class="col-12 select">
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label-outside" for="involve-form-country">Country *</label>
                      <select class="form-input round-small" id="involve-form-country" name="country" data-constraints="@Required" data-placeholder="Select Your Country">
                        <option label="Country"></option>
                        <option selected>USA</option>
                        <option>UK</option>
                        <option>Ukraine</option>
                        <option>Australia</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-address">Address *</label>
                      <input class="form-input round-small" id="forms-check-address" type="text" name="address" placeholder="Street address" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-apartment">&#8203;</label>
                      <input class="form-input round-small" id="forms-check-apartment" type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-town">Town / City *</label>
                      <input class="form-input round-small" id="forms-check-town" type="text" name="town" placeholder="Town / City" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-country">Country</label>
                      <input class="form-input round-small" id="forms-check-country" type="text" name="country" placeholder="Country">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-postcode">Postcode *</label>
                      <input class="form-input round-small" id="forms-check-postcode" type="text" name="postcode" placeholder="Postcode" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="checkbox-inline">
                        <input name="passion" value="value-6" type="checkbox"><span class="text-dark-variant-2 font-secondary">Create an account?</span>
                      </label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-12 col-lg-6 inset-md">
              <h4>Ship to a different address?</h4>
              <form class="margin-5">
                <div class="row row-24">
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-name1">First name *</label>
                      <input class="form-input round-small" id="forms-check-name1" type="text" name="name" placeholder="Your First Name" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-last-name1">Last name *</label>
                      <input class="form-input round-small" id="forms-check-last-name1" type="text" name="last-name" placeholder="Last Name" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-company1">Company Name</label>
                      <input class="form-input round-small" id="forms-check-company1" type="text" name="company" placeholder="Company">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label-outside" for="involve-form-country2">Country *</label>
                      <select class="form-input round-small" id="involve-form-country2" name="country2" data-constraints="@Required" data-placeholder="Select Your Country">
                        <option label="Country"></option>
                        <option selected>United States of America (USA)</option>
                        <option>United Kingdom (UK)</option>
                        <option>People's Republic of China (PRC)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-address1">Address *</label>
                      <input class="form-input round-small" id="forms-check-address1" type="text" name="address" placeholder="Street address" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-apartment1">&#8203;</label>
                      <input class="form-input round-small" id="forms-check-apartment1" type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-town1">Town / City *</label>
                      <input class="form-input round-small" id="forms-check-town1" type="text" name="town" placeholder="Town / City" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-country1">Country</label>
                      <input class="form-input round-small" id="forms-check-country1" type="text" name="country" placeholder="Country">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-postcode1">Postcode *</label>
                      <input class="form-input round-small" id="forms-check-postcode1" type="text" name="postcode" placeholder="Postcode" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap form-wrap-validation validation-with-outside-label">
                      <label class="form-label-outside" for="forms-check-text">Order notes</label>
                      <textarea class="form-input round-small" id="forms-check-text" name="message" placeholder="Write your message here" data-constraints="@Required"></textarea>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section> -->
            @if($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Error!</strong> {{ $message }}
            </div>
            @endif
            @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}"
                role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Success!</strong> {{ $message }}
            </div>
            @endif
            <section class="section section-sm inset-bottom-2 margin-4 checkout section-collapse">
                <div class="container">
                    <h4>Your order</h4>
                    <div class="row margin-5">
                        <div class="col-md-12 col-lg-6">
                            <table class="table">
                                <thead>
                                    <tr class="bg-lighter text-uppercase text-darker-clr font-secondary section-border">
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$total = 0;
?>
                                    @foreach($add_to_carts as $add_to_cart)
                                    <tr class="section-border">
                                        <td class="bg-default section-border text-dark-variant-2">
                                            {{$add_to_cart->product->name}}</td>
                                        <td class="bg-default section-border text-dark-variant-2">
                                            {{$add_to_cart->price}}
                                        </td>
                                    </tr>
                                    <?php
$total = $total + $add_to_cart->price;
?>
                                    @endforeach
                                    <tr class="section-border">
                                        <th
                                            class="bg-lighter-2 text-uppercase text-darker-clr font-secondary letter-spacing-1">
                                            SUBTOTAL</th>
                                        <td class="bg-default text-dark-variant-2">{{$total}}</td>
                                    </tr>
                                    <tr class="section-border">
                                        <th
                                            class="bg-lighter-2 text-uppercase text-darker-clr font-secondary letter-spacing-1">
                                            SHIPPING</th>
                                        <td class="bg-default text-dark-variant-2">Please fill in your details to see
                                            available shipping methods.</td>
                                    </tr>
                                    <tr class="section-border">
                                        <th
                                            class="bg-lighter-2 text-uppercase text-darker-clr font-secondary letter-spacing-1">
                                            TOTAL</th>
                                        <td class="bg-default text-dark-variant-2">{{$total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12 col-lg-6 text-end">
                            <div class="payment text-start round-small">
                                @if($distributor->remaining_wallet_amount>$total)
                                <div class="payment-var1 bg-lighter-2 section-border">
                                    <div class="form-wrap">
                                        <label class="radio-inline">
                                            <input class="onclick_wallet_pay" name="passion" value="value-1"
                                                type="radio"><span class="text-dark-variant-2 font-secondary">Wallet
                                                Payment</span>
                                        </label>
                                    </div>
                                    <p class="text-dark-variant-2">Payment Will be done by Your wallet Amount. and
                                        Amount Willl be deduct from wallet Amount</p>
                                </div>
                                @endif
                                <div class="payment-var2 bg-lighter-2">
                                    <div class="form-wrap">
                                        <label class="radio-inline block-inline-left">
                                            <input class="onclick_rozar_pay" name="passion" value="value-2"
                                                type="radio"><span class="text-dark-variant-2 font-secondary">Rozar Pay
                                            </span>
                                        </label><a class="text-primary" href="#">(By Payment Gateway)</a>
                                    </div>
                                    <div class="image-wrapper"><a href="#"><img src="images/shop-pay-1.png"
                                                alt="" /></a><a href="#"><img src="images/shop-pay-2.png"
                                                alt="" /></a><a href="#"><img src="images/shop-pay-3.png"
                                                alt="" /></a><a href="#"><img src="images/shop-pay-4.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wallet_pay" style="display:none">
                            {!!Form::open(['route'=>['checkout_wallet'],'files'=>true,'class'=>'form-horizontal'])!!}
                            @csrf
                            <input type="hidden" name="amount" value="{{number_format($total, 2, '.', '')}}">
                            <input type="hidden" name="currency" value="INR">
                            <input type="hidden" name="entity" value="Wallet Amount">
                            <input type="hidden" name="amount_refunded" value="0.00">
                            <button type="submit" class="margin-5 button button-primary button-xs round-small">Click
                                Here To Pay
                                {{number_format($total, 2, '.', '')}} INR</button>
                            {!!Form::close()!!}
                        </div>
                        <div class="rozar_pay" style="display:none">
                            {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZOR_KEY') }}"
                                data-amount="{{number_format($total*100, 2, '.', '')}}"
                                data-buttontext="Click Here  To Pay {{number_format($total, 2, '.', '')}} INR"
                                data-name="{{$distributor->name}}"
                                data-description="{{$distributor->distributor_tracking_id}}"
                                data-image="{{asset('logo.png')}}" data-prefill.name="{{$distributor->name}}"
                                data-prefill.email="{{$distributor->email}}" data-theme.color="#ff7529">
                            </script>
                            {!!Form::close()!!}
                        </div>

                    </div>
                </div>
    </div>
    </section>
    </header>
    <!--Footer-->
    @include('admin.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!--Scripts-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script>
    $(".onclick_wallet_pay").click(function() {

        $(".wallet_pay").show();
        $(".rozar_pay").hide();
    });
    $(".onclick_rozar_pay").click(function() {

        $(".rozar_pay").show();
        $(".wallet_pay").hide();
    })
    </script>

</body>

</html>