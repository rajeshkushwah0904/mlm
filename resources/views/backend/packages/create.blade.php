@extends('backend.theme.formtheme')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Package Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Package Information</li>
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
                    <h3 class="card-title">Add New Package Information</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!!Form::open(['files'=>true,'class'=>'form-horizontal'])!!}
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Package Name</label>
                                <input type="text" name="package_name" value="{{old('package_name')}}"
                                    class="form-control" id="exampleInputEmail1" placeholder="Package Name" Required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="number" name="amount" class="form-control" value="{{old('amount')}}"
                                    id="exampleInputEmail1" placeholder="Enter Amount" Required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sponsor Income</label>
                                <input type="text" name="sponsor_income" class="form-control"
                                    value="{{old('sponsor_income')}}" id="exampleInputEmail1"
                                    placeholder="Enter Sponsor Income" Required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product/Service</label>
                                <input type="text" name="service_name[]" class="form-control"
                                    value="{{old('service_name')}}" id="exampleInputEmail1"
                                    placeholder="Enter Product/Service Name" Required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" name="price[]" class="form-control" value="{{old('price')}}"
                                    id="exampleInputEmail1" placeholder="Enter Price" Required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">HSN/ SAC Code</label>
                                <input type="number" name="hsn_sac[]" class="form-control" value="{{old('hsn_sac')}}"
                                    id="exampleInputEmail1" placeholder="Enter HSN/ SAC Code" Required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">GST Slab</label>
                                <select class="custom-select" name="gst_rate[]" Required>
                                    <option value="">Select GST Slab Rate</option>
                                    <option value="0">0 %</option>
                                    <option value="5">5 %</option>
                                    <option value="12">12 %</option>
                                    <option value="18">18 %</option>
                                    <option value="28">28 %</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="appnd-result"></div>
                    <a href="javascript:void(0);" class="btn btn-sm btn-info" onclick="add_product()">+ Add
                        product</a>
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
<script>
function add_product() {
    var status = 1;
    $.ajax({
        url: "{{route('backend.packages.add_product')}}",
        data: {
            status: status
        },
        type: "GET",
        success: function(data) {
            $('.appnd-result').append(data);
        }
    });

}
</script>
@endsection