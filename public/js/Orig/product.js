
$(document).ready(function() {


  
    $("#checkout").click(function(){
      var id = $(this).data('2');
      var oldWallet = $(this).data('1');
      var totalQty = $(this).data('3');
      var token = $("#tablee .hdn-token").val();

      var wallet = oldWallet - totalQty;

         $.post('user/' + id,
         {'id':id, 'wallet':wallet,'_token':token}, 
         function(data){

        


          }); 


    });   


    $(".add-cart").click(function(){
      var wallet = $("#exampleModalCenter .hdn-wallet").val();
      var pid = $("#exampleModalCenter .hdn-pid").val();
      var id = $("#exampleModalCenter .hdn-id").val();
      var token = $("#exampleModalCenter .hdn-token").val();
      

      $.post('update-product/' + pid,
      {'pid':pid,'_token':token}, 
      function(data){

      


       }); 

     
    });  
     $(".yes").click(function(){

      var pid = $("#modal_confirmation .hdn-pid").val();
      var token = $("#modal_confirmation .hdn-token").val();
      console.log(token);

      $.post('re-update/' + pid,
      {'pid':pid,'_token':token}, 
      function(data){

      

       }); 

     }); 


    $(".remove-cart").click(function(){

      var id = $(this).attr('pid');

      $("#modal_confirmation .hdn-pid").val( id );
      $("#yes").attr("href", 'remove-to-cart/' + id );



    });  

    
   

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }

    $(".buy").click(function(){
      // $("[data-toggle='popover']").popover('toggle');
      var wallet = $(this).data('1');
      var id = $(this).attr("id1"); 
    
      var pid = $(this).attr("pid");
      var image = $(this).attr("image");      
      var brand = $(this).attr("brand");
      var asin = $(this).attr("asin");      
      var price = $(this).attr("price");      
      var unit_sold_mo = $(this).attr("unit_sold_mo");
      var reven_mo = $(this).attr("reven_mo");      
      var sellers = $(this).attr("sellers");
      var eq_units = $(this).attr("eq_units");      
      var eq_reven = $(this).attr("eq_reven");
      var token = $("#exampleModalCenter .hdn-token").val();

      $("#exampleModalCenter .hdn-pid").val( pid );
      $("#exampleModalCenter .hdn-wallet").val( wallet );
      $(".numb h5").html("Prime Price: $" + formatNumber(price));
      document.getElementById('units_mo').innerHTML ="Units Sold/Mo: " + formatNumber(unit_sold_mo);
      document.getElementById('reven_mo').innerHTML ="Revenue/Mo: $" + formatNumber(reven_mo);
      document.getElementById('sellers').innerHTML ="Competitive Sellers: " + sellers;
      document.getElementById('eq_units').innerHTML ="Equity Units/Mo: " + formatNumber(eq_units);
      document.getElementById('eq_reven').innerHTML ="Equity Revenue/Mo: $" + formatNumber(eq_reven);
    
      $("#pic").attr("src", image);
      $("#add-cart").attr("href", "/add-to-cart/" + pid );

    });
    

} );
