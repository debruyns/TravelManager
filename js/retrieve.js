
// Javascript for retrieve

$(document).ready(function(){

    function startRetrieve(email){

        $("#success-message").hide();

        $.post("includes/scripts/retrieveUser.php", { email:email }, function(data){

            if (data === "USER_RETRIEVED"){
                $("#error-message").hide();
                $("#success-message").fadeIn("fast");
                $("#retrieve_email").val("");
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

    $("#retrieve_button").click(function(){
        var email = $("#retrieve_email").val();
        startRetrieve(email);
    });

    $("#retrieve_email").keyup(function(e){
        if (e.which === 13){
            var email = $("#retrieve_email").val();
            startRetrieve(email);
        }
    });

});
