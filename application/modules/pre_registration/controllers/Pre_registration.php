<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pre_registration extends MX_Controller {


    function __construct()
    {
        
        $this->load->model('pre_registration_model');
        $this->load->model('search/search_model');
        $this->load->model('home/home_model');

        date_default_timezone_set('Asia/Dhaka');
        if($this->session->userdata('language_select')=='bangla')
        {
            $this->lang->load('front', 'bangla');
        }
        else
        {
            $this->lang->load('front', 'english');
        }
        $this->load->library('admin/sendsms_library');

    }
    public function index()
    {
        $data['nav_active']='signup';
        $data['company_info']=$this->home_model->select_all('company');
        $this->load->view('index',$data);        
    }

    public function verification()
    {
        $data['nav_active']='signup';
        $data['company_info']=$this->home_model->select_all('company');
        $this->load->view('verification',$data); 
    }

    public function verificationlink_through_email($email='')
    {
        if($email!='')
        {
            $email=base64_decode($email);
            $person_info=$this->home_model->select_with_where('*','email="'.$email.'" AND verify_status=0 and type=1','pre_registration');
            
            if(count($person_info)>0)
            {
                $this->session->set_userdata('tmp_name',$person_info[0]['name']);
                $this->session->set_userdata('tmp_email',$person_info[0]['email']);
                $this->session->set_userdata('tmp_mobile_no',$person_info[0]['phone_number']);
                $this->session->set_userdata('tmp_country_code',$person_info[0]['country_code']);
                redirect('pre_registration/verification','refresh');
            }
            else
            {
                $this->session->set_userdata('log_err','Unauthorised link or email address');
                redirect('login','refresh');
            }
        }
        else
        {
            $this->session->set_userdata('log_err','Unauthorised link or email address');
            redirect('login','refresh');
        }
    }
    public function registration_post() {

    
        $reg['name'] = strip_tags($this->input->post('name')); 
        $email= strip_tags($this->input->post('email'));
        $country_code=$this->input->post('country_code');
        $phone = $this->input->post('phone');
        $reg['password'] = $this->encryptIt($this->input->post('password'));

        $phone = ltrim($phone, '0');

        $exists_mail=$this->pre_registration_model->get_email($email,'pre_registration');
        $exists_phone=$this->pre_registration_model->get_phone($phone,'pre_registration');

        $reg['email']=$email;
        $reg['country_code']=$country_code;
        $reg['phone_number'] =$phone;
        $reg['verify_status']=0;
        $reg['verify_code']=sprintf("%06d", mt_rand(1, 999999));
        $reg['created_at']=date('Y-m-d H:i:s');

        $this->session->set_userdata('tmp_name', $reg['name']);
        $this->session->set_userdata('tmp_country_code',$this->input->post('country_code'));
        $this->session->set_userdata('tmp_mobile_no', $phone);
        $this->session->set_userdata('tmp_email', $reg['email']);

        if(strlen($phone)!=10)
        {
            $this->session->set_userdata('err_msg','Phone number not valid');
            redirect('pre_registration','refresh');

        }


        //echo $this->session->userdata('tmp_name');die();
        if(count($exists_mail)>0){
            $this->session->set_userdata('err_msg','Email already exists');
            redirect('pre_registration','refresh');


           // $this->session->set_userdata('err_msg','Phone number already exists');
        }
        else if(count($exists_phone)>0){
            $this->session->set_userdata('err_msg','Phone number already exists');
            redirect('pre_registration','refresh');

        }


        else{
            $verf_id=$this->pre_registration_model->insert_ret('pre_registration',$reg);
            //echo"<pre>";print_r($verf_id);die();
            $exist_code=$this->pre_registration_model->select_with_where('*','verify_code="'.$reg['verify_code'].'"','pre_registration');

            $data_pro['username'] = preg_replace('/[ ,]+/', '-', trim($reg['name']));
            $data_pro['username']=$data_pro['username'].'-'.$verf_id;
            $data_pro['username'] = str_replace("'", '', $data_pro['username']);
            $this->pre_registration_model->update_function('id', $verf_id, 'pre_registration', $data_pro);

           
            // Sending SMS portion
            $api_code=$this->pre_registration_model->select_with_where('*','id=1','mobile_sms_api');
            $sms_content=$this->pre_registration_model->select_with_where('*','id=1','mobile_notify_api');
            $email_content=$this->pre_registration_model->select_with_where('*','id=1','email_notify_api');

            if($sms_content[0]['status']==1)
                {

                    $msg_to=$country_code.''.$phone;
                    $head_data=$this->head_data();
                    $company_name=$head_data[0]['name'];
                    $company_website=$head_data[0]['website'];
                    $company_fb_link=$head_data[0]['fb_link'];
                    $arr = explode(' ',trim($reg['name']));

                    $msg_des='Dear '.$arr[0].',\nPlease activate your account using this OTP: '.$reg['verify_code'].'\nThanks for being with Osellers. For any query 01307882887';


                    $ret_data=$this->sendsms_library->send_single_sms($company_name,$msg_to,$msg_des);
          
                    
                }

                if ($email_content[0]['status']==1) 
                {
                    //$this->send_email($email_content[0]['title'],$email,1);
                    $this->send_message_template($reg['name'],$reg['email'],'Registration Confirmation Notification','Confirm your "Registration" through OTP','An "<b>OTP</b>" code has sent to your phone number. Please enter your code in the provided form to confirm your registration.</br>If you do not get your sms within 5 minutes please contact our support.');
                }

                $this->session->set_userdata('scc_alt', $this->lang->line('enter_verify_msg'));
                $this->session->set_userdata('message','Verification code has been sent. Please check your message.');
                redirect('pre_registration/verification','refresh');
            


        }

   }


    public function account_activation($value='')
    {
        $data['nav_active']='signup';
        $data['company_info']=$this->home_model->select_all('company');
        if($this->session->userdata('tmp_email')!='')
        {
            $data['head_data']=$this->head_data();
            $this->load->view('verification',$data);
        }
        else
        {
            redirect('pre_registration','refresh');
        }
    }


    public function verification_code_match()
    {
        
        $data['company_info']=$this->home_model->select_all('company');
        $verify_code=$this->input->post('verify_code');

        $email=$this->session->userdata('tmp_email');
        $country_code=$this->session->userdata('tmp_country_code');

        $phone=$this->session->userdata('tmp_mobile_no');
        $name=$this->session->userdata('tmp_name');


        $vf_code_match=$this->pre_registration_model->select_with_where('*','country_code="'.$country_code.'" AND phone_number="'.$phone.'" AND email="'.$email.'" AND verify_code="'.$verify_code.'"','pre_registration');


        if (count($vf_code_match)>=1) 
        {
            $api_code=$this->pre_registration_model->select_with_where('*','id=1','mobile_sms_api');
            $sms_content=$this->pre_registration_model->select_with_where('*','id=2','mobile_notify_api');
            $email_content=$this->pre_registration_model->select_with_where('*','id=2','email_notify_api');
            
            if($sms_content[0]['status']==1)
            {
                $msg_to=$country_code.''.$phone;
                $head_data=$this->head_data();
                $company_name=$head_data[0]['name'];
                $company_website=$head_data[0]['website'];
                $company_fb_link=$head_data[0]['fb_link'];
                $arr = explode(' ',trim($name));

                $msg_des='Dear '.$arr[0].',\nYou have been successfully registered.\nThanks for being with Osellers. For any query 01307882887';

                

                $ret_data=$this->sendsms_library->send_single_sms($company_name,$msg_to,$msg_des);
                

                //echo $api_code[0]['api_code'];

                if ($ret_data=='err') 
                {
                    $data_sms['send_sms']=$api_code[0]['send_sms']+1;
                    $data_sms['failed']=$api_code[0]['failed']+1;
                    $this->pre_registration_model->update_function('id',$api_code[0]['id'],'mobile_sms_api',$data_sms);
                    //echo "cURL Error #:" . $err;
                } 
                else 
                {
                    $data_sms['send_sms']=$api_code[0]['send_sms']+1;
                    $data_sms['delivered']=$api_code[0]['delivered']+1;
                    $this->pre_registration_model->update_function('id',$api_code[0]['id'],'mobile_sms_api',$data_sms);
                }
            }


            if ($email_content[0]['status']==1) 
            {
                //$this->send_email($email_content[0]['title'],$email,1);
                $this->send_message_template($name,$email,'Registration Process Notification','Your registration procedure has been completed','Thank you for your registration.</br>You can Post and Manage your ads and contact with other seller through messages.</br>Make your presence known. Promote your Products and Organization at Osellers.');
            }

            $data_pro['verify_status']=1;
            
            
            $this->pre_registration_model->update_function('phone_number', $phone, 'pre_registration', $data_pro);

            $data_login['email']=$email;
            $data_login['verf_id']=$vf_code_match[0]['id'];
            $data_login['mobile_no']=$phone;
            $data_login['country_code']='880';
            $data_login['username']=$vf_code_match[0]['username'];
            $data_login['password']=$vf_code_match[0]['password'];
            //$data_login['country_code']=$vf_code_match[0]['country_code'];
            //$data_login['user_type']=$vf_code_match[0]['user_type'];
            $data_login['status']=1;
            $data_login['type']=1;
            $data_login['member_type']=1;
            
            $data_login['created_at']=date('Y-m-d H:i:s');
            $login_id=$this->pre_registration_model->insert_ret('login',$data_login);

            $data_reg['name']=$name;
            $data_reg['login_id']=$login_id;
            //$data_reg['gender']=$vf_code_match[0]['gender'];
            $data_reg['image']='default_image.jpg';
            $data_reg['created_at']=date('Y-m-d H:i:s');


            //$data_reg['dob']=$vf_code_match[0]['dob'];
            


            $reg_id=$this->pre_registration_model->insert_ret('registration',$data_reg);


            $this->session->set_userdata('name',$name);
            $this->session->set_userdata('email',$email);
            //$this->session->set_userdata('type',$data_login['user_type']);
            $this->session->set_userdata('login_id',$login_id);
            $this->session->set_userdata('reg_id',$reg_id);
            $this->session->set_userdata('user_type',$data_login['type']);
            $this->session->set_userdata('image' , $data_reg['image']);

            $this->session->unset_userdata('tmp_name');
            $this->session->unset_userdata('tmp_mobile_no');
            $this->session->unset_userdata('tmp_email');

             $this->session->set_userdata('login_scc','Welcome to  Dashboard.');
                redirect('user','refresh');
            //}
        }

        else
        {
            $this->session->set_userdata('err_alt', $this->lang->line('verify_err_msg'));
            redirect('pre_registration/verification','refresh');
        }

    }

    public function test_mail()
    {
        
        $this->send_message_template('Aman Ullah','aman.rabby@gmail.com','Registration Confirmation','Confirm your "Registration" through OTP','An "<b>OTP</b>" code has sent to your phone number. Please enter your code in the provided form to confirm your registration.</br>If you did not get your sms within 5 minutes please contact our support.');
    }
    
    
    public function send_email($subject='',$email='',$id)
    {
       // $data['company_info']=$this->home_model->select_all('company');
        $company_info=$this->head_data();
        $message=$this->pre_registration_model->select_with_where('*','id='.$id,'email_notify_api');
        //echo $company_info;die();
        $data['message']=$message[0]['message'];
        $data['name']=$this->session->userdata('tmp_name');
        $data['email']=$this->session->userdata('tmp_email');

         
       $config = Array(

        'protocol' => 'smtp',
        'smtp_host' => 'mail.osellers.com',
        'smtp_port' => 25,
        'smtp_user' => 'noreply@osellers.com',
        'smtp_pass' => 'userpass@@@123',
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
         $body=$this->load->view('send_mail',$data,TRUE);
         $this->email->subject($subject);
         $this->email->message($body);
         $this->email->set_mailtype("html");
         $this->email->send();
    }

    public function mail_view()
    {
        //$this->load->view('send_mail');
    }

    public function head_data()
    {
        $data['company_info']=$this->home_model->select_all('company');
        $id = 1;
        $reg=$this->pre_registration_model->select_with_where('*', 'id='.$id, 'company');
        return $reg;
    }

    public function sms_base(){
        $username = 'osellers';
        $password = 'it0987654321';

        $header = "Basic " . base64_encode($username . ":" . $password);
        echo $header;
    }

    function encryptIt($string) 
    {
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



    public function send_message_template($name,$email,$subject,$email_head_subject,$email_msg_body)
    {
        $company_info=$this->head_data();
        $data['company_info']=$company_info;
        //$email_content=$this->admin_model->select_with_where('*','id='.$id,'email_content');

         
       $config = Array(

        'protocol' => 'smtp',
        'smtp_host' => 'mail.osellers.com',
        'smtp_port' => 25,
        'smtp_user' => 'noreply@osellers.com',
        'smtp_pass' => 'userpass@@@123',
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
        
        $data['name']=$name;
        $data['email']=$email;
        $data['email_head_subject']=$email_head_subject;
        $data['email_msg_body']=$email_msg_body;


        $message=$this->load->view('forget/email', $data,'true');

        
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->set_mailtype("html");
        $this->email->send();
    }    
      
    // public function check_email(){
    //      $email=$this->input->post('email');
    //     //echo $email;die();
    //     $email=$this->pre_registration_model->get_email($email,'pre_registration');
    //     if(count($email)>=1){

    //         $this->session->userdata('err_msg');
    //         echo 1;
    //         //$this->session->set_userdata('s_email',$email);
    //     }
    //     else{
    //         echo 0;
    //     }
  
    // }

    // public function check_phone_unique()
    // {
    //   $phone= $this->input->post('phone');
    //   $data= $this->pre_registration_model->check_data('phone',$phone);
    //   if(count($data)>0)
    //   {

    //     echo "1";
    //   }
      
    //   else
    //   {
    //     echo "0";
    //   }

    // }


    


}
