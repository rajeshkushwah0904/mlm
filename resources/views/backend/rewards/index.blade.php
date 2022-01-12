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
    <a href="{{route('backend.rewards.create')}}" class="btn btn-sm btn-info">Add Reward</a>
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
                                        <th>Action</th>
                                        <th>Tag</th>
                                        <th>Creteria</th>
                                        <th>Cash</th>
                                        <th>Reward</th>
                                        <th>Business Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rewards as $key=>$reward)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.rewards.edit',$reward->id)}}">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.rewards.active',$reward->id)}}">Active</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.rewards.deactive',$reward->id)}}">Deactive</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.rewards.delete',$reward->id)}}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>{{$reward->tag}}</td>
                                        <td>{{$reward->criteria}}</td>
                                        <td>{{$reward->cash}}</td>
                                        <td>{{$reward->reward}}</td>
                                        <td>{{$reward->business_amount}}</td>
                                        <td>
                                            @if($reward->status==1)
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