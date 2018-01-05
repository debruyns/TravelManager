$(document).ready(function(){

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

  // Hide menu when clicking outside of it
  $(document).mouseup(function(e){

    var container = $("#menu-list");

    if ($("#menu-list").is(":visible")){

      if (!container.is(e.target) && container.has(e.target).length === 0){
        container.slideUp();
      }
    }

  });

  // Function to rotate
  jQuery.fn.rotate = function(degrees) {
    $(this).css({'transform' : 'rotate('+ degrees +'deg)'});
    return $(this);
  };

});
