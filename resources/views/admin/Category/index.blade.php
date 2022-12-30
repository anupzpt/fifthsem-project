@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12  ">
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
                                <th>IsParent</th>
                                <th>ParentName</th>
                                <th>Status</th>
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
                                        @if ($item->isParent == 1)
                                            <h5><span class="badge  badge-pill badge-info text-white">Yes</span></h5>
                                        @else
                                            <h5><span class="badge  badge-pill bg-danger text-white">No</span></h5>
                                        @endif
                                    </td>

                                    <td>
                                        @if($item->parentName != null)
                                        <h5><span class="badge  badge-pill badge-info text-white">{{$item->parentName}}</span></h5>
                                        @else
                                        <h5><span class="badge  badge-pill badge-info text-white"></span></h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 'A')
                                            <h5><span class="badge badge-pill  bg-success text-white">Active</span></h5>
                                        @else
                                            <h5><span class="badge  badge-pill bg-danger text-white">Inactive</span></h5>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('Category.edit', [$item->categoryId]) }}" class="ml-5 mt-1"><i
                                                class="fa-solid fa-pen "></i></a>
                                        {{-- <a href="{{route('Category.edit',[$item->categoryId])}}" class="btn btn-primary">Edit</a> --}}
                                        {{-- @if($item->isParent == 0)
                                        <a href="" class="fa-solid fa-trash-can ml-4  mt-1 btn-delete"></a>
                                        @else
                                        <a href="" class=" ">Status</a>
                                        @endif --}}
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
