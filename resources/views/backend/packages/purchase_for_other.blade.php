@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Package Purchase For Other</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Package Purchase For Other</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Package Purchase For Other</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
               
                    <div class="row">
                        <div class="col-md-12">

                            {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                            <div class="form-group">
                                <label for="distributor_id" class="col-md-2 control-label">Distributor</label>
                                <div class="col-md-10">
                                    <select id="distributor_id" class="form-control" name="distributor_id" 
                                        required autofocus>
                                        <option value="">---- Select ----</option>
                                        @foreach($distributors as $distributor)
                                        <option value="{{$distributor->id}}">
                                            {{$distributor->name}} ( {{$distributor->distributor_tracking_id}} )
                                        </option>
                                        @endforeach
                                    </select>
                                </div>


                                <label for="package_id" class="col-md-2 control-label">Package</label>
                                <div class="col-md-10">
                                    <select id="package_id" class="form-control" name="package_id" 
                                        required autofocus>
                                        <option value="">---- Select ----</option>
                                        @foreach($packages as $package)
                                       
                                        <option value="{{$package->id}}">
                                            {{$package->package_name}} ( {{$package->amount}} )
                                        </option>
                                      

                                        @endforeach
                                    </select>
                                </div>
<br>
                                <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                            </div>
                            {!!Form::close()!!}
                            
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection