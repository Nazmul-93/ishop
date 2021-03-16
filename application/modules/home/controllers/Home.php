<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
   
class Home extends MX_Controller {

    protected $user_login_id;

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->library("session");
        $this->load->model('home_model');
        $this->load->model('category_model');
        $this->load->model('admin/Admin_model');
       $login_id =  $this->user_login_id = $this->session->userdata('login_id');

    }

    public function index($name='') 
    {
       
        // $data['content']='index';
        $data['slide']=$this->home_model->select_with_where('*','status=1','slides');
        $data['Products']=$this->home_model->select_with_where('*','status=1','Products');
       
        $this->load->view('index',$data);
        
    }

}


?>
