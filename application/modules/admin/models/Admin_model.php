<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    ////// Basic Model Function Starts ///////
    public function insert($table_name,$data)
    {
      	$this->db->insert($table_name, $data);
    }

    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }
    
    public function update_all($tableName, $data)
    {
        $this->db->update($tableName, $data);
    }
      
    public function update_function($columnName, $columnVal, $tableName, $data)
    {
       
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }
    
    public function delete_query($column,$value,$table)
    {
        $this->db->where($column,$value);
        $this->db->delete($table); 
    }

    public function update_vstatus($columnName,$columnVal,$tableName,$data)
    {
		$this->db->set('verify_status',$data);
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }

    

    public function update_with_codition($condition,$tableName,$data)
    {
        $this->db->where($condition);
        $this->db->update($tableName, $data);
    }

    public function update_ratul($columnName, $columnVal, $tableName, $data,$cname)
    {
		$this->db->set('balance', $cname+$data);
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName);
    }

    public function delete_function_cond($tableName, $cond)
    {
        $where = '( ' . $cond . ' )';
        $this->db->where($where);
        $this->db->delete($tableName);
    }
    public function delete_function($tableName, $columnName, $columnVal)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->delete($tableName);
    }

    public function select_all($table_name)
    {
    	$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }

    public function select_all_name_ascending($col_name,$table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by($col_name,'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
       public function select_join_order_details($selector,$table_name,$join_table,$join_condition,$join_table2,$join_condition2,$join_table3,$join_condition3)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $this->db->join($join_table2,$join_condition2);
        $this->db->join($join_table3,$join_condition3);
       
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }    
    public function select_all_name_ascending_condition($col_name,$table_name,$condition)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by($col_name,'ASC');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function select_all_decending_condition($col_name,$table_name,$condition)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by($col_name,'ASC');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function select_all_decending($table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by('created_at','DESC');
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
    public function select_with_where($selector, $condition, $tablename)
    {
    	$this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function count_with_where($selector,$condition,$tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_row($selector, $tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function select_join($selector,$table_name,$join_table,$join_condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $result=$this->db->get();
        return $result->result_array();
    }

    public function select_left_join($selector,$table_name,$join_table,$join_condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'left');
        $result=$this->db->get();
        return $result->result_array();
    }

    public function select_left_join_new($selector,$table_name,$join_table,$join_condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
		$this->db->order_by('buy_id',"desc");
// 		$this->db->limit(10);  
        $this->db->join($join_table,$join_condition,'left');
        $result=$this->db->get();
        return $result->result_array();
    }


    public function select_where_join($selector,$table_name,$join_table,$join_condition,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }
    public function select_where_join_asc($selector,$table_name,$join_table,$join_condition,$condition,$col_name)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by($col_name,'ASC');
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }


    public function select_where_left_join($selector,$table_name,$join_table,$join_condition,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'left');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }



    
    public function select_two_join($selector,$table_name,$join_table,$join_condition,$join_table2,$join_condition2)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $this->db->join($join_table2,$join_condition2);
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }


    public function select_where_two_join($selector,$table_name,$join_table,$join_condition,$join_table2,$join_condition2,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $this->db->join($join_table2,$join_condition2);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }


    public function select_where_two_left_join($selector,$table_name,$join_table,$join_condition,$join_table2,$join_condition2,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'LEFT');
        $this->db->join($join_table2,$join_condition2,'LEFT');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        //$this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }


        // ====  user product list start====

        public function user_product_list($condition)
        {
            $this->db->select('*,product.pro_id as prodct_id');
            $this->db->from('product');
            $this->db->join('order_details','order_details.product_id=product.pro_id','LEFT');
            $this->db->join('order','order.id=order_details.order_id','LEFT');
            $where = '(' . $condition . ')';
            $this->db->where($where);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        // ========  user product list ends ====
    public function select_where_three_inner_join_where($selector, $table_name, $join_table, $join_condition,$join_table2,$join_condition2,$join_table3,$join_condition3,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'inner');
        $this->db->join($join_table2,$join_condition2,'inner');
        $this->db->join($join_table3,$join_condition3,'inner');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result=$this->db->get();
        return $result->result_array();
    }

    public function select_where_three_inner_join($selector, $table_name, $join_table, $join_condition,$join_table2,$join_condition2,$join_table3,$join_condition3)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'inner');
        $this->db->join($join_table2,$join_condition2,'inner');
        $this->db->join($join_table3,$join_condition3,'inner');
        $result=$this->db->get();
        return $result->result_array();
    }
    public function select_where_three_left_join($selector, $table_name, $join_table, $join_condition,$join_table2,$join_condition2,$join_table3,$join_condition3,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'LEFT');
        $this->db->join($join_table2,$join_condition2,'LEFT');
        $this->db->join($join_table3,$join_condition3,'LEFT');
        $where = '(' . $condition . ')';
        $this->db->where($where);

        $result=$this->db->get();
        return $result->result_array();
    }
    public function select_where_five_left_join($selector,$table_name,$join_table,$join_condition,$join_table2,$join_condition2,$join_table3,$join_condition3,$join_table4,$join_condition4,$join_table5,$join_condition5,$condition)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition,'LEFT');
        $this->db->join($join_table2,$join_condition2,'LEFT');
        $this->db->join($join_table3,$join_condition3,'LEFT');
        $this->db->join($join_table4,$join_condition4,'LEFT');
        $this->db->join($join_table5,$join_condition5,'LEFT');
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result=$this->db->get();
        return $result->result_array();
    }


        // ============*****  four join query start ==========*******//

        public function select_where_four_left_join($selector,$table_name,$join_table,$join_condition,$join_table2,$join_condition2,$join_table3,$join_condition3,$join_table4,$join_condition4,$condition)
        {
            $this->db->select($selector);
            $this->db->from($table_name);
            $this->db->join($join_table,$join_condition,'LEFT');
            $this->db->join($join_table2,$join_condition2,'LEFT');
            $this->db->join($join_table3,$join_condition3,'LEFT');
            $this->db->join($join_table4,$join_condition4,'LEFT');

            $where = '(' . $condition . ')';
            $this->db->where($where);
            $result=$this->db->get();
            return $result->result_array();
        }

        // ============*****  four join query end ==========*******//


      public function select_where_join_order_by($selector,$table_name,$join_table,$join_condition,$condition,$order_col,$order_action)
    {
        $this->db->select($selector);
        $this->db->from($table_name);
        $this->db->join($join_table,$join_condition);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by($order_col,$order_action);
        $result=$this->db->get();
        return $result->result_array();
    }

    ////// Basic Model Function End ///////




   public function select_group_table_data($table,$condition,$group_col)
    {
        $this->db->select('*,SUM(price-((price*discount)/100)) as total,'.$table.'.created_at as or_date');
        $this->db->join('login','login.id='.$table.'.user_id');
        $this->db->join('registration','registration.login_id=login.id');
        $this->db->from($table);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->group_by($group_col);
        $this->db->order_by($table.'.created_at', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function select_group_transaction_data($table,$condition,$group_col)
    {
        $this->db->select('*,'.$table.'.created_at as or_date');
        $this->db->join('customer_order','customer_order.order_id='.$table.'.order_id');
        $this->db->join('login','login.id='.$table.'.user_id');
        $this->db->join('registration','registration.login_id=login.id');
        $this->db->from($table);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->group_by($group_col);
        $this->db->order_by($table.'.created_at', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }


    

    public function get_last_product_code()
    {
    	$this->db->select('p_code');
		$this->db->from('product');
		$this->db->order_by('p_id',"desc");
		$this->db->limit(1);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }

     public function get_last_sell_code()
    {
        $this->db->select('sell_code');
        $this->db->from('sell');
        $this->db->order_by('sell_id',"desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }


     public function get_last_buy_code()
    {
        $this->db->select('buy_code');
        $this->db->from('buy');
        $this->db->order_by('buy_id',"desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_product_details($p_id)
    {
    	$this->db->select('*');
		$this->db->from('product');
        $this->db->where('p_id',$p_id); 
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
    }


    public function columns($database, $table)
    {
        //$query = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT, COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS  WHERE table_name = '$table'AND table_schema = '$database'";  
        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
            WHERE table_name = '$table'
            AND table_schema = '$database'";    
        $result = $this->db->query($query) or die ("Schema Query Failed"); 
        $result=$result->result_array();
        return $result;
    }


	
	///  For Union Two table
	 function get_merged_result()
    {                   
        $this->db->select("name,id,phone_second as web");
       // $this->db->distinct();
        $this->db->from("registration");
        //$this->db->where_in("id",$model_ids);
        $this->db->get(); 
        $query1 = $this->db->last_query();

        $this->db->select("name,id,website as web");
       // $this->db->distinct();
        $this->db->from("company");
       // $this->db->where_in("id",$model_ids);

        $this->db->get(); 
        $query2 =  $this->db->last_query();
        $query = $this->db->query($query1." UNION ".$query2);

        return $query->result_array();
    }

    public function order_by_last_row($selector,$tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
       
        
        // $where = '(' . $condition . ')';
        // $this->db->where($where);
        $this->db->order_by('id',"desc");
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function get_supplier_name()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->order_by('created_at','ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function get_last_row($table_name,$condition)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by('created_at',"desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function get_last_interest($table_name)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->order_by('created_at',"desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
     public function buy_details($buy_id)
    {
        $this->db->select('*,buy.created_at as purchase_date');
        $this->db->from('buy');
        $this->db->join('buy_details','buy_details.buy_id=buy.buy_id','LEFT');
        $this->db->join('supplier','buy.supp_id=supplier.supp_id','LEFT');
        $this->db->join('product','buy_details.p_id=product.p_id','LEFT');
        $this->db->join('color','buy_details.color_id=color.id','LEFT');
        $this->db->join('size','buy_details.size_id=size.id','LEFT');
        $this->db->where('buy.buy_id',$buy_id); 
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

        
    public function purchase_details($id)
    {
        $this->db->select('*,purchases.date as purchase_date');

        $this->db->from('purchases');

        $this->db->join('purchase_details','purchase_details.purchase_id=purchases.id','LEFT');

        $this->db->join('supplier','purchases.supp_id=supplier.sup_id','LEFT');

        $this->db->join('product','purchase_details.product_id=product.pro_id','LEFT');


        $this->db->where('purchases.id',$id); 

        $query = $this->db->get();

        $result = $query->result_array();

        return $result;
    }




	public function sum_with_where($col_name,$table_name,$condition){
        $this->db->select("SUM($col_name) AS MySum");
        $this->db->from("$table_name");
	    $where = '(' . $condition . ')';
        $query1 = $this->db->get();
        if($query1->num_rows() > 0)
        { 
         $res = $query1->row_array();
         return $res['MySum'];
        }
       return 0.00;
    }
    
public function personal_sale($userid)
    {
    	$query="select sum(total_amount)as balance from `order` where user_id='$userid' and status=3";
        $result = $this->db->query($query) or die ("Schema Query Failed"); 
        $result=$result->result_array();
        return $result;
    }

	public function team_sale($userid,$reg_username)
    {
    	$query="select sum(total_amount)as balance from `order` where user_id in 
		(select gen_achiver_id from generation_bonus where reason='$reg_username') and status=3";
        $result = $this->db->query($query) or die ("Schema Query Failed"); 
        $result=$result->result_array();
        return $result;
    }
	
	public function generation_one_count($userid)
    {
    	$query="select count(*)as gone from login where refferal_id=$userid and user_act_st=2";
        $result = $this->db->query($query) or die ("Schema Query Failed"); 
        $result=$result->result_array();
        return $result;
    }

	public function generation_two_count($userid)
    {
    	$query="select count(*)as gtwo from login where refferal_id in (select id from login where refferal_id=$userid) and user_act_st=2";
        $result = $this->db->query($query) or die ("Schema Query Failed"); 
        $result=$result->result_array();
        return $result;
    }
	public function generation_three_count($userid)
    {
    	$query="select count(*) as gthree from login where refferal_id in (select id from login where refferal_id in (select id from login where refferal_id=$userid)) and user_act_st=2";
        $result = $this->db->query($query) or die ("Schema Query Failed"); 
        $result=$result->result_array();
        return $result;
    } 

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







}
?>