@extends('user.layout.master')
@section('content')
    <style>
        .panel-heading {
            padding: 10px;
            background-color: gainsboro;
            border-radius: 10px;
        }

        .row {
            display: flex;
        }

        .row-cart {
            justify-content: space-evenly;
            padding: 10px;

        }

        .box-left {
            width: 30%;
            height: auto;
        }

        .box-right {
            width: 65%;
            height: auto;
            border: 5px 5px solid gainsboro;
            padding: 10px;
            background-color: gainsboro
        }

        .img-responsive {
            width: 100%;
            height: 100%;
        }

        .btn-cart {
            font-size: 20px;
            background-color: wheat;
            width: 30px;
            padding: 10px;
            margin-right: 2px;
            margin-left: 20px;

        }
    </style>
    <div class="container manage-container" style="margin-top: 10px">
        <div class="form-horizontal manage-body">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Add To Cart</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('AddToCart.store') }}" method="post">
                        @foreach ($art as $i => $detail)
                            @csrf
                            <div class="row row-cart">
                                <div class="box-left">
                                    <img class="img-responsive"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS33qwUA-4fBp6748mOoHU5EGN9IQnB503Nm2jBApIb&s">
                                </div>
                                <div class="box-right">
                                    <div>
                                        <label style="margin-right:20px;"><strong>{{ $i + 1 }}.</strong></label>
                                    </div>
                                    <div>
                                        <label
                                            style="margin-right:20px;"><strong>Name:</strong></label>{{ $detail->products->name }}
                                        <input name="name[]" value="{{ $detail->products->name }}" type="hidden" />
                                    </div>
                                    <div>
                                        <label
                                            style="margin-right:20px;"><strong>Price:</strong></label>{{ $detail->price }}
                                        <input name="price[]" value="{{ $detail->price }}" type="hidden" />

                                    </div>
                                    <div class="row">
                                        <div>
                                            <label style="margin-right:20px;"><strong>Quantity:</strong></label>
                                        </div>
                                        <div class="row">
                                            <div>
                                                <button class="btn-cart" id="less">-</button>
                                            </div>
                                            <div>
                                                <input type="text" id="quantiy" name="quantity[]" class="w3-input"
                                                    style="background-color: gainsboro" value="1" />
                                            </div>
                                            <div>
                                                <button class="btn-cart" id="add">+</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            <button type="submit">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#less").on('click', function() {
            $("#quantity").val(("#quantity").val() - 1);
        });
        $("#add").on('click', function() {
            $("#quantity").val(("#quantity").val() + 1);
        });
    });
</script>
