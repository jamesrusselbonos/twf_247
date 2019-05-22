

<html>
  <head>



  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  	<link href="{{ asset('css/style.css') }}">

  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	
  	<style type="text/css">
  		#example1 img{

  			display:block; width:100%; height:auto;

  		}


  		#example1 td{
  			text-align: center;

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

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->

</nav>
	<div class="modal fade " id="exampleModalCenter" role="dialog">
	  <div class="modal-dialog modal-lg modal-full-height modal-right" >
	  	<div class="modal-content" style="background: #eee";>
<!-- 	       <div class="modal-header">
	         <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	           <span aria-hidden="true">&times;</span>
	         </button>
	       </div> -->
	        		<div class="card">
	        			<div class="container-fliud" >
	        				<div class="wrapper row">
	        					<div class="preview col-md-6">
	        						
	        						<div class="preview-pic tab-content">
	        						  <div class="tab-pane active prod_img" id="pic-1"><img id="pic" src="" /></div>

	        						</div>
	        						
	        						
	        					</div>
	        					<div class="details col-md-6">
	        						<center><h3 class="product-title">Product Details</h3></center>
	        						
	        						<div class="row">
	        							<div class="numb col-md-6">
		        							<h4 class="price"></h4>
		        							<label id="units_mo"></label> 
		        							<label id="reven_mo"></label>
		        							<label id="sellers"></label>
		        							<label id="eq_units"></label>
		        							<label id="eq_reven"></label>
		        						</div>

	        							<div class="numb col-md-6">
			        						<p id="brand"></p>
			        						<p id="asin"></p>
			        						<p id="address"></p>
			        						<p id="contact"></p>
			        						<p id="name"></p>
			        						<p id="position"></p>
			        						<p id="prod_link1">Product Link: <a href="" target="_blank" id="prod_link">Click Here</a></p>
			        						<p id="web1">Website: <a href="" target="_blank" id="web"></a></p>
			        						<p id="email1">Email: <a href="" target="_blank" id="email"></a></p>
	        						
	        							</div>
		        						
	        						</div>
	        					</div>
	        				</div>
	        			</div>

	        	
	        		</br>
	        	

	      <input id="hdn-token" class="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	      <input id="hdn-pid" class="hdn-pid" type="hidden" name="pid" value="">
	      <input id="hdn-wallet" class="hdn-wallet" type="hidden" name="wallet" value="">
	      <input id="hdn-id" class="hdn-id" type="hidden" name="id" value="{{ auth()->user()->id}}">
	      	<div class="buts">
	      		<!-- <button type="button" class="add-cart btn btn-warning">ADD TO CART</button> -->
	      		<a href="" class="add-cart btn btn-warning" id="add-cart">ADD TO CART</a>
	      		<button type="button" class="close-cart btn btn-secondary" data-dismiss="modal">CLOSE</button>
	      	</div>
	        
	      	</div>
	    </div>
	  </div>
	</div>

	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<table id="example1" class="display nowrap table-responsive" style="width:100%">
	        <thead>
	            <tr class="fixed-tr"  >

	            		<th>Product Image</th>
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

	        	{{ var_dump(auth()->user()->wallet) }}
				
	        	@foreach ($products as $product)
	        	{{csrf_field()}}
	        	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	        	              <tr>
	        	              
	        	              	  <td><img src="{{ asset($product['item']['image']) }}" /></td>
	        	              	  <td><a href="{{ $product['item']['product_page_link'] }}"> PRODUCT LINK</a></td> 
	        	              	      <td>{{ ucwords($product['item']['brand']) }}</td>
	        	              	      <td>{{ $product['item']['asin'] }}</td>
	        	              	      <td>${{ number_format($product['item']['prime_low_price'],2) }}</td>
	        	              	      <td>{{ $product['item']['total_units_sold_mo'] }}</td>
	        	              	      <td>${{ number_format($product['item']['total_revenue_mo'],2) }}</td>
	        	              	      <td>{{ $product['item']['competitive_sellers'] }}</td>
	        	              	      <td>{{ $product['item']['our_sales_equity_units_mo'] }}</td>
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
} );
</script>