@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper" style="width: 100%">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <a href="{{route('backend.products.create')}}" class="btn btn-sm btn-info">Add Product</a>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>

                                        <th>Action</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Product Code</th>
                                        <th>HSN Code</th>
                                        <th>Serial No.</th>
                                        <th>MRP</th>
                                        <th>Distributor Price</th>
                                        <th>Business Volume</th>
                                        <th>Actual Rate</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.products.edit',$product->id)}}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.products.active',$product->id)}}">Active</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.products.deactive',$product->id)}}">Deactive</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><img src="{{asset($product->image)}}" style="width: 120px"></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->hsn_code}}</td>
                                        <td>{{$product->serial_no}}</td>
                                        <td>{{$product->product_price->mrp}}</td>
                                        <td>{{$product->product_price->distributor_price}}</td>

                                        <td>{{$product->product_price->bussiness_volume}}</td>
                                        <td>{{$product->product_price->actual_price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->subcategory->name}}</td>
                                        <td>@if($product->status==1)
                                            Active
                                            @else
                                            Deactive
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop