$(document).ready(function(){



  $("#menu-sel").click(function(){

    if ($("#menu-list").is(":visible")){
      $("#menu-arrow").rotate(135);
      $("#menu-list").slideUp();
    } else {
      $("#menu-arrow").rotate(315);
      $("#menu-list").slideDown();
    }

  });

  jQuery.fn.rotate = function(degrees) {
    $(this).css({'transform' : 'rotate('+ degrees +'deg)'});
    return $(this);
  };

});
