<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		
        
        <!-- Bootstrap core CSS     -->
        <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="{{ asset('admin/css/animate.min.css')}}" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="{{ asset('admin/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="{{ asset('admin/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />   
        
        <!-- ajax is here -->
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

         <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    </head>
    <body>

<style type="text/css">
 .loading {
          background: lightblue;
          padding: 15px;
          position: fixed;
          border-radius: 4px;
          left: 55%;
          top: 50%;
          text-align: center;
          margin: -40px 0 0 -50px;
          z-index: 2000;
          display: none;
      }  
</style>


<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('admin/img/sidebar-5.jpg')}}">
    
    <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    IDN1AHM
                </a>
            </div>

        @include('layouts.navbar')
          
    </div>   
</div>

      @include('layouts.topbar')


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                                            
                        @yield('content')
                        <div class="loading">
                        <i class="fa fa-refresh fa-spin fa-2x fa-tw"></i>
                        <br>
                        <span>Processing</span>
                        </div>
 
            
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                 <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                App V.1
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Creative Tim</a>, Corporate Business
                </p>
            </div>
        </footer>

    </div>
</div>

 @stack('scripts')
    <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    
    <!--  Charts Plugin -->
    <script src="{{ asset('admin/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('admin/js/bootstrap-notify.js') }}"></script>

    <script src="{{ asset('admin/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>
    
    </body>
</html>
