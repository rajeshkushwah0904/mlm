@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Support</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Support</li>
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
                            <h3 class="card-title">Support</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile</label>
                                        <input type="number" name="mobile" value="{{old('mobile')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile"
                                            Required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}"
                                            id="exampleInputEmail1" placeholder="Enter Email" Required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}"
                                            id="exampleInputEmail1" placeholder="Enter Title" Required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description </label>
                                        <textarea type="text" name="description" value="{{old('description')}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Description"
                                            Required>
                                        </textarea>
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
                    </div>
                </div>
            </div>
            {!!Form::close()!!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
</div>
@endsection