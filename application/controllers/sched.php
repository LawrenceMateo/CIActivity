<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Sched extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('user_schedule');
        }

        function index(){
            $this->enter();
            $this->load->view('dashboard');
        }

        function enter(){
            if($this->session->userdata('is_logged_in') != TRUE){
                redirect('/');
            }
        }

        function view_sched(){
            $data = $this->user_schedule->get_sched();
            echo json_encode($data);
        }

        function add_sched(){
            $data = $this->user_schedule->insert_sched();
            echo json_encode($data);
        }

        function edit_sched(){
            $data = $this->user_schedule->update_sched();
            echo json_encode($data);
        }

        function delete_sched(){
            $data = $this->user_schedule->remove_sched();
            echo json_encode($data);
        }
    }