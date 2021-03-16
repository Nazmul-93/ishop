<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

    protected $user_login_id;

    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('login_model');
        $this->load->model('category_model');
        $this->load->model('home_model');
        $this->load->model('admin/admin_model');
    }

    public function index(){  
        $data['login_id']= $this->user_login_id;
        $data['content']='login';
        $this->load->view('master/master',$data);
    }

    public function login_check(){
        $email = $this->input->post('email');
        $pass = $this->encryptIt($this->input->post('password'));
        $res = $this->login_model->check_login($email,$pass);
        if (count($res) > 0){
            $this->session->set_userdata('login_id', $res[0]['login_id']);
            $this->session->set_userdata('type' ,$res[0]['user_type']);
            $this->session->set_userdata('email' ,$res[0]['email']);
            $this->session->set_userdata('password',$res[0]['password']);
       
            if($res[0]['user_type']==1){
                redirect('admin','refresh');
            }else if($res[0]['user_type']==3){   
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg', 'Welcome To Your Dashboard ');
                redirect('user','refresh');
            }
        }else{
            $this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('msg', 'Email Or Password Is Incorrect....!!');
            redirect('login', 'refresh');
        }
    }
 
    public function encryptIt($string){
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $secret_iv = 'This is my secret iv';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        $output=str_replace("=", "", $output);
        return $output;
    }
}
?>