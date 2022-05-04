<?php

// actions
add_shortcode("ajax_login", "ajax_auth_login_shortcode_callback");
add_shortcode("ajax_register", "ajax_auth_register_shortcode_callback");
add_action("wp_enqueue_scripts", "ajax_auth_add_forms_scripts");

// methods
function ajax_auth_login_shortcode_callback() {
    include_once AJAX_AUTH_TPL."forms/login.php";
}

function ajax_auth_register_shortcode_callback() {
    include_once AJAX_AUTH_TPL."forms/register.php";
}

// styles and scripts for login & register forms 
function ajax_auth_add_forms_scripts() {

    wp_register_style("ajax-auth-style", AJAX_AUTH_URL."assets/css/ajax-form.css");
    wp_register_script("ajax-auth-script", AJAX_AUTH_URL."assets/js/ajax-form.js", ['jquery']);

    wp_enqueue_style("ajax-auth-style");
    wp_enqueue_script("ajax-auth-script");

}