@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Package List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Distributor List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <a href="{{route('backend.packages.create')}}" class="btn btn-sm btn-info">Add Package</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Distributor List List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Package Name</th>
                                        <th>Amount</th>
                                        <th>Sponsor Income</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($distributors as $key=>$distributor)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$distributor->name}}</td>
                                        <td>{{$distributor->email}}</td>
                                        <td>{{$distributor->sponsor_income}}</td>
                                        <td>{{$distributor->package_name}}</td>
                                        <td>{{$distributor->amount}}</td>
                                        <td>{{$distributor->sponsor_income}}</td>
                                        <td>
                                            <a href="{{route('backend.distributors.edit',$distributor->id)}}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{route('backend.distributors.delete',$distributor->id)}}"
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
@endsection