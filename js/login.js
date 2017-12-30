
// Javascript for login

$(document).ready(function(){

    function startLogin(email, password){

        $("#logout-message").hide();

        $.post("includes/scripts/loginUser.php", { email:email, password:password }, function(data){

            if (data === "USER_AUTHORIZED"){
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

    $("#login_button").click(function(){
        var email = $("#login_email").val();
        var password = $("#login_password").val();
        startLogin(email, password);
    });

    $("#login_email").keyup(function(e){
        if (e.which === 13){
            var email = $("#login_email").val();
            var password = $("#login_password").val();
            startLogin(email, password);
        }
    });

    $("#login_password").keyup(function(e){
        if (e.which === 13){
            var email = $("#login_email").val();
            var password = $("#login_password").val();
            startLogin(email, password);
        }
    });

});
