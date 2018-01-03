
// Javascript for retrieve

$(document).ready(function(){

    function startSignup(){

        $("#success-message").hide();

        var firstname = $("#signup_firstname").val();
        var lastname = $("#signup_lastname").val();
        var email = $("#signup_email").val();
        var password = $("#signup_password").val();
        var confirm = $("#signup_password2").val();

        $.post("includes/scripts/signup.php", { firstname:firstname, lastname:lastname, email:email, password:password, confirm:confirm }, function(data){

            if (data === "SIGNUP_COMPLETE"){
                $("#error-message").hide();
                $("#success-message").fadeIn("fast");
                $("#signup_firstname").val("");
                $("#signup_lastname").val("");
                $("#signup_email").val("");
                $("#signup_password").val("");
                $("#signup_password2").val("");
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

    $("#signup_button").click(function(){
        startSignup();
    });

    $("#signup_firstname").keyup(function(e){
        if (e.which === 13){
            startSignup();
        }
    });

    $("#signup_lastname").keyup(function(e){
        if (e.which === 13){
            startSignup();
        }
    });

    $("#signup_email").keyup(function(e){
        if (e.which === 13){
            startSignup();
        }
    });

    $("#signup_password").keyup(function(e){
        if (e.which === 13){
            startSignup();
        }
    });

    $("#signup_password2").keyup(function(e){
        if (e.which === 13){
            startSignup();
        }
    });

});
