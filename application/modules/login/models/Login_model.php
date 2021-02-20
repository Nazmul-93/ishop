<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($email, $pass) {
        $check=substr($email,0,2);
        $this->db->select('*');
        $this->db->from('user_login');
        //$this->db->join('registration','registration.login_id=login.id');
        
        if(is_numeric($email) && $check!='88')
        {
            $this->db->where('email','88'.$email);
        }
        else{
            $this->db->where('email',$email);
        }
        
        $this->db->where('password',$pass);
        // $this->db->where('verfiy_status',1);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function check_login_phn($email,$pass) {
        $this->db->select('*');
        $this->db->from('user_login');
        //$this->db->join('registration','registration.login_id=login.id');
        $this->db->where('phone_number',$email);
        $this->db->where('password',$pass);
        // $this->db->where('verfiy_status',1);
        $result = $this->db->get();
        return $result->result_array();
    }
    // public function get_name($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('login');
    //     $this->db->where('id',$id);
    //     $result = $this->db->get();
    //     return $result->result_array();
    // }


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

   public function chk_exist_eamil($email) {
        $this->db->select('*');
        $this->db->from('user_login');
        //$this->db->join('registration','registration.login_id=login.id');
        $this->db->where('email',$email);
        
        $this->db->where('verfiy_status',1);
        $result = $this->db->get();
        return $result->result_array();
    }
   public function chk_exist_mobile($email) {
        $this->db->select('*');
        $this->db->from('user_login');
        //$this->db->join('registration','registration.login_id=login.id');
        $this->db->where('phone_number',$email);
        
        $this->db->where('verfiy_status',1);
        $result = $this->db->get();
        return $result->result_array();
    }
        public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }
        public function delete_function($tableName, $columnName, $columnVal)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->delete($tableName);
    }

}

?>