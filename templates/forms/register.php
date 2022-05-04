<div class="ajax-form-container">
    <?php
    $config_default = [
        "login_status" => "1",
        "register_status" => "1",
        "login_title" => "Login Form",
        "register_title" => "Register Form"
    ];
    $config = get_option('ajax_auth_config', $config_default);
    if($config['register_status'] === "1"):
    ?>
    <h3><?php echo $config['register_title']; ?></h3>
    <small class="ajax-form-message hide" id="ajax-status-message"></small>
    <form action="" class="ajax-form">
        <div class="form-group">
            <input type="email" name="email" id="ajax-email" class="email" placeholder="Enter Email" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="ajax-password" class="password" placeholder="Enter password">
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="submit" id="register-submit">
        </div>
    </form>
    <?php
    else:
    ?>
    <h4>You connot register right now!</h4>
    <?php
    endif;
    ?>
</div>