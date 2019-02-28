<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href='<?php echo base_url();?>/assets/css/bg.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>/assets/css/style.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/fontawesome/css/solid.css'>
    <script src='<?php echo base_url();?>assets/fontawesome/js/all.js'></script>
    <!-- <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.js"></script> -->
    <!-- <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script> -->
</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div id="modal" class="modal-content">
                <div class="col-12 user-img">
                    <img src='<?php echo base_url()?>assets/images/user_avatar.png'>
                </div>
                <?php
                    echo validation_errors();
                ?>
                <?php echo form_open('login/validate', 'class=""'); ?>
                    <fieldset>
                        <legend>Sign In</legend>
                            <div class="form-group email-input">
                                <?php echo form_input('email', '', 'id="email" class="form-control input-xs" placeholder="Enter your email"'); ?>
                            </div>
                            <div class="form-group password-input">
                                <?php echo form_password('password', '', 'id="password" class="form-control" placeholder="Enter your password"'); ?>
                            </div>
                            <div>
                                <?php echo '<i class="fas fa-sign-in-alt"></i>'.form_submit('submit', 'Login', 'id="log" class="btn"'); ?>
                            </div>
                            <div>
                                <?php echo anchor('login/form_register', 'Create Account', 'id="create" class="btn"');?>
                            </div>
                    </fieldset>        
                <?php echo form_close()?>
            </div><!-- End of modal-content -->
        </div>
    </div>
</body>
</html>