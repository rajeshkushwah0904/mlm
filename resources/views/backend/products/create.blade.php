@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @include('flash')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New Product Detail</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                {!!Form::open(['files'=>true])!!}
                <?php
$categoriesOp = '';
$subcategoriesOp = '';

foreach ($categories as $category) {
    $categoriesOp = $categoriesOp . '<option value="' . $category->id . '">' . $category->name . '</option>';
    foreach ($category->subcategories as $subcategory) {
        $subcategoriesOp = $subcategoriesOp . '<option value="' . $subcategory->id . '" class="' . $category->id . '">' . $subcategory->name . '</option>';
    }
}
?>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="name" class="col-md-2 control-label">hsn_code</label>
                                <div class="col-md-10">
                                    <input id="hsn_code" type="number" class="form-control" name="hsn_code"
                                        value="{{ old('hsn_code') }}" required autofocus>
                                    @if ($errors->has('hsn_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hsn_code') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="name" class="col-md-2 control-label">product_code</label>
                                <div class="col-md-10">
                                    <input id="product_code" type="number" class="form-control" name="product_code"
                                        value="{{ old('product_code') }}" required autofocus>
                                    @if ($errors->has('product_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="name" class="col-md-2 control-label">serial_no</label>
                                <div class="col-md-10">
                                    <input id="serial_no" type="text" class="form-control" name="serial_no"
                                        value="{{ old('serial_no') }}" required autofocus>
                                    @if ($errors->has('serial_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="mrp" class="col-md-2 control-label">mrp</label>
                                <div class="col-md-10">
                                    <input id="mrp" type="text" class="form-control" name="mrp"
                                        onkeyup="this.value=this.value.replace(/[^0-9.+-]/g, '')"
                                        value="{{ old('mrp') }}" required autofocus>
                                    @if ($errors->has('mrp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mrp') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="distributor_price" class="col-md-2 control-label">Distributor Price</label>
                                <div class="col-md-10">
                                    <input id="distributor_price" type="text" class="form-control"
                                        name="distributor_price"
                                        onkeyup="this.value=this.value.replace(/[^0-9.+-]/g, '')"
                                        value="{{ old('distributor_price') }}" required autofocus>
                                    @if ($errors->has('distributor_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('distributor_price') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <label for="bussiness_volume" class="col-md-2 control-label">Bussiness Volume</label>
                                <div class="col-md-10">
                                    <input id="bussiness_volume" type="text" class="form-control"
                                        name="bussiness_volume"
                                        onkeyup="this.value=this.value.replace(/[^0-9.+-]/g, '')"
                                        value="{{ old('bussiness_volume') }}" required autofocus>
                                    @if ($errors->has('bussiness_volume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bussiness_volume') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="actual_price" class="col-md-2 control-label">Actual Price</label>
                                <div class="col-md-10">
                                    <input id="actual_price" type="text"
                                        onkeyup="this.value=this.value.replace(/[^0-9.+-]/g, '')" class="form-control"
                                        name="actual_price" value="{{ old('actual_price') }}" required autofocus>
                                    @if ($errors->has('actual_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('actual_price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="gst" class="col-md-2 control-label">GST</label>
                                <div class="col-md-10">
                                    <input id="gst" type="text"
                                        onkeyup="this.value=this.value.replace(/[^0-9.+-]/g, '')" class="form-control"
                                        name="gst" value="{{ old('gst') }}" required autofocus>
                                    @if ($errors->has('gst'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gst') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="description" class="col-md-2 control-label">description</label>
                                <div class="col-md-10">
                                    <input id="description" type="text" class="form-control" name="description"
                                        value="{{ old('description') }}" required autofocus>
                                    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="category_id" class="col-md-2 control-label">Category</label>
                                <div class="col-md-10">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        {!!$categoriesOp!!}
                                    </select>
                                    @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label for="subcategory_id" class="col-md-2 control-label">Sub Caregory</label>
                                <div class="col-md-10">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select Category</option>
                                        {!!$subcategoriesOp!!}
                                    </select @if ($errors->has('subcategory_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="image" class="col-md-2 control-label">Image</label>
                                <div class="col-md-10">
                                    <input id="image" type="file" class="form-control" name="image"
                                        value="{{ old('image') }}" required autofocus>
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                                {!!Form::close()!!}
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                    </div>

                </div>

            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection