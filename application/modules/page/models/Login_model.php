<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($email, $pass) {
        $this->db->select('*');
        $this->db->from('ratul_login');
        $this->db->where('user_email', $email);
        $this->db->where('Password', $pass);
        $this->db->where('act_status', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function check_login_customer($email, $pass) {
        $this->db->select('*');
        $this->db->from('customer_login');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $this->db->where('status', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_name($id)
    {
        $this->db->select('*');
        $this->db->from('customer_registration');
        $this->db->where('id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

     public function password_change($email,$data)
    {
        $this->db->where('email',$email);
        $this->db->update('login',$data);
    }

}

?>