@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12  ">
        {{-- @if (session('status'))
    <h6 class="alert alert-success">{{session('status')}}</h6>
    @endif --}}
        <div class="margin_top_30 padding-bottom_2 d-flex justify-content-end ">
        {{-- <a class="btn btns btn-primary p-3 " href="{{ route('Product.create') }}" type="button">Add Prdouct</a> --}}
    </div>
        <div class="dark_shd full margin_bottom_30 border ">
            <div class="full graph_head center" style="background-color: #214162">
                <div class="heading1 margin_0 text-white">
                    <h2>Order Table</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>User Name</th>
                                <th>Quantity</th>
                                <th>Price<th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1;
                            @endphp
                            @foreach ($art as $item)
                                <tr>

                                    <td>{{ $sn++ }}</td>
                                    <td>{{$item->Product->name}}</td>
                                    <td>{{ $item->login->name }}</td>
                                    <td>{{ $item->quantity }} </td>
                                    <td>{{ $item->price }}</td>
                                    <td></td>
                                    <td>{{ $item->payment_status }}</td>
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
