<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whishlist extends MX_Controller {

	protected $user_login_id;
	
    function __construct()
	{	
		parent::__construct();

		$this->load->library('cart');
		$this->load->model('admin/admin_model');
		$this->load->model('home/home_model');
		$this->load->model('category_model');
		$this->load->model('product/product_model');		

	
	}

	// ==== Samir Codes start ===///

	function index()
	{
	    $login_id =  $this->user_login_id =  $this->session->userdata('login_id');
        if($login_id=='')
        {
            $this->session->unset_userdata('login_id');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('type');
            $this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('msg', 'Please Login First,,, Before Add to Product Whishlist !!...');
            redirect('login','refresh');
		}
		
	$this->load->model("Product_model");

	$data['login_id']= $this->user_login_id;	

	$data['categories'] = $this->category_model->get_categories();
	$data['company_info']=$this->home_model->select_all('company');
	
   // ========= menu settings start ====

   $data['information_data']=$this->home_model->select_condition_random_with_limit('site_menu','menu_st=1 AND menu_positions=1','5');

   $data['others_data']=$this->home_model->select_condition_random_with_limit('site_menu','menu_st=1 AND menu_positions=2','5');

// ========= menu settings ends ====
       $data['seo']=$this->home_model->select_all('seo');
        
		$data['total_seo']=count($data['seo']);
		$login_id=$this->session->userdata('login_id');
		
		$data['whishlist_data'] = $this->admin_model->select_where_left_join('*,product.product_name as pro_name,product.product_img',
            'product',
            'whishlist',
            'whishlist.product_id=product.pro_id',
            'whishlist.login_id='.$login_id
        );
		
		// echo json_encode($data['whishlist_data']);
		// die();
		
		
		 $this->load->view("whishlist",$data);

	}

	function add()
	{
			
		 $p_id = $this->input->post('pro_id');
		 $login_id=$this->session->userdata('login_id');
		   	 
		 $product_data = $this->home_model->select_with_where('*', 'pro_id=' . $p_id . '', 'product');
		 
		 $data['msg']='';
	        if (count($product_data) > 0 && !empty($login_id)) {
				
				
				$wishlist['status']=1;
				$wishlist['login_id']=$login_id;
				$wishlist['product_id']=$p_id;
				$wishlist['created_at']=time();
				$this->home_model->insert_ret('whishlist',$wishlist);	
				$data['msg']="success";
			}
			else if(empty($login_id))
			{
				$data['msg'] = "login_error";
			
				
				
			}
		else
		{
			$data['msg']="stock_error";
		}
		echo $data['msg'];  
	}
	

	public function order_method(){

		$data['active']='product';
		$data['header']=$this->home_model->select_with_where('*','id=1','company');
		$data['brand']=$this->home_model->select_all_acending('brand','brand_name');
		$data['category']=$this->home_model->select_all_acending('category','position');

		$this->load->view('order_method',$data);
	
}
	public function destroy() 
		{	
			$this->cart->destroy();
			redirect('whishlist','refresh');
		}

		public function view() 
		{	
			$cart_info= $this->cart->contents();
			echo "<pre>";print_r($cart_info);
		}




		public function delete_whishlist($id ='')
		{
			
		
			$this->home_model->delete_function('whishlist','id',$id);
			redirect('whishlist','refresh');
			
		}
	
	

	
	
	
	

	




}

