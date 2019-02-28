<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Dashboard extends CI_Controller {

        function index(){
            $this->enter();
            $this->outSched();
        }

        //checks if the user is logged in
        // if not, redirects to sign in page
        function enter(){
            if($this->session->userdata('is_logged_in') == TRUE){
                $data['email'] = $this->session->userdata('email');
                $name = $data['email'];
                $user_name['email'] = strstr($name, '@', true);
                $this->load->model('user_schedule');
                $user_name['output'] = $this->user_schedule->get_sched();
                $this->load->view('dashboard', $user_name);
            } else {
                redirect('/');
            }
        }

        //destroy user session then redirects to sign in page
        function logout(){
            $user_data = $this->session->all_userdata();
                foreach ($user_data as $key => $value) {
                    if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                        $this->session->unset_userdata($key);
                    }
                }
            $this->session->sess_destroy();
            redirect('/');
        }

        function outSched() {
           
        }

    }