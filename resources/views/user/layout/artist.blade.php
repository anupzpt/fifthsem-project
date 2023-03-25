<section class="teachers py-4 bg-white-sm" id="artist">
    <div class="container-art">
        <div class="section-title">
            <h2>Our Artist</h2>
            <div class="line"></div>
        </div>
        <div class="teachers-content grid text-center">

        @foreach($artists as $artist)
            <div class="teachers-item">
                <div class="image">
                    <img src="{{$artist->img_path}}" alt="teachers image" />
                </div>
                <div class="info">
                    <p class="fw-6 font-lg">{{$artist->name}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
