<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }
    
    public function select_all($table_name)
    {
    	$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }
    // === Billing Details Insertation  code ===///
    public function insert($table_name,$data)
    {
      	$this->db->insert($table_name, $data);
    }
    
    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }


    // === Billing Details Insertation  Code End ===///

    public function select_condition_decending_with_limit($table_name,$limit)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by('created_at','DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
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
}

?>