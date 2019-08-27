<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') 24/7 Virtual Agent</title>
<!--      <script src="{{ asset('js/product.js') }}" defer></script>-->
    <!-- Scripts -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <!--  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->
   <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
<!--     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

    <style type="text/css">
        .bg{
            width: 100%; height: 120vh; 

         background: rgb(27,25,28);
         background: -moz-linear-gradient(157deg, rgba(27,25,28,1) 0%, rgba(60,34,33,1) 100%);
         background: -webkit-linear-gradient(157deg, rgba(27,25,28,1) 0%, rgba(60,34,33,1) 100%);
         background: linear-gradient(157deg, rgba(27,25,28,1) 0%, rgba(60,34,33,1) 100%);
         filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#1b191c",endColorstr="#3c2221",GradientType=1);

            position: absolute;
            top: 0; 
        }
        .card{
            position: relative;
            z-index: 999;

           /* margin: auto;*/

            background-color: transparent;

            border:none;

            /*margin-top: 0px;*/

        }
        .n_active{
            padding: 10px 10px 10px 10px;

            width: 150px;

            border-radius: 30px;

            color: #fff;
        }
        .n_active:hover{
            padding: 10px 10px 10px 10px;

            width: 150px;

            border-radius: 30px;

            border: solid;
            border-color: #fff;
            border-width: 2px;

           /* transition: all 500ms ease;*/

           cursor: pointer;
        }
        .active{
            color: #3c2221;
            padding: 10px 10px 10px 10px;

            width: 150px;

            background-color: #fff;
            border-radius: 30px;
        }
        #email, #password, #name, #password-confirm{
            width: 100%;
            height: 40px;

            border-radius: 30px;

            font-size: 16px;

            padding-left: 20px;

            margin-top: 20px;

            border-bottom: solid;
            border-width: 1px;
            border-color: #cea891;

            color: #51545d;
        }
        .car_body{
            padding-top: 10px;

            padding-left: 25px;
            padding-right: 25px;

            padding-bottom: 20px;

            background-color: #fff;

            margin-top: 20px;

            border-radius: 20px;
        }
        .card_head li{
            display: inline-block;

            margin-right: 30px;
        }
        .car_body label{
            font-size: 13px;
            margin-bottom: -10px;

            color: #51545d;
        }
        @media (max-width: 800px) {
            .card{
                margin-top: -20px;
            }
            .bg{
                height: 150vh;
            }
        }
    </style>

    

</head>
<body style="font-family: poppins;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', '24/7 Virtual Agent') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<script type="text/javascript">
$(document).ready( function() {
    $('#example').DataTable();
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
    });

</script>