 <!-- navbar -->
 <nav class="navbar bg-brown flex">
     <div class="container flex">
         <div class="toggler-and-category bg-brown text-white flex">
             <button type="button" id="bars" class="btn navbar-show-btn text-white">
                 <i class="fas fa-bars"></i>
             </button>
             <img src="{{ asset('userpanel/images/logo-white.png') }}" alt="img" style="height: 7rem; width: 13rem" />
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
                         <a class="nav-link" href="{{ route('login') }}">
                             <span class="nav-link-text">Login</span>
                         </a>
                     </li>
                 @endguest
             </ul>

             @auth
                 <div class="nav-item">
                     <a href="" class="btn text-white">
                         <i class="fas fa-cart-shopping"> </i>
                         <sup> <span  class="cartCount">{{$count}}</span></sup>
                     </a>
                 </div>
                 <div class="nav-item">
                     <a class="nav-link" href="#">
                         <!-- <span class="nav-link-textt"  id="toggleMenu">{{ auth()->user()->name }}</span> -->
                         <img src="{{ auth()->user()->img_path }}" class="user-pic" id="toggleMenu">
                     </a>
                 </div>

                 <!-- <div class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link">
                                        <span class="nav-link-text">Logout</span>
                                    </a>
                                </div> -->




                 <!-- end of nav list -->
             </div>
             <!-- end of main navigation list -->
         </div>
         <div class="sub-menu-wrap" id="subMenu">
             <div class="sub-menu">
                 <div class="user-info">
                     <img src="{{ auth()->user()->img_path }}">
                     <h3>{{ auth()->user()->name }}</h3>

                 </div>
                 <hr>
                 <a href="#" class="sub-menu-link">
                     <img src="{{ asset('userpanel/images/happiness.png') }}">
                     <p>Manage Account</p>
                     <span>></span>
                 </a>
                 <a href="#" class="sub-menu-link">
                     <img src="userpanel/images/order.png">
                     <p>My Order</p>
                     <span>></span>
                 </a>
                 <a href="#" class="sub-menu-link">
                     <img src="userpanel/images/cancel.png">
                     <p>Return & Cancellation</p>
                     <span>></span>
                 </a>
                 <a href="{{ route('logout') }}" class="sub-menu-link">
                     <img src="userpanel/images/logout.png">
                     <p>Logout</p>
                     <span>></span>
                 </a>
             </div>
         </div>
     @endauth
 </nav>
 <!-- end of navbar -->
