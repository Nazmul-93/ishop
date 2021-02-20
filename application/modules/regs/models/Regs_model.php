<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regs_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($table_name,$data)
    {
      	$this->db->insert($table_name, $data);
    }

    public function check_login($email,$pass) {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function select_with_where($selector, $condition, $tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->result_array();
    }


     public function password_change($email,$data)
    {
        $this->db->where('email',$email);
        $this->db->update('login',$data);
    }
    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }

   
}

?>