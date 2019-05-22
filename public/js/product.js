
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

                   ]
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
   //           extend: 'print',
   //           title: 'test'
      // }
        
    } );

    
    // var div = document.createElement('div');
    // div.setAttribute('class', 'post block bc2');
    // div.innerHTML = `
    //     <div class="parent">
    //         <div class="child">$</div>
    //         <div class="child">+</div>
    //         <div class="child">$</div>
    //         <div class="child">=</div>
    //         <div class="child">$</div>
    //     </div>
    // `;
    // document.getElementById('buy').appendChild(div);

    // $("#buy").on('click', function(e){

    //  var id = $(this).data('2');
    //  var wallet = $(this).data('1');
    //  var pid = $(this).data('3');

    //  console.log(pid);

    //  //   $.post('user/' + id, {'id':id,'wallet':wallet,'pid':pid,'_token':$('input[name=_token]').val()}, function(data){
      
    //  //   console.log(data);
    //  // });
    // });  
    // $("p").click(function(){
    //   alert("The paragraph was clicked.");
    // });



    ////FETCHDATA//////


    $('.buy').popover({
      title:fetchData,
      html:true,
      placement:'left'
      // delay: {show: 200, hide: 1000}

    });

    function fetchData(){
      var fetch_data = '';
      var element = $(this);
      var pid = element.attr("pid");
      var token = $(".hdn-token").val();

      $.ajax({
        url: 'product/' + pid,
        method:"GET",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        async: false,
        data: {pid:pid },

        success:function(data){
          console.log(token);
          fetch_data = data;
        }

      });
      return fetch_data;
    }






    $(".add-cart").click(function(){
      var wallet = $("#exampleModalCenter .hdn-wallet").val();
      var pid = $("#exampleModalCenter .hdn-pid").val();
      var id = $("#exampleModalCenter .hdn-id").val();
      var token = $("#exampleModalCenter .hdn-token").val();
      console.log(id, pid);

      

       //    $.ajax({
       //        type: "get",
       //        url: 'product_details/' + pid ,
       //        data: 'pid':pid,
       //        success: function(data) {
       //            console.log(data);
       //        }
       //    })
       //  $.get('product_details/' + pid ,
       //   {'pid':pid}, 
       //   function(data){

        // // console.log(data['pid']);

       //   });

        // $.ajax({
        //  url: 'product_details/' + pid,
        //  method: "GET",
        //  data: 'pid',pid,
        //  success:function(data){
            
        //  }

        // });
        $.post('user/' + id,
         {'id':id, 'wallet':wallet,'_token':token}, 
         function(data){

        

         });        

      
            console.log(pid);
     
    });   
    $('.buy').popover({ trigger: "click"}); 

    $(".buy").click(function(){
      $("[data-toggle='popover']").popover('toggle');
      
      var wallet = $(this).data('1');
      var id = $(this).attr("id1"); 
    
      var pid = $(this).attr("pid");
      var image = $(this).attr("image");      
      var brand = $(this).attr("brand");
      var asin = $(this).attr("asin");      
      var prod_link = $(this).attr("prod_link");
      var price = $(this).attr("price");      
      var unit_sold_mo = $(this).attr("unit_sold_mo");
      var reven_mo = $(this).attr("reven_mo");      
      var sellers = $(this).attr("sellers");
      var eq_units = $(this).attr("eq_units");      
      var eq_reven = $(this).attr("eq_reven");
      var website = $(this).attr("website");      
      var fname = $(this).attr("fname");
      var lname = $(this).attr("lname");
      var address = $(this).attr("address");      
      var contact_no = $(this).attr("contact_no");
      var position = $(this).attr("position");
      var email = $(this).attr("email");
      var fullname =  fname + " " + lname;
      console.log(position);
      var token = $("#exampleModalCenter .hdn-token").val();

      $("#exampleModalCenter .hdn-pid").val( pid );
      $("#exampleModalCenter .hdn-wallet").val( wallet );
      $(".numb h4").html("Prime Price: $" + price);
      document.getElementById('units_mo').innerHTML ="Units Sold/Mo: " + unit_sold_mo;
      document.getElementById('reven_mo').innerHTML ="Revenue/Mo: $" + reven_mo;
      document.getElementById('sellers').innerHTML ="Competitive Sellers: " + sellers;
      document.getElementById('eq_units').innerHTML ="Equity Units/Mo: " + eq_units;
      document.getElementById('eq_reven').innerHTML ="Equity Revenue/Mo: $" + eq_reven;
      $("#prod_link").attr("href", prod_link);
      $("#web").attr("href", website);
      $("#email").attr("href", email);
      $("#web").text(website);
      $("#email").text(email);
      // document.getElementById("prod_link").innerHTML = "Product Page Link: " + prod_link;
      document.getElementById("brand").innerHTML = "Brand: " + brand;
      document.getElementById("asin").innerHTML = "ASIN: " + asin;
      document.getElementById("name").innerHTML = "Name: " + fullname;      
      document.getElementById("position").innerHTML = "Position: " + position;
      document.getElementById("address").innerHTML = "Address: " + address;
      document.getElementById("contact").innerHTML = "Contact No: " + contact_no;

      $("#pic").attr("src", image);
      $("#add-cart").attr("href", "/product_details/" + pid );
      // document["#pic"].src = image;
      // $("#exampleModalCenter .prod_img").src = "test";
      // $('#exampleModalCenter-list').append('<div class="tab-pane active prod_img"><img src="{{ asset('images/') }} ' + image +'" </div>');

       //  $.get('product/' + pid ,
       //   {'pid':pid}, 
       //   function(data){

        // // console.log(data['pid']);

       //   });
    });
    

     // function getConfirmation() {
   //             var text = confirm("Do you want to continue ?");
   //             if( text == true ) {
   //                  $.post('user/' + id, {'id':id,'wallet':wallet,'pid':pid,'_token':$('input[name=_token]').val()}, function(data){
   //                 location.reload();
                    
   //                });
   //             } else {
   //                document.write ("User does not want to continue!");
   //                return false;
   //             }
   //          }
} );
