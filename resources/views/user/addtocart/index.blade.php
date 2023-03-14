@extends('user.layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .back {
            position: fixed;
            left: 650px;
            top: 280px;

        }

        .panel-heading {
            padding: 20px 0;
            background-color: gainsboro;
            text-align: center;
            box-shadow: -6px 10px 10px -6px rgba(0, 0, 0, 0.5);
        }

        .panel-body {
            padding: 10px 0;
        }

        .row {
            display: flex;
        }

        .row-cart {
            justify-content: space-around;
            padding: 20px 0;
        }

        .box-left {
            width: 30%;
            height: auto;
            box-shadow: 5px 5px 5px -6px rgba(0, 0, 0, 0.5);
        }

        .box-right {
            width: 65%;
            height: auto;
            padding: 20px 10px;
            box-shadow: 10px 10px 15px -6px rgba(0, 0, 0, 0.5);
        }

        .img-responsive {
            width: 100%;
            height: 100%;
            box-shadow: 10px 10px 15px -6px rgba(0, 0, 0, 0.5);
        }

        .btn-cart {
            font-size: 20px;
            background-color: wheat;
            width: 30px;
            padding: 10px;
            margin-right: 2px;
            margin-left: 20px;
        }

        .remove {
            margin: 3px 0;
            float: right;
        }

        .remove-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
        }

        .total {
            margin-top: 20px;
            margin-left: 107rem;
            padding: 10px 0;
            font-size: 25px;
            border-bottom-style: dotted;
            border-color: #b1aeae;
            /* box-shadow: 1px 6px 1px -5px rgba(0, 0, 0, 0.5); */
        }

        .order {
            margin: 10px 15px;
            padding: 10px 0;
            float: right;
        }

        .order-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
        }

        .empty {
            text-align: center;
            margin-top: 40px;
        }
    </style>

    <div class="container-fluid">
        <div class="panel-heading">
            <h2>Your Cart</h2>
        </div>
        <div class="panel-body">
            @if ($art->count() > 0)
                <div class="content">
                    @foreach ($art as $i => $detail)
                        <div class="row row-cart cartpage ">
                            <div class="box-left ">
                                <img class="img-responsive" src="{{ asset('/uploads' . '/' . $detail->products->image) }}">
                                {{-- src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS33qwUA-4fBp6748mOoHU5EGN9IQnB503Nm2jBApIb&s"> --}}
                            </div>
                            <div class="box-right">
                                <div>
                                    <input type="hidden" class="cartId" name="id[]" value={{ $detail->id }}>

                                </div>
                                <div>
                                    <label style="margin-right:20px;"><strong>{{ $i + 1 }}.</strong></label>
                                    <input type="hidden" class="productId" name="productId[]"
                                        value={{ $detail->productId }}>
                                </div>
                                <div>
                                    <label
                                        style="margin-right:20px;"><strong>Name:</strong></label>{{ $detail->products->name }}
                                    <input name="name[]" value="{{ $detail->products->name }}" type="hidden" />
                                </div>
                                <div>
                                    <label style="margin-right:20px;"><strong>Price:</strong></label>{{ $detail->price }}
                                    <input name="price[]" value="{{ $detail->price }}" type="hidden" />

                                </div>
                                <div>
                                    <label
                                        style="margin-right:20px;"><strong>Description:</strong></label>{{ $detail->products->description }}
                                    <input name="description[]" value="{{ $detail->products->description }}"
                                        type="hidden" />

                                </div>
                                <div class="row">
                                    <div>
                                        <label
                                            style="margin-right:20px;"><strong>Quantity:</strong></label>{{ $detail->quantity }}
                                        <input name="quantity[]" value="{{ $detail->products->description }}"
                                            type="hidden" />

                                    </div>

                                </div>
                                <div>
                                    <label style="margin-right:20px;"><strong>Total
                                            Price: </strong></label>Rs. {{ $detail->price * $detail->quantity }}
                                    <input name="total" class="Totalprice"
                                        value="{{ $detail->price * $detail->quantity }}" type="hidden" />

                                </div>
                                <div class="remove">
                                    <a class="remove-button btn btn-danger delete_cart_data " id="cart"
                                        data-id="{{ $detail->id }}"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <div>
                            <h4 style="margin-right:20px;" class="total"> Total Price: Rs.<span
                                    id="totalsum">{{ $total }}</span></h4>
                        </div>

                    </div>

                    <div class="order" style="margin-bottom: 10%">
                        <a class="btn order-btn" id="btnCart" type="submit">Place Order</a>
                    </div>
                </div>
            @else
                <div class="empty">
                    <h2>Your Cart is empty</h2>
                </div>
                <div class="order">
                    <a href="{{ route('home.art') }}" class="btn order-btn back" type="submit">Back</a>
                </div>
            @endif
            <div class="main-empty">
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
{{-- <script src="toastr.js"></script> --}}
<script>
    $(document).ready(function() {
        $("#btnCart").on('click', function() {
            $.ajax({
                url: '{{ route('Order.index') }}',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.code == '0') {
                        window.location.href = '{{ route('UserOrderList.index') }}';
                    } else {
                        toastr.error("Sorry," + response.message + " Already Sold.")
                    }
                }
            });
        })
        $('.delete_cart_data').click(function(e) {
            e.preventDefault();
            var productId = $(this).closest(".cartpage").find('.productId').val();
            var price = $(this).closest(".cartpage").find('.Totalprice').val();
            var data = $(this).closest(".cartpage").remove();;

            // alert(productId);
            var data = {
                '_token': "{{ csrf_token() }}",
                "productId": productId,
            };

            $.ajax({
                url: '/delete-from-cart',
                type: 'DELETE',
                data: data,
                success: function(response) {
                    var totalsum = parseInt($("#totalsum").text())
                    var count = parseInt($('.cartCount').text());
                    $(".cartCount").text(count - 1);
                    debugger
                    if (count - 1 == 0) {
                        $('.content').remove();
                        $('.main-empty').append(
                            '<div class="empty"><h2>Your Cart is empty</h2></div><div class="order"><a href="{{ route('home.art') }}" class="btn order-btn" type="submit">Back</a></div>'
                        );
                    }
                    $("#totalsum").text(totalsum - parseInt(price));
                    swal("", response.status, "success");

                }
            });
        });

    });
</script>
