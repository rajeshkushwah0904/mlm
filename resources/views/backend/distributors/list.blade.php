@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Distributor List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Distributor List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @include('flash')
    <div id="change_password_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="change_password_modal-result"></div>
                </div>

            </div>

        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label>Distributor Tracking ID</label>
                        <select class="form-control select2 distributor_tracking_id" style="width: 100%;">
                            <option selected="selected" value="">All</option>
                            @foreach($distributors as $distributor)
                            <option value="{{$distributor->distributor_tracking_id}}">
                                {{$distributor->distributor_tracking_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Distributor Name</label>
                        <select class="form-control select2 distributor_name" style="width: 100%;">
                            <option selected="selected" value="">All</option>
                            @foreach($distributors as $distributor)
                            <option value="{{$distributor->name}}">
                                {{$distributor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Distributor Mobile</label>
                        <select class="form-control select2 distributor_mobile" style="width: 100%;">
                            <option selected="selected" value="">All</option>
                            @foreach($distributors as $distributor)
                            <option value="{{$distributor->mobile}}">
                                {{$distributor->mobile}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Sponser</label>
                        <select class="form-control select2 sponsor_id" style="width: 100%;">
                            <option selected="selected" value="">All</option>
                            @foreach($distributors as $distributor)
                            <option value="{{$distributor->id}}">
                                {{$distributor->distributor_tracking_id}} ( {{$distributor->name}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control start_date">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control end_date">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Package</label>
                        <select class="form-control select2 package_id" style="width: 100%;">
                            <option selected="selected" value="">All</option>
                            <option value="Null">FREE</option>
                            @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->package_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>KYC</label>
                        <select class="form-control select2 kyc_id" style="width: 100%;">
                            <option value="">All</option>
                            <option value="5">Not Submitted</option>
                            <option value="1">Waiting For Approvel</option>
                            <option value="2">Reject By Admin</option>
                            <option value="3">Resend For Approvel</option>
                            <option value="4">Approved By Admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <button type="button" onclick="search_function()" class="btn btn-primary btn-sm"
                            style="margin-top: 35px">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card" style="overflow-x:scroll;">
                        <div class="card-header">
                            <h3 class="card-title">Distributor List
                                <a class="btn btn-sm btn-info float-right"
                                    href="{{route('backend.distributors.export')}}">Export</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Action</th>
                                        <th>DISTRIBUTOR STATUS </th>
                                        <th>JOINING DATE</th>
                                        <th>ACTIVATION DATE </th>
                                        <th>DISTRIBUTOR ID

                                        </th>
                                        <th>DISTRIBUTOR NAME

                                        </th>
                                        <th>MOBILE

                                        </th>
                                        <th>BALANCE</th>
                                        <th>SPONSOR ID

                                        </th>
                                        <th>SPONSOR NAME</th>
                                        <th>SPONSOR MOBILE</th>
                                        <th>KYC</th>
                                        <th>PACKAGE</th>
                                        <th>DISTRIBUTOR PAID</th>
                                    </tr>
                                </thead>
                                <tbody class="appnd-result">
                                    @foreach($distributors as $key=>$distributor)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="http://distributor.{{$domain_name}}/distributors/as_login?distributor_tracking_id={{$distributor->distributor_tracking_id}}"
                                                            target="_blank">Login as a Distributor</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            onclick="change_password_function({{$distributor->id}});"
                                                            href="javascript:void(0);">Change
                                                            Password</a>
                                                    </li>
                                                    @if($distributor->status==2)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.distributors.activate',$distributor->id)}}">Unblock</a>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.distributors.block',$distributor->id)}}">Block</a>
                                                    </li>
                                                    @endif

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{route('backend.genealogy_tree')}}?distributor_id={{$distributor->id}}">Tree</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            @if($distributor->status==2)
                                            Block
                                            @else
                                            @if($distributor->package)
                                            Activate
                                            @else
                                            Free
                                            @endif
                                            @endif
                                        </td>
                                        <td>{{$distributor->joining_date}}</td>
                                        <td>{{$distributor->activate_date}}</td>
                                        <td>{{$distributor->distributor_tracking_id}}</td>
                                        <td>{{$distributor->name}}</td>
                                        <td>{{$distributor->mobile}}</td>
                                        <td></td>
                                        @if($distributor->my_sponsor)
                                        <td>{{$distributor->my_sponsor->distributor_tracking_id}}</td>
                                        <td>{{$distributor->my_sponsor->name}}</td>
                                        <td>{{$distributor->my_sponsor->mobile}}</td>
                                        @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @endif
                                        <td>
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
                                            <button class="btn btn-sm btn-danger">Not Submitted</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($distributor->package)
                                            {{$distributor->package->package_name}}
                                            @else
                                            Free
                                            @endif
                                        </td>

                                        <td>
                                            @if($distributor->package)
                                            {{$distributor->package->amount}}
                                            @else
                                            Free
                                            @endif
                                        </td>

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
<script>
function search_function() {
    var distributor_tracking_id = $('.distributor_tracking_id').val();
    var distributor_name = $('.distributor_name').val();
    var distributor_mobile = $('.distributor_mobile').val();
    var sponsor_id = $('.sponsor_id').val();
    var package_id = $('.package_id').val();
    var kyc_id = $('.kyc_id').val();
    var start_date = $('.start_date').val();
    var end_date = $('.end_date').val();

    $.ajax({
        url: "{{route('backend.distributors.distributor_filter_data')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            distributor_tracking_id: distributor_tracking_id,
            distributor_name: distributor_name,
            distributor_mobile: distributor_mobile,
            sponsor_id: sponsor_id,
            package_id: package_id,
            kyc_id: kyc_id,
            start_date: start_date,
            end_date: end_date
        },
        type: "POST",
        success: function(data) {
            $('.appnd-result').html(data);
        }
    });
}
</script>

<script>
function change_password_function(distributor_id) {


    $.ajax({
        url: "{{route('backend.distributors.change_password_popup')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            distributor_id: distributor_id,
        },
        type: "POST",
        success: function(data) {
            $('#change_password_modal').modal('show');
            $('.change_password_modal-result').html(data);
        }
    });
}
</script>
@stop