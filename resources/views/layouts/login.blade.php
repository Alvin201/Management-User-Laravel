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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

        <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    </head>
    <body>
            @include('flash::message')
            @yield('content')

        
        <!-- Scripts -->
       <!--  <script src=" {{ asset('/js/app.js') }}"></script> -->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->

        <script src=" {{ asset('admin/js/bootstrap.min.js') }}"></script>
        <script src=" {{ asset('admin/js/jquery.min.js') }}"></script>
      
         
        @stack('scripts')
         <script type="text/javascript">
            var username = false;
            var password = false;

            $("#username").on("input", function() {
              if ( $(this).val().length > 0) {
               username = true;
              } else {
                username = false;
              }
              if (username && password) {
                $('.login').css('background', '#14a03d');
                $('.login').addClass('buttonafter');
              } else {
                $('.login').css('background', '#a0a0a0');
                $('.login').removeClass('buttonafter');
              }
            });

            $("#password").on("input", function() {
             if ( $(this).val().length > 0){
               password = true;
              } else {
                password = false;
              }
              if (username && password) {
                $('.login').css('background', '#14a03d');
                $('.login').addClass('buttonafter');
              } else {
                $('.login').css('background', '#a0a0a0');
                $('.login').removeClass('buttonafter');
              }
            });
             
         </script>
    </body>
</html>
