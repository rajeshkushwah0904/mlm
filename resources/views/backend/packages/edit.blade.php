@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Combo Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Combo Information</li>
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
                    <h3 class="card-title">Update Combo Information</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Combo Name</label>
                                <input type="text" name="package_name" value="{{$package->package_name}}"
                                    class="form-control" id="exampleInputEmail1" placeholder="Combo Name" Required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="number" name="amount" class="form-control" value="{{$package->amount}}"
                                    id="exampleInputEmail1" placeholder="Enter Amount" Required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sponsor Income</label>
                                <input type="text" name="sponsor_income" class="form-control"
                                    value="{{$package->sponsor_income}}" id="exampleInputEmail1"
                                    placeholder="Enter Sponsor Income" Required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bussiness Income</label>
                                <input type="text" name="business_volume" class="form-control"
                                    value="{{$package->business_volume}}" id="exampleInputEmail1"
                                    placeholder="Enter Bussiness Income" Required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_product">Add
                        Product
                        Modal</button>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S. No. </th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Distributor Price</th>
                                <th>Business Volume</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$total_distributor_price = 0;
$total_business_volume = 0;
?>
                            @foreach($package->package_products as $key=>$package_product)
                            <tr>
                                <input type="hidden" name="package_product[]" class="form-control"
                                    value="{{$package_product->id}}" Required>
                                <td>{{$key+1}}</td>
                                <td> <select class="custom-select" name="product_id[]" Required>
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                        @if($product->id == $package_product->product_id)
                                        <option value="{{$product->id}}" selected="selected">{{$product->name}}
                                        </option>
                                        @else
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endif
                                        @endforeach
                                    </select></td>
                                <td>
                                    <input type="number" name="qty[]" class="form-control"
                                        value="{{$package_product->qty}}" id="exampleInputEmail1"
                                        placeholder="Enter Qty Rate" Required>
                                </td>
                                <td><input class="form-control"
                                        value="{{$package_product->product->product_price->distributor_price}}"
                                        readonly></td>
                                <td>
                                    <input class="form-control"
                                        value="{{$package_product->product->product_price->bussiness_volume}}" readonly>
                                </td>
                                <?php

$total_distributor_price = $total_distributor_price + $package_product->product->product_price->distributor_price;
$total_business_volume = $total_business_volume + $package_product->product->product_price->bussiness_volume;

?>
                                <td>

                                    <a href="{{route('backend.package_products.delete',$package_product->id)}}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    Total
                                </td>
                                <td>
                                    {{$total_distributor_price}}
                                </td>
                                <td>
                                    {{$total_business_volume}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <!-- <div class="appnd-result"></div>
                    <a href="javascript:void(0);" class="btn btn-sm btn-info" onclick="add_product()">+ Add
                        product</a> -->
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>

            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
</div>

</div>
<div class="modal fade" id="add_product" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Header
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </h4>


            </div>
            <div class="modal-body">
                {!!Form::open(['route'=>['backend.package_products.create',$package->id],'files'=>true,'class'=>'form-horizontal'])!!}
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product</label>
                        <select class="custom-select" name="product_id" Required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="qty" class="form-control" value="{{old('qty')}}"
                            id="exampleInputEmail1" placeholder="Enter Qty Rate" Required>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

</div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script>
function add_product() {
    var status = 1;
    $.ajax({
        url: "{{route('backend.packages.add_product')}}",
        data: {
            status: status
        },
        type: "GET",
        success: function(data) {
            $('.appnd-result').append(data);
        }
    });

}
</script>
@endsection