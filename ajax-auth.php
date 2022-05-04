<?php
/**
 * @package Ajax_Auth
 * @version 1.0.0
 */
/*
Plugin Name: Ajax Auth
Plugin URI: https://academy01.net/wordpress/plugins/ajax-auth
Description: This plugin make custome Authentication system using Ajax.
Author: Majid
Version: 1.0.0
Author URI: https://academy01.net
*/

define("AJAX_AUTH_PATH", plugin_dir_path(__FILE__));
define("AJAX_AUTH_URL", plugin_dir_url(__FILE__));
define("AJAX_AUTH_INC", AJAX_AUTH_PATH."includes/");
define("AJAX_AUTH_TPL", AJAX_AUTH_PATH."templates/");

// shortcodes
require_once AJAX_AUTH_INC."public/shortcodes.php";

// ajax
require_once AJAX_AUTH_PATH."ajax.php";

if(is_admin()) {

    // config menu 
    require_once AJAX_AUTH_INC."admin/menu/menu.php";

}

// deactivation hook
register_deactivation_hook(__FILE__,"ajax_auth_deactivation_hook_callback");
function ajax_auth_deactivation_hook_callback() {
    delete_option("ajax_auth_config");
}