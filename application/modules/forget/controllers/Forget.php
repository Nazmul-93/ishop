<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget extends MX_Controller {

    protected $user_login_id;
    function __construct()
    {
        
        $this->load->model('forget_model');
        // $this->load->model('search/search_model');
        $this->load->model('pre_registration/pre_registration_model');
        $this->load->model('home/home_model');
        $this->load->model('category_model');
        $this->load->library('sendsms_library');
        $this->load->library('email');
        

    }

    public function index() {
        $data['content']='forget_password';
        $this->load->view('master/master',$data);
    }

    public function create_new_password(){
        $data['nav_active']='login';
        //$id=$this->input->post('id');
        $email= $this->input->post('email');
        $email_content=$this->forget_model->select_with_where('*','id=2','email_notify_api');
        $exists_mail=$this->forget_model->get_email($email,'user_login');
        $exists_mobile=$this->forget_model->get_mobile($email,'user_login');
        
        if(count($exists_mail)>0){
            $login_id=$exists_mail[0]['login_id'];
            $reg_info=$this->home_model->select_with_where('*','login_id='.$login_id,'user_login');
            $this->session->set_userdata('email',$email);
            $name=$reg_info[0]['user_name'];
            $email=$exists_mail[0]['email'];
            $retrive_password=$this->decryptIt($exists_mail[0]['password']);
            
            $this->send_message_template($name,$email,'Forget Password Notification','Your Forgotten Password is: '.$retrive_password,'Now,Please Login To Your Account:<a href="http://cmart.com.bd/login"> https:// cmart.com.bd/login</a>');
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('msg', 'Please check your mail for further info. ');
        
            redirect('login','refresh');
        }elseif(count($exists_mobile)>0){
            $phone=$exists_mobile[0]['email'];
            $retrive_password=$this->decryptIt($exists_mobile[0]['password']);
            $this->sendsms_library->send_single_sms('Cmart',$phone,' Dear Shopper Your Forgotten Password Were : '.$retrive_password.  ' For Any Query Call Us 09639177929...Thank You ...!!');
              $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg','Please check your Mobile for further info. ');
            // $this->session->set_userdata('log_ssc','Please check your Mobile for further info.');
            redirect('login','refresh');
        }else{
            // $this->session->set_userdata('log_err','Email not found!.');
            $this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('msg', 'Data In-Correct....!!');
            redirect('forget','refresh');
        }
    }
    
    public function send_email($subject='',$email='',$id){
        $company_info=$this->head_data();
        $email_content=$this->forget_model->select_with_where('*','id='.$id,'email_notify_api');
        $message=$email_content[0]['message'];
         
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.cmart.com.bd',
            'smtp_port' => 26,
            'smtp_user' => 'admin@cmart.com.bd',
            'smtp_pass' => 'rc01816306190',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'wordwrap' => 'TRUE',
            'newline'   => "\r\n",
            'crlf'   => "\r\n",
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($company_info[0]['email'],$company_info[0]['name']);
        $this->email->to($email);
        $base=$this->config->base_url();
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
    }
    
    public function change_password($tmp_password=''){
        $data['nav_active']='login';
        $data['company_info']=$this->home_model->select_all('company');
        
        if($tmp_password!=''){
            $exist_link=$this->home_model->select_with_where('*','tmp_password="'.$tmp_password.'"','login');
            if(count($exist_link)>0){
                $this->session->set_userdata('email',$exist_link[0]['email']);
                $this->load->view('update_password',$data);
            }else{
                $this->load->view('invalid_link',$data);
            }
        }else{
            $this->load->view('invalid_link',$data);
        }
    }

    public function update(){
        $data['nav_active']='login';
        $data['company_info']=$this->home_model->select_all('company');
        $data['company_info']=$this->home_model->select_with_where('*', 'id=1', 'company');
        //$data['message_error_password']=NULL;
        if($this->input->post('password')){
            $email= $this->session->userdata('email');
            $data_password['password']=$this->encryptIt($this->input->post('password'));
           $data_password['tmp_password']=$this->forget_model->new_tmp_password();
            $this->forget_model->update_password('email',$email,'login',$data_password);
            $this->session->set_userdata('log_ssc','Password Update Successfully.Now you can log in through your new password');
            redirect('login','refresh');
        }
    }


    public function head_data(){
        $id = 1;
        $reg=$this->pre_registration_model->select_with_where('*', 'id='.$id, 'company');
        return $reg;
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
    
    
    public function test_email(){
        $this->send_message_template('Cmart','cmart@gmail.com','Forget Password','Retreive Password','You can update your Cmart password by following this link<a style="padding: 5px;border: 1px solid #1d2f46;background: #1d2f46;color: #fff;text-decoration: none;display: inline-block;margin-left: 15px;margin-bottom: 15px;" class="btn btn-primary btn-xs" href="www.cmart.com.bd/forget/change_password/">Click Here</>');
    }


    public function send_message_template($name,$email,$subject,$email_head_subject,$email_msg_body)
    {
        $company_info=$this->head_data();
        $data['company_info']=$company_info;
        
        $config = Array(
            'protocol' => 'SMTP',
            'smtp_host' => 'mail.cmart.com.bd',
            'smtp_port' => 26,
            'smtp_user' => 'admin@cmart.com.bd',
            'smtp_pass' => 'rc01816306190',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'wordwrap' => 'TRUE',
            'newline'   => "\r\n",
            'crlf'   => "\r\n",
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@cmart.com.bd', 'CMART');
        $this->email->to($email);
        $base=$this->config->base_url();
        $data['name']=$name;
        $data['email']=$email;
        $data['email_head_subject']=$email_head_subject;
        $data['email_msg_body']=$email_msg_body;
        $message=$this->load->view('email', $data,'true');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
    } 
    
    function decryptIt($string){
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $secret_iv = 'This is my secret iv';
        // hash
        $key = hash('sha256', $secret_key);
      // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}
