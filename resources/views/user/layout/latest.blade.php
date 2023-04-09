<section class="featured-deals bg-light-grey-color-shade py" id="featured-deals">
    <div class="container">
        <div class="section-title text-center">
            <h2>Latest Arts</h2>
            <p class="lead">
                Collection of cutting-edge artwork from emerging artists.
            </p>
            <div class="line"></div>
        </div>

        <div class=" feature-product">
            @foreach ($latestPosts as $latest)
                <div class="featured-deals-item " style="padding: 30px;">
                    <div class="myimg">
                        <img src="{{ asset('/uploads' . '/' . $latest->image) }}" />
                    </div>
                    <div class="info bg-dark text-white">
                        <div class="text-center">
                            <p class="text-capitalize mt-3 mb-1">{{ $latest->name }}</p>
                            <span class="fw-bold d-block">Rs. {{ $latest->price }}</span>
                            <a onClick="buyNow('{{ $latest->id }}')" class="button btn-primary mt-3 ml-2">Buy it
                                Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
    function buyNow($id) {
        if ($("#user_type").val() != 1) {

            $.ajax({
                url: '{{ route('UserOrderList.check') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": $id
                },
                success: function(response) {
                    console.log(response.message);

                    if (response.code == 0) {
                        var orderId = response.message;
                        window.location.href = "{{ route('UserOrderList.show', ':id') }}".replace(':id',
                            orderId);
                    }

                    if (response.code == 1) {
                        toastr.error(response.message)
                    }
                    if (response.code == 101) {
                        window.location.href = "{{ route('login') }}";
                    }
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        } else {
            toastr.error("Try Login as a user", "Sorry,Not Authorized!!");
        }
    }
    $(document).ready(function() {

        $(".cart").click(function() {
            // debugger

        });
    });
</script>
