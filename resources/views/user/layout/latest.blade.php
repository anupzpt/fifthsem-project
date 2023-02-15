<section class="featured-deals bg-light-grey-color-shade py" id="featured-deals">
    <div class="container">
        <div class="section-title text-center">
            <h2>Latest Art</h2>
            <p class="lead">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            </p>
            <div class="line"></div>
        </div>

        <div class=" feature-product">
            @foreach ($latestPosts as $latest )
            <div class="featured-deals-item teachers-item" style="padding: 30px;">
                <img src="{{asset('/uploads'.'/'.$latest->image)}}" />
                <div class="info bg-dark text-white">
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">{{$latest->name}}</p>
                        <span class="fw-bold d-block">$ 45.50</span>
                        <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
