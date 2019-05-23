<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Twf | 24/7 Virtual Agent</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <!-- jvectormap -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  



  

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">

   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <script type = "text/javascript" >
         function preventBack(){window.history.forward();}
          setTimeout("preventBack()", 0);
          window.onunload=function(){null};
          
      </script>
    


</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

     <li style="padding:5px;"><a href="{{ route('product.shoppingCart') }}" style="color:rgba(0,0,0,.5); text-decoration: none;">
         <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
         <span style="background-color: #e65c00; color:white" class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
     </a></li>
    @guest
     <li style="padding:5px">
      <a href="{{ route('login') }}">LOGIN</a>
     </li> <!-- Messages Dropdown Menu -->
    @endguest
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('images/icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">24/7 Virtual Agent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @guest

          @else
          <a href="#" class="d-block">{{ ucwords(Auth::user()->name) }}</a>
          <small><a href="#" style="color:#a6a6a6"><i class="fas fa-pencil-alt" style="color:#a6a6a6"></i> Edit Profile</a></small>
          @endguest
         
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @guest
      
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
            $segment = Request::segment(2);
          ?>     
          <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link 
              @if(!$segment)
              active
              @endif
              ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link 
              @if($segment=='categories')
              active
              @endif">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.news.index') }}" class="nav-link 
              @if($segment=='news')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                News
              </p>
            </a>
          </li>
          <li class="nav-header">Action</li>
          @else

          <?php
            $segment = Request::segment(2);
          ?>     
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link 
              @if(!$segment)
              active
              @endif
              ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              @if($segment=='categories')
              active
              @endif">
              <i class="far fa-address-card"></i>
              <p>
               VA Profile
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link 
              @if($segment=='categories')
              active
              @endif">
              <i class="fas fa-th-list"></i>
              <p>
                Product List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              @if($segment=='news')
              active
              @endif">
              <i class="far fa-credit-card"></i>
              <p>
                Load Account
              </p>
            </a>
          </li>
          <li class="nav-header">Action</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


           
          </li>
          @endguest
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://247virtualagent">TWF 24/7 Virtual Agent</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {


    $('#example').DataTable( {
        
       "fixedHeader": {
          header: true,
          footer: true,

      },
      "columnDefs": [ {
      "targets": [ 0, 7 ],
      "orderable": false
      } ],
        scrollY:  '1000px',
        scrollX:  false,
        dom: 'Bfrtip',
        // "pageLength": 50,
        "bPaginate": false,
        responsive: true,

        buttons: [

        {
                       extend:    'copyHtml5',
                       text:      '<i class="fa fa-files-o"></i>',
                       titleAttr: 'Copy',
                   },
                   {
                       extend:    'excelHtml5',
                       text:      '<i class="fa fa-file-excel-o"></i>',
                       titleAttr: 'Excel',
                       title: 'TestFileName1'
                   },
                   {
                       extend:    'pdfHtml5',
                       text:      '<i class="fa fa-file-pdf-o"></i>',
                       titleAttr: 'PDF',
                       title: 'TestFileName2'
                   },
                   {
                       extend:    'print',
                       text:      '<i class="fa fa-print"></i>',
                       titleAttr: 'Print',
                       title: 'TestFileName3'

                   }

                   ]
        
    } );

    $('#example1').DataTable( {
        
       "fixedHeader": {
          header: true,
          footer: true,

      },
      "columnDefs": [ {
      "targets": [ 0, 7 ],
      "orderable": false
      } ],
        scrollY:  '1000px',
        scrollX:  false,
        dom: 'Bfrtip',
        // "pageLength": 50,
        "bPaginate": false,

        buttons: [

        {
                       extend:    'copyHtml5',
                       text:      '<i class="fa fa-files-o"></i>',
                       titleAttr: 'Copy'
                   },
                   {
                       extend:    'excelHtml5',
                       text:      '<i class="fa fa-file-excel-o"></i>',
                       titleAttr: 'Excel',
                       title: 'TestFileName1'
                   },
                   {
                       extend:    'pdfHtml5',
                       text:      '<i class="fa fa-file-pdf-o"></i>',
                       titleAttr: 'PDF',
                       title: 'TestFileName2'
                   },
                   {
                       extend:    'print',
                       text:      '<i class="fa fa-print"></i>',
                       titleAttr: 'Print',
                       title: 'TestFileName3'

                   }

                   ]
        
    } );

    


    $("#checkout").click(function(){
      var id = $(this).data('2');
      var oldWallet = $(this).data('1');
      var totalQty = $(this).data('3');
      var token = $("#tablee .hdn-token").val();

      var wallet = oldWallet - totalQty;

         $.post('user/' + id,
         {'id':id, 'wallet':wallet,'_token':token}, 
         function(data){

        


          }); 


    });   


    $(".add-cart").click(function(){
      var wallet = $("#exampleModalCenter .hdn-wallet").val();
      var pid = $("#exampleModalCenter .hdn-pid").val();
      var id = $("#exampleModalCenter .hdn-id").val();
      var token = $("#exampleModalCenter .hdn-token").val();
      console.log(id, pid);





       

      
     
    });   
    $(".remove-cart").click(function(){

      var id = $(this).attr('pid');

      $("#modal_confirmation .hdn-pid").val( id );
      $("#yes").attr("href", 'remove-to-cart/' + id );



    });  

   

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }

    $(".buy").click(function(){
      // $("[data-toggle='popover']").popover('toggle');
      var wallet = $(this).data('1');
      var id = $(this).attr("id1"); 
    
      var pid = $(this).attr("pid");
      var image = $(this).attr("image");      
      var brand = $(this).attr("brand");
      var asin = $(this).attr("asin");      
      var price = $(this).attr("price");      
      var unit_sold_mo = $(this).attr("unit_sold_mo");
      var reven_mo = $(this).attr("reven_mo");      
      var sellers = $(this).attr("sellers");
      var eq_units = $(this).attr("eq_units");      
      var eq_reven = $(this).attr("eq_reven");
      // var website = $(this).attr("website");      
      // var fname = $(this).attr("fname");
      // var lname = $(this).attr("lname");
      // var address = $(this).attr("address");      
      // var contact_no = $(this).attr("contact_no");
      // var position = $(this).attr("position");
      // var email = $(this).attr("email");
      // var fullname =  fname + " " + lname;
      // var prod_link = $(this).attr("prod_link");
      var token = $("#exampleModalCenter .hdn-token").val();

      $("#exampleModalCenter .hdn-pid").val( pid );
      $("#exampleModalCenter .hdn-wallet").val( wallet );
      $(".numb h5").html("Prime Price: $" + formatNumber(price));
      document.getElementById('units_mo').innerHTML ="Units Sold/Mo: " + formatNumber(unit_sold_mo);
      document.getElementById('reven_mo').innerHTML ="Revenue/Mo: $" + formatNumber(reven_mo);
      document.getElementById('sellers').innerHTML ="Competitive Sellers: " + sellers;
      document.getElementById('eq_units').innerHTML ="Equity Units/Mo: " + formatNumber(eq_units);
      document.getElementById('eq_reven').innerHTML ="Equity Revenue/Mo: $" + formatNumber(eq_reven);
      // $("#prod_link").attr("href", prod_link);
      // $("#web").attr("href", website);
      // $("#email").attr("href", email);
      // $("#web").text(website);
      // $("#email").text(email);
     
      // document.getElementById("brand").innerHTML = "Brand: " + brand;
      // document.getElementById("asin").innerHTML = "ASIN: " + asin;
      // document.getElementById("name").innerHTML = "Name: " + fullname;      
      // document.getElementById("position").innerHTML = "Position: " + position;
      // document.getElementById("address").innerHTML = "Address: " + address;
      // document.getElementById("contact").innerHTML = "Contact No: " + contact_no;

      $("#pic").attr("src", image);
      $("#add-cart").attr("href", "/add-to-cart/" + pid );

    });
    


} );
</script>