<style type="text/css">

    #example td {
        text-align: center;
    }
    
    .buts {
        margin-left: 450px;
    }
    
    .buts .close-cart,
    .add-cart {
        cursor: pointer;
    }
    
    .details {
        border: 10px;
    }
    
    img {
        max-width: 100%;
    }
    
    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px;
        }
    }
    
    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    
    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px;
    }
    
    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%;
    }
    
    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block;
    }
    
    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }
    
    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0;
    }
    
    .tab-content {
        overflow: hidden;
    }
    
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }
    
    .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em;
    }
    
    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    
    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    
    .product-title,
    .price,
    .colors {
        text-transform: UPPERCASE;
        font-weight: bold;
    }
    
    .checked,
    .price span {
        color: #ff9f1a;
    }
    
    .product-title,
    .rating,
    .product-description,
    .price {
        margin-bottom: 15px;
    }
    
    .product-title {
        margin-top: 0;
    }
    
    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px;
    }
    
    .color:first-of-type {
        margin-left: 20px;
    }
    
    div.dt-buttons {
        display: none;
    }
    

    #blocking_div{
    	position: fixed;
    }
    .blockPage{
        width: auto !important;
        left:55% !important;
        top: 55% !important;
    }
    .tbl_prod img{
        display:block; 
        width:150px !important; 
        height:150px !important;
    }
</style>@extends('layouts.admin')@section('content')
<div class="modal fade " id="exampleModalCenter" role="dialog">
    <div class="modal-dialog modal-lg modal-full-height modal-right">
        <div class="modal-content" style="background: #eee" ;>
            <!-- <div class="modal-header"> <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>-->
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active prod_img" id="pic-1"><img id="pic" src="" /></div>
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">Product Details</h3>
                            <div class="row">
                                <div class="numb col-md-12">
                                    <h5 class="price"></h5>
                                    <label id="units_mo"></label>
                                    </br>
                                    <label id="reven_mo"></label>
                                    </br>
                                    <label id="sellers"></label>
                                    </br>
                                    <label id="eq_units"></label>
                                    </br>
                                    <label id="eq_reven"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                <input id="hdn-token" class="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
                <input id="hdn-pid" class="hdn-pid" type="hidden" name="pid" value="">
                <input id="hdn-wallet" class="hdn-wallet" type="hidden" name="wallet" value="">
                <input id="hdn-id" class="hdn-id" type="hidden" name="id" value="{{auth()->user()->id}}">
                <div class="buts"> <a href="" class="add-cart btn btn-warning" id="add-cart">ADD TO CART</a>
                    <button type="button" class="close-cart btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
<div id="blocking_div">
	<input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
	<table id="example" class="display nowrap table-responsive tbl_prod" style="width:100%">
	    <thead>
	        <tr class="fixed-tr">
	            <th>Product Image</th>
	            <th>Prime Low Price</th>
	            <th>Units Sold/Mo</th>
	            <th>Revenue/Mo</th>
	            <th>Competitive</br> Sellers</th>
	            <th>Sales Equity</br> (Units/Mo)</th>
	            <th>Sales Equity</br> (Revenue/Mo)</th>
	            <th>Action</th>
	        </tr>
	    </thead>
	    <tbody> @foreach($products as $product) @if($product->deleted==0)
	        <tr>
	            <td><img src="{{asset($product->image)}}" /></td>
	            <td>${{number_format($product->prime_low_price,2)}}</td>
	            <td>{{number_format($product->total_units_sold_mo)}}</td>
	            <td>${{number_format($product->total_revenue_mo,2)}}</td>
	            <td>{{$product->competitive_sellers}}</td>
	            <td>{{number_format($product->our_sales_equity_units_mo)}}</td>
	            <td>${{number_format($product->our_sales_equity_revenue_mo,2)}}</td>@if( auth()->user()->wallet > 0 )
	            <td>
	                <button type="button" data-1="{{auth()->user()->wallet}}" id="buy" id1="{{auth()->user()->id}}" class="btn btn-warning buy " data-toggle="modal" data-target="#exampleModalCenter" pid="{{$product->pid}}" image="{{asset($product->image)}}" price="{{$product->prime_low_price}}" unit_sold_mo="{{$product->total_units_sold_mo}}" reven_mo="{{$product->total_revenue_mo}}" sellers="{{$product->competitive_sellers}}" eq_units="{{$product->our_sales_equity_units_mo}}" eq_reven="{{$product->our_sales_equity_revenue_mo}}">Buy Now</button>
	            </td>@elseif ( auth()->user()->wallet
	            <=0 ) <td><a href="{{url('/load_account')}}" id="credits" class="btn btn-warning credits">Buy Credits</a></td>@endif </tr>@endif @endforeach
	        <input id="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">{{csrf_field()}}</tbody>
	    <tfoot>
	        <tr>
	            <th>Product Image</th>
	            <th>Prime Low Price</th>
	            <th class="resize-col1">Units Sold/Mo</th>
	            <th class="resize-col1">Revenue/Mo</th>
	            <th class="resize-col1">Competitive</br> Sellers</th>
	            <th>Sales Equity</br> (Units/Mo)</th>
	            <th class="resize-col1">Sales Equity</br> (Revenue/Mo)</th>
	            <th>Action</th>
	        </tr>
	    </tfoot>
	</table> 

		</div>

<script type="text/javascript">
$(document).ready(function() { 
    // $.fn.center = function () {
    //     this.css("position","absolute");
    //     this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    //     this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    //     return this;
    // }
    if({{Auth::user()->wallet == 0}}){
        $.blockUI({ message: '<a href="{{url('/load_account')}}" class="btn btn-warning block_btn">Buy Credits</a>' });
    	// $('#blocking_div').block({ });
        // $.blockUI({ message: '<h1><img src="busy.gif" /> Just a moment...</h1>' });
    	// $('.blockOverlay').attr('title','Click to unblock').click($.unblockUI); 
        // $('.blockUI.blockMsg').center();

    }
  
       

}); 

</script>
@endsection