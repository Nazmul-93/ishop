<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MX_Controller {

	protected $user_login_id;
	
    function __construct() 
	{	
		parent::__construct();

		$this->load->library('cart');
		$this->load->model('admin/admin_model');
		$this->load->model('home/home_model');
		$this->load->model('category_model');
		$this->load->model('product/product_model');		
		// $login_id=$this->session->userdata('login_id');
		$login_id =  $this->user_login_id =  $this->session->userdata('login_id');
	}

	// ==== Samir Codes start ===///

	function index()
	{
		
		$data['content']='cart'; 

        $this->load->view('master/master',$data);

	}

}

