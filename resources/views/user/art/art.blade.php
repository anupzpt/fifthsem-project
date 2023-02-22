@extends('user.layout.master')
@section('content')
    <section class="design" id="design">
        <link href="toastr.css" rel="stylesheet"/>
        <div class="container">
            <div class="title">
                <h1>Arts & Designs</h1>
                <div class="line"></div>
                <!-- made change here  -->
                <div class="toggler-and-category bg-brown text-white flex" style="margin-left: 40%; margin-top: 1%">
                    <div class="category-list">
                        <span>Category</span>
                        <button type="button" class="btn category-toggler-btn text-white">
                            <i class="fas fa-circle-arrow-down"></i>
                        </button>
                    </div>
                    <ul id="category-list-items" class="bg-white" style="z-index: 1" class="bg-white">
                        @foreach ($parent as $item1)
                            <li style="background-color: #4a4a4e"><a href="{{route('home.category',[$item1->categoryId])}}">{{ $item1->name }}</a></li>
                            @foreach ($child as $item2)
                                @if ($item2->parent_id == $item1->categoryId)
                                    <li><a href="{{route('home.child',$item2->categoryId)}}">{{ $item2->name }}</a></li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="design-content">
                <!-- item -->
                @foreach ($products as $product)
                    <div class="design-item">
                        <div class="design-img">
                            <img src="{{ asset('/uploads' . '/' . $product->image) }}" alt="" />
                        </div>
                        <div class="text-center">
                            <div class="text-capitalize mt-3 mb-1">{{ $product->name }}</div>
                            <span class="fw-bold d-block">RS. {{ $product->price }}</span>
                            <button id="cart" class="button btn-primary mt-3 cart"
                                onClick="set('{{ $product->id }}')">Add to Cart</button>

                            <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end of item -->
        </div>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    {{-- <script src="toastr.js"></script> --}}
<script>
    function set($id) {
        debugger
        $.ajax({
            url: '{{ route('home.cart') }}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $id

            },
            success: function(response) {
                console.log(response.message);
                if(response.code == 0) {
                    $(".cartCount").text("")
                    $(".cartCount").text(response.count);
                }
                if(response.code==1){
                    alert(response.message)
                    // toastr.info('Are you the 6 fingered man?')
                }
            },
            error: function(xhr) {
                alert(xhr.responseText);
            }
        });
    }
    $(document).ready(function() {

        $(".cart").click(function() {
            // debugger

        });
    });
</script>
