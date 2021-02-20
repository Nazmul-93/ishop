<?php

class Category_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories()
    {
        $categories = $this->db->query("select * from category where status=1 and menu_option=1 and parent_id is null limit 40")->result_array();

        $i=0;
        
        //$child = [];

        foreach($categories as $parent_category)
        {
            $id = $parent_category['category_id'];
              $categories[$i]['sub'] = $this->sub_categories($id);
            
            $i++;
        } 

        return $categories;
    }
    
    public function get_top_categories()
    {
       $categories = $this->db->query("select * from category where status=1 and top_categories=1;")->result_array();
        
     
        return $categories;
    }
    
    public function show_store_products()
    {
         $categories = $this->Admin_model->select_where_left_join_distinct('category.category_name,category.category_id', 'product', 'category', 'product.cat_id=category.category_id', 'product.cat_id is NOT NULL and category.top_categories=1 and category.status=1');
     
        return $categories;
    }

   
    public function sub_categories($id)
    {
        $categories = $this->db->query("select * from category where parent_id=$id and status=1")->result_array();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]['sub'] = $this->sub_categories($p_cat['category_id']);
            $i++;
        }
        return $categories;       
    }


    public function category_where($selector = "*", $condition, $tablename)
    {
    	$this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->result_array();
    }

   
}