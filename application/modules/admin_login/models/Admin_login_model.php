<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function check_login($email, $pass) {
        $this->db->select('*');
        $this->db->from('login');
        //$this->db->join('registration','registration.login_id=login.id');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $this->db->where('verify_status', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_name($id)
    {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('login_id', $id);
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