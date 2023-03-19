<section class="category py bg-light-brown" id="category">
    <div class="container">
        <div class="section-title text-center">
            <h2>Popular Art</h2>
            <div class="line"></div>
        </div>

        <div class="category-content grid">
            @foreach ($popularProducts as $item)
                <div class="category-item">
                    <img src="userpanel/images/category_img_2.png" />
                    <div class="category-badge bg-white text-white flex">
                        {{$item->name}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
