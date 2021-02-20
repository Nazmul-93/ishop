<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_login extends MX_Controller {
    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->model('admin_login_model');
        $this->load->model('home/login_model');
        $this->load->helper('inflector');
        $this->load->helper('string');
    }

    public function index()
    {
        $data['company_info']=$this->login_model->select_with_where('*', 'id=1', 'company');
    	$this->load->view('index',$data);
    }

    public function login_check() 
    {

        $email = $this->input->post('email');
        $password = $this->encryptIt($this->input->post('password'));


        $res = $this->admin_login_model->check_login($email, $password);
        //print_r($res);
        if (count($res) > 0) 
        {
            
            $this->session->set_userdata('login_id', $res[0]['id']);
            $this->session->set_userdata('type' ,$res[0]['user_type']);
            $this->session->set_userdata('email' ,$res[0]['user_type']);

            // $this->session->set_userdata('login_id', 1);
            // $this->session->set_userdata('reg_id' , 6);
            // $this->session->set_userdata('type' ,0);
            // $this->session->set_userdata('district_id', 0);
           

            $name=$this->admin_login_model->get_name($res[0]['id']);
            $login_id=$this->admin_login_model->get_name($res[0]['id']);
            $this->session->set_userdata('name' , $name[0]['first_name'].' '.$name[0]['last_name']);
        

            $this->session->set_userdata('login_scc', 'Welcome to Admin Dashboard.');

            if($res[0]['user_type']==1)
            {
                redirect('admin','refresh');
            }
            // else if($res[0]['user_type']==3)
            // {
            //     redirect('user','refresh');
            // }


            else 
            {
                redirect('login','refresh');
            }    
        }

        
        else 
        {
            $this->session->set_userdata('log_err','Email or Password is Incorrect.');
        	redirect('login', 'refresh');
        }
        
    }

    public function ajax_login_check()
    {
        $email=$this->input->post('email');
        $password = $this->encryptIt($this->input->post('password'));

        $res = $this->admin_login_model->check_login($email, $password);
        if(count($res)>0)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function fb_login()
    {
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }

            var_dump($user);

        }
    }

    public function pass_gen()
    {
        $ss=$this->encryptIt('123456');
        echo $ss;
    }

    public function change_password()
    {
    	$email = $this->input->post('email');
    	$pass = $this->encryptIt($this->input->post('pass_change'));
        $data = array('password' => $pass,);
        $this->admin_login_model->password_change($email,$data);
        $this->session->set_userdata('log_scc','Successfully changed your password! Login with your "NEW" password.');
        redirect('login/index', 'refresh');
    }
    
    public function activate_account($activation_link='')
    {
        if($activation_link!='')
        {
            $get_access=$this->home_model->select_with_where('*','account_activation_link="'.$activation_link.'"','login');
            if(count($get_access)>0)
            {
                $this->session->set_userdata('login_id', $get_access[0]['id']);
                $this->session->set_userdata('type' ,$get_access[0]['user_type']);
                $this->session->set_userdata('email' ,$get_access[0]['email']);
                //echo $get_access[0]['id'];
                $name=$this->admin_login_model->get_name($get_access[0]['id']);
                //echo "<pre>";print_r($name);die();
                $this->session->set_userdata('name' , $name[0]['first_name'].' '.$name[0]['last_name']);
                
                $data_up['account_activation_link']=random_string('alnum',40);
                $data_up['verify_status']=1;
                
                $this->home_model->update_function('id', $get_access[0]['id'], 'login', $data_up);
                
                $this->session->set_userdata('log_scc','Activation activation successfull.');
                redirect('user', 'refresh');
            }
            
            else
            {
                $this->session->set_userdata('log_err','Activation Link Expired');
                redirect('login', 'refresh');
            }
        }
        else
        {
            $this->session->set_userdata('log_err','Need to activate your account with valid link');
            redirect('login', 'refresh');
        }
    }

   public function registration()
   {
     $data['comp_name']=$this->input->post('comp_name');
     $data['comp_title']=$this->input->post('comp_title');
     $data['comp_address']=$this->input->post('comp_address');
     $data['comp_phone']=$this->input->post('comp_phone');

     $this->db->insert('company',$data);
   }


    function encryptIt($string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $secret_iv = 'This is my secret iv';
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
      
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        $output=str_replace("=", "", $output);
        return $output;
    }

}
