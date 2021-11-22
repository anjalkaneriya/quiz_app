<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user_data($data)
    {
        $this->db->insert('user', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    } 

    public function check_exist_user($email_id,$mobile_number)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email_id',$email_id);
        $this->db->or_where('mobile_number',$mobile_number);
        // $this->db->or_where('mobile_number', $mobile_number );
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_score($user_id,$data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('user', $data);
    }

    public function get_questions()
    {
        $this->db->select('*');
        $this->db->from('quiz_questions');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result($user_id)
    {
        $this->db->select('*');
        $this->db->select("DATE_FORMAT(created_date, '%D %M %Y , %h:%i %p') as last_achieved_time");
        $this->db->from('user');
        $this->db->where('id', $user_id );
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
    }
    
}