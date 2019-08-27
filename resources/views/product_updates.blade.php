

 @extends('layouts.admin_dashboard')
  
 @section('content')
 
  <br />
  
  <div class="container">
  <h3 align="center">Product Updates</h3>
    <br />
   
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped display" id ="example" style="width:100%">
        <thead>
            <tr>       
                <th>Updated By</th>
                <th>Updated On</th>
                <th>ASIN</th>
                <th>Brand</th>
                <th style="width: 20%; text-overflow: ellipsis;">Amazon Link</th>                
                

            </tr> 
        </thead>    
          <tbody>       

          @foreach($products as $product)

            <tr>
                  @if($product->updated_by == null)
                  <td>None</td>
                  @else
                  <td>{{ $product->user->name }}</td>
                  @endif
                  <td>{{ $product->updated_at }}</td>
                  <td>{{ $product->asin }}</td>
                  <td>{{ $product->brand }}</td>
                  <td><a href="{{ $product->product_page_link }}" target="_blank">{{ $product->product_page_link }}</a></td>
                  
                 
                              
                                        
            </tr>
       
          @endforeach
     </tbody>

      </table>
     </div>
    </div>
   </div>
  </div>
  @endsection

