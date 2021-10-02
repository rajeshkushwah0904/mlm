@extends('backend.theme.theme')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('backendtheme/dist/img/user4-128x128.jpg')}}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{\Auth::user()->distributor_tracking_id}}</h3>

                            <p class="text-muted text-center">{{\Auth::user()->name}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Package</b> <a class="float-right">Free</a>
                                </li>
                                <li class="list-group-item">
                                    <b>KYC</b> <a class="float-right">Not Updated</a>
                                </li>

                            </ul>

                            <a href="{{route('backend.profile')}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <strong><i class="far fa-copy"></i> Referral Link</strong>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-danger">Copy</button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text"
                            value="{{$site_route}}/distributors/register?sponsor_tracking_id={{\Auth::user()->distributor_tracking_id}}"
                            class="form-control">
                    </div>
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> Mobile</strong>

                                    <p class="text-muted">
                                        {{\Auth::user()->mobile}}
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Email</strong>

                                    <p class="text-muted">{{\Auth::user()->email}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Status</strong>

                                    <p class="text-muted">Activate</p>

                                </div>
                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-sm-4">

                                    <strong><i class="far fa-file-alt mr-1"></i> Registration Date</strong>

                                    <p class="text-muted">{{\Auth::user()->created_at->format('d-M-Y')}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="far fa-file-alt mr-1"></i> Activated Date</strong>

                                    <p class="text-muted">{{\Auth::user()->updated_at->format('d-M-Y')}}</p>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Wallet Income</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">My Directs</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Dowline</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Earning</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- /.nav-tabs-custom -->
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop