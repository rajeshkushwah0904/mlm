<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Product/Service</label>
            <input type="text" name="service_name[]" class="form-control" value="{{old('service_name')}}"
                id="exampleInputEmail1" placeholder="Enter Product/Service Name" Required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" name="price[]" class="form-control" value="{{old('price')}}" id="exampleInputEmail1"
                placeholder="Enter Price" Required>
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