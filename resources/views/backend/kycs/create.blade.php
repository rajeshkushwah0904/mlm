@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Add KYC Detail</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add KYC Detail</li>
                    </ol>
                </div>
            </div>
            @include('flash')
            {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
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
                                <input type="text" name="pancard_no" value="{{old('pancard_no')}}" class="form-control"
                                    id="exampleInputEmail1" placeholder="Pan Card" Required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Aadhar Card</label>
                                <input type="number" name="aadhaarcard_no" class="form-control"
                                    value="{{old('aadhaarcard_no')}}" id="exampleInputEmail1"
                                    placeholder="Enter Aadhar Card" Required>
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
                                            value="{{old('account_holder_name')}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Account Holder Name" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Number</label>
                                        <input type="number" name="account_number" class="form-control"
                                            value="{{old('account_number')}}" id="exampleInputEmail1"
                                            placeholder="Enter Account Number" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Type</label>
                                        <input type="text" name="account_type" value="{{old('account_type')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Account Type"
                                            Required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control"
                                            value="{{old('ifsc_code')}}" id="exampleInputEmail1"
                                            placeholder="Enter Amount" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        <input type="text" name="bank_name" value="{{old('bank_name')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Bank Name"
                                            Required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Branch</label>
                                        <input type="text" name="bank_branch" value="{{old('bank_branch')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Bank Branch"
                                            Required>
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
                                        <label for="exampleInputEmail1">Aadhaar Card Image</label>
                                        <input type="file" name="aadhaar_card_file" class="form-control"
                                            id="exampleInputEmail1" Required>
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
            {!!Form::close()!!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection