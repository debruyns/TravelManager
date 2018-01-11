$(document).ready(function(){

  /* START Profile Page */

  function startProfileChange(){
    var email = $("#profile_email").val();
    var firstname = $("#profile_firstname").val();
    var lastname = $("#profile_lastname").val();

    $("#success-message").hide();

    $.post("includes/scripts/changeProfile.php", { email:email, firstname:firstname, lastname:lastname }, function(data){

        if (data === "PROFILE_CHANGED"){
            $("#error-message").hide();
            $("#success-post").submit();
        } else {
            $("#error-message").html(data);
            $("#error-message").fadeIn("fast");
        }

    });

  }

  $("#profile_button").click(function(){
      startProfileChange();
  });

  $("#profile_email").keyup(function(e){
      if (e.which === 13){
          startProfileChange();
      }
  });

  $("#profile_firstname").keyup(function(e){
      if (e.which === 13){
          startProfileChange();
      }
  });

  $("#profile_lastname").keyup(function(e){
      if (e.which === 13){
          startProfileChange();
      }
  });

  /* END Profile Page */

  // Show menu when clicking on the menu selector
  $("#menu-sel").click(function(){

    if ($("#menu-list").is(":visible")){
      $("#menu-arrow").rotate(135);
      $("#menu-list").slideUp();
    } else {
      $("#menu-arrow").rotate(315);
      $("#menu-list").slideDown();
    }

  });

  // Hide Top Success Message when clicking on it
  $(".top-success-message").click(function(){
    $(this).fadeOut("fast");
  });

  // Hide menu when clicking outside of it
  $(document).mouseup(function(e){

    var container = $("#menu-list");

    if ($("#menu-list").is(":visible")){

      if (!container.is(e.target) && container.has(e.target).length === 0){
        $("#menu-arrow").rotate(135);
        container.slideUp();
      }
    }

  });

  // Focus on input when clicking of a login element
  $(".form-element").click(function(){

      $(this).find("input").focus();
      $(this).find("select").click();

  });

  // Function to rotate
  jQuery.fn.rotate = function(degrees) {
    $(this).css({'transform' : 'rotate('+ degrees +'deg)'});
    return $(this);
  };

});
