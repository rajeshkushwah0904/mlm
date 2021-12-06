@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Purchase Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Package</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Purchase Package</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($distributor->package_id)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S. No. </th>
                                <th>Package Name</th>
                                <th>Amount</th>
                                <th>Sponsor Income</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>{{$distributor->package->package_name}}</td>
                                <td>{{$distributor->package->amount}}</td>
                                <td>{{$distributor->package->sponsor_income}}%</td>
                                <?php
$order = \App\Order::where('distributor_id', $distributor->id)->where('invoice_type', 1)->first();
?>
                                <td>
                                    @if($order)
                                    <a href="{{route('backend.orders.view')}}?invoice_no={{$order->invoice_no}}"
                                        class="btn btn-info"><i class="fas fa-print"></i> View & Download</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div class="row">
                        <div class="col-md-12">

                            {!!Form::open(['files'=>true,'method'=>'GET','class'=>'form-horizontal'])!!}
                            <div class="form-group">
                                <label for="package_id" class="col-md-2 control-label">Package</label>
                                <div class="col-md-10">
                                    <select id="package_id" class="form-control" name="package_id" onchange="submit()"
                                        required autofocus>
                                        <option value="">---- Select ----</option>
                                        @foreach($packages as $package)
                                        @if($select_package)
                                        <option value="{{$package->id}}"
                                            {{$select_package->id==$package->id?'selected':''}}>
                                            {{$package->package_name}} ( {{$package->amount}} )
                                        </option>
                                        @else
                                        <option value="{{$package->id}}">
                                            {{$package->package_name}} ( {{$package->amount}} )
                                        </option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {!!Form::close()!!}
                            @if($select_package)
                            {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Product Name</th>
                                        <th>HSN Code</th>
                                        <th>MRP</th>
                                        <th>Business volume</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($select_package->package_products as $key=>$package_product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($package_product->product)
                                            {{$package_product->product->name}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($package_product->product)
                                            {{$package_product->product->hsn_code}}
                                            @endif
                                        </td>
                                        <td>

                                            @if($package_product->product)
                                            @if($package_product->product->product_price)
                                            {{$package_product->product->product_price->distributor_price}}
                                            @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if($package_product->product)
                                            @if($package_product->product->product_price)
                                            {{$package_product->product->product_price->bussiness_volume}}
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @csrf

                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZOR_KEY') }}"
                                data-amount="{{$select_package->amount*100}}"
                                data-buttontext="Pay {{$select_package->amount}} INR" data-name="{{$distributor->name}}"
                                data-package_id="{{$select_package->id}}" data-description="{{$select_package->id}}"
                                data-image="{{asset('images\rightway_futurel_logo.jpg')}}"
                                data-prefill.name="Rightway Future" data-prefill.email="{{$distributor->email}}"
                                data-theme.color="#ff7529">
                            </script>
                            @endif
                            {!!Form::close()!!}
                        </div>
                        <!-- /.col -->
                    </div>

                    @endif
                    <!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection