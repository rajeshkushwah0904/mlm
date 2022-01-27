<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Print</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link type="text/css" rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
        media="all">
    <!-- Theme style -->
    <link type="text/css" rel="stylesheet" href="{{public_path('backendtheme/dist/css/adminlte.min.css')}}" media="all">

    <!-- Google Font: Source Sans Pro -->
    <link type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
        rel="stylesheet" media="all">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="{{asset('logo.png')}}" alt="Rightway Future" class="brand-image" style="opacity: .8">
                        <small class="float-right">Date: {{$order->created_at->format('d-M-Y')}}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Rightway Future</strong><br>
                        <strong> GST No.:</strong> <br>
                        <strong> Address:</strong> C-9 ,HANUMAN COLONY,<br>
                        GOLE KA MANDIR,<br>
                        Gwalior,Madhya Pradesh-474005<br>
                        <strong> Phone:</strong> 9098442841<br>
                        <strong> Email:</strong> rightwayfuture2021@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{$order->distributor_name}}</strong><br>
                        @if($order->gst_no)
                        <strong> GST No.:</strong> {{$order->gst_no}}<br>
                        @endif
                        <strong> Address:</strong> {{$order->address}}<br>
                        <strong> Pincode:</strong>{{$order->pncode}}<br>
                        <strong> Phone:</strong> {{$order->mobile}}<br>
                        <strong> Email: </strong>{{$order->email}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #{{$order->invoice_no}}</b><br>
                    <br>
                    <b>Order ID:</b> {{$order->id}}<br>
                    <b>Invoice Date:</b> {{$order->created_at}}<br>
                    <b>Invoice Type:</b>
                    @if($order->invoice_type=='1')
                    Combo invoice
                    @else
                    Product Repurchase Invoice
                    @endif
                    <br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Description </th>
                                <th class="text-center">MRP</th>
                                <th class="text-center">DP</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">SGT</th>
                                <th class="text-center">CGST</th>
                                <th class="text-center">IGT</th>
                                <th class="text-center">TAX AMOUNT</th>
                                <th class="text-center">TOTAL AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->order_products as $key=>$order_product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$order_product->product_name}}</td>
                                <td class="text-center">{{$order_product->mrp}}</td>
                                <td class="text-center">{{$order_product->product_taxable_amount}}</td>
                                <td class="text-center">{{$order_product->qty}}</td>
                                <td class="text-center">
                                    @if($order_product->cgst_rate)
                                    {{$order_product->cgst_amount}}({{$order_product->cgst_rate}}%)
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($order_product->sgst_rate)
                                    {{$order_product->sgst_amount}}({{$order_product->sgst_rate}}%)
                                    @endif
                                </td>
                                <td class="text-center"></td>
                                <td class="text-center">{{$order_product->product_gst_amount}}</td>
                                <td class="text-center">{{$order_product->product_amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-8">
                </div>
                <div class="col-4">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>{{$order->total_taxable_amount}}</td>
                            </tr>
                            <tr>
                                <th>GST Amount</th>
                                <td>{{$order->total_gst_amount}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Charge:</th>
                                <td>{{$order->delivery_amount}}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>{{$order->grand_total}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->


</body>

</html>