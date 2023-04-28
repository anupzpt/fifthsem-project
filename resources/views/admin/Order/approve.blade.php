@extends('admin.layouts.master')
@section('content')
    <section class="section-forms">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table  table-condensed">
                            <thead>
                                <tr>
                                    <th colspan=2>
                                        <h4>User Information Details</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><Strong>Customer Name :</Strong></td>
                                    <td>{{$userDetail->name}}</td>
                                </tr>
                                <tr>
                                    <td><Strong>Email :</Strong></td>
                                    <td>{{$userDetail->email}}</td>
                                </tr>
                                <tr>
                                    <td><Strong>Contact Number :</Strong></td>
                                    <td>{{$userDetail->contact}}</td>
                                </tr>
                                {{-- <tr>
                                    <td><Strong>Address : </Strong></td>
                                    <td>{{$userDetail->address}}</td>
                                </tr> --}}
                                <tr>
                                    <td><strong>Delivery Address :</strong></td>
                                    <td>{{$order->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div style="width:80%;height:100%;margin-top:30px;margin-left:60px">
                            {{-- <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80"
                                width="100%" height="100%" /> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table  table-condensed">
                            <thead>
                                <tr>
                                    <th colspan=2>
                                        <h4>Product Detail List</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>SN</strong></td>
                                    {{-- <td><strong>Image</strong></td> --}}
                                    <td><strong>Product Name</strong></td>
                                    <td><strong>Quantity</strong></td>
                                    <td><strong>Price</strong></td>
                                </tr>
                                @php
                                    $sn = 1;
                                @endphp
                                @foreach ($orderDetail as $item)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        {{-- <td><img class="image-responsive" src="{{ asset('/uploads' . '/' . $item->image) }}">
                                        </td> --}}
                                        <td>
                                            {{ $item->name }}
                                            <input type="hidden" name="productId" value="{{ $item->productId }}" />
                                        </td>
                                        <td>
                                            1
                                            <input type="hidden" name="quantity" value="1" />

                                        </td>
                                        <td>
                                            {{ $item->price }}
                                            <input type="hidden" name="price" value="{{ $item->price }}" />

                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td></td>
                                    <td></td>
                                    {{-- <td></td> --}}
                                    <td><strong>{{$total}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="post" action="{{route('orders.approveDetail')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Remarks<span class="text-danger">*</span></label>
                                <textarea name="Remarks" class="form-control" required></textarea>
                                <span id="Remarks_jserror"></span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <input type="hidden" name="OrderCode" value={{$order->OrderCode}}>
                    <input type="hidden" name="Status" id="status">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button id="btnApproveDetail" class="btn btn-primary" onclick="changeStatus('Approved')">
                                    Approve
                                </button>
                                <button id="btnRejectDetail" class="btn btn-danger" onclick="changeStatus('Rejected')">
                                    Reject
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<script>
    function changeStatus(status) {
        document.getElementById('status').value = status;
    }
</script>


