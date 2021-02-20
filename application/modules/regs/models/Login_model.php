<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($email, $pass) {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
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