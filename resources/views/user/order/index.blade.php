@extends('user.layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('userpanel/css/custom-css.css') }}" />


    <div class="container-main">
        <div class="sub-container">
            <div class="head-bar">
                <h2>Your Order</h2>
            </div>
            <form action="{{ route('UserOrderList.orderstore') }}" method="POST">
                @csrf
                <div class="contains ">
                    <div class="arthic-image">
                        <img src="{{ asset('userpanel/images/logo-black.png') }}" alt="">
                    </div>
                    <div class="time">
                        <h2>Date:{{ date('Y/m/d') }}</h2>
                    </div>
                </div>
                <div class="line"></div>
                <div class="row">
                    <div class="col-75">
                        <div class="container">
                            <form action="/action_page.php">

                                <div class="row row-order">
                                    <div class="col-50" style="margin-left:-7%">
                                        <h3 style="margin-bottom: 5px;">Billing Address</h3>
                                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                        <input type="text" id="fname"  placeholder="Enter Name"
                                            value="{{ Auth::user()->name }}" readonly>
                                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" placeholder="Enter Email Address"
                                            value="{{ Auth::user()->email }}" readonly>
                                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                        <div>
                                            <select id="dynamic-address">
                                                <option value="">Select Address</option>
                                                @if (Auth::user()->address != null)
                                                    <option
                                                        value="{{ Auth::user()->address }},{{ Auth::user()->city }},{{ Auth::user()->zip_code }}"
                                                        selected>
                                                        {{ Auth::user()->address }}{{ Auth::user()->city }}{{ Auth::user()->zip_code }}
                                                    </option>
                                                @endif
                                                @foreach ($userAddress as $address)
                                                    <option
                                                        value="{{ $address->Address }},{{ $address->city }},{{ $address->zip_code }}">
                                                        {{ $address->Address }},{{ $address->city }},{{ $address->zip_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="line"></div>
                                        <div>
                                            <a class="address btn" id="myBtn"> + New Address</a>
                                        </div>
                                    </div>
                                    <div class="col-50" style="margin-right:-7% ">
                                        <div class="container">
                                            @if ($detail != null)
                                                <h4>Cart <span class="price" style="color:black"><i
                                                            class="fa fa-shopping-cart"></i>
                                                        <b>{{ $count }}</b></span></h4>
                                                <div class="line"></div>
                                            @endif
                                            <table id="table-design">
                                                <thead>
                                                    <tr>
                                                        <th>SN</th>
                                                        <th></th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $sn = 1;
                                                    @endphp
                                                    @if ($detail != null)
                                                        @foreach ($detail as $item)
                                                            <tr>
                                                                <td>{{ $sn++ }}</td>
                                                                <td><img class="image-responsive"
                                                                        src="{{asset('/uploads'.'/'.$item->products->image)}}">
                                                                </td>
                                                                <td>
                                                                    {{ $item->products->name }}
                                                                    <input type="hidden" name="productId[]"
                                                                        value="{{ $item->productId }}" />
                                                                </td>
                                                                <td>
                                                                    {{ $item->quantity }}
                                                                    <input type="hidden" name="quantity[]"
                                                                        value="{{ $item->quantity }}" />

                                                                </td>
                                                                <td>
                                                                    {{ $item->price }}
                                                                    <input type="hidden" name="price[]"
                                                                        value="{{ $item->price }}" />

                                                                </td>
                                                                <input type="hidden" name="address[]"
                                                                    class="insert-address" />
                                                                <input type="hidden" name="userId[]"
                                                                    value="{{ Auth::id() }}" />
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        @foreach ($orderDetail as $item)
                                                            <tr>
                                                                <td>{{ $sn++ }}</td>
                                                                <td><img class="image-responsive"
                                                                    src="{{asset('/uploads'.'/'.$item->image)}}">
                                                                </td>
                                                                <td>
                                                                    {{ $item->name }}
                                                                    <input type="hidden" name="productId[]"
                                                                        value="{{ $item->productId }}" />
                                                                </td>
                                                                <td>
                                                                    1
                                                                    <input type="hidden" name="quantity[]"
                                                                        value="1" />

                                                                </td>
                                                                <td>
                                                                    {{ $item->price }}
                                                                    <input type="hidden" name="price[]"
                                                                        value="{{ $item->price }}" />

                                                                </td>
                                                                <input type="hidden" name="address[]"
                                                                    class="insert-address" />
                                                                <input type="hidden" name="userId[]"
                                                                    value="{{ Auth::id() }}" />
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                            <div class="line"></div>
                                            <p>Total <span class="price"
                                                    style="color:black"><b>Rs.{{ $total }}</b></span></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="line"></div>
                                <button type="submit" class="order-btn btn" style="float: right">Continue</button>
                            </form>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="Address-Heading">
                <strong>New Address Detail</strong>
            </div>
            <div class="line"></div>
            <div class="Address-Detail">
                <input type="text" id="newAddress" style="width:30%" name="Address"
                    placeholder="Enter New address" />
                <input type="text" id="city" name="city" style="width:30%" placeholder="Enter City Name" />
                <input type="text" id="zipcode" name="zipcode" style="width:30%" placeholder="Enter Zip Code" />
                <input type="hidden" value="{{ Auth::id() }}" id="userId" />
            </div>
            <div class="line"></div>
            <div class="Address-footer">
                <button class="btn order-btn" id="Addaddress">Continue</button>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
{{-- <script src="toastr.js"></script> --}}
<script>
    $(document).ready(function() {
        $("#myBtn").on('click', function() {
            $("#myModal").show();
        });
        $(".close").on('click', function() {
            $("#myModal").hide();
        });

        $("#Addaddress").on('click', function() {
            var address = $("#newAddress").val();
            var city = $("#city").val();
            var zipcode = $("#zipcode").val();
            var userId = $("#userId").val();
            $.ajax({
                url: '{{ route('UserOrderList.store') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "Address": address,
                    "userId": userId,
                    "city": city,
                    "zip_code": zipcode,
                },
                success: function(response) {
                    var data = response.Address + ',' + response.City + ',' + response
                        .ZipCode;
                    $('#dynamic-address').append(
                        '<div class="dynamic-address" ><input type="checkbox" class="address-checkbox" value=' +
                        data + ' />' +
                        response.Address + ', ' + response.City + ', ' + response
                        .ZipCode + '</div>');
                    var selectElement = $('#dynamic-address');
                    var newOption = $('<option>');
                    newOption.text(data);
                    newOption.val(data);
                    selectElement.append(newOption);
                    $("#myModal").hide();
                },
            });
        })

        $('.address-checkbox').on('click', function() {
            alert();
        });
        $(".order-btn").on('click', function() {
            var address = $("#dynamic-address").val();
            $(".insert-address").val(address);
        });

    });
</script>
