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
                    <div class="card" style="overflow-x:scroll;">
                        <div class="card-header">
                            <h3 class="card-title">Distributor List List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>JOINING DATE</th>
                                        <th>ACTIVATION DATE </th>
                                        <th>DISTRIBUTOR ID </th>
                                        <th>DISTRIBUTOR NAME</th>
                                        <th>MOBILE</th>
                                        <th>BALANCE</th>
                                        <th>SPONSOR ID </th>
                                        <th>SPONSOR NAME</th>
                                        <th>SPONSOR MOBILE</th>
                                        <th>KYC</th>
                                        <th>PACKAGE</th>
                                        <th>DISTRIBUTOR STATUS </th>
                                        <th>DISTRIBUTOR PAID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($distributors as $key=>$distributor)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$distributor->joining_date}}</td>
                                        <td>{{$distributor->activate_date}}</td>
                                        <td>RF{{$distributor->id}}</td>
                                        <td>{{$distributor->name}}</td>
                                        <td>{{$distributor->mobile}}</td>
                                        <td></td>
                                        <td>{{\Auth::user()->id}}</td>
                                        <td>{{\Auth::user()->name}}</td>
                                        <td>{{\Auth::user()->mobile}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Activate
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