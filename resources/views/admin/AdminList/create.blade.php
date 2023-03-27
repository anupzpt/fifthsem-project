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
            <div class="full graph_head center" style="background-color:  #214162">
                <div class="heading1 margin_0 text-white">
                    <h2>Add Admin</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <form action="{{ route('AdminList.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Admin Name</label>
                                <input type="text" name="name" class="form-control  mt-1"
                                    placeholder="Enter Admin Name">
                            </div>

                            <div class="form-group">
                                <label for=""> Email</label>
                                <input type="text" class="form-control  mt-1" name="email" placeholder="Enter Email of Admin">
                            </input>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control  mt-1"
                                    placeholder="Enter Address of Admin">
                            </div>
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input type="text" name="contact" class="form-control  mt-1"
                                    placeholder="Enter Contact Number of Admin">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control  mt-1"
                                    placeholder="Set Password for Admin">
                            </div>
                            <div class="form-group d-none">
                                <label for="">Password</label>
                                <input type="hidden" name="user_type" value="1" class="form-control  mt-1"
                                    placeholder="Set Password for Admin">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" name='img_path' id="formFile"
                                    onchange="loadFile(event)" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <img id="output" width="400" height="350" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/User_font_awesome.svg/2048px-User_font_awesome.svg.png">
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
