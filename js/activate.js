
// Javascript for retrieve

$(document).ready(function(){

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

});
