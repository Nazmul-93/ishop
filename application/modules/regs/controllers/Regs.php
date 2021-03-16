<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regs extends MX_Controller {

    protected $user_login_id;

    function __construct() { 
        parent::__construct();
        // $this->load->library("session");
        $this->load->model('login_model');
        // $this->load->model('admin/admin_model');
        // $this->load->helper('text');
        // $this->load->helper(array('form', 'url'));
        // $this->load->helper('inflector');
        // $this->load->library('encrypt');
        $this->load->model('category_model');
        $this->load->model('home_model');
        $this->load->model('admin/admin_model');
        $this->load->model('regs/Regs_model');
        $this->load->library('sendsms_library');
        $this->load->library('email');

    }

    public function index(){
        $data['login_id']=  $this->user_login_id;
        $data['content']='regs';
        $this->load->view('master/master',$data);
        }
    
    public function registration_form(){ 
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $con_password=$this->input->post('con_password');
        
        $data_login['f_name']=$this->input->post('f_name');
        $data_login['l_name']=$this->input->post('l_name');
        $data_login['email']=$email;
        $data_login['phone_number']=$this->input->post('phone_number');
        if($password==$con_password){
            $data_login['password']=$this->encryptIt($password);
        }else{
            $msg = 'Password not matched!';
            $this->session->set_flashdata('msg', $msg);
            redirect('regs','refresh');
        }
        $data_login['created_at']= date('Y-m-d H:i:s');
        $data_login['user_type']=3;
        $dataemail=count($this->Regs_model->select_with_where('*','email="'.$email.'"','user_login')); 
         
        if($dataemail==0){
            if(is_numeric($email)){
                $check=substr($email,0,2);
                if($check=='88'){
                    $data_login['email']=$email;
                }else{
                    $data_login['email']='88'.$email;
                }
                 $msg="Thank you for signup with cmart.com.bd. Your user ID : ".$email." your password is : ".$password." your login url:https:cmart.com.bd Thank you";
                $this->sendsms_library->send_single_sms('CMART',$data_login['email'],$msg);
            }else{
                $this->sendEmail($email,$password);
            }
            $insert=$this->Regs_model->insert_ret('user_login',$data_login);    
            $this->session->set_flashdata('type', 'success');
            $msg =  $this->session->set_flashdata('msg', 'Registration Successfully Done,You May Login Now !!');
        }else{
            $msg = 'This Email Already Exist !';
            $this->session->set_flashdata('msg', $msg);    
        }
         redirect('login','refresh');
    }
    
    function encryptIt($string){
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
    
    private function mail_config(){
        $config = array();
        $config['protocol'] = 'SMTP';
        $config['smtp_host'] = 'mail.cmart.com.bd';
        $config['smtp_user'] = 'admin@cmart.com.bd';
        $config['smtp_pass'] = 'rc01816306190';
        $config['smtp_port'] = 26;
        return $config;
        }

    private function sendEmail($email,$password){

        $config = $this->mail_config();
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@eshop.com.bd', 'CMART');
        $this->email->to($email);
        $this->email->cc('info@eshop.com.bd');
        
        $this->email->subject('New Signup Mail');

        $message='<!DOCTYPE html>
        <html lang="en">
        <body style="margin:0px auto;width:80%;">
        <div style="margin: 0;padding:50px!important;
                background:#f5f5f5;
                box-shadow: 10px 10px 10px 10px #d4d2d2;border-radius: 15px 15px 0px 0px;">
            <img style="width:100px;" class="mx-auto mt-4" src="http://eshop.com.bd/frontassets/images/logo.png" alt="Cmart-image">
            <hr>
                <p style="margin:10px:color:#000;">Dear-Shopper <span style="font-size:20px;">&#128515;
                </span><br>
            
            <p><h4 style="color:#a20dbb;">
            
            Your account has been created successfully. Your login details are bellow !!</h4>
            </p><br>
            
                &#10004;  Username:  <span style="color:#673AB7;font-weight:600;"> '.$email.'</span> <br>
                &#10004;  Password:  <span style="color: #f9085a;
                font-weight: 600;">'.$password.'</span><br><br>
                Your login URL link:<a href="http://eshop.com.bd/login"> https:// eshop.com.bd/login</a><br>
                </p>
        
            <p>Thanks By</p>
            <p>Cmart-Team .....</p><br>
            <p style="text-transform: uppercase;">Any question, query or complain please contact us</p>
                <p> &#10004; Contact Us: Cmart limited</p>
                <p><span style="font-size:17px;">&#9742;</span> Cell-NO: +8809639177929</p>
                <p>&#9993; Mail: care@eshop.com.bd</p>
    
            </div>
                
        
        </div>
                <div style="background: #11c1b1;
                    padding: 5px;
                    overflow: hidden;
                    border: 1px solid #ccc;
                    width:78.8%!important;
                    margin: 0px auto;
                    box-shadow: 10px 10px 10px 10px #d4d2d2;">
                    
                <div style="width:100%;float:left">
                    <p style="color:#fff;text-align:center;
                    margin-left:10px">
                    Copyright © 2020 CMART. All Rights Reserved.
                    </p>
                </div>
                </div>
    </body>
    </html>';
        $this->email->message($message);
        $this->email->set_mailtype('html');
        $this->email->send();
  }

}
?>