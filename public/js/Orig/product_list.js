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
     dom: 'Bfrtip',
     // "pageLength": 50,
     "bPaginate": false,

     buttons: [

     {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy',
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

                ]
     
 } );

 $('#example1').DataTable( {
     
    "fixedHeader": {
       header: true,
       footer: true,

   },
   "columnDefs": [ {
   "targets": [ 0 ],
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

                ]
     
 } );


  } );