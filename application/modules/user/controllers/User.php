<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MX_Controller {
    protected $user_login_id;

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->library("session");
        $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
        $this->load->model('home/home_model');
        $this->load->model('category_model');
        $this->load->model('admin/admin_model');
       $this->load->model('product/product_model');
       $this->user_login_id =$this->session->userdata('login_id');
          $this->load->library('email');
        $this->load->library('sendsms_library');
        if(!$this->user_login_id){
             redirect('/login');
        }
    }

    public function index($name=''){
        $data['login_id']=$login_id=$this->user_login_id;
        $this->load->view('index',$data);
    }
}
?>
