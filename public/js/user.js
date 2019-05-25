$(document).ready(function(){


$(".edit-user").click(function(){
	var n = document.getElementById('name-n').innerHTML;
	var e = document.getElementById('email-e').innerHTML;
	$('#email1').val(e);
	$('#name1').val(n);
	$('.view-mode').hide();
	$('.edit-mode').removeClass('hide');


});

$(".detail-cancel-user").click(function(){
	
	$('.view-mode').show();
	$('.edit-mode').addClass('hide');

});


$(".detail-save-user").click(function(){
		var id = $(this).attr('id');
	var name = '#name1'
	 var token = $("#name-token .hdn-token").val();
	$('.view-mode').show();
	$('.edit-mode').addClass('hide');
console.log(name);

	$.post('user/' + id,
      {'id':id,'name':name,'_token':token}, 
      function(data){

      
      	document.getElementById('name-n').innerHTML = name;

       }); 
});

$(".detail-save-email").click(function(){
	var id = $(this).attr('id');
	var email = document.getElementById('email1').val;
	 var token = $("#email-token .hdn-token").val();
	$(this).parent().parent().parent().parent().find('.view-mode').show();
	$(this).parent().parent().parent().parent().find('.edit-mode').addClass('hide');

	$.post('user/' + id,
      {'id':id,'email':email,'_token':token}, 
      function(data){

      document.getElementById('email-e').innerHTML = email;



       }); 
});

});