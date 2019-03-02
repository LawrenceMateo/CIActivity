<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Schedule extends CI_Controller {
        function index(){
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->helper('url');
            $this->load->view('schedule_form');
        }

        //adds the schedule
        function addSched() {
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->helper('html');
            $this->load->library('form_validation');
            $this->load->model('user_schedule');

            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if($this->form_validation->run() == FALSE) {
                $data['email'] = $this->session->userdata('email');
                $name = $data['email'];
                $user_name['email'] = strstr($name, '@', true);
                redirect('sched');
            } else {
                $this->load->model('user_schedule');
                if($query = $this->user_schedule->insert_sched()){
                    $data['email'] = $this->session->userdata('email');
                    $name = $data['email'];
                    $user_name['email'] = strstr($name, '@', true);
                    redirect('sched');
                } else {
                    $data['email'] = $this->session->userdata('email');
                    $name = $data['email'];
                    $user_name['email'] = strstr($name, '@', true);
                    redirect('sched');
                }
            }
        }

    }