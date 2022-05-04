<?php

// actions 
add_action("wp_ajax_nopriv_ajax_auth_login", "ajax_auth_process_login");
add_action("wp_ajax_nopriv_ajax_auth_register", "ajax_auth_process_register");

// methods

// process login users 
function ajax_auth_process_login() {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(is_null($email) || empty($email) || is_null($password) || empty($password)) {
        wp_send_json([
            "status" => "false",
            "message" => "Email and Password can not be empty."
        ]);
    }

    
    $user = wp_authenticate_email_password(null, $email, $password);

    if(is_wp_error($user)) {
        wp_send_json([
            "status" => "false",
            "message" => "Email or Password is Incorrect!"
        ]);
    }

    $login_user = wp_signon([
        "user_login" => $user->data->user_login,
        "user_password" => $password,
        "remember" => false
    ]);

    if(is_wp_error($login_user)) {
        wp_send_json([
            "status" => "false",
            "message" => "You can not login right now, please try again later."
        ]);
    }

    wp_send_json([
        "status" => "true",
        "message" => "You logged in successfully, and redirect to dashbaord after 6 seconds"
    ]);
    

}

// process register users 
function ajax_auth_process_register() {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(is_null($email) || empty($email) || is_null($password) || empty($password)) {
        wp_send_json([
            "status" => "false",
            "message" => "Email and Password can not be empty."
        ]);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        wp_send_json([
            "status" => "false",
            "message" => "Invalid Email Address"
        ]);    
    }

    $email_array= explode("@", $email);
    $username = $email_array[0];

    $user = wp_create_user($username, $password, $email);

    if(is_wp_error($user)) {
        wp_send_json([
            "status" => "false",
            "message" => "You cannot signup right now"
        ]);
    }

    $user_login= wp_signon([
        "user_login" => $username,
        "user_password" => $password,
        "remember" => false
    ]);

    if(is_wp_error($user_login)) {
        wp_send_json([
            "status" => "false",
            "message" => "You can not login right now!"
        ]);
    }

    wp_send_json([
        "status" => "true",
        "message" => "Your account is ready now!"
    ]);

}