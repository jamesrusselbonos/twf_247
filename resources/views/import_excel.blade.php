
 @extends('layouts.app')

 @section('content')
  <br />
  
  <div class="container">
   <h3 align="center">Import Excel File</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Customer Data</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">

            <tr>       
                <th>Brand</th>
                <th>ASIN</th>
                <th style="width: 20%; text-overflow: ellipsis;">Amazon Link</th>                
                <th>Prime Low Price</th>
                <th>Units Sold/Mo</th>
                <th>Revenue/Mo</th>
                <th>Competitive</br>  Sellers</th>
                <th>Sales Equity</br> (Units/Mo)</th>
                <th>Sales Equity</br>  (Revenue/Mo)</th>
                <th>Edit</th>

            </tr>             
          @foreach($data as $row)

            <tr>
                  <td>{{ $row->brand }}</td>
                  <td>{{ $row->asin }}</td>
                  <td><a href="{{ $row->product_page_link }}">{{ $row->product_page_link }}</a></td>                  
                  <td>${{ number_format($row->prime_low_price,2) }}</td>
                  <td>{{ number_format($row->total_units_sold_mo) }}</td>
                  <td>${{ number_format($row->total_revenue_mo,2) }}</td>
                  <td>{{ $row->competitive_sellers }}</td>
                  <td>{{ number_format($row->our_sales_equity_units_mo) }}</td>
                  <td>${{ number_format($row->our_sales_equity_revenue_mo,2) }}</td>
                  <td><center>
                    <a href="{{route('product.edit', $row->pid)}}" class="edit-product"
                      pid ="{{ $row->pid }}" brand="{{$row->brand}}" asin="{{$row->asin}}" product_page_link="{{$row->product_page_link}}" 
                      price ="{{ $row->prime_low_price }}" unit_sold_mo ="{{ $row->total_units_sold_mo }}" 
                      reven_mo ="{{ $row->total_revenue_mo}}" sellers ="{{ $row->competitive_sellers}}" 
                      eq_units ="{{ $row->our_sales_equity_units_mo}}" eq_reven ="{{ $row->our_sales_equity_revenue_mo }}" >
                      <i class="far fa-edit"></i>
                    </a>
                  </center></td>
                              
                                        
            </tr>
          @endforeach
     

      </table>
     </div>
    </div>
   </div>
  </div>
@endsection
