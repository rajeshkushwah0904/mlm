@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bank List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bank List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <a href="{{route('backend.banks.create')}}" class="btn btn-sm btn-info">Add Bank</a>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bank List</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Account Holder Name</th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
                                        <th>IFSC Code</th>
                                        <th>Bank Name</th>
                                        <th>Bank Branch</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banks as $key=>$bank)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if($bank->status==1)
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.banks.in_active',$bank->id)}}">Inactive</a>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.banks.active',$bank->id)}}">Active</a>
                                                    </li>
                                                    @endif
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.banks.edit',$bank->id)}}">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.banks.delete',$bank->id)}}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if($bank->status==1)
                                            <button class="btn btn-sm btn-info">Active</button>
                                            @else
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                            @endif

                                        </td>
                                        <td>{{$bank->account_holder_name}}</td>
                                        <td>{{$bank->account_number}}</td>
                                        <td>{{$bank->account_type}}</td>
                                        <td>{{$bank->ifsc_code}}</td>
                                        <td>{{$bank->bank_name}}</td>
                                        <td>{{$bank->bank_branch}}</td>

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