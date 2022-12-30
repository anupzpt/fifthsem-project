@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12  ">
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
                <form action="{{ route('Product.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="ProductName" class="form-control  mt-1"
                                    placeholder="Enter Product Name">
                            </div>
                            <div class="form-group">
                                <label for="select">Select Product Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="" >Select Category</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Product Detail</label>
                                <input type="text" class="form-control  mt-1" name="ProductDetail"
                                    placeholder="Enter Detail of Product">
                            </div>
                            <div class="form-group">
                                <label for="">Product Price</label>
                                <input type="text" name="ProductPrice" class="form-control  mt-1"
                                    placeholder="Enter Price of Product">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="rounded float-end"  >
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
@endsection
