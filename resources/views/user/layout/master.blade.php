<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artihc</title>
    <!-- normalize css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        @include('user.layout.nav')
        <!-- end of navbar -->

        <!-- header -->
        @include('user.layout.home')
        <!-- end of header -->

        <!-- main content -->
        <main>
            <!-- category -->
            @include('user.layout.art')
            <!-- end of category -->

            <!-- Popular section -->
            @include('user.layout.popular')
            <!-- end of popular section -->

            <!-- latest art deals section -->
            @include('user.layout.latest')
            <!-- end of latest art deals section -->

            <!-- About Artist section -->
            @include('user.layout.about')
            <!-- About artist section -->

            <!-- artist section -->
            @include('user.layout.artist')
            <!-- end of artist section -->

            <!-- contact section -->
            @include('user.layout.contact')
            <!-- end of contact section -->
        </main>
        <!-- end of main content -->

        <!-- footer -->
        @include('user.layout.footer')
        <!-- end of footer -->
    </div>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <!-- slick slider js -->
    <script src="userpanel/plugins/slick-1.8.1/slick/slick.js"></script>
    <!-- custom js -->
    <script src="userpanel/js/script.js"></script>
</body>

</html>
