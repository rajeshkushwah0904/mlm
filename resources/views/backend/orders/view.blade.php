@extends('backend.theme.theme')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the
                        invoice to print.
                    </div> -->


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="{{asset('logo.png')}}" alt="Rightway Future" class="brand-image"
                                        style="opacity: .8">
                                    <small class="float-right">Date: {{$order->created_at->format('d-M-Y')}}</small>
                                </h4>
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
                                    <strong> Email:</strong> {{$order->email}}
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
                                Package invoice
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
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Total Taxable Amount</th>
                                            <th>GST Amount</th>
                                            <th>Product Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->order_products as $key=>$order_product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$order_product->product_name}}</td>
                                            <td>{{$order_product->product_taxable_amount}}</td>
                                            <td>{{$order_product->qty}}</td>
                                            <td>{{$order_product->total_product_taxable_amount}}</td>
                                            <td>{{$order_product->product_gst_amount}}</td>
                                            <td>{{$order_product->product_amount}}</td>
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

                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{route('backend.orders.print')}}?invoice_no={{$order->invoice_no}}"
                                    target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                                <!-- <button type="button" class="btn btn-success float-right"><i
                                        class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button> -->
                            </div>
                        </div>
                    </div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop