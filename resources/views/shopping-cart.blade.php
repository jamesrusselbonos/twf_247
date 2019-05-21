@extends('layouts.admin')



@section('title')
    Laravel Shopping Cart
@endsection

<style type="text/css">
		#test img{

		display:block; width:150px; height:auto;

	}


	#test td{
		text-align: center;

	}
</style>
@section('content')

	@if(Session::has('cart'))
			<div class="container">
				<h1>Shopping Cart</h1>
				<table id="test" class="display nowrap table-responsive-md table table-striped" cellspacing="0" width="100%">
				        <thead>
				            <tr>

				            	<th>Product Image</th>
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
				                <th>Address</th>
				                <th>Contact No</th>
				                <th>Email</th>
				                <th>Website URL</th>
				                <th>Action</th>
				                

				            </tr>	            

				        </thead>
				        <tbody>


				        	@foreach ($products as $product)

				        	{{csrf_field()}}
				        	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
				        	              <tr>
				        	              
				        	              	  <td><img src="{{ asset($product['item']['image']) }}" /></td>
				        	                  <td>{{ $product['item']['brand'] }}</td>
				        	                  <td>{{ $product['item']['asin'] }}</td>
				        	                  <td>${{ number_format($product['item']['prime_low_price'],2) }}</td>
				        	                  <td>{{ $product['item']['total_units_sold_mo'] }}</td>
				        	                  <td>${{ number_format($product['item']['total_revenue_mo'],2) }}</td>
				        	                  <td>{{ $product['item']['competitive_sellers'] }}</td>
				        	                  <td>{{ $product['item']['our_sales_equity_units_mo'] }}</td>
				        	                  <td>${{ number_format($product['item']['our_sales_equity_revenue_mo'],2) }}</td>
				        	              	  <td>{{ $product['item']['firstname'] }} {{ $product['item']['lastname'] }}</td>
				        	              	  <td>{{ $product['item']['position'] }}</td>
				        	              	  <td>{{ $product['item']['address'] }}</td>
				        	              	  <td>{{ $product['item']['contact_no'] }}</td>
				        	              	  <td>{{ $product['item']['email'] }}</td>
				        	              	  <td>{{ $product['item']['website_url'] }}</td>


				        	                  <td><a href="{{ route('product.removeCart', ['id' => $product['item']['pid']]) }}" data-1="{{ auth()->user()->wallet }}"  id="buy" id1=" {{auth()->user()->id}} " class="btn btn-danger buy " 
				        	                  	pid ="{{ $product['item']['pid'] }}" image ="{{ asset($product['item']['image']) }}" >Remove</a></td>
		 	        	               
				        	              </tr>
				        	 @endforeach
				        </tbody>

				    </table>
				    <div class="row">
				    	<div class="col-md-6" style="">
				    		<strong>Total: {{ count($products)}}</strong>
				    	</div>
				    </div>		
				    <hr>
				    <div class="row">
				    	<div class="col-md-6">
				    		<a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
				    		<button type="button" class="btn btn-success">Checkout</button>

				    	</div>
				    </div>
	
		
	@else
	
		<div class="row">
			<div class="col-md-6">
				<center><h1>No Item</h1></center>
			</div>
		</div>

	@endif	
</div>
@endsection

