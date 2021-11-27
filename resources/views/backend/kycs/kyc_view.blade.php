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
            {!!Form::open(['route'=>['backend.kycs.edit',$kyc->id],'files'=>true,'class'=>'form-horizontal'])!!}
            {{csrf_field()}}
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
                                    id="exampleInputEmail1" placeholder="Pan Card" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Aadhar Card</label>
                                <input type="number" name="aadhaarcard_no" class="form-control"
                                    value="{{$kyc->aadhaarcard_no}}" id="exampleInputEmail1"
                                    placeholder="Enter Aadhar Card" required>
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
                                            id="exampleInputEmail1" placeholder="Enter Account Holder Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Number</label>
                                        <input type="number" name="account_number" class="form-control"
                                            value="{{$kyc->account_number}}" id="exampleInputEmail1"
                                            placeholder="Enter Account Number" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Type</label>

                                        <select type="text" name="account_type" value="{{old('account_type')}}"
                                            class="form-control" id="exampleInputEmail1" Required>
                                            <option value="">Select Account Type</option>
                                            <option value="Saving Account"
                                                {{"Saving Account" == $kyc->account_type ? 'selected' : ''}}>Saving
                                                Account</option>
                                            <option value="Current Account"
                                                {{"Current Account" == $kyc->account_type ? 'selected' : ''}}>Current
                                                Account</option>
                                            <option value="Recurring Account"
                                                {{"Recurring Account" == $kyc->account_type ? 'selected' : ''}}>
                                                Recurring
                                                Account</option>
                                        </select>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control"
                                            value="{{$kyc->ifsc_code}}" id="exampleInputEmail1"
                                            placeholder="Enter Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        <input type="text" name="bank_name" value="{{$kyc->bank_name}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Bank Name"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Branch</label>
                                        <input type="text" name="bank_branch" value="{{$kyc->bank_branch}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Bank Branch"
                                            required>
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
                            <h3 class="card-title">Uploaded documents</h3>
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
                                            <button type="button" class="btn btn-lg btn-info">Waiting For
                                                Approvel</button>
                                            @elseif($kyc->status==2)
                                            <button type="button" class="btn btn-lg btn-danger">Reject By Admin</button>
                                            @elseif($kyc->status==3)
                                            <button type="button" class="btn btn-lg btn-primary">Resend For
                                                Approvel</button>
                                            @elseif($kyc->status==4)
                                            <button type="button" class="btn btn-lg btn-success">Approved By
                                                Admin</button>
                                            @else
                                            <button type="button" class="btn btn-lg btn-default">Not Updated</button>
                                            @endif
                                        </center>
                                    </div>
                                    <p>
                                       <strong> Note:</strong> If you want to make any updates in your KYC then
please contact us on our WhatsApp number 7880006260
or info@rightwayfuture.com

                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @if($kyc->status==2)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Upload documents</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pancard Image</label>
                                        <input type="file" name="pancard_file"" class=" form-control"
                                            id="exampleInputEmail1" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Frontend Aadhaar Card Image</label>
                                        <input type="file" name="aadhaar_card_file" class="form-control"
                                            id="exampleInputEmail1" Required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Backend Aadhaar Card Image</label>
                                        <input type="file" name="backend_aadhaar_card_file" class="form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cancel Cheque / Bank Passbook Frontpage</label>
                                        <input type="file" name="bank_document" class="form-control"
                                            id="exampleInputEmail1" Required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <center>
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </center>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection