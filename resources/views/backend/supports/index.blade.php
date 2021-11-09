@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Support List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Support List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Support List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Distributor</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Title</th>
                                        <th>Description</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($supports as $key=>$support)
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
                                                            href="{{route('backend.supports.open',$support->id)}}">Open</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.supports.closed',$support->id)}}">Closed</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.supports.delete',$support->id)}}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if($support->status==1)
                                            Closed
                                            @else
                                            Open
                                            @endif
                                        </td>
                                        <td>
                                            @if($support->distributor)
                                            {{$support->distributor->name}}
                                            @endif
                                        </td>
                                        <td>{{$support->mobile}}</td>
                                        <td>{{$support->email}}</td>
                                        <td>{{$support->title}}</td>
                                        <td>{{$support->description}}</td>

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