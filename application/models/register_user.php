<?php

    class Register_User extends CI_Controller{

        function __construct(){
            parent::__construct();
        }
        
        function register_member(){
            $new_user = array(
                'id' => NULL,
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );
            $sql = $this->db->insert('users', $new_user);
            return $sql;
        }
    }

?>