<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/graph.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/swipebox.css') }}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

        <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    </head>
    <body>
        <div id="app">

            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    @include('flash::message')
                </div>
            </div>
              
            @yield('content')

        </div>

        <!-- Scripts -->
       <!--  <script src=" {{ asset('/js/app.js') }}"></script> -->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->

        <script src=" {{ asset('admin/js/bootstrap.min.js') }}"></script>
        <script src=" {{ asset('admin/js/Chart.min.js') }}"></script>
        <script src=" {{ asset('admin/js/clndr.js') }}"></script>
        <script src=" {{ asset('admin/js/custom.js') }}"></script>
        <script src=" {{ asset('admin/js/data.js') }}"></script>
        <script src=" {{ asset('admin/js/gmaps.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.calendario.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.flot.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.flot.pie.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.flot.selection.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.flot.stack.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.flot.metisMenu.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.min.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.nicescroll.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.swipebox.min.js') }}"></script>
        <script src=" {{ asset('admin/js/moment-2.2.1.js') }}"></script>
        <script src=" {{ asset('admin/js/owl.carousel.js') }}"></script>
        <script src=" {{ asset('admin/js/pie-chart.js') }}"></script>
        <script src=" {{ asset('admin/js/screenfull.js') }}"></script>
        <script src=" {{ asset('admin/js/scripts.js') }}"></script>
        <script src=" {{ asset('admin/js/site.js') }}"></script>
        <script src=" {{ asset('admin/js/skycons.js') }}"></script>
        <script src=" {{ asset('admin/js/underscore-min.js') }}"></script>

        <script>
            $('div.alert').not('.alert-important').delay(1500).slideUp(300);
            $('#flash-overlay-modal').modal();
        </script>
         
        @stack('scripts')

    </body>
</html>
