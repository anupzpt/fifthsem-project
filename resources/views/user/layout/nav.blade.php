 <!-- navbar -->
 <nav class="navbar bg-brown flex">
    <div class="container flex">
        <div class="toggler-and-category bg-brown text-white flex">
            <button type="button" id="bars" class="btn navbar-show-btn text-white">
                <i class="fas fa-bars"></i>
            </button>
            <img src="userpanel/images/logo-white.png" alt="img" style="height: 7rem; width: 13rem" />

            <!-- side navbar -->
            <ul id="side-navbar" class="bg-white text-uppercase">
                <button type="button" class="btn navbar-hide-btn text-white">
                    <i class="fas fa-times"></i>
                </button>
                <li><a href="#home">home</a></li>
                <li><a href="#design">arts</a></li>
                <li><a href="#teachers">artist</a></li>
                <li><a href="#catalog">about</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
            <!-- end of side navbar -->
        </div>
        <!-- main navigation list -->
        <div class="navbar-collapse flex">
            <!-- nav list -->
            <ul class="navbar-nav text-uppercase">
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link active-link">
                        <span class="nav-link-text">home</span>
                        <span class="dropdown-icon">
                             <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="#home" class="nav-link">
                        <span class="nav-link-text">Home</span>
                        <span class="dropdown-icon">
                            <!-- <i class="fas fa-chevron-down"></i> -->
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#design" class="nav-link">
                        <span class="nav-link-text">Arts</span>
                        <span class="dropdown-icon">
                            <!-- <i class="fas fa-chevron-down"></i> -->
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#artist" class="nav-link">
                        <span class="nav-link-text">Artist</span>
                        <span class="dropdown-icon">
                            <!-- <i class="fas fa-chevron-down"></i> -->
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#catalog" class="nav-link">
                        <span class="nav-link-text">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">
                        <span class="nav-link-text">Contact</span>
                    </a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">
                        <span class="nav-link-text">Login</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">
                        <span class="nav-link-text">Signup</span>
                    </a>
                </li>
                @endguest
            </ul>

            @auth
            <div class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">{{auth()->user()->name}}</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="btn text-white">
                    <i class="fas fa-cart-shopping"></i>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                    <span class="nav-link-text">Logout</span>
                </a>
            </div>
            @endauth
            <!-- end of nav list -->
        </div>
        <!-- end of main navigation list -->
    </div>
</nav>
<!-- end of navbar -->
