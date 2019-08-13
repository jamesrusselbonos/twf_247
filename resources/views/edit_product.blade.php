
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@section('content')
  <div class="container">
    <div style="margin-top: 30px;" class="row">
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <h1 style="text-align: right; font-size: 40px; margin-top: 20px;">Edit a product</h1>
      </div>
      <div  class="col-lg-10 col-md-10 col-sm-12 col-xs-12 addprod">

        <form method="POST" id="edit_product" action="{{ route('product.update', $products->pid) }}" enctype="multipart/form-data">
        <form enctype="multipart/form-data" id="frm_update">
          <input id="hdn-token" type="hidden" name="_token" value="{{ csrf_token() }}">
          <input id="pid" type="hidden" name="pid" value="{{ $products->pid }}">

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div style="padding-top: 20px;" class="form-row">
            <div style="width: 00px; height: 450px; background-color: #f2f2f2;" class="form-group col-md-6">
            @if($products->image != null)
              <img src="{{ asset($products->image) }}" id='img-upload'>

            @else
              <img id='img-upload'>
            @endif
            </div>
            <div style="padding-left: 15px;" class="form-group col-md-6">
             <div class="form-row">
               <label>Product Image</label>
               <div class="input-group">
                   <span class="input-group-btn" style="margin-right:70px;">
                       <span class="btn btn-default btn-file">
                          <button class="btn btn-outline-secondary"  type="button"> Browse… </button>  <input type="file"  name="product_image" id="imgInp">
                       </span>
                   </span>
                   <input type="text" value="{{$products->image}}" style="cursor:not-allowed;"  class="form-control" readonly>
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label>Brand</label>
                 <input type="text" name="brand" class="form-control" value="{{$products->brand}}">
               </div>

               <div class="form-group col-md-6">
                 <label >ASIN</label>
                 <input type="text" name="asin" class="form-control" id="asin" value="{{$products->asin}}">
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label >Product Page Link</label>
                 <textarea id="product_link" name="product_page_link"  rows="4" cols="55">{{ $products->product_page_link }}
                  </textarea>
               </div>
             </div>

             <div class="form-row">
              <div class="form-group col-md-6">
                <label >Prime Low Price</label>
                <input type="text" name="prime_low_price" class="form-control" value="{{$products->prime_low_price}}">
              </div>
              <div class="form-group col-md-6">
                <label>Total Units Sold/Mo</label>
                <input type="text" name="total_units_sold_mo" class="form-control" value="{{$products->total_units_sold_mo}}">
              </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label >Total Revenue/Mo</label>
                 <input type="text" name="total_revenue_mo" class="form-control" id="inputRev" value="{{$products->total_revenue_mo}}">
               </div>
               <div class="form-group col-md-6">
                 <label >Competitive Sellers</label>
                 <input type="text" name="competitive_sellers" class="form-control" value="{{$products->competitive_sellers}}">
               </div>
             </div>

             <div class="form-row">
              <div class="form-group col-md-6">
                <label >Sales Equity(Units/Mo)</label>
                <input type="text" name="our_sales_equity_units_mo" class="form-control" value="{{$products->our_sales_equity_units_mo}}">
              </div>
               <div class="form-group col-md-6">
                  <label >Sales Equity(Revenue/Mo)</label>
                  <input type="text" name="our_sales_equity_revenue_mo" class="form-control"value="{{$products->our_sales_equity_revenue_mo}}">
                </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                  <label>Website URL</label>
                  <input type="text" name="website_url" id="website_url" class="form-control" value="{{$products->website_url}}">
                </div>
               <div class="form-group col-md-6">
                 <label >Firstname</label>
                 <input type="text" name="firstname" id="firstname" class="form-control" value="{{$products->firstname}}">
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label >Lastname</label>
                 <input type="text" name="lastname" id="lastname" class="form-control" value="{{$products->lastname}}">
               </div>
               <div class="form-group col-md-6">
                 <label >Contact No</label>
                 <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{$products->contact_no}}">
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label >Address</label>
                 <textarea id="address" name="address" id="address" rows="4" cols="55">{{$products->address}}
                 </textarea>
               </div>
             </div>

             <div class="form-row">
               <div class="form-group col-md-6">
                 <label >Position</label>
                 <input type="text" name="position" id="position" class="form-control" value="{{$products->position}}">
               </div>
                <div class="form-group col-md-6">
                 <label>Email Address</label>
                 <input type="text" name="email" id="email" class="form-control" value="{{$products->email}}">
               </div>
             </div>

             <div class="form-row">
                <div style="text-align: right; padding-top: 30px;" class="col-md-12">
                    <button type="submit" pid="{{$products->pid}}" class="btn btn-primary update-product">Update</button>
                </div>
             </div>
            </div>
          </div>
        </form>
    
      </div>
    </div>
  </div>

@endsection
