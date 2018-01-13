$(document).ready(function(){

  // Get the default selected language
  var languageSelection = "";
  languageSelection = $("div.language-selection > div > div.active").attr("data-lcode");

  // Change language language selection
  $("div.language-selection > div > div").click(function(){

    if (!$(this).hasClass("active")){
      $("div.language-selection > div > div").removeClass("active");
      $(this).addClass("active");
      languageSelection = $(this).attr("data-lcode");
    }

  });

  /* START Password Page */

  function startPasswordChange(){
    var current_password = $("#password_current").val();
    var new_password = $("#password_new").val();
    var confirm_password = $("#password_confirm").val();

    $.post("includes/scripts/changeAccountPassword.php", { current:current_password, new:new_password, confirm:confirm_password }, function(data){

        if (data === "PASSWORD_CHANGED"){
            $("#error-message").hide();
            $("#success-post").submit();
        } else {
            $("#error-message").html(data);
            $("#error-message").fadeIn("fast");
        }

    });

  }

  $("#password_button").click(function(){
      startPasswordChange();
  });

  $("#password_current").keyup(function(e){
      if (e.which === 13){
          startPasswordChange();
      }
  });

  $("#password_new").keyup(function(e){
      if (e.which === 13){
          startPasswordChange();
      }
  });

  $("#password_confirm").keyup(function(e){
      if (e.which === 13){
          startPasswordChange();
      }
  });

  /* END Password Page */

  /* START Language Page */

  $("#language_button").click(function(){
    $.post("includes/scripts/changeAccountLanguage.php", { language:languageSelection }, function(data){

        if (data === "LANGUAGE_CHANGED"){
            $("#error-message").hide();
            $("#success-post").submit();
        } else {
            $("#error-message").html(data);
            $("#error-message").fadeIn("fast");
        }

    });
  });

  /* END Language Page */

  /* START Profile Page */

  function startProfileChange(){
    var email = $("#profile_email").val();
    var firstname = $("#profile_firstname").val();
    var lastname = $("#profile_lastname").val();

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

  });

  // Function to rotate
  jQuery.fn.rotate = function(degrees) {
    $(this).css({'transform' : 'rotate('+ degrees +'deg)'});
    return $(this);
  };

});
