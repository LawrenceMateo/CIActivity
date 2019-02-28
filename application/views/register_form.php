<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href='<?php echo base_url();?>/assets/css/bg.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>/assets/css/style.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/fontawesome/css/solid.css'>
    <script src='<?php echo base_url();?>assets/fontawesome/js/all.js'></script>
    <!-- <script src="../assets/bootstrap-4.3.1-dist/js/bootstrap.js"></script> -->
    <!-- <script src="../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script> -->
</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div id="modal" class="modal-content">
                <div class="col-12 user-img">
                    <img src='<?php echo base_url();?>assets/images/user_avatar.png'>
                </div>
                <?php echo form_open('register/sign_up', 'class=""'); ?>
                    <fieldset>
                        <legend>Register</legend>
                            <div class="form-group email">
                                <?php echo form_input('email', '', 'id="email" class="form-control input-xs" placeholder="Enter Email"'); ?>
                            </div>
                            <div class="form-group password-input">
                                <?php echo form_password('password', '', 'id="password" class="form-control" placeholder="Password"'); ?>
                            </div>
                            <div class="form-group password-input">
                                <?php echo form_password('confirm_password', '', 'id="confirm_password" class="form-control" placeholder="Confirm your password"'); ?>
                            </div>
                            <div class="">
                                <?php echo '<i class="fas fa-book"></i>'.form_submit('submit', 'Sign up', 'id="log" class="btn"'); ?>
                            </div>
                            <div class="">
                                <?php echo '<i class="fas fa-sign-out-alt"></i>'.anchor('login', 'Back to login', 'id="create" class="btn"');?>
                            </div>
                    </fieldset>
                <?php echo form_close()?>
            </div><!-- End of modal-content -->
        </div>
    </div>
</body>
</html>