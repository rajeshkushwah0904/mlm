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

            <div class="row">

                <div class="col-md-3">
                    {!!Form::open(['route'=>['myaccount.changepassword'],'files'=>true,'class'=>'form-horizontal'])!!}
                    {{csrf_field()}}

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <input type="hidden" name="distributor_id" value="{{\Auth::user()->distributor_id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Password</label>
                                <input type="password" name="old_password" value="{{old('old_password')}}"
                                    class="form-control" id="exampleInputEmail1" placeholder="Old Password" Required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" name="new_password" class="form-control"
                                    value="{{old('new_password')}}" id="exampleInputEmail1"
                                    placeholder="Enter New Password" Required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Retype Password</label>
                                <input type="password" name="renew_password" class="form-control"
                                    value="{{old('renew_password')}}" id="exampleInputEmail1"
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

                    {!!Form::close()!!}
                </div>

                <div class="col-md-9">
                    {!!Form::open(['route'=>['backend.profile'],'files'=>true,'class'=>'form-horizontal'])!!}
                    {{csrf_field()}}
                    <input type="hidden" name="distributor_id" value="{{$distributor->id}}">
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
                                        <input type="text" value="{{$distributor->name}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Account Holder Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile</label>
                                        <input type="text" value="{{$distributor->mobile}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Account Holder Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Referrel ID</label>
                                        <input type="test" class="form-control"
                                            value="{{$distributor->distributor_tracking_id}}" id="exampleInputEmail1"
                                            placeholder="Enter Referrel ID" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{$distributor->address}}" id="exampleInputEmail1"
                                            placeholder="Enter Amount" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date Of Birth</label>
                                        @if($distributor->dob)
                                        <input type="date" name="dob" value="{{$distributor->dob->format('Y-m-d')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Account Type"
                                            Required>
                                        @else
                                        <input type="date" name="dob" class="form-control" id="exampleInputEmail1"
                                            placeholder="Account Type" Required>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pincode</label>
                                        <input type="text" name="pincode" value="{{$distributor->pincode}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Pincode"
                                            Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option>Select Gender</option>
                                            <option value="Male" {{'Male' == $distributor->gender ? 'selected' : ''}}>
                                                Male</option>
                                            <option value="Female"
                                                {{'Female' == $distributor->gender ? 'selected' : ''}}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Profile Image</label>
                                        <input type="file" name="profile_image" class="form-control"
                                            id="exampleInputEmail1">
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
                    {!!Form::close()!!}
                </div>
            </div>



            {!!Form::close()!!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection