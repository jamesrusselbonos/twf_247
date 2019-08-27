<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Twf | 24/7 Virtual Agent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="http://malsup.github.io/jquery.blockUI.js">
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> </li>
                <li class="nav-item d-none d-sm-inline-block"> <a href="{{route('home')}}" class="nav-link">Home</a> </li>
                <li class="nav-item d-none d-sm-inline-block"> <a href="#" class="nav-link">Contact</a> </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li style="padding:10px; margin-right:30px;"><i class="fas fa-dollar-sign"></i> Credits Owned:{{Auth::user()->wallet}}
                    <a href="{{url('/load_account')}}" style="color:rgba(0,0,0,.5); text-decoration: none;"> <small>Add More</small></a>
                </li>
                <li style="padding:10px; margin-right:20px;">
                    <a href="{{route('product.shoppingCart')}}" style="color:rgba(0,0,0,.5); text-decoration: none;"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart <span style="background-color: #e65c00; color:white;" class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span> </a>
                </li>@guest
                <li style="padding:5px"> <a href="{{route('login')}}">LOGIN</a> </li>@endguest </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{route('home')}}" class="brand-link"> <img src="{{asset('images/icon.png')}}" alt="24/7 Logo" class="brand-image img-circle" style="opacity: .8"> <span class="brand-text font-weight-light">24/7 Virtual Agent</span> </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image"> <a href="#"> <img src=" @if(Auth::user()->image){{asset(Auth::user()->image)}}@else{{asset('dist/img/user2-160x160.jpg')}}@endif" class="img-circle" alt="User Image"> <span class="brand-text font-weight-light">{{ucwords(Auth::user()->name)}}</span> </a> </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> @guest
                        <?php $segment=Request::segment(1); ?>
                            <li class="nav-item">
                                <a href="{{route('admin.home')}}" class="nav-link @if($segment=='home') active @endif "> <i class="nav-icon fa fa-dashboard"></i>
                                    <p> Dashboard </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.categories.index')}}" class="nav-link @if($segment=='categories') active @endif"> <i class="nav-icon fa fa-th"></i>
                                    <p> Category </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.news.index')}}" class="nav-link @if($segment=='news') active @endif"> <i class="nav-icon fa fa-pie-chart"></i>
                                    <p> News </p>
                                </a>
                            </li>
                            <li class="nav-header">Action</li>@else
                            <?php $segment=Request::segment(1); ?>
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="nav-link @if($segment=='home') active @endif "> <i class="nav-icon fa fa-dashboard"></i>
                                        <p> Dashboard </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('user.order')}}" class="nav-link @if($segment=='user_profile') active @endif"> <i class="far fa-user"></i>
                                        <p> User Profile </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="va-prof" class="va-prof nav-link @if($segment=='va-profile') active @endif"> <i class="far fa-address-card"></i>
                                        <p> Hire a VA </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('product.index')}}" class="nav-link @if($segment=='product') active @endif"> <i class="fas fa-th-list"></i>
                                        <p> Product List </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/load_account')}}" class="nav-link @if($segment=='load_account') active @endif"> <i class="far fa-credit-card"></i>
                                        <p> Load Account </p>
                                    </a>
                                </li>
                                <li class="nav-header">Action</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                                        <p>{{__('Logout')}}</p>
                                    </a>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;"> @csrf </form>
                                </li>@endguest </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div id="content">
                <iframe name="Framename" src="https://www.247virtualagent.com/virtual-assistants/" width="100%" height="2000px" frameborder="0" scrolling="yes" style="width: 100%;"> </iframe>
            </div>
            <div id="extended_cont"> @yield('content') </div>
        </div>
        <footer class="main-footer"> <strong>Copyright &copy; 2019 <a href="http://247virtualagent">TWF 24/7 Virtual Agent</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block"> </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark"> </aside>
    </div>
    <script src="{{asset('js/va_load.js')}}"></script>
    <script src="{{asset('js/product.js')}}"></script>
    <script src="{{asset('js/product_list.js')}}"></script>
    <script src="{{asset('js/user.js')}}"></script>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
         $('#details-order').DataTable( {
            

            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel',
            ]
             
         } );

        $('.agent_link').click(function(){
          var myNewURL = "va-profile";
         $.unblockUI(); 
          $('#content').show();
          $('#extended_cont').hide();
          window.history.replaceState({}, document.title, "/" + myNewURL );

        });
        document.addEventListener('contextmenu', event => event.preventDefault());
        $(document).keydown(function(event) {
            // if (event.keyCode == 123) {
            //     return false;
            // } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
            //     return false;
            // }
        });
      $('.va-prof').click(function(){
       $.unblockUI(); 
       

      });
      $( "#palpay" ).submit(function() {
        alert( "Handler for .submit() called." );
      });
    });
</script>