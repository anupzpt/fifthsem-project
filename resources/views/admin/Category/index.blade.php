@extends('admin.layouts.master')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="col-md-12">

        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
            <a class="btn btns btn-primary p-3 " href="{{ route('Category.create') }}" type="button">Add Category</a>
        </div>
        <div class="dark_shd full margin_bottom_30 border ">
            <div class="full graph_head  center" style="background-color: #ff5722">
                <div class="heading1 margin_0 text-white">
                    <h2>Category Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>

                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Parent Name</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($response as $item)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->parent_id == null)
                                            <h5><span class="badge  badge-pill bg-success text-white">Y</span></h5>
                                        @else
                                            <h5><span class="badge  badge-pill bg-danger text-white">N</span></h5>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->parent_id != null)
                                            <h5><span
                                                    class="badge  badge-pill badge-secondary text-white">{{ $item->parent->name }}</span>
                                            </h5>
                                        @else
                                            <h5><span class="badge  badge-pill badge-info text-white"></span></h5>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary"> <a
                                                href="{{ route('Category.edit', [$item->categoryId]) }}"
                                                class="text-white"><span class="fas fa-pencil "></a></button>
                                        <button type="button" class="btn btn-danger deleteCategoryBtn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            value="{{ $item->categoryId }}"><span class="fas fa-trash "></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deleting this Category will automatically delete all the related products !!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route('category.deletecategory') }}">
                        @csrf
                        <input type="hidden" id="deleteId" name="id">
                        <button type="submit" class="btn btn-danger deletebtn">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteCategoryBtn', function() {
                debugger;
                $("#deleteId").val($(this).val());
                if ($(this).val() == '') {
                    $(".deletebtn").hide();
                } else {
                    $(".deletebtn").show();
                }
            });
        });
    </script>
@endsection
