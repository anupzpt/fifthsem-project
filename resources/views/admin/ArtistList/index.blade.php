@extends('admin.layouts.master')
@section('content')
<div class="col-md-12">
<div class="margin_top_30 padding-bottom_2 d-flex justify-content-end">
    </div>
    <div class="margin_top_10 padding-bottom_2 d-flex justify-content-end ">
        <a class="btn btns btn-primary p-3" href="{{ route('artistRequest') }}" type="button">Artist Requests</a>

    </div>
   <div class="dark_shd full margin_bottom_30 border ">
    <div class="full graph_head  center" style="background:  #ff5722;">
        <div class="heading1 margin_0 text-white">
            <h2>Artist Table</h2>
        </div>
    </div>
    <div class="table_section padding_infor_info">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Artist Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sn = 1;
                    @endphp
                    @foreach($list as $item)
                    <tr>
                        <td>{{ $sn++}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->address}}</td>
                        <td>
                            <img src="{{ $item->img_path}}" width="70px" height="70px" alt="image">
                        </td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
   </div>
</div>
@endsection
