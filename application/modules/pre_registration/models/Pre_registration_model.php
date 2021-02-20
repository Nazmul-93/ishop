<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pre_registration_model extends CI_Model {

 public function insert($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
    }


    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
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


    public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }
    public function get_email($email,$tablename){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('email',$email);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_phone($phone,$tablename){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('phone_number',$phone);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    // public function check_data($col_name,$data) {
    //     $this->db->select('*');
    //     $this->db->from('pre_registration');
    //     $this->db->where($col_name, $data);
    //     $result = $this->db->get();
    //     return $result->result_array();
    // }

    

    
}

?>