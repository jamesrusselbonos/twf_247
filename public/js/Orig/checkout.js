	$(document).ready(function() {

	$('#example1').DataTable( {
	    
	   "fixedHeader": {
	      header: true,
	      footer: true,

	  },
	  "columnDefs": [ {
	  "targets": [ 0, 7 ],
	  "orderable": false
	  } ],
	    
	    dom: 'Bfrtip',
	    // "pageLength": 50,
	    "bPaginate": false,
	    responsive: true,

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
	                   extend:    'csvHtml5',
	                   text:      '<i class="fas fa-file-csv"></i>',
	                   titleAttr: 'CSV',
	                   title: 'TestFileName3'
	               }

	               ]
	    
	} );
} );