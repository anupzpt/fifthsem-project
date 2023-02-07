@extends('admin.layouts.master')
@section('content')
<div class="col-md-12  ">
    @if(session('status'))
    <h6 class="alert alert-success">{{session('status')}}</h6>
    @endif
    <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
        <a class="btn btns btn-primary p-3 " href="{{ route('Product.create') }}" type="button">Add Prdouct</a>
    </div>
    <div class="dark_shd full margin_bottom_30 border ">
       <div class="full graph_head center" style="background-color: #214162">
          <div class="heading1 margin_0 text-white">
             <h2 >Product Table</h2>
          </div>
       </div>
       <div class="table_section padding_infor_info">
          <div class="table-responsive-sm">
             <table class="table ">
                <thead>
                   <tr>
                      <th>Product Name</th>
                      <th>Category Name</th>
                      <th>Price<th>
                      <th>Image</th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                    @php
                        $sn = 1;
                    @endphp
                    {{-- @foreach ($product as $item)
                        <tr>
                            <td>{{ $sn++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->image }}</td>
                            <td>
                                <a href="{{ route('Category.edit', [$item->categoryId]) }}" class="ml-5 mt-1"><i
                                        class="fa-solid fa-pen "></i></a>
                            <td>
                        </tr>
                    @endforeach --}}
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection
