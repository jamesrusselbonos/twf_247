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
	  var name = $('#name1').val();
	  var email = $('#email1').val();
	   var token = $(this).parent().find('#hdn-token').val();
	  $('.view-mode').show();
	  $('.edit-mode').addClass('hide');

	  $.post('user/' + id,
	  {'id':id, 'name':name,'email':email,'_token':token}, 
	  function(data){

	  document.getElementById('name-n').innerHTML = name;
	  document.getElementById('email-e').innerHTML = email;
	  document.getElementById('auth_username').innerHTML = name;


	   }); 
	      
	      

	});

	$(".upload_user").click(function(){
	    var id = $(this).data('id');
	    var image ;

	   var token = $(this).parent().find('#hdn-token').val();


	  $.post('user/' + id,
	  {'id':id,'image':image,'_token':token}, 
	  function(data){

	  document.getElementById('name-n').innerHTML = name;
	  document.getElementById('email-e').innerHTML = email;
	  document.getElementById('auth_username').innerHTML = name;


	   }); 
	      
	      

	});

	    /////////Image//////////
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            // if( log ) alert(log);
        }
    
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    }); 


});