@extends('user.layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
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
    </style>

    <div class="container-fluid">
        <div class="panel-heading">
            <h2>Your Cart</h2>
        </div>
        <div class="panel-body">
            <form action="{{ route('AddToCart.store') }}" method="post">
                @foreach ($art as $i => $detail)
                    @csrf
                    <div class="row row-cart cartpage ">
                        <div class="box-left ">
                            <img class="img-responsive" src="{{ asset('/uploads' . '/' . $detail->products->image) }}">
                            {{-- src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS33qwUA-4fBp6748mOoHU5EGN9IQnB503Nm2jBApIb&s"> --}}
                        </div>
                        <div class="box-right">
                            <div>
                                <label style="margin-right:20px;"><strong>{{ $i + 1 }}.</strong></label>
                                <input type="hidden" class="productId" value={{ $detail->productId }}>
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
                                <input name="description[]" value="{{ $detail->products->description }}" type="hidden" />

                            </div>
                            <div class="row">
                                <div>
                                    <label
                                        style="margin-right:20px;"><strong>Quantity:</strong></label>{{ $detail->quantity }}
                                </div>
                                <div class="row">
                                    {{-- <div>
                                        <button class="btn-cart" id="less">-</button>
                                        <button class="btn-cart input-group-text decrement-btn changeQuantity">-</button>
                                    </div> --}}
                                    {{-- <div>
                                        <input type="text" id="quantity" name="quantity" class="w3-input"
                                            style="background-color: gainsboro" value='1' />
                                    </div> --}}
                                    {{-- <div>
                                        <button class="btn-cart input-group-text increment-btn changeQuantity">+</button>
                                    </div> --}}
                                </div>

                            </div>
                            <div>
                                <label style="margin-right:20px;"><strong>Total
                                        Price: </strong></label>Rs. {{ $detail->price * $detail->quantity }}
                            </div>
                            <div class="remove">
                                <a class="remove-button delete_cart_data " id="cart" data-id="{{ $detail->id }}"><i
                                        class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    <div>
                        <h4 style="margin-right:20px;" class="total">Total Price: Rs. {{ $total }}</h4>
                    </div>

                </div>

                <div class="order">
                    <button class="order-btn" type="submit">Place Order</button>
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

        $('.delete_cart_data').click(function(e) {
            e.preventDefault();
            var productId = $(this).closest(".cartpage").find('.productId').val();
            var data = {
                '_token': $('input[name=_token]').val(),
                "productId": productId,
            };

            // $(this).closest(".cartpage").remove();

            $.ajax({
                url: '/delete-from-cart',
                type: 'DELETE',
                data: data,
                success: function(response) {
                    window.location.reload();
                }
            });
        });

    });
</script>
