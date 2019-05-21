
@extends('layouts.app')
<style type="text/css">

.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>
@section('content')

<div class="container">
  <form method="POST" id="add_product" action="{{ route('addproduct.store') }}" enctype="multipart/form-data">
    <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  	<div class="form-row">
      <div class="form-group col-md-4">
          <img id='img-upload'/>
      </div>
  	</div>

  	
  <div class="form-row">
      <div class="form-group col-md-4">

        <label>Product Image</label>
        <div class="input-group">
            <span class="input-group-btn" style="margin-right:70px;">
                <span class="btn btn-default btn-file">
                   <button class="btn btn-outline-secondary"  type="button"> Browse… </button>  <input type="file"  name="product_image" id="imgInp">
                </span>
            </span>
            <input type="text" style="cursor:not-allowed;"  class="form-control" readonly>
        </div>
       
    </div>

    <div class="form-group col-md-4">
      <label>Brand</label>
      <input type="text" name="brand" class="form-control" >
    </div>

    <div class="form-group col-md-4">
      <label >ASIN</label>
      <input type="text" name="asin" class="form-control" id="asin" >
    </div>
    
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >Product Page Link</label>
      <textarea id="product_link" name="product_page_link"  rows="4" cols="70">
  </textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Prime Low Price</label>
      <input type="text" name="prime_low_price" class="form-control" >
    </div>
    <div class="form-group col-md-4">
      <label>Total Units Sold/Mo</label>
      <input type="text" name="total_units_sold_mo" class="form-control" >
    </div>
    <div class="form-group col-md-4">
      <label >Total Revenue/Mo</label>
      <input type="text" name="total_revenue_mo" class="form-control" id="inputCity">
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Competitive Sellers</label>
      <input type="text" name="competitive_sellers" class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label >Sales Equity(Units/Mo)</label>
      <input type="text" name="our_sales_equity_units_mo" class="form-control" >
    </div>
    <div class="form-group col-md-4">
      <label >Sales Equity(Revenue/Mo)</label>
      <input type="text" name="our_sales_equity_revenue_mo" class="form-control">
    </div>
  </div>

    <div class="form-row">
    <div class="form-group col-md-4">
      <label>Website URL</label>
      <input type="text" name="website_url" class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label >Firstname</label>
      <input type="text" name="firstname" class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label >Lastname</label>
      <input type="text" name="lastname" class="form-control">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label >Address</label>
      <textarea id="address" name="address" rows="4" cols="70">
	</textarea>
    </div>

  </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label >Contact No</label>
        <input type="text" name="contact_no" class="form-control">
      </div>
    <div class="form-group col-md-4">
      <label >Position</label>
      <input type="text" name="position" class="form-control">
    </div>
    <div class="form-group col-md-4">
      <label>Email Address</label>
      <input type="text" name="email" class="form-control">
    </div>
  </div>
    

  <button type="submit" class="btn btn-primary add">Add Product</button>
</form>
</div>
@endsection
