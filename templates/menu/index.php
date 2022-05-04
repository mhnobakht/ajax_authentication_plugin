<div class="container" style="margin-top: 20px;">
<h1>Ajax Authentication System Configuration:</h1>
<hr>
<form action="" method="POST" style="margin-top: 20px;">
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="login_title">Login page title: </label>
        <input value="<?php echo $config['login_title'];  ?>" type="text" class="form-control" name="login_title" placeholder="Enter login page title">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="register_title">Register page title: </label>
        <input value="<?php echo $config['register_title']; ?>" type="text" class="form-control" name="register_title" placeholder="Enter register page title">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="login_status">Login page Active: </label>
        <input <?php echo ($config['login_status'] === "1") ? "checked" : "";  ?> type="checkbox" name="login_status" id="">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="register_status">register page Active: </label>
        <input <?php echo ($config['register_status'] === "1") ? "checked" : "" ;  ?> type="checkbox" name="register_status" id="">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <input type="submit" value="Save" name="save_ajax_auth_config">
    </div>
</form>
</div>