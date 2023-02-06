<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artihc</title>
    <!-- normalize css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom utilities css -->
    <link rel="stylesheet" href="userpanel/css/utilities.css" />
    <!-- custom main css -->
    <link rel="stylesheet" href="userpanel/css/main.css" />
    <!-- slick slider css -->
    <link rel="stylesheet" href="userpanel/plugins/slick-1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="userpanel/plugins/slick-1.8.1/slick/slick-theme.css" />
</head>

<body>
    <div class="holder">
        <!-- navbar -->
        <nav class="navbar bg-brown flex">
            <div class="container flex">
                <div class="toggler-and-category bg-brown text-white flex">
                    <button type="button" id="bars" class="btn navbar-show-btn text-white">
                        <i class="fas fa-bars"></i>
                    </button>
                    <img src="userpanel/images/logo-white.png" alt="img" style="height: 7rem; width: 13rem" />
                    <!-- <div class="logo">
              <span>Artihc</span>
            </div> -->

                    <!-- side navbar -->
                    <ul id="side-navbar" class="bg-white text-uppercase">
                        <button type="button" class="btn navbar-hide-btn text-white">
                            <i class="fas fa-times"></i>
                        </button>
                        <li><a href="#">home</a></li>
                        <li><a href="#">arts</a></li>
                        <li><a href="#">artist</a></li>
                        <li><a href="#">about</a></li>
                        <li><a href="#">contact</a></li>
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
                            <a href="#" class="nav-link">
                                <span class="nav-link-text">Home</span>
                                <span class="dropdown-icon">
                                    <!-- <i class="fas fa-chevron-down"></i> -->
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-link-text">Arts</span>
                                <span class="dropdown-icon">
                                    <!-- <i class="fas fa-chevron-down"></i> -->
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-link-text">Artist</span>
                                <span class="dropdown-icon">
                                    <!-- <i class="fas fa-chevron-down"></i> -->
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-link-text">About</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
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

                    <!-- account icons -->
                    <!-- <div class="account-info">
                        <a href="#" class="btn text-white">
                            <i class="fas fa-cart-shopping"></i>
                        </a>

                    </div> -->

                    <!-- end of account icons -->
                </div>
                <!-- end of main navigation list -->
            </div>
        </nav>
        <!-- end of navbar -->

        <!-- header -->
        <header class="header bg-light-brown flex" id="home">
            <div class="container">
                <div class="banner">
                    <div class="container">
                        <h1 class="banner-title">
                            <span>Artihc</span>
                        </h1>

                        <h1>everything that you want to know about art & design</h1>
                        <br />
                        <a href="#" class="btn-header text-white bg-brown">shop now</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- end of header -->

        <!-- main content -->
        <main>
            <!-- category -->
            <section class="design" id="design">
                <div class="container">
                    <div class="title">
                        <h1>Arts & Designs</h1>
                        <div class="line"></div>
                        <!-- made change here  -->
                        <div class="toggler-and-category bg-brown text-white flex" style="margin-left: 40%; margin-top: 1%">
                            <div class="category-list">
                                <span>Category</span>
                                <button type="button" class="btn category-toggler-btn text-white">
                                    <i class="fas fa-circle-arrow-down"></i>
                                </button>
                            </div>
                            <ul id="category-list-items" class="bg-white" style="z-index: 1" class="bg-white">
                                <li><a href="#">All</a></li>
                                <li><a href="#">NIghtstands</a></li>
                                <li><a href="#">Dressers</a></li>
                                <li><a href="#">Bookcase</a></li>
                                <li><a href="#">Coffee Tables</a></li>
                                <li><a href="#">Mattresses</a></li>
                                <li><a href="#">Sofas</a></li>
                                <li><a href="#">Chairs</a></li>
                                <li><a href="#">Hall Trees</a></li>
                                <li><a href="#">Furniture Stores</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="design-content">
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="userpanel/images/art-design-1.jpg" alt="" />
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                <span class="fw-bold d-block">$ 45.50</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                            <!-- <div class = "info">
                <div class = "ratings text-grey">
                    <i class = "fas fa-star text-brown"></i>
                    <i class = "fas fa-star text-brown"></i>
                    <i class = "fas fa-star text-light-grey"></i>
                    <i class = "fas fa-star text-light-grey"></i>
                    <i class = "fas fa-star text-light-grey"></i>
                    <span>(10 Reviews)</span>
                </div>
                <p class = "name">Your art</p>
                <div class = "price">
                    <span class = "old text-grey">$ 50.00</span>
                    <span class = "new text-brown">$ 35.00</span>
                </div>
            </div> -->
                        </div>
                        <!-- end of item -->
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="userpanel/images/art-design-2.jpg" alt="" />
                                <!-- <span><i class = "far fa-shopping-cart"></i></span> -->
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                <span class="fw-bold d-block">$ 45.50</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                        </div>
                        <!-- end of item -->
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="userpanel/images/art-design-3.jpg" alt="" />
                                <!-- <span>Art & Design</span> -->
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                <span class="fw-bold d-block">$ 45.50</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                        </div>
                        <!-- end of item -->
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="userpanel/images/art-design-4.jpg" alt="" />
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                <span class="fw-bold d-block">$ 45.50</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                        </div>
                        <!-- end of item -->
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="userpanel/images/art-design-5.jpg" alt="" />
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                <span class="fw-bold d-block">$ 45.50</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                        </div>
                        <!-- end of item -->
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="userpanel/images/art-design-6.jpg" alt="" />
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                <span class="fw-bold d-block">$ 45.50</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                        </div>
                        <!-- end of item -->
                    </div>
                </div>
            </section>
            <!-- end of category -->

            <!-- Popular section -->
            <section class="category py bg-light-brown" id="category">
                <div class="container">
                    <div class="section-title text-center">
                        <h2>Popular Art</h2>
                        <div class="line"></div>
                    </div>

                    <div class="category-content grid">
                        <div class="category-item">
                            <img src="userpanel/images/category_img_1.png" />
                            <div class="category-badge bg-white text-dark flex">
                                Sofa Set
                            </div>
                        </div>
                        <div class="category-item">
                            <img src="userpanel/images/category_img_2.png" />
                            <div class="category-badge bg-white text-dark flex">
                                Sofa Set
                            </div>
                        </div>
                        <div class="category-item">
                            <img src="userpanel/images/category_img_3.png" />
                            <div class="category-badge bg-white text-dark flex">
                                Sofa Set
                            </div>
                        </div>
                        <div class="category-item">
                            <img src="userpanel/images/category_img_4.png" />
                            <div class="category-badge bg-white text-dark flex">
                                Sofa Set
                            </div>
                        </div>
                        <div class="category-item">
                            <img src="userpanel/images/category_img_5.png" />
                            <div class="category-badge bg-white text-dark flex">
                                Sofa Set
                            </div>
                        </div>
                        <div class="category-item">
                            <img src="userpanel/images/category_img_6.png" />
                            <div class="category-badge bg-white text-dark flex">
                                Sofa Set
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of popular section -->

            <!-- latest art deals section -->
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

                        <div class="featured-deals-item teachers-item" style="padding: 30px;">
                            <img src="userpanel/images/art-design-1.jpg" />
                            <div class="info bg-dark text-white">
                                <div class="text-center">
                                    <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                    <span class="fw-bold d-block">$ 45.50</span>
                                    <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="featured-deals-item teachers-item" style="padding: 30px;">
                            <img src="userpanel/images/art-design-1.jpg" />
                            <div class="info bg-dark text-white">
                                <div class="text-center">
                                    <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                    <span class="fw-bold d-block">$ 45.50</span>
                                    <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="featured-deals-item teachers-item" style="padding: 30px;">
                            <img src="userpanel/images/art-design-3.jpg" />
                            <div class="info bg-dark text-white">
                                <div class="text-center">
                                    <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                    <span class="fw-bold d-block">$ 45.50</span>
                                    <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="featured-deals-item teachers-item" style="padding: 30px;">
                            <img src="userpanel/images/art-design-4.jpg" />
                            <div class="info bg-dark text-white">
                                <div class="text-center">
                                    <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                    <span class="fw-bold d-block">$ 45.50</span>
                                    <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="featured-deals-item teachers-item" style="padding: 30px;">
                            <img src="userpanel/images/art-design-4.jpg" />
                            <div class="info bg-dark text-white">
                                <div class="text-center">
                                    <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                    <span class="fw-bold d-block">$ 45.50</span>
                                    <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="featured-deals-item teachers-item" style="padding: 30px;">
                            <img src="userpanel/images/art-design-4.jpg" />
                            <div class="info bg-dark text-white">
                                <div class="text-center">
                                    <p class="text-capitalize mt-3 mb-1">Art Name</p>
                                    <span class="fw-bold d-block">$ 45.50</span>
                                    <a href="#" class="buttons btn-primary mt-3 ml-2">Buy it Now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- end of latest art deals section -->

            <!-- About Artist section -->
            <section class="catalog bg-brown" id="catalog">
                <div class="catalog-content grid text-center">
                    <div class="catalog-left">
                        <img src="userpanel/images/paint.jpg" alt="" />
                    </div>
                    <div class="catalog-right text-white flex py">
                        <div class="section-title-about">
                            <h2>Platform For Artist</h2>
                            <div class="line"></div>
                        </div>
                        <p class="text">
                            Providing variety of art to you ,adipisicing elit. Mollitia,
                            sequi distinctio corporis pariatur excepturi minima!
                        </p>
                        <p class="text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Mollitia, sequi distinctio corporis pariatur excepturi minima!
                        </p>
                    </div>
                </div>
            </section>
            <!-- About artist section -->

            <!-- artist section -->
            <section class="teachers py-4 bg-white-sm" id="teachers">
                <div class="container-art">
                    <div class="section-title">
                        <h2>Our Artist</h2>
                        <div class="line"></div>
                    </div>
                    <div class="teachers-content grid text-center">
                        <div class="teachers-item">
                            <div class="image">
                                <img src="userpanel/images/teachers_img_1.png" alt="teachers image" />
                            </div>
                            <div class="info">
                                <p class="fw-6 font-lg">Velvet Vachon</p>
                                <p class="text-green font-md fw-5">Design Head</p>
                            </div>
                        </div>

                        <div class="teachers-item">
                            <div class="image">
                                <img src="userpanel/images/teachers_img_2.png" alt="teachers image" />
                            </div>
                            <div class="info">
                                <p class="fw-6 font-lg">Arlene Anello</p>
                                <p class="text-green font-md fw-5">SEO Head</p>
                            </div>
                        </div>

                        <div class="teachers-item">
                            <div class="image">
                                <img src="userpanel/images/teachers_img_3.png" alt="teachers image" />
                            </div>
                            <div class="info">
                                <p class="fw-6 font-lg">Benton Collet</p>
                                <p class="text-green font-md fw-5">Photography Head</p>
                            </div>
                        </div>

                        <div class="teachers-item">
                            <div class="image">
                                <img src="userpanel/images/teachers_img_4.png" alt="teachers image" />
                            </div>
                            <div class="info">
                                <p class="fw-6 font-lg">Floyd Fukuda</p>
                                <p class="text-green font-md fw-5">Marketing Head</p>
                            </div>
                        </div>

                        <div class="teachers-item">
                            <div class="image">
                                <img src="userpanel/images/teachers_img_5.png" alt="teachers image" />
                            </div>
                            <div class="info">
                                <p class="fw-6 font-lg">Elena Cully</p>
                                <p class="text-green font-md fw-5">UX/UI Designer</p>
                            </div>
                        </div>

                        <div class="teachers-item">
                            <div class="image">
                                <img src="userpanel/images/teachers_img_6.png" alt="teachers image" />
                            </div>
                            <div class="info">
                                <p class="fw-6 font-lg">Burton Brooke</p>
                                <p class="text-green font-md fw-5">Web Technologists</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- end of artist section -->

            <!-- contact section -->
            <section class="contact py-4 bg-light-grey-color-shade" id="contact">
                <div class="container">
                    <div class="section-title text-dark">
                        <h2>Contact</h2>
                        <div class="line"></div>
                    </div>
                    <div class="contact-content grid">
                        <div class="contact-right">
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.47339855874!2d-0.24168085317947707!3d51.528558242069835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2snp!4v1639724107420!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                            <div class="contact-info grid text-center text-dark">
                                <div class="contact-info-group">
                                    <span class="text-green">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </span>
                                    <p class="text font-md fw-6">
                                        Chakrapath, Kathmandu, Nepal
                                    </p>
                                </div>
                                <div class="contact-info-group">
                                    <span class="text-green">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </span>
                                    <p class="text font-md fw-6">artihc@gmail.com</p>
                                </div>
                                <div class="contact-info-group">
                                    <span class="text-green">
                                        <i class="fas fa-phone fa-2x"></i>
                                    </span>
                                    <p class="text font-md fw-6">+977- 9804673542</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-left text-dark">
                            <form action="" method="" class="text-center text-white">
                                <div class="form">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Name" />
                                </div>
                                <div class="form">
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email" />
                                </div>
                                <div class="form">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">
                                    Message</textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn-header text-white bg-brown">
                                        Send
                                    </button>
                                    -->
                                </div>
                                <!-- <input type = "text" class = "form-control fw-6" placeholder="Full Name" name = "full_name">
                          <input type = "email" class = "form-control fw-6" placeholder="E-mail" name = "email">
                          <textarea rows = "5" class = "form-control fw-6" placeholder="Message" name = "message"></textarea>
                                    <button type="submit" class="btn bg-green">Send</button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of contact section -->
        </main>
        <!-- end of main content -->

        <!-- footer -->
        <footer class="footer bg-light-brown" id="footer">
            <div class="footer-end bg-dark">
                <div class="container">
                    <p class="text text-white text-center">&copy; Artihc.com.np</p>
                </div>
            </div>
        </footer>
        <!-- end of footer -->
    </div>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- slick slider js -->
    <script src="userpanel/plugins/slick-1.8.1/slick/slick.js"></script>
    <!-- custom js -->
    <script src="userpanel/js/script.js"></script>
</body>

</html>