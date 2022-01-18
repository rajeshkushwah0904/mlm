@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reward List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reward List</li>
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
                            <h3 class="card-title">Reward List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Tag</th>
                                        <th>Creteria</th>
                                        <th>Reward</th>
                                        <th>Status</th>
                                        <th>Achievement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rewards as $key=>$reward)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$reward->tag}}</td>
                                        <td>{{$reward->criteria}}</td>
                                        <td>{{$reward->reward}}</td>
                                        <td>
                                            @if($reward->status==2)
                                            <button class="btn btn-sm btn-success"> Achievement</button>
                                            @else
                                            <button class="btn btn-sm btn-info"> Pending</button>
                                            @endif
                                        </td>
                                        <td>
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