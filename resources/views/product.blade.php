
<!DOCTYPE html>
<html>
<head></head>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
	#example img{

		display:block; width:100%; height:auto;

	}


	#example td{
		text-align: center;

	}
	

</style>
<body>

	
	<div class="container">
	<br>
	<!-- <a href="{{ route('addproduct') }}" class="btn btn-warning">Add Product<a> -->
	<!-- Button trigger modal -->

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Do you want to continue?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="continue_btn">Continue</button>
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

	        	{{ var_dump(auth()->user()->wallet) }}

	        	@foreach ($products as $product)
	        	{{csrf_field()}}
	        	              <tr>
	        	              	@if( auth()->user()->wallet > 0 )
	        	              	  <td><img src="{{ asset($product->image) }}" /></td>
	        	                  <td>${{ number_format($product->prime_low_price,2) }}</td>
	        	                  <td>{{ $product->total_units_sold_mo }}</td>
	        	                  <td>${{ number_format($product->total_revenue_mo,2) }}</td>
	        	                  <td>{{ $product->competitive_sellers }}</td>
	        	                  <td>{{ $product->our_sales_equity_units_mo }}</td>
	        	                  <td>${{ number_format($product->our_sales_equity_revenue_mo,2) }}</td>
	        	                  <!-- onclick="ConfirmDialog()" data-toggle="modal" data-target="#exampleModalCenter"  -->
	        	                  <!-- <td><a href=" {{ $product->product_page_link }} " data-toggle="modal" data-target="#exampleModalCenter" data-1="{{ auth()->user()->wallet }}" data-2=" {{auth()->user()->id}} " data-3="{{ $product->pid }}" class="btn btn-warning buy "> Buy Now </a></td> -->
	        	                  <td><button type="button" data-1="{{ auth()->user()->wallet }}" pid="{{ $product->pid }}" id=" {{auth()->user()->id}} " class="btn btn-warning buy ">Buy Now</button></td>
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



	   </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {


    $('#example').DataTable( {
    		
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
   //          {
   //              extend: 'excelHtml5',
   //              title: 'test',

   //          },
   //          {
   //              extend: 'pdfHtml5',
   //              title: 'Dtest'
   //          }
   //          ,
   //          {
   //          	extend: 'print',
   //          	title: 'test'
			// }
        ]
    } );
		

		// $("#buy").on('click', function(e){

		// 	var id = $(this).data('2');
		// 	var wallet = $(this).data('1');
		// 	var pid = $(this).data('3');

		// 	console.log(pid);

		// 	//   $.post('user/' + id, {'id':id,'wallet':wallet,'pid':pid,'_token':$('input[name=_token]').val()}, function(data){
			
		// 	//   console.log(data);
		// 	// });
		// });	
		// $("p").click(function(){
		//   alert("The paragraph was clicked.");
		// });
	


		function ConfirmDialog(message){
    		$('<div></div>').appendTo('body')
                    .html('<div><h6>'+message+'?</h6></div>')
                    .dialog({
                        modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();
																
                                $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
                                
                                $(this).dialog("close");
                            },
                            No: function () {                           		                              $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
                            
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
    	};
		$(".buy").click(function(){
			var wallet = $(this).data('1');
			var pid = $(this).attr("pid");
			var id = $(this).attr("id");
			console.log(id);
		    if(confirm("Are you sure you ?"))  
		  {  
		         $.post('user/' + id, {'id':id,'wallet':wallet,'pid':pid,'_token':$('input[name=_token]').val()}, function(data){
		       	location.reload();

		       	console.log(id);
		          });
		  }  
		  else  
		  {  
		       return false;  
		  }  
		});
		

		 // function getConfirmation() {
   //             var text = confirm("Do you want to continue ?");
   //             if( text == true ) {
   //                  $.post('user/' + id, {'id':id,'wallet':wallet,'pid':pid,'_token':$('input[name=_token]').val()}, function(data){
   //                	location.reload();
                    
   //                });
   //             } else {
   //                document.write ("User does not want to continue!");
   //                return false;
   //             }
   //          }
} );
</script>