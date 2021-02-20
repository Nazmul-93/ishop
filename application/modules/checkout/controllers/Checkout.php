<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout extends MX_Controller {


    protected $user_login_id;

    //public $counter=0;
    function __construct() {

        parent::__construct();

        $this->load->library("session");
        // // $this->load->model('login_model');
        // $this->load->model('admin/admin_model');
        // $this->load->helper('text');
        // $this->load->helper(array('form', 'url'));
        // $this->load->helper('inflector');
        // $this->load->library('encrypt');
        $this->load->library('cart');
        $this->load->model('category_model');
         $this->load->model('checkout/Checkout_model');
        $this->load->model('home/home_model');
        $this->load->model('admin/admin_model');
        $this->load->library('email');
        $this->load->library('sendsms_library');

        $login_id =  $this->user_login_id =  $this->session->userdata('login_id');
        $name   =    $this->session->userdata('name');
        $type   =    $this->session->userdata('type');
        
        if($login_id=='')
        {
            $this->session->unset_userdata('login_id');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('type');
            $this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('msg', 'Please Login First,,, Before place an order...');
            redirect('login','refresh');
        }

       
    }
    

	public function index()
		{
            $data['content']='checkout';

            $this->load->view('master/master',$data);
		
        }
}

?>