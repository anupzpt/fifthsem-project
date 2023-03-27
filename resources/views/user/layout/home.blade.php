<header class="header bg-light-brown flex" id="home">
    <div class="container">
        <div class="banner">
            <div class="container">
                <h1 class="banner-title">
                    <span>Artihc</span>
                </h1>
                <h1>everything that you want to know about art & design</h1>
                <br />
                @if (Auth::user())
                    <a href="{{ route('home.art') }}" class="btn-header text-white bg-brown">shop now</a>
                @else
                    <a href="{{ route('login') }}" class="btn-header text-white bg-brown">shop now</a>
                @endif
            </div>
        </div>
    </div>
</header>
