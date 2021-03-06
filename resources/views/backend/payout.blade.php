@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payout List</h1>
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
                            <h3 class="card-title">Payout List
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
                                        <th>Account Holder Name</th>
                                        <th>Account Number</th>
                                        <th>Pan Card</th>
                                        <th>Level Income</th>
                                        <th> Repurchase Income </th>
                                        <th>Reward Income</th>
                                        <th> Royalty Income</th>
                                        <th> Amount</th>
                                        <th> Admin Charge</th>
                                        <th> Gross Amount</th>
                                        <th> TDS</th>
                                        <th> Payable Amount </th>
                                    </tr>
                                </thead>
                                <tbody class="appnd-result">
                                    <?php
$i = 1;
?>
                                    @foreach($distributors as $key=>$distributor)
                                    @if($distributor->kyc&&($distributor->kyc->status==4))
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$distributor->kyc->account_holder_name}}</td>
                                        <td>{{$distributor->kyc->account_number}}</td>
                                        <td>{{$distributor->kyc->pancard_no}}</td>
                                        <?php
$level_incomes = 0;
$level_incomes = \App\Income::where('income_type', 1)->where('sponsor_id', $distributor->id)->sum('business_volume');
$level_repurchases = 0;
$level_repurchases = \App\Income::where('income_type', 2)->where('sponsor_id', $distributor->id)->sum('business_volume');
$total = 0;
$total = $level_incomes + $level_repurchases;
$admin_charge = 0;
$admin_charge = $total * 10 / 100;
$gross_amount = 0;
$gross_amount = $total - $admin_charge;
$tds_charge = 0;
$tds_charge = $gross_amount * 10 / 100;
$net_payable_amount = $gross_amount - $tds_charge;
$i = $i + 1;
?>
                                        <td>{{$level_incomes}}</td>
                                        <td>{{$level_repurchases}}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>{{$total}}</td>
                                        <td>{{$admin_charge}}</td>
                                        <td>{{$gross_amount}}</td>
                                        <td>{{$tds_charge}}</td>
                                        <td>{{$net_payable_amount}}</td>
                                    </tr>
                                    @endif
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
        url: "{{route('backend.payout_filter_data')}}",
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