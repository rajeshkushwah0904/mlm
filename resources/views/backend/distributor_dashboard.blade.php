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
                                @if($distributor->profile_image)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset($distributor->profile_image)}}" alt="User profile picture">
                                @else
                                @if($distributor->gender=='Female')
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('backendtheme/female_user.png')}}" alt="User profile picture">
                                @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{asset('backendtheme/distributor_icon.png')}}" alt="User profile picture">
                                @endif
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{\Auth::user()->distributor_tracking_id}}</h3>

                            <p class="text-muted text-center">{{\Auth::user()->name}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Package</b> <a class="float-right">
                                        @if($distributor->package)
                                        {{$distributor->package->package_name}} ( {{$distributor->package->amount}} )
                                        @else
                                        Free
                                        @endif
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>KYC</b> <a class="float-right">
                                        @if($distributor->kyc)
                                        @if($distributor->kyc->status==1)
                                        <button class="btn btn-sm btn-info">Waiting For Approvel</button>
                                        @elseif($distributor->kyc->status==2)
                                        <button class="btn btn-sm btn-danger">Reject By Admin</button>
                                        @elseif($distributor->kyc->status==3)
                                        <button class="btn btn-sm btn-primary">Resend For Approvel</button>
                                        @elseif($distributor->kyc->status==4)
                                        <button class="btn btn-sm btn-success">Approved By Admin</button>
                                        @endif
                                        @else
                                        <button class="btn btn-sm btn-default">Not Updated</button>
                                        @endif


                                    </a>
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
                            <button type="button" class="btn btn-danger copied_id" onclick="copyText()">Copy</button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text"
                            value="{{$site_route}}/distributors/register?sponsor_tracking_id={{\Auth::user()->distributor_tracking_id}}"
                            class="form-control" id="myInput">
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
                            <span class="info-box-number">{{$wallet_incomes}}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                0% Increase in 30 Days
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
                            <span class="info-box-text">My Direct</span>
                            <span class="info-box-number">{{$my_direct}}</span>

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
                            <span class="info-box-text">Total Income</span>
                            <span class="info-box-number">{{$total_incomes}}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                0% Increase in 30 Days
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
                            <span class="info-box-text">Total Downline</span>
                            <span class="info-box-number">{{$total_downline}}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                0% Increase in 30 Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Self Business2</span>
                            <span class="info-box-number">{{$self_business}}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                                0% Increase in 30 Days
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
                            <span class="info-box-text">Total Business</span>
                            <span class="info-box-number">{{$total_busness}}</span>

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
<script>
function copyText() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();

    /* Copy the text inside the text field */
    document.execCommand("copy");
    $('.copied_id').html('Copied');
    /* Alert the copied text */
}
</script>

@stop
