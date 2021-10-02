@extends('backend.theme.theme')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Direct income List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Direct income List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <a href="{{route('backend.categories.create')}}" class="btn btn-sm btn-info">Add Category</a>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Direct income List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No. </th>
                                        <th>Distributer ID</th>
                                        <th>Distributer Amount</th>
                                        <th>Sponsor ID</th>
                                        <th>Sponsor Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                    @foreach($incomes as $key=>$income)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$income->distributor_tracking_id}}</td>
                                        <td>{{$income->amount}}</td>
                                        <td>{{$income->sponsor_tracking_id}}</td>
                                        <td>{{$income->sponsor_amount}}</td>
                                        <?php
$total =$total + $income->sponsor_amount;
                                        ?>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">Total Income</td>
                                        <td>{{$total}}</td>
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