<?php

    class Login_User extends CI_Controller{
        
        function __construct(){
            parent::__construct();
        }

        function sign_in(){
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('password', md5($this->input->post('password')));
            $query = $this->db->get('users');

            if($query->num_rows() == 1){
                return TRUE;
            }
        }

        function get_all(){
            $this->db->where('email', $this->input->post('email'));
            $query = $this->db->get('users');

            if($query){
                return $query->result();
            }
        }
    }

?>