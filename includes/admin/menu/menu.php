<?php

//actions
add_action("admin_menu", "ajax_auth_admin_config_menu_callback");

//methods
function ajax_auth_admin_config_menu_callback() {

    add_menu_page(
        "Ajax Auth Config",
        "Ajax Auth Config",
        "manage_options",
        "ajax-auth-config",
        "ajax_auth_config_menu_handler"
    );

}

// main menu handler
function ajax_auth_config_menu_handler() {
    if(isset($_POST['save_ajax_auth_config'])) {
        
        // $login_title = $_POST['login_title'];
        // $register_title = $_POST['register_title'];
        // $login_status = (isset($_POST['login_status'])) ? "1" : "0";
        // $register_status = (isset($_POST['login_status'])) ? "1" : "0";

        $config = [
            "login_status" => (isset($_POST['login_status'])) ? "1" : "0",
            "register_status" => (isset($_POST['register_status'])) ? "1" : "0",
            "login_title" => $_POST['login_title'],
            "register_title" => $_POST['register_title']
        ];


        update_option("ajax_auth_config", $config);
        

    }

    $config_default = [
        "login_status" => "1",
        "register_status" => "1",
        "login_title" => "Login Form",
        "register_title" => "Register Form"
    ];

    $config = get_option("ajax_auth_config", $config_default);

    include_once AJAX_AUTH_TPL."menu/index.php";
}