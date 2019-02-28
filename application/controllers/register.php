<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Register extends CI_Controller {
        function index(){
            $this->register();
        }

        //register the user to the database 
        public function sign_up(){
            $this->load->helper(array('form','url'));
            $this->load->helper('html');
            $this->load->library('form_validation');
            $this->load->model('register_user');

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

            if($this->form_validation->run()==FALSE){
                $this->load->view('register_form');
            } else {
                $this->load->model('register_user');
                if($query = $this->register_user->register_member()){
                    $data['account_created'] = 'Your account has been created.<br/><br/> You may now sign in!'; 
                    redirect('/');
                } else {
                    $this->load->view('register_form');
                }
            }
        }
    }