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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> </li>
                <li class="nav-item d-none d-sm-inline-block"> <a href="{{route('home')}}" class="nav-link">Home</a> </li>
                <li class="nav-item d-none d-sm-inline-block"> <a href="#" class="nav-link">Contact</a> </li>
            </ul>

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
                                <a href="" class="nav-link @if($segment=='home') active @endif "> <i class="nav-icon fa fa-dashboard"></i>
                                    <p> Dashboard </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link @if($segment=='categories') active @endif"> <i class="nav-icon fa fa-th"></i>
                                    <p> Category </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route" class="nav-link @if($segment=='news') active @endif"> <i class="nav-icon fa fa-pie-chart"></i>
                                    <p> News </p>
                                </a>
                            </li>
                            <li class="nav-header">Action</li>@else
                            <?php $segment=Request::segment(1); ?>
                                <li class="nav-item">
                                    <a href="{{route('dashboard.admin')}}" class="nav-link @if($segment=='dashboard') active @endif "> <i class="nav-icon fas fa-tachometer-alt"></i></i>
                                        <p> Dashboard </p>
                                    </a>
                                </li>

                                @if(Auth::user()->role_id == 1)
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link @if($segment=='users') active @endif"> <i class="far fa-user"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{route('import.index')}}" class="nav-link @if($segment=='import_excel') active @endif"> <i class="fas fa-th-list"></i>
                                        <p>Product List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('product.productUpdates')}}" class="nav-link @if($segment=='product_updates') active @endif"> <i class="fas fa-sync-alt"></i>
                                        <p>Product Updates</p>
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

            <div id="extended_cont"> @yield('content') </div>
        </div>
        <footer class="main-footer"> <strong>Copyright &copy; 2019 <a href="http://247virtualagent">TWF 24/7 Virtual Agent</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block"> </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark"> </aside>
    </div>

</body>

</html>
<script type="text/javascript">
$(document).ready( function() {
    $('#va').DataTable();
    $('#client').DataTable();
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