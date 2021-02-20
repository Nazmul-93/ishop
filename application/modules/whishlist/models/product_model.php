<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
        public function __construct()
	{
		parent::__construct();
        }
}
                function fetch_all()
                {
                $query = $this->db->get("product");
                return $query->result();
                }
?>