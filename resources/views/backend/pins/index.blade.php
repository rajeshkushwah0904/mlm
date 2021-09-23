@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pin List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pin List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <a href="{{route('backend.pins.create')}}" class="btn btn-sm btn-info">Add Pin</a>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pin List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Generated At</th>
                                        <th>Pin</th>
                                        <th>Package</th>
                                        <th>Distributor ID</th>
                                        <th>Distributor Name</th>
                                        <th>Used by</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pins as $key=>$pin)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$pin->created_at}}</td>
                                        <td>{{$pin->generated_pin}}</td>
                                        <td>{{$pin->package->package_name}}</td>
                                        <td>{{$pin->distributor->distributor_tracking_id}}</td>
                                        <td>{{$pin->distributor->name}}</td>
                                        <td>{{$pin->used_by}}</td>
                                        <td>
                                            @if($pin->status==0)
                                            <a href="#" class="btn btn-sm btn-info">Unused</a>
                                            @else

                                            <a href="#" class="btn btn-sm btn-success">Used</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('backend.categories.edit',$pin->id)}}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{route('backend.categories.delete',$pin->id)}}"
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