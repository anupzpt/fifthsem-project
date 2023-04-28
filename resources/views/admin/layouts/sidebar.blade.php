 <!-- Sidebar  -->
 @if (auth()->user()->user_type == '2')
     <nav id="sidebar">
         <div class="sidebar_blog_1">
             <div class="sidebar-header">
                 <div class="logo_section">
                     <a href="{{ route('admin.index') }}"><img class="logo_icon img-responsive "
                             src="images/logo/logo_icon.png" alt="" /></a>
                 </div>
             </div>
             <div class="sidebar_user_info">
                 <div class="icon_setting"></div>
                 <div class="user_profle_side">
                     <a href="{{ route('admin.index') }}">
                         <div class="user_img">
                             {{-- <img class="img-responsive" src="adminpanel/images/logo/logo_icon.png" alt="#" /> --}}
                         </div>
                         <div class="logo">
                             <span style="color: white;">Artihc</span>
                         </div>
                     </a>
                     {{-- <div class="user_info">

                {{-- <p><span class="online_animation"></span> Online</p> --}}
                     {{-- </div>  --}}
                 </div>
             </div>
         </div>
         <div class="sidebar_blog_2">
             {{-- <h4>General</h4> --}}
             <ul class="list-unstyled components">
                 <li>
                     <a href="{{ route('admin.index') }}"><i class="fa fa-dashboard yellow_color"></i>
                         <span>Dashboard</span></a>
                 </li>
                 {{-- product --}}
                 <li>
                     <a href="{{ route('Product.index') }}"><i class="fa fa-map purple_color"></i>
                         <span>Product</span></a>
                 </li>
             </ul>
         </div>
     </nav>
 @else
     <nav id="sidebar">
         <div class="sidebar_blog_1">
             <div class="sidebar-header">
                 <a href="{{ route('admin.index') }}">
                     <div class="logo_section">
                         <img class="logo_icon img-responsive " src="images/logo/logo_icon.png" alt="" />
                     </div>
                 </a>
             </div>
             <div class="sidebar_user_info">
                 <div class="icon_setting"></div>
                 <div class="user_profle_side">
                     <a href="{{ route('admin.index') }}">
                         <div class="user_img">
                             {{-- <img class="img-responsive" src="adminpanel/images/logo/logo_icon.png" alt="#" /> --}}
                         </div>
                         <div class="logo">
                             <span style="color: white;">Artihc</span>
                         </div>
                     </a>
                     {{-- <div class="user_info">

                {{-- <p><span class="online_animation"></span> Online</p> --}}
                     {{-- </div>  --}}
                 </div>
             </div>
         </div>
         <div class="sidebar_blog_2">
             {{-- <h4>General</h4> --}}
             <ul class="list-unstyled components">
                 <li>
                     <a href="{{ route('admin.index') }}"><i class="fa fa-dashboard yellow_color"></i>
                         <span>Dashboard</span></a>
                 </li>
                 {{-- category --}}
                 <li>
                     <a href="{{ route('Category.index') }}"><i class="fa fa-table purple_color2"></i>
                         <span>Category</span></a>
                 </li>
                 {{-- product --}}
                 <li>
                     <a href="{{ route('Product.index') }}"><i class="fa fa-map purple_color"></i>
                         <span>Product</span></a>
                 </li>
                 {{-- <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li> --}}
                 {{-- <li>
             <a href="contact.html">
             <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
          </li> --}}
                 {{-- admin --}}
                 <li>
                     <a href="{{ route('AdminList.index') }}"><i class="fa fa-user green_color"></i>
                         <span>Admin</span></a>
                 </li>
                 {{-- artist --}}
                 <li>
                     <a href="{{ route('artistList') }}"><i class="fa fa-user red_color"></i> <span>Artist</span></a>
                 </li>
                 {{-- users --}}
                 <li>
                     <a href="{{ route('UserList.index') }}"><i
                             class="fa fa-user blue1_color"></i><span>Users</span></a>
                 </li>
                 {{-- orderlist --}}
                 <li>
                     <a href="{{ route('OrderList.index') }}"><i
                             class="fa-solid fa-table-list  red_color"></i></i><span>Orders</span></a>
                 </li>
                 {{-- <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li> --}}
             </ul>
         </div>
     </nav>
 @endif

 <!-- end sidebar -->
