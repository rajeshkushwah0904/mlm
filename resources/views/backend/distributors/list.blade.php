@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Distributor List</h1>
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
                    <div class="card" style="overflow-x:scroll;">
                        <div class="card-header">
                            <h3 class="card-title">Distributor List</h3>
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
                                        <td>{{$distributor->distributor_tracking_id}}</td>
                                        <td>{{$distributor->name}}</td>
                                        <td>{{$distributor->mobile}}</td>
                                        <td></td>
                                        @if($distributor->my_sponsor)
                                        <td>{{$distributor->my_sponsor->distributor_tracking_id}}</td>
                                        <td>{{$distributor->my_sponsor->name}}</td>
                                        <td>{{$distributor->my_sponsor->mobile}}</td>
                                        @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @endif
                                        <td></td>
                                        <td>
                                            @if($distributor->package)
                                            {{$distributor->package->package_name}}
                                            @else
                                            Free
                                            @endif
                                        </td>
                                        <td>
                                            @if($distributor->package)
                                            Activate
                                            @else
                                            Free
                                            @endif
                                        </td>
                                        <td>
                                            @if($distributor->package)
                                            {{$distributor->package->amount}}
                                            @else
                                            Free
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