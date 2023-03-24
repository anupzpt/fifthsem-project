 <!-- navbar -->
 <nav class="navbar bg-brown flex">
     <div class="container flex">
         <div class="toggler-and-category bg-brown text-white flex">
             <button type="button" id="bars" class="btn navbar-show-btn text-white">
                 <i class="fas fa-bars"></i>
             </button>
             <a href="{{ route('home.index') }}"><img src="{{ asset('userpanel/images/logo-white.png') }}" alt="img" style="height: 7rem; width: 13rem" /></a>

             <!-- <div class="logo">
              <span>Artihc</span>
            </div> -->

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
                     <a href="{{ route('home.index') }}" class="nav-link">
                         <span class="nav-link-text">Home</span>
                         <span class="dropdown-icon">
                             <!-- <i class="fas fa-chevron-down"></i> -->
                         </span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('home.art') }}" class="nav-link">
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
                     <a class="nav-link" href="{{ route('login1') }}">
                         <span class="nav-link-text">Login</span>
                     </a>
                 </li>
                 @endguest
             </ul>

             @auth

             @if(Auth::user()->user_type == '0')
             <div class="nav-item">
                 <a href="{{route('home.cart.index')}}" class="btn text-white">
                     <i class="fas fa-cart-shopping"> </i>
                     <sup> <span class="cartCount">{{$count}}</span></sup>
                 </a>
             </div>
             @endif
             <div class="nav-item">
                 <a class="nav-link" href="#">
                     <!-- <span class="nav-link-textt"  id="toggleMenu"></span> -->
                     @if(auth()->user()->user_type == 1)
                     <img src="{{asset('/uploads'.'/'.auth()->user()->img_path)}}" class="user-pic" id="toggleMenu">
                     @else
                     <img src="{{ auth()->user()->img_path }}" class="user-pic" id="toggleMenu">
                     @endif

                 </a>
             </div>

             <!-- end of nav list -->
         </div>
         <!-- end of main navigation list -->
     </div>
     <!-- dropdown section -->
     @if(auth()->user()->user_type == 1)
     <div class="sub-menu-wrap" id="subMenu">
         <div class="sub-menu">
             <div class="user-info">
                 @if(auth()->user()->user_type == 1)
                 <img src="{{asset('/uploads'.'/'.auth()->user()->img_path)}}" class="user-pic" id="toggleMenu">
                 @else
                 <img src="{{auth()->user()->img_path }}" class="user-pic" id="toggleMenu">
                 @endif

                 <h3>{{ auth()->user()->name }}</h3>

             </div>
             <hr>
             <a href="{{route('admin.index')}}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/cancel.png')}}">
                 <p>Admin page</p>
                 <span>></span>
             </a>
             <a href="{{ route('logout') }}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/logout.png')}}">
                 <p>Logout</p>
                 <span>></span>

             </a>
         </div>
     </div>
     @elseif(Auth::user()->user_type == '2')
     <div class="sub-menu-wrap" id="subMenu">
         <div class="sub-menu">
             <div class="user-info">
                 @if(auth()->user()->user_type == 1)
                 <img src="{{asset('/uploads'.'/'.auth()->user()->img_path)}}" class="user-pic" id="toggleMenu">
                 @else
                 <img src="{{auth()->user()->img_path }}" class="user-pic" id="toggleMenu">
                 @endif

                 <h3>{{ auth()->user()->name }}</h3>

             </div>
             <hr>
             <a href="{{route('account')}}" class="sub-menu-link">
                 <img src="{{ asset('userpanel/images/happiness.png') }}">
                 <p>Manage Account</p>
                 <span>></span>
             </a>
             <a href="{{route('admin.index')}}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/cancel.png')}}">
                 <p>Add Your Arts</p>
                 <span>></span>
             </a>
             <a href="{{ route('logout') }}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/logout.png')}}">
                 <p>Logout</p>
                 <span>></span>

             </a>
         </div>
     </div>
     @else
     <div class="sub-menu-wrap" id="subMenu">
         <div class="sub-menu">
             <div class="user-info">
                 @if(auth()->user()->user_type == 1)
                 <img src="{{asset('/uploads'.'/'.auth()->user()->img_path)}}" class="user-pic" id="toggleMenu">
                 @else
                 <img src="{{ auth()->user()->img_path }}" class="user-pic" id="toggleMenu">
                 @endif

                 <h3>{{ auth()->user()->name }}</h3>

             </div>
             <hr>
             <a href="{{route('account')}}" class="sub-menu-link">
                 <img src="{{ asset('userpanel/images/happiness.png') }}">
                 <p>Manage Account</p>
                 <span>></span>
             </a>
             <a href="{{route('order')}}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/my-order.png')}}">
                 <p>My Order</p>
                 <span>></span>
             </a>
             <a href="{{route('artist-register')}}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/cancel.png')}}">
                 <p>Artist Registration</p>
                 <span>></span>
             </a>
             <a href="{{ route('logout') }}" class="sub-menu-link">
                 <img src="{{asset('userpanel/images/logout.png')}}">
                 <p>Logout</p>
                 <span>></span>

             </a>
         </div>
     </div>
     @endif


     <!-- end of dropdown section -->

     @endauth
 </nav>
 <!-- end of navbar -->
