

<html>
  <head>



  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  	<link href="{{ asset('css/style.css') }}">

  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  	
  	<style type="text/css">
  		
  		#example1 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#example1 td, #example1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#example1tr:nth-child(even){background-color: #f2f2f2;}

#example1 tr:hover {background-color: #ddd;}

#example1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}


  		#example1 {

  			margin:25px:

  		}
  		

  		#example1 td{
  			max-width: 100px;
  			text-align: center;
  			overflow: hidden;
  			text-overflow: ellipsis;
  			   white-space: nowrap;

  		}
  		.buts {
  			margin-left: 450px;

  		}
  		.buts .close-cart, .add-cart{
  			cursor: pointer;
  		}

  		

  	</style>
  </head>


<body>

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

 

</nav>

	<div class="container">
	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}"><br>
	<table id="example1" class="display nowrap table-responsive" style="max-width:100%;">
	        <thead>
	            <tr class="fixed-tr"  >

	            		<!-- <th>Product Image</th> -->
	            		<th>Product Link</th>
	            		<th>Brand</th>
	            		<th>ASIN</th>
	            	    <th>Prime Low Price</th>
	            	    <th>Units Sold/Mo</th>
	            	    <th>Revenue/Mo</th>
	            	    <th>Competitive</br>  Sellers</th>
	            	    <th>Sales Equity</br> (Units/Mo)</th>
	            	    <th>Sales Equity</br>  (Revenue/Mo)</th>
	            	    <th>Name</th>
	            	    <th>Position</th>
	            	    <th>Website URL</th>
	            	    <th>Contact No</th>
	            	    <th>Address</th>
	            	    <th>Email</th>

	                

	            </tr>	            
	        </thead>
	        <tbody>

				
	        	@foreach ($products as $product)
	        	{{csrf_field()}}
	        	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	        	              <tr>
	        	              
	        	              	  <!-- <td><img src="{{ asset($product['item']['image']) }}" /></td> -->
	        	              	  <td><a href="{{ $product['item']['product_page_link'] }}" target="_blank"> {{ $product['item']['product_page_link'] }}</a></td> 
	        	              	      <td>{{ ucwords($product['item']['brand']) }}</td>
	        	              	      <td>{{ $product['item']['asin'] }}</td>
	        	              	      <td>${{ number_format($product['item']['prime_low_price'],2) }}</td>
	        	              	      <td>{{ number_format($product['item']['total_units_sold_mo']) }}</td>
	        	              	      <td>${{ number_format($product['item']['total_revenue_mo'],2) }}</td>
	        	              	      <td>{{ $product['item']['competitive_sellers'] }}</td>
	        	              	      <td>{{ number_format($product['item']['our_sales_equity_units_mo']) }}</td>
	        	              	      <td>${{ number_format($product['item']['our_sales_equity_revenue_mo'],2) }}</td>
	        	              	  	  <td>{{ ucwords($product['item']['firstname']) }} {{ ucwords($product['item']['lastname']) }}</td>
	        	              	  	  <td>{{ ucwords($product['item']['position']) }}</td>
	        	              	  	  <td>{{ $product['item']['website_url'] }}</td>
	        	              	  	  <td>{{ $product['item']['contact_no'] }}</td>
	        	              	  	  <td>{{ $product['item']['address'] }}</td>
	        	              	  	  <td>{{ $product['item']['email'] }}</td>
	        	              	  	  
	        	              </tr>
	        	 @endforeach
	        </tbody>

	    </table>
</div>
	</body>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

</html>

<script type="text/javascript">
	$(document).ready(function() {

	$('#example1').DataTable( {
	    
	   "fixedHeader": {
	      header: true,
	      footer: true,

	  },
	  "columnDefs": [ {
	  "targets": [ 0, 7 ],
	  "orderable": false
	  } ],
	    
	    dom: 'Bfrtip',
	    // "pageLength": 50,
	    "bPaginate": false,
	    responsive: true,

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
	                   extend:    'csvHtml5',
	                   text:      '<i class="fas fa-file-csv"></i>',
	                   titleAttr: 'CSV',
	                   title: 'TestFileName3'
	               }

	               ]
	    
	} );
} );
</script>