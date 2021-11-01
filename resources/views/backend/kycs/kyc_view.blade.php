@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>KYC Detail</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">KYC Detail</li>
                    </ol>
                </div>
            </div>
            @include('flash')
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Identity Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pancard</label>
                                <input type="text" name="pancard_no" value="{{$kyc->pancard_no}}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Pan Card" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Aadhar Card</label>
                                <input type="number" name="aadhaarcard_no" class="form-control"
                                    value="{{$kyc->aadhaarcard_no}}" id="exampleInputEmail1"
                                    placeholder="Enter Aadhar Card" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Bank Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Holder Name</label>
                                        <input type="text" name="account_holder_name"
                                            value="{{$kyc->account_holder_name}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Account Holder Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Number</label>
                                        <input type="number" name="account_number" class="form-control"
                                            value="{{$kyc->account_number}}" id="exampleInputEmail1"
                                            placeholder="Enter Account Number" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Type</label>
                                        <input type="text" name="account_type" value="{{$kyc->account_type}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Account Type"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control"
                                            value="{{$kyc->ifsc_code}}" id="exampleInputEmail1"
                                            placeholder="Enter Amount" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        <input type="text" name="bank_name" value="{{$kyc->bank_name}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Bank Name"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Branch</label>
                                        <input type="text" name="bank_branch" value="{{$kyc->bank_branch}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Bank Branch"
                                            readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Upload documents</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pancard Image</label>
                                        <img src="{{asset($kyc->pancard_file)}}" style="width: 100%" data-toggle="modal"
                                            data-target="#pancard_file">
                                        <div class="modal fade" id="pancard_file">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Pancard Image</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset($kyc->pancard_file)}}" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Frontend Aadhaar Card Image</label>
                                        <img src="{{asset($kyc->aadhaar_card_file)}}" style="width: 100%"
                                            data-toggle="modal" data-target="#aadhaar_card_file">
                                        <div class="modal fade" id="aadhaar_card_file">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Aadhaar Card Image</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset($kyc->aadhaar_card_file)}}"
                                                            style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    @if($kyc->backend_aadhaar_card_file)
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Backend Aadhaar Card Image</label>
                                        <img src="{{asset($kyc->backend_aadhaar_card_file)}}" style="width: 100%"
                                            data-toggle="modal" data-target="#backend_aadhaar_card_file">
                                        <div class="modal fade" id="backend_aadhaar_card_file">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Aadhaar Card Image</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset($kyc->backend_aadhaar_card_file)}}"
                                                            style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cancel Cheque / Bank Passbook Frontpage</label>

                                        <img src="{{asset($kyc->bank_document)}}" style="width: 100%"
                                            data-toggle="modal" data-target="#bank_document">
                                        <div class="modal fade" id="bank_document">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Pancard Image</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset($kyc->bank_document)}}" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <center>
                                            @if($kyc->status==1)
                                            <button class="btn btn-lg btn-info">Waiting For Approvel</button>
                                            @elseif($kyc->status==2)
                                            <button class="btn btn-lg btn-danger">Reject By Admin</button>
                                            @elseif($kyc->status==3)
                                            <button class="btn btn-lg btn-primary">Resend For Approvel</button>
                                            @elseif($kyc->status==3)
                                            <button class="btn btn-lg btn-success">Approved By Admin</button>
                                            @else
                                            <button class="btn btn-lg btn-default">Not Updated</button>
                                            @endif
                                        </center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection