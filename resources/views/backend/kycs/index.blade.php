@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KYC List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">KYC List</li>
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
                            <h3 class="card-title">KYC List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Distributer ID</th>
                                        <th>PAN Card</th>
                                        <th>Adhar Card</th>
                                        <th>Account Holder Name</th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
                                        <th>IFSC Code</th>
                                        <th>Bank Name</th>
                                        <th>Bank Branch</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kycs as $key=>$kyc)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.kycs.update')}}?distributor_id={{$kyc->distributor_id}}">View</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.kycs.edit',$kyc->id)}}">Edit</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.kycs.approved',$kyc->id)}}">Approved</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{route('backend.kycs.rejected',$kyc->id)}}">Rejected</a>
                                                    </li>
                                                </ul>
                                            </div>


                                        </td>
                                        <td>
                                            @if($kyc->status==1)
                                            <button class="btn btn-sm btn-info">Waiting For Approvel</button>
                                            @elseif($kyc->status==2)
                                            <button class="btn btn-sm btn-danger">Reject By Admin</button>
                                            @elseif($kyc->status==3)
                                            <button class="btn btn-sm btn-primary">Resend For Approvel</button>
                                            @elseif($kyc->status==4)
                                            <button class="btn btn-sm btn-success">Approved By Admin</button>
                                            @endif

                                        </td>
                                        <td>
                                            @if($kyc->distributor)
                                            {{$kyc->distributor->distributor_tracking_id}}
                                            @endif
                                        </td>

                                        <td>{{$kyc->pancard_no}}</td>
                                        <td>{{$kyc->aadhaarcard_no}}</td>
                                        <td>{{$kyc->account_holder_name}}</td>
                                        <td>{{$kyc->account_number}}</td>
                                        <td>{{$kyc->account_type}}</td>
                                        <td>{{$kyc->ifsc_code}}</td>
                                        <td>{{$kyc->bank_name}}</td>
                                        <td>{{$kyc->bank_branch}}</td>

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