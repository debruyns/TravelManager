$(document).ready(function(){

  // Initialize drop in
  $.post("includes/scripts/braintreeToken.php", { }, function(data){

      if (data != ""){
        braintree.setup(data, 'dropin', {
          container: 'dropin-container'
        });
      }

  });

});
