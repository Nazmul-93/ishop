<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model 
{
    public function select_all($table_name) 
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function select_with_where($selector, $condition, $tablename, $getType='array')
    {
    	$this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        
        if($getType == 'array')
            return $result->result_array();
        else   
            return $result->row_array(); 
    }
    
    public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        return $this->db->update($tableName, $data);
    }
    
    public function delete_function_cond($tableName, $cond)
    {
        $where = '( ' . $cond . ' )';
        $this->db->where($where);
        return $this->db->delete($tableName);
    }
    
    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }

}
?>