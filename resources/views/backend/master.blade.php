<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ url('/backend/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ url('/backend/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ url('/backend/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/backend/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/css/style.css') }}" rel="stylesheet">
    @notifyCss
    <style type="text/css">
        .notify {
            z-index: 1000000;
            margin-top: 5px;
        }
    </style>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>



    @include('backend.fixed.sidebar')

    <!-- /# sidebar -->



    @include('backend.fixed.header')


    <div class="content-wrap">
        <div class="main">

            <x:notify-messages />
            @yield('content')


        </div>
    </div>

    <!-- jquery vendor -->
    <script src="{{ url('/backend/js/lib/jquery.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ url('/backend/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ url('/backend/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ url('/backend/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ url('/backend/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ url('/backend/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/calendar-2/pignose.init.js') }}"></script>


    <script src="{{ url('/backend/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ url('/backend/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ url('/backend/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ url('/backend/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/backend/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ url('/backend/js/dashboard2.js') }}"></script>
    @notifyJs
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    @stack('js')

</body>

</html>
