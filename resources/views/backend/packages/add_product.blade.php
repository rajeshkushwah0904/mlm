<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Product</label>
            <select class="custom-select" name="product_id[]" Required>
                <option value="">Select Product</option>
                @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" name="qty[]" class="form-control" value="{{old('qty')}}" id="exampleInputEmail1"
                placeholder="Enter Qty Rate" Required>
        </div>
    </div>
</div>