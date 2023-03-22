<section class="featured-deals bg-light-grey-color-shade py" id="featured-deals">
    <div class="container">
        <div class="section-title text-center">
            <h2>Latest Art</h2>
            <p class="lead">
                Collection of cutting-edge artwork from emerging artists.
            </p>
            <div class="line"></div>
        </div>

        <div class=" feature-product">
            @foreach ($latestPosts as $latest )
            <div class="featured-deals-item " style="padding: 30px;">
                <div class="myimg">
                <img src="{{asset('/uploads'.'/'.$latest->image)}}" />
            </div>

                <div class="info bg-dark text-white">
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">{{$latest->name}}</p>
                        <span class="fw-bold d-block">Rs. {{$latest->price}}</span>
                        <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
