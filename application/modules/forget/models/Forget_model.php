<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget_model extends CI_Model
{
	

    public function select_all($table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
  public function get_email($email,$tablename){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('email',$email);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
      public function get_mobile($mobile,$tablename){
           $check=substr($mobile,0,2);
        $this->db->select('email,password');
        $this->db->from($tablename);
         if(is_numeric($mobile) && $check!='88')
        {
            $this->db->where('email','88'.$mobile);
        }
        else{
            $this->db->where('email',$mobile);
        }
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


  public function new_tmp_password()
  {
    $this->load->helper('string');
    $new_tmp_password=random_string('alnum', 40);

    return $new_tmp_password;
  }

  public function update_tmp_password($login_id)
  {
    $this->load->helper('string');
    $tmp_password=random_string('alnum', 40);
    $data = array(
               'tmp_password' => $tmp_password
            );
              
    $this->db->where('id', $login_id);
    $this->db->update('user_login', $data); 
    return $tmp_password;
  }
    
  public function update_password($colname,$colvalue,$tablename,$data)
  {

 

    $this->db->where($colname,$colvalue);
    $this->db->update($tablename,$data); 
  }

}