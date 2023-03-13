@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12 margin_top_30 ">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">

            <a class="btn btns btn-primary p-3 " href="{{ route('Product.index') }}" type="button">Back</a>
        </div>
        <div class="white_shd full margin_bottom_30 border ">
            <div class="full graph_head center" style="background-color: #214162">
                <div class="heading1 margin_0 text-white">
                    <h2>Add Category</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <form action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control  mt-1"
                                    placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label for="select">Select Product Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($response as $value)
                                        <option value="{{ $value->categoryId }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Product Detail</label>
                                <textarea class="form-control  mt-1" name="description" placeholder="Enter Detail of Product">
                            </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Product Price</label>
                                <input type="text" name="price" class="form-control  mt-1"
                                    placeholder="Enter Price of Product">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" name='image' id="formFile"
                                    onchange="loadFile(event)" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img id="output" width="400" height="350" src="https://booster.io/wp-content/uploads/product-add-to-cart-e1438362099361.png">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary custom-button " type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
