@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            {!!Form::open(['method'=>'GET','files'=>true,'class'=>'form-horizontal'])!!}
            {{csrf_field()}}
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input class="form-control start_date" type="date" name="start_date" value="{{$start_date}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>extends Date</label>
                        <input class="form-control end_date" type="date" name="end_date" value="{{$end_date}}">
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 35px">
                            Search
                        </button>
                        <a href="{{route('backend.orders.export')}}?start_date={{$start_date}}&end_date={{$end_date}}&distributor_id={{\Auth::user()->distributor_id}}"
                            class="btn btn-danger btn-sm" style="margin-top: 35px">
                            Export
                        </a>
                    </div>
                </div>

            </div>
            {!!Form::close()!!}
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Invoice List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Distributor ID</th>
                                        <th>Invoice Date</th>
                                        <th>Invoice No.</th>
                                        <th>Invoice Type</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key=>$order)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($order->distributor)
                                            {{$order->distributor->name}}({{$order->distributor->distributor_tracking_id}})
                                            @endif
                                        </td>
                                        <td>{{$order->updated_at->format('d-M-Y')}}</td>
                                        <td>{{$order->invoice_no}}</td>
                                        <td>@if($order->invoice_type==1)
                                            Combo invoice
                                            @else
                                            Product Repurchase invoice
                                            @endif</td>
                                        <td>{{$order->grand_total}}</td>
                                        <td>
                                            <a href="{{route('backend.orders.view')}}?invoice_no={{$order->invoice_no}}"
                                                class="btn btn-sm btn-success">Show</a>
                                            <a href="{{route('backend.orders.download_pdf',$order->id)}}"
                                                class="btn btn-sm btn-info">Download</a>

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
function export_function() {
    var start_date = $('.start_date').val();
    var end_date = $('.end_date').val();
    $.ajax({
        type: "POST",
        url: "{{ route('backend.orders.export') }}",
        data: {
            "_token": "{{ csrf_token() }}",
            start_date: start_date,
            end_date: end_date,

        },
        success: function(data) {

        }
    });
}
</script>
@stop