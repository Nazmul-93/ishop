<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends MX_Controller {
    protected $user_login_id;
    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->library("session");
        // $this->load->model('login_model');
        // $this->load->model('admin/admin_model');
        // $this->load->helper('text');
        // $this->load->helper(array('form', 'url'));
        // $this->load->helper('inflector');
        // $this->load->library('encrypt');

        $this->load->model('home/home_model');
        $this->load->model('category_model');
        $this->load->model('admin/Admin_model');
       $this->load->model('product/product_model');
       $login_id =  $this->user_login_id = $this->session->userdata('login_id');
        

    }

    public function index()
    {
        $data['content']='contact';

        $this->load->view('master/master',$data);
    }
    
}
?>