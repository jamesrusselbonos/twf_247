$(document).ready(function() {


      $('#content').hide();
       $('#extended_cont').show();
    $('.va-prof').click(function(){
      var myNewURL = "va-profile";
     $.unblockUI(); 
      $('#content').show();
      $('#extended_cont').hide();
      window.history.replaceState({}, document.title, "/" + myNewURL );

    });

   





} );