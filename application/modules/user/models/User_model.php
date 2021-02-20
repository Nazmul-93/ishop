<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

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
    
    public function select_condition_random_with_limit($table_name,$condition,$limit)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by('created_at','RANDOM');
        $this->db->limit($limit);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
      public function select_condition_decending_with_limit($table_name,$condition,$limit)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by('created_at','DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }


    public function select_all_acending($table_name,$col_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by($col_name,'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function select_all($table_name)
    {
    	$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }   

       public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }

    // ==== Search Model Query Began =====//

    public function category_id_like($search_content)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->like('name', $search_content, 'both');
        $result=$this->db->get();
        return $result->result_array();
    }
    
    public function get_search_item($condition,$table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by($table_name.'.created_at','DESC');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->limit(5);
        $result=$this->db->get();
        return $result->result_array();
    }

      public function get_search_input_item($table_name,$condition,$search_content)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->like('product_name', $search_content,'after');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->limit(5);
        $result=$this->db->get();
        return $result->result_array();
    }

      public function fetch_item($query)
    {
        $this->db->select('*');
        $this->db->from('product');
        if($query!=''){
            $this->db->like('product_name',$query);
        }
        $this->db->order_by('created_at','DESC');
        // $where = '(' . $condition . ')';
        // $this->db->where($where);
        // $this->db->limit(10);
        return $this->db->get();
       
    }
    
 

    // ====  Search  Model Query End=== ///
}

