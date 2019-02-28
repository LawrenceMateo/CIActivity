<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User_Schedule extends CI_Controller {
                
        function __construct() {
            parent::__construct();
        }

        //insert inputed schedule
        function insert_sched() {
            $date = $this->input->post('date');
            $format_date = strtotime($date);
            $sched_date = date("Y/m/d", $format_date);
            $new_sched = array(
                'id' => NULL,
                'user_id' => $this->session->userdata('id'),
                'date' => $sched_date,
                'description' => $this->input->post('description')
            );
            $sql = $this->db->insert('schedules', $new_sched);
            return $sql;
        }

        //gets the schedules for output
        function get_sched(){
            $current_date = date('Y-m-d');
            $this->db->where('date', $current_date);
            $this->db->where('user_id', $this->session->userdata('id'));
            $query = $this->db->get('schedules');

            if($query->num_rows() > 0){
                return $query->result();
            } else{
                return $query->result();
            }
        }
    }
