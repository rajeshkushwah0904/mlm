@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Password</label>
                                <input type="text" name="old_password" value="{{old('old_password')}}"
                                    class="form-control" id="exampleInputEmail1" placeholder="Old Password" Required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="number" name="new_password" class="form-control"
                                    value="{{old('new_password')}}" id="exampleInputEmail1"
                                    placeholder="Enter New Password" Required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Retype Password</label>
                                <input type="number" name="retype_password" class="form-control"
                                    value="{{old('retype_password')}}" id="exampleInputEmail1"
                                    placeholder="Enter Retype Password" Required>
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
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Personal Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="account_holder_name" value="{{\Auth::user()->name}}"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Account Holder Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile</label>
                                        <input type="text" name="account_holder_name" value="{{\Auth::user()->mobile}}"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Account Holder Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Referrel ID</label>
                                        <input type="test" name="account_number" class="form-control"
                                            value="{{\Auth::user()->distributor_tracking_id}}" id="exampleInputEmail1"
                                            placeholder="Enter Referrel ID" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" name="ifsc_code" class="form-control"
                                            value="{{old('ifsc_code')}}" id="exampleInputEmail1"
                                            placeholder="Enter Amount" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date Of Birth</label>
                                        <input type="text" name="account_type"
                                            value="{{\Auth::user()->dob->format('Y-m-d')}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Account Type" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pincode</label>
                                        <input type="text" name="pincode" value="{{old('pincode')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Pincode"
                                            Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radio1" checked>
                                                    <label class="form-check-label">Male</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="radio1">
                                                    <label class="form-check-label">Female</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Profile Image</label>
                                        <input type="file" name="aadhaar_card_file" class="form-control"
                                            id="exampleInputEmail1" Required>
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
                        </div>
                    </div>
                </div>
            </div>



            {!!Form::close()!!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection