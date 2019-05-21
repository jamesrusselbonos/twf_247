
  
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
	                <th>Prime Low Price</th>
	                <th>Units Sold/Mo</th>
	                <th>Revenue/Mo</th>
	                <th>Competitive</br>  Sellers</th>
	                <th>Sales Equity</br> (Units/Mo)</th>
	                <th>Sales Equity</br>  (Revenue/Mo)</th>
	                <th>Action</th>
	                

	            </tr>	            
<!-- 	            <tr class="hidden-tr">
	            	<th style="">Product Image</th>
	                <th>Prime Low Price</th>
	                <th class ="resize-col">Units Sold/Mo</th>
	                <th class ="resize-col">Revenue/Mo</th>
	                <th class ="resize-col">Competitive Sellers</th>
	                <th>Sales Equity</br> (Units/Mo)</th>
	                <th class ="resize-col">Sales Equity (Revenue/Mo)</th>
	                <th>Action</th>
	                

	            </tr> -->
	        </thead>
	        <tbody>

<!-- data-toggle="modal" data-target="#exampleModalCenter"  -->
	        	{{ var_dump(auth()->user()->wallet) }}
				
	        	@foreach ($products as $product)
	        	{{csrf_field()}}
	        	<input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	        	              <tr>
	        	              	@if( auth()->user()->wallet > 0 )
	        	              	  <td><img src="{{ asset($product->image) }}" /></td>
	        	                  <td>${{ number_format($product->prime_low_price,2) }}</td>
	        	                  <td>{{ $product->total_units_sold_mo }}</td>
	        	                  <td>${{ number_format($product->total_revenue_mo,2) }}</td>
	        	                  <td>{{ $product->competitive_sellers }}</td>
	        	                  <td>{{ $product->our_sales_equity_units_mo }}</td>
	        	                  <td>${{ number_format($product->our_sales_equity_revenue_mo,2) }}</td>
	        	                   <!-- data-placement="left" data-toggle="popover"  data-content="My popover content.My popover content.My popover content.My popover content."  -->
	        	                  <!-- onclick="ConfirmDialog()" data-toggle="modal" data-target="#exampleModalCenter"  -->
	        	                  <!-- <td><a href=" {{ $product->product_page_link }} " data-toggle="modal" data-target="#exampleModalCenter" data-1="{{ auth()->user()->wallet }}" data-2=" {{auth()->user()->id}} " data-3="{{ $product->pid }}" class="btn btn-warning buy "> Buy Now </a></td> -->
	        	                  <!-- <td><button type="button"  data-1="{{ auth()->user()->wallet }}"  data-toggle="modal" data-target="#exampleModalCenter" pid="{{ $product->pid }}" id="buy" id1=" {{auth()->user()->id}} " class="btn btn-warning buy ">Buy Now</button></td> -->
	        	                  <td><button type="button"  data-1="{{ auth()->user()->wallet }}"  id="buy" id1=" {{auth()->user()->id}} " class="btn btn-warning buy " data-toggle="modal" data-target="#exampleModalCenter"
	        	                  	pid ="{{ $product->pid }}" image ="{{ asset($product->image) }}" brand ="{{ $product->brand }}" asin="{{ $product->asin }}" prod_link ="{{ $product->product_page_link }}" price ="{{ $product->prime_low_price }}" unit_sold_mo ="{{ $product->total_units_sold_mo }}" reven_mo ="{{ $product->total_revenue_mo}}" 
	        	                  	sellers ="{{ $product->competitive_sellers}}" eq_units ="{{ $product->our_sales_equity_units_mo}}" eq_reven ="{{ $product->our_sales_equity_revenue_mo }}" website ="{{ $product->website_url }}" fname ="{{ $product->firstname }}"  lname ="{{ $product->lastname }}" address ="{{ $product->address }}"  
	        	                  	contact_no="{{ $product->contact_no}}" position="{{ $product->position}}" email="{{ $product->email}}">Buy Now</button></td>
<!-- 	        	               <!- target="_blank"   <td><button type="button"  id="buy" target="_blank" data-1="{{ auth()->user()->wallet }}" data-2=" {{auth()->user()->id}} " data-3="{{ $product->pid }}" class="btn btn-warning buy " >Buy Now</button></td>
 -->	        	              @elseif ( auth()->user()->wallet <= 0 )

	        	                	<td><img src="{{ asset($product->image) }}" /></td>
	        	                  <td>{{ $product->prime_low_price }}</td>
	        	                  <td>{{ $product->total_units_sold_mo }}</td>
	        	                  <td>{{ $product->total_revenue_mo }}</td>
	        	                  <td>{{ $product->competitive_sellers }}</td>
	        	                  <td>{{ $product->our_sales_equity_units_mo }}</td>
	        	                  <td>{{ $product->our_sales_equity_revenue_mo }}</td>
	        	                    <td><button type="button"  id="buy1" class="btn btn-warning" >Buy Credits</button></td>

	        	                @endif
	        	                  
	        	              </tr>
	        	 @endforeach
	        </tbody>
	        <tfoot>
	            <tr>
	            	<th >Product Image</th>
	                <th>Prime Low Price</th>
	                <th class ="resize-col1">Units Sold/Mo</th>
	                <th class ="resize-col1">Revenue/Mo</th>
	                <th class ="resize-col1">Competitive</br>  Sellers</th>
	                <th>Sales Equity</br> (Units/Mo)</th>
	                <th class ="resize-col1">Sales Equity</br>  (Revenue/Mo)</th>
	                <th>Action</th>

	            </tr>
	        </tfoot>
	    </table>



	   
@endsection