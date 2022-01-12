@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Reward Update</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reward Update</li>
                    </ol>
                </div>
            </div>
            @include('flash')
            {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Reward</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tag</label>
                                        <input type="text" name="tag" value="{{$reward->tag}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Tag" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Criteria</label>
                                        <input type="text" name="criteria" class="form-control"
                                            value="{{$reward->criteria}}" id="exampleInputEmail1"
                                            placeholder="Enter Criteria" Required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Reward</label>
                                        <input type="text" name="reward" class="form-control"
                                            value="{{$reward->reward}}" id="exampleInputEmail1"
                                            placeholder="Enter Reward" Required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Business Amount </label>
                                        <input type="number" name="business_amount" value="{{$reward->business_amount}}"
                                            class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Business Amount" Required>
                                    </div>
                                </div>

                                <div class=" col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cash </label>
                                        <input type="number" name="cash" value="{{$reward->cash}}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Cash Amount" Required>
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