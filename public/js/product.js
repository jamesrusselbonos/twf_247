
$(".add").click(function(e){
    e.preventDefault();
   var form_action = $("#add_product").find("form").attr("action");
   var product_image = $("#add_product").find("input[name='p_image']").val();
   var brand = $("#add_product").find("input[name='brand']").val();
   var asin = $("#add_product").find("input[name='asin']").val();
   var product_link = $.trim($("#product_link").val());
   var prime_low_price = $("#add_product").find("input[name='prime_price']").val();
   var total_units_sold_mo = $("#add_product").find("input[name='units_sold']").val();
   var total_revenue_mo = $("#add_product").find("input[name='revenue']").val();
   var competitive_sellers = $("#add_product").find("input[name='sellers']").val();
   var sales_equity_units_mo = $("#add_product").find("input[name='equity_units']").val();
   var website_url = $("#add_product").find("input[name='website']").val();
   var firstname = $("#add_product").find("input[name='firstname']").val();
   var lastname = $("#add_product").find("input[name='p_image']").val();
   var address = $.trim($("#address").val());
   var contact_no = $("#add_product").find("input[name='contact']").val();
   var position = $("#add_product").find("input[name='position']").val();
   var email = $("#add_product").find("input[name='email']").val();
   var token = $('input[name=_token]').val()
  
   console.log(email);

    $.ajax({
    	headers: {
    	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	    },
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{product_image:product_image, brand:brand,asin:asin, product_link:product_link,prime_low_price:prime_low_price, total_units_sold_mo:total_units_sold_mo,total_revenue_mo:total_revenue_mo, competitive_sellers:competitive_sellers,sales_equity_units_mo:sales_equity_units_mo, 
        	website_url:website_url,firstname:firstname, lastname:lastname,address:address, contact_no:contact_no,contact_no:contact_no, position:position }
    }).done(function(data){
        
	
    });

});
