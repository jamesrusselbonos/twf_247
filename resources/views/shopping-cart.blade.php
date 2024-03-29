@extends('layouts.admin')



@section('title')
    Laravel Shopping Cart
@endsection

<style type="text/css">
		#test img{

		display:block; width:50px; height:auto;

	}


	#test td{
		text-align: center;

	}

	#tablee{

		overflow: scroll; /* Scrollbar are always visible */
		overflow: auto;  
	}




</style>


@section('content')
<div class="container" id="tablee">
	<!-- Modal -->
	<div class="modal fade" id="modal_confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      	Are you sure?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
	        <a href="" id="yes" class="btn btn-primary yes">Yes</a>
	        <input id="hdn-pid" class="hdn-pid" type="hidden" name="pid" value="">
	        <input id="hdn-token" class="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	      </div>
	    </div>
	  </div>
	</div>
	@if(Session::has('cart'))
			
				<input id="hdn-token" class="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
				<h1>Shopping Cart</h1>
				<table id="test" class="display nowrap table-responsive-sm table table-striped" cellspacing="0" width="100%">
				        <thead>
				            <tr>

				            	<th>Product Image</th>		                
				                <th>Prime Low Price</th>
				                <th>Units Sold/Mo</th>
				                <th>Revenue/Mo</th>
				                <th>Competitive</br>  Sellers</th>
				                <th>Sales Equity</br> (Units/Mo)</th>
				                <th>Sales Equity</br>  (Revenue/Mo)</th>
				                <th>Action</th>
				                

				            </tr>	            

				        </thead>
				        <tbody>


				        	@foreach ($products as $product)

				        	{{csrf_field()}}
				        	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
				        	              <tr>
				        	              
				        	              	   <td><img src="{{ asset($product['item']['image']) }}" /></td>
				        	                  <td>${{ number_format($product['item']['prime_low_price'],2) }}</td>
				        	                  <td>{{ number_format($product['item']['total_units_sold_mo']) }}</td>
				        	                  <td>${{ number_format($product['item']['total_revenue_mo'],2) }}</td>
				        	                  <td>{{ $product['item']['competitive_sellers'] }}</td>
				        	                  <td>{{ number_format($product['item']['our_sales_equity_units_mo']) }}</td>
				        	                  <td>${{ number_format($product['item']['our_sales_equity_revenue_mo'],2) }}</td>
				        	                 <!--  <td><a href="{{ route('product.removeCart', ['id' => $product['item']['pid']]) }}" data-1="{{ auth()->user()->wallet }}"  id="buy" id1=" {{auth()->user()->id}} " class="btn btn-danger buy " 
				        	                  	pid ="{{ $product['item']['pid'] }}" image ="{{ asset($product['item']['image']) }}" >Remove</a></td> -->
		 	        	                   		<td><button type="button" data-1="{{ auth()->user()->wallet }}" data-toggle="modal" data-target="#modal_confirmation" id="remove-cart" id1=" {{auth()->user()->id}} " class="btn btn-danger remove-cart " 
				        	                  	pid ="{{ $product['item']['pid'] }}">Remove</button></td>
		 	        	               
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
				    		<a href="{{ route('product.checkout') }}" class="btn btn-success" data-3="{{ count($products)}}"  data-1="{{ auth()->user()->wallet }}"  id="checkout" data-2=" {{auth()->user()->id}} ">Checkout</a>

				    	</div>
				    </div>
	
		
	@else
	
		<div class="row">
			<div class="col-md-12">
				<center><h1>No Item</h1></center>
			</div>
		</div>

	@endif	
</div>
@endsection

