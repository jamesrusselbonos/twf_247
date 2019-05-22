
  
<style type="text/css">
	#example img{

		display:block; width:100%; height:auto;

	}


	#example td{
		text-align: center;

	}
	.buts {
		margin-left: 450px;

	}
	.buts .close-cart, .add-cart{
		cursor: pointer;
	}

	.details{

		border: 10px;
	}
	img {
	  max-width: 100%; }

	.preview {
	  display: -webkit-box;
	  display: -webkit-flex;
	  display: -ms-flexbox;
	  display: flex;
	  -webkit-box-orient: vertical;
	  -webkit-box-direction: normal;
	  -webkit-flex-direction: column;
	      -ms-flex-direction: column;
	          flex-direction: column; }
	  @media screen and (max-width: 996px) {
	    .preview {
	      margin-bottom: 20px; } }

	.preview-pic {
	  -webkit-box-flex: 1;
	  -webkit-flex-grow: 1;
	      -ms-flex-positive: 1;
	          flex-grow: 1; }

	.preview-thumbnail.nav-tabs {
	  border: none;
	  margin-top: 15px; }
	  .preview-thumbnail.nav-tabs li {
	    width: 18%;
	    margin-right: 2.5%; }
	    .preview-thumbnail.nav-tabs li img {
	      max-width: 100%;
	      display: block; }
	    .preview-thumbnail.nav-tabs li a {
	      padding: 0;
	      margin: 0; }
	    .preview-thumbnail.nav-tabs li:last-of-type {
	      margin-right: 0; }

	.tab-content {
	  overflow: hidden; }
	  .tab-content img {
	    width: 100%;
	    -webkit-animation-name: opacity;
	            animation-name: opacity;
	    -webkit-animation-duration: .3s;
	            animation-duration: .3s; }

	.card {
	  margin-top: 50px;
	  background: #eee;
	  padding: 3em;
	  line-height: 1.5em; }

	
	.details {
	  display: -webkit-box;
	  display: -webkit-flex;
	  display: -ms-flexbox;
	  display: flex;
	  -webkit-box-orient: vertical;
	  -webkit-box-direction: normal;
	  -webkit-flex-direction: column;
	      -ms-flex-direction: column;
	          flex-direction: column; }

	.colors {
	  -webkit-box-flex: 1;
	  -webkit-flex-grow: 1;
	      -ms-flex-positive: 1;
	          flex-grow: 1; }

	.product-title, .price, .colors {
	  text-transform: UPPERCASE;
	  font-weight: bold; }

	.checked, .price span {
	  color: #ff9f1a; }

	.product-title, .rating, .product-description, .price {
	  margin-bottom: 15px; }

	.product-title {
	  margin-top: 0; }



	.color {
	  display: inline-block;
	  vertical-align: middle;
	  margin-right: 10px;
	  height: 2em;
	  width: 2em;
	  border-radius: 2px; }
	  .color:first-of-type {
	    margin-left: 20px; }

</style>

@extends('layouts.admin')
	
	
@section('content')

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
	<table id="example" class="display nowrap table-responsive" style="width:100%">
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



	   
@endsection


