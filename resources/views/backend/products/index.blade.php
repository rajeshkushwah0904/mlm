@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
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
                                        <th>Name</th>
                                        <th>Product Code</th>
                                        <th>HSN Code</th>
                                        <th>Serial No.</th>
                                        <th>MRP</th>
                                        <th>Discount</th>
                                        <th>Actual Rate</th>
                                        <th>Category Rate</th>
                                        <th>Subcategory Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$product)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->hsn_code}}</td>
                                        <td>{{$product->serial_no}}</td>
                                        <td>{{$product->mrp}}</td>
                                        <td>{{$product->discount}}</td>
                                        <td>{{$product->actual_rate}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->subcategory->name}}</td>
                                        <td>
                                            <a href="{{route('backend.products.edit',$product->id)}}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{route('backend.products.delete',$product->id)}}"
                                                class="btn btn-sm btn-danger">Delete</a>
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