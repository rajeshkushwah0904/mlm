@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Repurchase Income List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Repurchase Income List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Repurchase Income List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Distributer Tracking ID</th>
                                        <th>Business Volume</th>
                                        <th>Sponsor Tracking ID</th>
                                        <th>Sponsor Level
                                            {!!Form::open(['method'=>'GET','files'=>true,'class'=>'form-horizontal'])!!}
                                            <div class="form-group">
                                                <select class="form-control select2" name="level" style="width: 100%;"
                                                    onchange="submit();">
                                                    <option value="">All</option>
                                                    <option value="L0" {{'L0' == $level  ? 'selected' : ''}}>L0</option>
                                                    <option value="L1" {{'L1' == $level ? 'selected' : ''}}>L1</option>
                                                    <option value="L2" {{'L2' == $level  ? 'selected' : ''}}>L2</option>
                                                    <option value="L3" {{'L3' == $level  ? 'selected' : ''}}>L3</option>
                                                </select>
                                            </div>
                                            {!!Form::close()!!}
                                        </th>
                                        <th>Sponsor Income (in Percentage)</th>
                                        <th>Sponsor Income (in Amount)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$total = 0.00;
?>
                                    @foreach($incomes as $key=>$income)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($income->distributor)
                                            {{$income->distributor->distributor_tracking_id}}
                                            @endif
                                        </td>
                                        <td>{{$income->amount}}</td>
                                        <td>
                                            @if($income->sponsor)
                                            {{$income->sponsor->distributor_tracking_id}}
                                            @endif
                                        </td>
                                        <td>{{$income->level}}</td>
                                        <td>{{$income->level_percentage}} %</td>
                                        <td style="background: Yellow">Rs. {{$income->sponsor_amount}}</td>
                                        <?php
$total = $total + $income->sponsor_amount;
?>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">Total Income</td>
                                        <td style="background: Yellow">Rs. {{number_format((float)$total,2,'.','')}}
                                        </td>
                                    </tr>
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
@stop