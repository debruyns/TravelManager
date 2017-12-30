
// Javascript for retrieve

$(document).ready(function(){

    function startReset(){

        $("#success-message").hide();

        var password = $("#reset_password").val();
        var confirm = $("#reset_password_2").val();
        var code = $("#reset_code").val();

        $.post("includes/scripts/resetPassword.php", { password:password, confirm:confirm, code:code }, function(data){

            if (data === "PASSWORD_RESET_COMPLETE"){
                $("#error-message").hide();
                $("#success-message").fadeIn("fast");
                $("#reset_password").val("");
                $("#reset_password_2").val("");
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

    $("#reset_button").click(function(){
        startReset();
    });

    $("#reset_password").keyup(function(e){
        if (e.which === 13){
            startReset();
        }
    });

    $("#reset_password_2").keyup(function(e){
        if (e.which === 13){
            startReset();
        }
    });

});
