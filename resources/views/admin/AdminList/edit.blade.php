@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12 margin_top_30 ">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">

            <a class="btn btns btn-primary p-3 " href="{{ route('AdminList.index') }}" type="button">Back</a>
        </div>
        <div class="white_shd full margin_bottom_30 border ">
            <div class="full graph_head center" style="background-color: #2E8B57">
                <div class="heading1 margin_0 text-white">
                    <h2>Edit</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <form action="{{ route('AdminList.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Admin Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control  mt-1"
                                    placeholder="Enter Admin Name">
                            </div>
                          
                            <div class="form-group">
                                <label for="">Admin Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control  mt-1"
                                    placeholder="Enter Admin email">
                            </div>
                            <div class="form-group">
                                <label for="">Admin Contact Number</label>
                                <input type="text" name="contact" value="{{$user->contact}}" class="form-control  mt-1"
                                    placeholder="Enter Admin Number">
                            </div>
                            <div class="form-group">
                                <label for="">Admin Address</label>
                                <input type="text" name="address" value="{{$user->address}}" class="form-control  mt-1"
                                    placeholder="Enter Admin Number">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" name='img_path'  id="formFile"
                                    onchange="loadFile(event)" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img id="output" width="400" height="350" src="{{$user->img_path}}">

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
