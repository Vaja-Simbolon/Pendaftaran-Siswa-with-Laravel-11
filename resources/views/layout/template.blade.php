<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>PMB UMI
                            </span></a>
                    </div>
                    {{-- profil info --}}
                    @include('layout.profilInfo')
                    <br />
                    {{-- sidebar --}}
                    @include('layout.sidebar')
                </div>
            </div>
            {{-- navbar --}}
            @include('layout.navbar')
            <div class="right_col" role="main">
                <div class="">
                    <div class="top_tiles">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer>
                <div class="pull-right">
                    Made With Vajaa | &copy; 2024 </a>
                </div>
                <div class="clearfix"></div>
            </footer>


        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>

        <!-- jQuery Sparklines -->
        <script src="{{ asset('assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
        <!-- Flot -->
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
        <!-- Flot plugins -->
        <script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
        <!-- DateJS -->
        <script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- Custom Theme Scripts -->
        <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>

        <!-- Popper.js dan Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
