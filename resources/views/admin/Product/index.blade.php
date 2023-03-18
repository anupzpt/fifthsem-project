@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12  ">
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end">
            @if (session('status'))
                <h3 class="alert alert-success">{{ session('status') }}</h3>
            @endif
        </div>
        <div class="margin_top_10 padding-bottom_2 d-flex justify-content-end ">

            <a class="btn btns btn-primary p-3 " href="{{ route('Product.create') }}" type="button">Add Product</a>
        </div>
        <div class="dark_shd full margin_bottom_30 border ">
            <div class="full graph_head center" style="background-color: #214162">
                <div class="heading1 margin_0 text-white">
                    <h2>Product Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>SN</th>

                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Price
                                <th>
                                <th> Image</th>
                                <th></th>
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
                                    <td>{{ $item->Categoryname }} </td>
                                    <td>{{ $item->price }}</td>
                                    <td></td>
                                    <td>
                                        <img src="{{ asset('/uploads' . '/' . $item->image) }}" width="70px" height="70px"
                                            alt="image">
                                    </td>
                                    <td></td>

                                    <td>
                                        <button class="btn btn-primary"><a href="{{ route('Product.edit', [$item->id]) }}"
                                                class="text-white"><span class="fas fa-pencil "></a></button>
                                    <td>
                                        <form action="{{ route('Product.destroy', [$item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" data-bs-target="#exampleModal"><span
                                                    class="fas fa-trash "></a></button>
                                        </form>
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
