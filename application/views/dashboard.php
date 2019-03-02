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
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
    <link rel="stylesheet" href='<?php echo base_url();?>assets/fontawesome/css/solid.css'>
    <script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.js'?>"></script>
    <script type="text/javascript" src='<?php echo base_url();?>assets/fontawesome/js/all.js'></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap3/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/css/jquery.dataTables.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/css/dataTables.bootstrap4.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</head>
<body class="dash-body">
        <div class="row">
            <nav class="navbar navbar-light col-lg-12 navi">
                <a href="<?php echo base_url();?>sched" class="navbar-brand ml-5">
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
                        <?php 
                            $email = $this->session->userdata('email');
                            $name = $email;
                            $user_name = strstr($name, '@', true);
                        ?>
                        <h3>Hello&nbsp;<?php echo $user_name; ?>!</h3>
                    </span>
                    <button id="btn-add" class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal" aria-expanded="false" aria-controls="add-modal"><i class="fas fa-plus"></i>Add Schedule</button>
                    <!-- <a href="<?php echo base_url();?>schedule"><button id="btn-add" class="btn btn-info" type="button"><i class="fas fa-plus"></i>Add Schedule</button></a> -->
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
                        <table class="table table-striped" id="mydata">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th style="text-align: right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">
                                
                            </tbody>
                        </table>
                        <!-- <?php
                            foreach($output as $object){
                            echo '<p class="sched-desc">'.'> '.$object->description.'</p><br/>';
                            } 
                        ?> -->
                    </div>      
                </div>
            </div>
        </div>  
            <div id="add-modal" class="col-4 mb-auto ml-auto mr-auto text-center modal fade">
                <div class="col-lg-12 main-section">
                    <div id="modal-dash" class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                            <fieldset>
                                <legend>Add Schedule </legend>
                            </fieldset>        
                    </div>
                </div>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">  
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Add Schehdule</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <?php echo form_open(''); ?>
                            <div class="form-group">
                                <span><i class="add-date fas fa-calendar"></i><input id="date" class="form-control" type="date" name="date"></span>
                            </div>
                            <div class="form-group">
                                <input id="description" class="form-control" type="text" name="description" placeholder="Add description">
                            </div>
                            <div>
                                <span><i class="add-btn fas fa-calendar-plus"></i><?php echo form_submit('submit', 'Add Schedule', 'id="add_sched_btn" class="btn btn-success"'); ?></span>                                            
                            </div>    
                        <?php echo form_close()?>
                    </div>       
                </div>
            </div> <!-- End of Add Modal -->
            
            
            <!-- Edit Modal -->
            <div class="modal fade" id="update_modal" role="dialog">
                <div class="modal-dialog">  
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Edit Schehdule</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <?php echo form_open(''); ?>
                            <div class="form-group">
                                <span><i class="add-date fas fa-calendar"></i><input id="edit_date" class="form-control" type="date" name="edit_date"></span>
                            </div>
                            <div class="form-group">
                                <input id="edit_description" class="form-control" type="text" name="edit_description" placeholder="Add description">
                            </div>
                            <div class="form-group">
                                <input id="edit_id" class="form-control" type="hidden" name="edit_id" readonly>
                            </div>
                            <div>
                                <span><i class="add-btn fas fa-calendar-minus"></i><?php echo form_submit('submit', 'Edit Schedule', 'id="edit_sched_btn" class="btn btn-success"'); ?></span>                                            
                            </div>    
                        <?php echo form_close()?>
                    </div>       
                </div>
            </div> <!-- End of Edit Modal -->

            
            <!-- Delete Modal -->
            <div class="modal fade" id="delete_modal" role="dialog">
                <div class="modal-dialog">  
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Delete Schehdule</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this record?</strong>
                                <div class="form-group">
                                    <span><input id="delete_id" class="form-control" type="hidden" name="delete_id"></span>
                                </div>
                            </div>
                            <div>
                                <span><i class="add-btn fas fa-calendar-times"></i><button id="delete_sched_btn" class="btn btn-danger">Delete Schedule</button></span>                     
                                <!-- <?php echo form_submit('submit', 'Delete Schedule', 'id="delete_sched_btn" class="btn btn-danger"'); ?> -->
                            </div>    
                    </div>       
                </div>
            </div> <!-- End of Delete Modal -->
            
    <script type="text/javascript" src="<?php echo base_url().'assets/js/main.js'?>"></script>  
</body>
</html>