<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Artihc</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('adminpanel/images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminpanel/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('adminpanel/css/custom.css') }}" />
    {{-- font css --}}
    <link rel="stylesheet" href="{{ asset('adminpanel/css/font.css') }}" />

    {{-- --font logo---- --}}

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            @include('admin.layouts.sidebar')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                @include('admin.layouts.header')

                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- footer -->
                    @include('admin.layouts.footer')

                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <<script src="{{ asset('adminpanel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/popper.min.js') }}"></>
    <script src="{{ asset('adminpanel/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('adminpanel/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('adminpanel/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('adminpanel/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('adminpanel/js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/utils.js') }}"></script>
    <script src="{{ asset('adminpanel/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('adminpanel/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('adminpanel/js/custom.js') }}"></script>
    <script src="{{ asset('adminpanel/js/chart_custom_style1.js') }}"></script>
</body>

</html>
