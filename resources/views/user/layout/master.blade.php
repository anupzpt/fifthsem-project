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
    <link rel="stylesheet" href="{{asset('userpanel/css/utilities.css')}}" />
    <link rel="stylesheet" href="{{asset('userpanel/css/toastr.css')}}" />
    <!-- custom main css -->
    <link rel="stylesheet" href="{{asset('userpanel/css/main.css')}}" />
    <!-- dropdown card css -->
    <link rel="stylesheet" href="{{asset('userpanel/css/dropdownCard.css')}}" />
    <!-- slick slider css -->
    <link rel="stylesheet" href="{{asset('userpanel/plugins/slick-1.8.1/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('userpanel/plugins/slick-1.8.1/slick/slick-theme.css')}}" />


</head>

<body>

    <div class="holder">
        <!-- navbar -->
        @include('user.layout.nav')
        <!-- end of navbar -->


        @yield('content')

        <!-- end of main content -->

        <!-- footer -->
        @include('user.layout.footer')
        <!-- end of footer -->
    </div>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- slick slider js -->
    <script src="{{asset('userpanel/plugins/slick-1.8.1/slick/slick.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('userpanel/js/script.js')}}"></script>
    <script src="{{asset('userpanel/js/toastr.js')}}"></script>
    @if(session()->has('error_msg'))
    <script>
        alert("{{ session('error_msg') }}");
    </script>
    @endif

</body>

</html>
