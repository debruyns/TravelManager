
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

});
