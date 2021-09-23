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
                                        <th>Distributer ID</th>
                                        <th>Pencard No.</th>
                                        <th>Aadhaarcard No.</th>
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
                                        <td>FR{{$kyc->distributor_id}}</td>
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