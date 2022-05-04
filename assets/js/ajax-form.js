// JQuery Ajax
jQuery(document).ready(function($) {

    // login ajax
    $("#login-submit").on("click", function(event) {
        event.preventDefault();
        
        const email = $("#ajax-email").val();
        const password = $("#ajax-password").val();
        const statusMessage = $("#ajax-status-message");

        $("#ajax-email").val("");
        $("#ajax-password").val("");
        

        $.ajax({
            url: "/wordpress_training/wp-admin/admin-ajax.php",
            type: "post",
            dataType: "json",
            data: {
                action: "ajax_auth_login",
                email: email,
                password: password
            },
            success: function(response){
                console.log(response);
                statusMessage.removeClass("hide");
                statusMessage.addClass("block");
                statusMessage.text(response.message);

                setTimeout(function(){
                    statusMessage.removeClass("block");
                    statusMessage.addClass("hide");
                    statusMessage.delay(2000).hide(1000);
                }, 6000);

                if(response.status == "true") {
                    location.href = "/wordpress_training/wp-admin/";
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

    });

    // register ajax
    $("#register-submit").on("click", function(event) {
        event.preventDefault();
        
        const email = $("#ajax-email").val();
        const password = $("#ajax-password").val();
        const statusMessage = $("#ajax-status-message");

        $("#ajax-email").val("");
        $("#ajax-password").val("");

        $.ajax({
            url: "/wordpress_training/wp-admin/admin-ajax.php",
            type: "post",
            dataType: "json",
            data: {
                action: "ajax_auth_register",
                email: email,
                password: password
            },
            success: function(response){
                console.log(response);
                statusMessage.removeClass("hide");
                statusMessage.addClass("block");
                statusMessage.text(response.message);

                setTimeout(function(){
                    statusMessage.removeClass("block");
                    statusMessage.addClass("hide");
                    statusMessage.delay(2000).hide(1000);
                }, 6000);

                if(response.status == "true") {
                    location.href = "/wordpress_training/wp-admin/";
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

});