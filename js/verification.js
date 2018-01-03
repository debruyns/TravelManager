
// Javascript for retrieve

$(document).ready(function(){

    function startVerification(code){

        $("#success-message").hide();

        $.post("includes/scripts/dualStep.php", { code:code }, function(data){

            if (data === "USER_VERIFIED"){
                $("#error-message").hide();
                location.reload();
            } else {
                $("#error-message").html(data);
                $("#error-message").fadeIn("fast");
            }

        });

    }

    // Focus on input when clicking of a login element
    $(".form-element").click(function(){

        $(this).find("input").focus();

    });

    // Show tooltip when hovering over language option
    $("#language-selection > li").mouseenter(function(){

        if ($(this).hasClass("active") == false){
            $("#language-tooltip").html($(this).attr("data-language"));
            $("#language-tooltip").show();
        }

    });

    // Hide tooltip after leaving the language option
    $("#language-selection > li").mouseleave(function(){

        $("#language-tooltip").hide();

    });

    // Change language after clicking on language option
    $("#language-selection > li").click(function(){

        if ($(this).hasClass("active") === false){

            var languageKey = $(this).attr("data-code");
            if (languageKey !== ""){

                $.post("includes/scripts/changeLanguage.php", { language:languageKey }, function(data){
                    if (data === "LANGUAGE_CHANGED"){
                        location.reload();
                    }
                });

            }

        }

    });

    $("#verification_button").click(function(){
        var code = $("#verification_code").val();
        startVerification(code);
    });

    $("#verification_code").keyup(function(e){
        if (e.which === 13){
            var code = $("#verification_code").val();
            startVerification(code);
        }
    });

    $("#cancel_button").click(function(){
      $.post("includes/scripts/stopLogin.php", { }, function(data){
        $("#error-message").hide();
        location.reload();
      });
    });

    $("#verification_code").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            e.preventDefault();
        }
    });

});
