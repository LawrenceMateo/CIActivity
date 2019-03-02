<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller{
        function index(){
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->helper('url');
            $this->load->view('login_form');
        }

        //loads signup form
        function form_register(){
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->view('register_form');
        }

        //validates user credentials then adds session
        // to the current user
        function validate(){
            $this->load->model('login_user');
            $query = $this->login_user->sign_in();
            
            $user = $this->login_user->get_all();
            foreach($user as $object){
                $user_id = $object->id;
            }
            if($query){
                $data = array(
                    'id' => $user_id,
                    'email' => $this->input->post('email'),
                    'is_logged_in' => TRUE
                );

                $this->session->set_userdata($data);
                redirect('sched');
            } else {
                redirect('/');
            }
        }
    }