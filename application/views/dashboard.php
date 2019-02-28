<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dash Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href='<?php echo base_url();?>/assets/css/style.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/bootstrap-4.3.1-dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href='<?php echo base_url();?>assets/fontawesome/css/solid.css'>
    <script src='<?php echo base_url();?>assets/fontawesome/js/all.js'></script>
    <script src="<?php echo base_url();?>assets/bootstrap3/js/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/js/bootstrap.js"></script> -->
    <script src="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</head>
<body class="dash-body">
        <div class="row">
            <nav class="navbar navbar-light col-lg-12 navi">
                <a href="<?php echo base_url();?>dashboard" class="navbar-brand ml-5">
                    <span class="logged-email">
                        <h3>SCHEDULES</h3>
                    </span>
                </a>
                <ul class="navbar-nav mr-5">
                    <i class="nav-item">
                        <a href="<?php echo base_url()?>dashboard/logout" class="nav-link"><button class="btn btn-primary col-12">Logout</button></a>
                    </i>
                </ul>
            </nav>
        </div>
        <div class="row board-content">
            <div class="col-8 ml-auto mr-auto text-center">
                <div id="modal-dash" class="dash-content">
                    <span class="name-container">
                        <h3>Hello&nbsp;<?php echo $email; ?>!</h3>
                    </span>
                    <!-- <button id="btn-add" class="btn btn-info" type="button" data-toggle="collapse" data-target="#add-modal" aria-expanded="false" aria-controls="add-modal"><i class="fas fa-plus"></i>Add Schedule</button> -->
                    <a href="<?php echo base_url();?>schedule"><button id="btn-add" class="btn btn-info" type="button"><i class="fas fa-plus"></i>Add Schedule</button></a>
                </div><!-- End of dash-content -->
            </div>
        </div>
            <div class="row board-content">
                <div class="col-8 ml-auto mr-auto">
                    <div id="modal-sched" class="">
                        <span id="" class="name-container your-sched">
                            <p>Here is your schedule for today,&nbsp;<?php echo date('M d, Y'); ?>!</p>
                        </span> 
                        <div>
                            <?php
                                foreach($output as $object){
                                echo '<p class="sched-desc">'.'> '.$object->description.'</p><br/>';
                                } 
                            ?>
                        </div>      
                    </div>
                </div>
            </div>
        <!-- <div class="row">    
            <div id="add-modal" class="col-4 mb-auto ml-auto mr-auto text-center collapse">
                <div class="col-lg-8 main-section">
                    <div id="modal-dash" class="modal-content">
                        <?php echo form_open('schedule/addSched'); ?>
                            <fieldset>
                                <legend>Add Schedule <span class="close" data-toggle="collapse" data-target="#add-modal">x</span></legend>
                                    <div class="form-group">
                                        <span><i class="add-date fas fa-calendar"></i><input class="form-control" type="date" name="date"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="description" placeholder="Add description">
                                    </div>
                                    <div>
                                        <span><i class="add-btn fas fa-calendar-plus"></i><?php echo form_submit('submit', 'Add Schedule', 'id="add-sched-btn" class="btn btn-danger"'); ?></span>                                            
                                    </div>
                            </fieldset>        
                        <?php echo form_close()?>
                    </div> End of modal-content 
                </div>
            </div>
        </div> -->
</body>
</html>