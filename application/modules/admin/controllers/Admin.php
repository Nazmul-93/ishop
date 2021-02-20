<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	protected $user_login_id;

	function __construct() 
	{
		$this->load->library("session");
		$this->load->model('admin/Admin_model');
		$this->load->library('upload');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('inflector');
		 $this->load->library('email');
		$this->load->library('sendsms_library');

		$login_id =   $this->session->userdata('login_id');
		$name   =    $this->session->userdata('name');
		$type   =    $this->session->userdata('type');
		
		if($login_id=='')
		{
			$this->session->unset_userdata('login_id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('type');
			$this->session->set_userdata('log_err','Enter Email and Password First');
			redirect('login','refresh');
		}

	}


	public function index()
	{
		$data['login_id']= $this->user_login_id;
		

		$this->load->view('index',$data);
	}
	
	

	public function user_profile($id)
	{
	$data['login_id']= $this->user_login_id;
	$data['info']=$this->Admin_model->select_with_where('*','user_login.id='.$id,'user_login');
	$data['id']=$data['info'][0]['id'];
	$data['email']=$data['info'][0]['email'];
	$data['user_name']=$data['info'][0]['user_name'];
	$data['phone_number']=$data['info'][0]['phone_number'];
	$data['password']=$this->decryptIt($data['info'][0]['password']);
	 $this->load->view('site_setting/edit_profile',$data);
	}
	public function update_password($value='')
	{
		$loginid=$this->input->post('loginid');
		$data['user_name']=$this->input->post('username');
		$data['email']=$this->input->post('email');
		$data['phone_number']=$this->input->post('phone_number');
		$data['password']=$this->encryptIt($this->input->post('password'));

		$update=$this->Admin_model->update_function('id', $loginid, 'user_login', $data);
		if($update==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Updated Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Update');     
		}
				redirect('admin','refresh');
	}
	
   public function encryptIt($string) 
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

	public function decryptIt($string)
	 {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
		$secret_iv = 'This is my secret iv';
		$key = hash('sha256', $secret_key);
		 $iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		return $output;
	}

	public function set_delivery_area($value='')
	{
		$data['login_id']=$this->user_login_id;
		$data['order_details'] = $this->Admin_model->select_two_join('*,product.product_name as pro_name', 'product', 'order_details', 'order_details.product_id=product.pro_id','order','order.id=order_details.order_no');


 $data['division_list']=$this->Admin_model->select_all('divisions');
 $data['district_lits']=$this->Admin_model->select_all('districts');
 $data['area_lits']=$this->Admin_model->select_all('area');
 
//  $data['delivery_location']=$this->Admin_model->select_where_three_inner_join_where('delivery_location.division_id,delivery_location.district_id,
//  area.area_title,divisions.name,districts.name,delivery_location.delivery_id,delivery_location.add_date','delivery_location','divisions','delivery_location.division_id=divisions.id','districts','delivery_location.district_id=districts.id','dlt_status=1');

$data['delivery_location']=$this->Admin_model->select_where_two_join('delivery_location.division_id,delivery_location.district_id,delivery_location.shipping_charge,delivery_location.day_return,
divisions.name,districts.name,delivery_location.delivery_id,delivery_location.add_date','delivery_location','divisions','delivery_location.division_id=divisions.id','districts','delivery_location.district_id=districts.id','dlt_status=1');
	$this->load->view('settings/set_delivery_area',$data);
	}
public function edit_delivery_area($id)
{
	$data['login_id']=$this->user_login_id;
	   

	$data['divisions']=$this->Admin_model->select_all('divisions'); 


	 $data['districts']=$this->Admin_model->select_all('districts');
	 $data['edit_delivery']=$this->Admin_model->select_with_where('*', 'delivery_id='.$id, 'delivery_location');
	 $data['edit_delivery']=$data['edit_delivery'][0];
	$this->load->view('settings/edit_delivery_area',$data);
}
public function edit_delivery_area_post($value='')
{
		 $delivery_id=$this->input->post('delivery_id');
		 $data['division_id']=$this->input->post('division_id');
		 $data['district_id']=$this->input->post('district_id');
		 $data['area_id']=$this->input->post('area_id');
		 $data['status']=$this->input->post('status');
		 $data['shipping_charge']=$this->input->post('shipping_charge');
		  $data['delivery_info']=$this->input->post('delivery_info');
		   $data['day_return']=$this->input->post('day_return');
		 $data['add_date'] = date('Y-m-d H:i:s');
		 
		
	   
$insert=$this->Admin_model->update_function('delivery_id',$delivery_id,'delivery_location',$data);

	$this->session->set_flashdata('Successfully','Delivery Location Successfully Updated');
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Updated Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Updated Successfully');     
		}
		
	redirect("admin/set_delivery_area",'refresh');
}
  public function delete_delivery_area($id)
	{
		// 
		$data['dlt_status']=2;
		//$insert=$this->Admin_model->update_function('delivery_id',$id,'delivery_location',$data);
		$delete=$this->Admin_model->delete_function_cond('delivery_location',"delivery_id=$id");
	   
	
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Delivery Location Delete Successfully Done');
	   
		
	redirect("admin/set_delivery_area",'refresh');
	}  
	public function get_district()
	{
		$division_id=$this->input->post('division_id');
		$get_district=$this->Admin_model->select_with_where('*', 'division_id='.$division_id, 'districts');

		echo "<option></option>";
		foreach ($get_district as $key => $value) {
			echo '<option value="'.$value["id"].'">'.$value["name"].' '.$value["bn_name"].'</option>';
		}
	}


	public function get_area()
	{
		$district_id=$this->input->post('district_id');
		$get_area=$this->Admin_model->select_with_where('*', 'district_id='.$district_id, 'area');

		echo "<option></option>";
		foreach ($get_area as $key => $value) {
			echo '<option value="'.$value["area_id"].'">'.$value["area_title"].'</option>';
		}
	}

	public function order_history($value='')
	{

		$data['login_id']=$this->user_login_id;
		//$data['order_details'] = $this->Admin_model->select_two_join('*,product.product_name as pro_name', 'product', 'order_details', 'order_details.product_id=product.pro_id','order','order.id=order_details.order_no');
		$data['order_details'] = $this->Admin_model->select_all('order');
		 $this->load->view('order/order_list',$data);
	}
	
	public function order_details($order_id='')
	{
		$data['order_info']=$this->Admin_model->select_where_two_left_join('order.*, divisions.name as division_name,districts.name as district_name', 'order', 'divisions', 'divisions.id=order.shiping_division_id','districts','districts.id=order.shiping_district_id','order.id='.$order_id);
	  
	  
		$data['order_info']=$data['order_info'][0];
		
		$data['order_details'] = $this->Admin_model->select_where_two_left_join('order_details.*, order.*, ,product.product_name as pro_name,product.product_img', 'product', 'order_details', 'order_details.product_id=product.pro_id','order','order.id=order_details.order_no','order.id='.$order_id);
	   
	
		$this->load->view('order/view_orders',$data);
	}
	
	public function order_delivered($id='')
	{
		$data['order_status']=1;
	   
		$order_info=$this->Admin_model->select_with_where('order_number,sh_phone','id='.$id, 'order');
		
		 $user_notify="Congratulations!Your order number #".$order_info[0]['order_number']." has been delivered successfully. Thank you for shopping with us. Any query call us 09639177929. Visit -www.cmart.com.bd";
		
		$this->sendsms_library->send_single_sms('CMART',$order_info[0]['sh_phone'],$user_notify);
		
		$this->Admin_model->update_function('id', $id, 'order', $data);
	   
	   
	   
	   
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Order delivered successfully done');     
		
	redirect("admin/order_history",'refresh');
	   
	}
	
	  public function order_cancel($id='')
	{
		$data['order_status']=2;
		$this->Admin_model->update_function('id', $id, 'order', $data);
		$order_info=$this->Admin_model->select_with_where('order_number,sh_phone','id='.$id, 'order');
		$user_notify="Dear valued customer your order number #".$order_info[0]['order_number']." has been cancelled by admin. Know more detail please call 09639177929 or visit www.cmart.com.bd/myaccount";
		 $this->sendsms_library->send_single_sms('CMART',$order_info[0]['sh_phone'],$user_notify);
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Order cancel successfully done');     
		
		redirect("admin/order_history",'refresh');
	}
	
	
		public function delete_order_list($id)
	{
		$delete=$this->Admin_model->delete_function('order', 'id', $id);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Order Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Order Data Delete Successfully');     
		}
		 redirect('admin/order_history','refresh');
	}
	
	
	
 public function set_delivery_area_post($value='')
	   {
		 $data['division_id']=$this->input->post('division_id');
		 $data['status']=$this->input->post('status');
		 $data['district_id']=$this->input->post('district_id');
		 $data['area_id']=$this->input->post('area_id');
		 $data['shipping_charge']=$this->input->post('shipping_charge');
		  $data['delivery_info']=$this->input->post('delivery_info');
		  $data['day_return']=$this->input->post('day_return');
		  
		 $data['add_date'] = date('Y-m-d H:i:s');
$insert=$this->Admin_model->insert_ret('delivery_location',$data); 

	$this->session->set_flashdata('Successfully','Delivery Location Set Up Successfully Done');
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data insert Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to insert');     
		}
		
	redirect("admin/set_delivery_area",'refresh');
	   }      
/////////////////////********  Company Info Start *******////////////////////////////

public function company_info()
{
		$data['company_info']=$this->Admin_model->select_all('company');
		$this->load->view('admin/company/company',$data);
}

public function update_company_info_post($id=1)
{
	$data['name']=$this->input->post('name');
	$data['website']=$this->input->post('website_name');
	$data['email']=$this->input->post('email');
	$data['phone']=$this->input->post('phone');
	$data['hotline_number']=$this->input->post('hotline');
	$data['ctg_address']=$this->input->post('company_address'); // company main address..
	$data['details']=$this->input->post('details');
	$data['time']=$this->input->post('time');      //opening & closing time...
	
	$data['fb_link']=$this->input->post('fb_link');
	$data['twitter_link']=$this->input->post('twitter_link');
	$data['youtube_link']=$this->input->post('youtube_link');
	$data['google_link']=$this->input->post('google_link');
	$data['linked_link']=$this->input->post('linked_link');
	
	$this->Admin_model->update_function('id', $id, 'company', $data);
	
	if($_FILES['files']['name'])
	{
		$_FILES['files']['name']= uniqid().'_'.underscore($_FILES['files']['name']);

		$oldFileName = $_FILES['files']['name'];
		$_FILES['files']['name'] =str_replace("'","", $oldFileName);
		$this->upload->initialize($this->set_upload_options($_FILES['files']['name'],''));
		$this->upload->do_upload();

		$main_image['logo']=$_FILES['files']['name'];
		$this->Admin_model->update_function('id', $id, 'company', $main_image);
	}

		 redirect('admin/company_info','refresh');
}
 /////////////////////********  Company Info End *******////////////////////////////


//  ========== manage  user list  start =========// 

public function user_list($type=''){
    if($type=="admin")
    {
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=1','user_login');
       
    }
    elseif($type=="agent")
    {
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=2','user_login');
       
    }
    elseif($type=="shopkeeper")
    {
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=3','user_login');
        
    }
    elseif($type=="affiliate")
    {
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=4','user_login');
      
    }
    elseif($type=="area_manager")
    {
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=5','user_login');
      
    }
    else{
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=6','user_login');
    }
    
    
    $this->load->view('user_list',$data);
    //     $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=3','user_login');  
    // }
        // $data['user_list']=$this->Admin_model->select_all_name_ascending('user_name,email,phone_number','user_login');
    //     $this->load->view('user_list',$data);
	}
	
	
	// country module started
    public function country_list(){
        // $data['country_data']=$this->Admin_model->select_condition_decending('country','status=1');
        $data['country_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'country');
        $this->load->view('country/country_list', $data);
    }
    public function add_country(){
        $this->load->view('country/add_country');
    }
    public function store_country(){
        $data['alpha_iso2'] = $this->input->post('alpha_iso2');
        $data['country_name'] = $this->input->post('country_name'); 
        $data['country_nicename'] = $this->input->post('country_nicename');
        $data['alpha_iso3'] = $this->input->post('alpha_iso3');
        $data['num_code'] = $this->input->post('num_code');
        $data['phonecode'] =$this->input->post('phonecode');
        $data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = $this->Admin_model->insert_ret('country', $data);
        if ($_FILES['files']['name']) {
            $data_img['flag'] = '';
            $i_ext = explode('.', $_FILES['files']['name']);
            $target_path = 'slider_'.uniqid().'_'.$id.'_.' . end($i_ext);
            $size = getimagesize($_FILES['files']['tmp_name']);
            if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/country/' . $target_path)) {
                $data_img['flag'] = $target_path;
            }
            if ($size[0] == 1918 || $size[1] == 629) { } else {
                $imageWidth = 1918; //Contains the Width of the Image
                $imageHeight = 629;
                $this->resize($imageWidth, $imageHeight, "uploads/country/" . $target_path, "uploads/country/" . $target_path);
            }

            $this->Admin_model->update_function('id', $id, 'country', $data_img);
        }
        $this->session->set_flashdata('success', '<span><strong>Success!</strong>Country Added Successfully.</span>');

        redirect('admin/country_list', 'refresh');
    }
    
    public function edit_country()
        {
            
        $login_id=   $this->session->userdata('login_id');
        $id = $this->input->get('id');
        $data['edit_country'] = $this->Admin_model->select_with_where('*', 'id=' . $id, 'country');
        $data['edit_country'] = $data['edit_country'][0];
        $this->load->view('country/edit_country', $data);
        }
    public function update_country($id)
        {
           //  $login_id=   $this->session->userdata('login_id');
           $data['alpha_iso2'] = $this->input->post('alpha_iso2');
            $data['country_name'] = $this->input->post('country_name');
            $data['country_nicename'] = $this->input->post('country_nicename');
            $data['alpha_iso3'] = $this->input->post('alpha_iso3');
            $data['num_code'] = $this->input->post('num_code');
            $data['phonecode'] =$this->input->post('phonecode');
            $data['status'] = $this->input->post('status');
           $data['created_at'] = date('Y-m-d H:i:s');
            $this->Admin_model->update_function('id', $id, 'country', $data);
            $this->load->view('country/country_list', $data);
    
            if ($_FILES["files"]['name']) {
                $pre_image = $this->input->post('pre_img');
                $path_to_file = 'uploads/country/' . $pre_image;
                if (unlink($path_to_file)) { }
                $data_img['flag'] = '';
                $i_ext = explode('.', $_FILES['files']['name']);
                $target_path = 'slider_'.uniqid().'_'.$id.'_.' . end($i_ext);
    
                $size = getimagesize($_FILES['files']['tmp_name']);
    
                if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/country/' . $target_path)) {
                    $data_img['flag'] = $target_path;
                }
                if ($size[0] == 1918 || $size[1] == 629) { } else {
                    $imageWidth = 1918; //Contains the Width of the Image
                    $imageHeight = 629;
                    $this->resize($imageWidth, $imageHeight, "uploads/country/" . $target_path, "uploads/country/" . $target_path);
                }
    
                $this->Admin_model->update_function('id', $id, 'country', $data_img);
            }
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>Country Update Successfully.</span>');
    
            redirect('admin/country_list', 'refresh');
        }
    
    public function delete_country(){
        $id = $this->input->get('id');
        $this->Admin_model->delete_function_cond('country','id='.$id);
        $this->session->set_flashdata('success', '<span><strong>Success!</strong>Country Delete Successfully.</span>');
        redirect('admin/country_list', 'refresh');
    }
    
    // country module ended
    
    // division module started
    public function division_list(){
        $data['division_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'divisions');
        $this->load->view('division/division_list', $data);
    }
    public function add_division(){
        $data['country_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'country');
        $this->load->view('division/add_division',$data);
    }
    public function store_dvision(){
        $data['country_id'] =$this->input->post('country_id');
        $data['name'] = $this->input->post('name');
        $data['bn_name'] =$this->input->post('bn_name');
        $data['url'] =$this->input->post('url');
        $data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = $this->Admin_model->insert_ret('divisions', $data);
        $this->session->set_flashdata('success', '<span><strong>Success!</strong>Divisions Added Successfully.</span>');

        redirect('admin/division_list', 'refresh');
    }
    public function edit_division() 
        {
        $login_id=   $this->session->userdata('login_id');
        $id = $this->input->get('id');
        $data['edit_division'] = $this->Admin_model->select_with_where('*', 'id=' . $id, 'divisions');
        $data['edit_division'] = $data['edit_division'][0];
        $data['country_data'] = $this->Admin_model->select_all('country');
        $this->load->view('division/edit_division', $data);
        }
    public function update_dvision($id)
        {
           //  $login_id=   $this->session->userdata('login_id');
            $data['country_id'] =$this->input->post('country_id');
            $data['name'] = $this->input->post('name');
            $data['bn_name'] =$this->input->post('bn_name');
            $data['url'] =$this->input->post('url');
            $data['status'] = $this->input->post('status');
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->Admin_model->update_function('id', $id, 'divisions', $data);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>Division Update Successfully.</span>');
            redirect('admin/division_list', 'refresh');
        }
    public function delete_division(){
            $id = $this->input->get('id');
            $this->Admin_model->delete_function_cond('divisions','id='.$id);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>Divisions Delete Successfully.</span>');
            redirect('admin/division_list', 'refresh');
        }
    
    // division module ended
    
    
    // district module started
    public function district_list(){
        $data['district_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'districts');
        $this->load->view('district/district_list', $data);
    }
    public function add_district(){
        $data['country_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'country');
        $data['division_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'divisions');
        $this->load->view('district/add_district',$data);
    }
    public function store_district(){
        $data['country_id'] =$this->input->post('country_id');
        $data['division_id'] =$this->input->post('division_id');
        $data['name'] = $this->input->post('name');
        $data['bn_name'] =$this->input->post('bn_name');
        $data['url'] =$this->input->post('url');
        $data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = $this->Admin_model->insert_ret('districts', $data);
        $this->session->set_flashdata('success', '<span><strong>Success!</strong>District Added Successfully.</span>');

        redirect('admin/district_list', 'refresh');
    }
    public function edit_district()
        {
        $login_id=   $this->session->userdata('login_id');
        $id = $this->input->get('id');
        $data['edit_district'] = $this->Admin_model->select_with_where('*', 'id=' . $id, 'districts');
        $data['edit_district'] = $data['edit_district'][0];
        $data['country_data'] = $this->Admin_model->select_all('country');
        $data['division_data'] = $this->Admin_model->select_all('divisions');
        $this->load->view('district/edit_district', $data);
        }
    
    public function update_district($id)
        {
           //  $login_id=   $this->session->userdata('login_id');
           $data['name'] = $this->input->post('name');
           $data['bn_name'] =$this->input->post('bn_name');
           $data['status'] = $this->input->post('status');
           $data['country_id'] = $this->input->post('country_id');
           $data['division_id'] = $this->input->post('division_id');
           $data['url'] =$this->input->post('url');
           $data['created_at'] = date('Y-m-d H:i:s');
            $this->Admin_model->update_function('id', $id, 'districts', $data);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>District Update Successfully.</span>');
            redirect('admin/district_list', 'refresh');
        }
    public function delete_district(){
            $id = $this->input->get('id');
            $this->Admin_model->delete_function_cond('districts','id='.$id);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>District Delete Successfully.</span>');
            redirect('admin/district_list', 'refresh');
        }
    
    // district module ended
    
    // upazila module started
    public function upazila_list(){
        $data['upazila_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'upazila');
        $this->load->view('upazila/upazila_list', $data);
    }
    public function add_upazila(){
        $data['country_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'country');
        $data['division_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'divisions');
        $data['district_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'districts');
        $this->load->view('upazila/add_upazila',$data);
    }
    public function store_upazila(){
        $data['country_id'] =$this->input->post('country_id');
        $data['division_id'] =$this->input->post('division_id');
        $data['district_id'] =$this->input->post('district_id');
        $data['name'] = $this->input->post('name');
        $data['bn_name'] =$this->input->post('bn_name');
        $data['status'] = $this->input->post('status');
        $data['url'] =$this->input->post('url');
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = $this->Admin_model->insert_ret('upazila', $data);
        $this->session->set_flashdata('success', '<span><strong>Success!</strong>Upazila Added Successfully.</span>');

        redirect('admin/upazila_list', 'refresh');
    }
    public function edit_upazila()
        {
        $login_id=   $this->session->userdata('login_id');
        $id = $this->input->get('id');
        $data['edit_upazila'] = $this->Admin_model->select_with_where('*', 'id=' . $id, 'upazila');
        $data['edit_upazila'] = $data['edit_upazila'][0];
        $data['country_data'] = $this->Admin_model->select_all('country');
        $data['division_data'] = $this->Admin_model->select_all('divisions');
        $data['district_data'] = $this->Admin_model->select_all('districts');
        $this->load->view('upazila/edit_upazila', $data);
        }
    
    public function update_upazila($id)
        {
           //  $login_id=   $this->session->userdata('login_id');
           $data['name'] = $this->input->post('name');
           $data['bn_name'] =$this->input->post('bn_name');
           $data['status'] = $this->input->post('status');
           $data['country_id'] = $this->input->post('country_id');
           $data['division_id'] = $this->input->post('division_id');
           $data['district_id'] = $this->input->post('district_id');
           $data['url'] =$this->input->post('url');
           $data['created_at'] = date('Y-m-d H:i:s');
            $this->Admin_model->update_function('id', $id, 'upazila', $data);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>Upazila Update Successfully.</span>');
            redirect('admin/upazila_list', 'refresh');
        }
    public function delete_upazila(){
            $id = $this->input->get('id');
            $this->Admin_model->delete_function_cond('upazila','id='.$id);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>Upazila Delete Successfully.</span>');
            redirect('admin/upazila_list', 'refresh');
        }
    // upazila module ended
    
    // union module started
    public function union_list(){
        $data['union_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'unions');
        $this->load->view('union/union_list', $data);
    }
    public function add_union(){
        $data['country_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'country');
        $data['division_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'divisions');
        $data['district_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'districts');
        $data['upazila_data'] = $this->Admin_model->select_with_where('*', 'status=1 or status=2', 'upazila');
        $this->load->view('union/add_union',$data);
    }
    public function store_union(){
        $data['country_id'] =$this->input->post('country_id');
        $data['division_id'] =$this->input->post('division_id');
        $data['district_id'] =$this->input->post('district_id');
        $data['upazila_id'] =$this->input->post('upazila_id');
        $data['name'] = $this->input->post('name');
        $data['bn_name'] =$this->input->post('bn_name');
        $data['url'] =$this->input->post('url');
        $data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        $id = $this->Admin_model->insert_ret('unions', $data);
        $this->session->set_flashdata('success', '<span><strong>Success!</strong>Union Added Successfully.</span>');
        redirect('admin/union_list', 'refresh');
    }
    
    public function edit_union()
        {
        $login_id=   $this->session->userdata('login_id');
        $id = $this->input->get('id');
        $data['edit_union'] = $this->Admin_model->select_with_where('*', 'id=' . $id, 'unions');
        $data['edit_union'] = $data['edit_union'][0];
        $data['country_data'] = $this->Admin_model->select_all('country');
        $data['division_data'] = $this->Admin_model->select_all('divisions');
        $data['district_data'] = $this->Admin_model->select_all('districts');
        $data['upazila_data'] = $this->Admin_model->select_all('upazila');
        $data['union_data'] = $this->Admin_model->select_all('unions');
        $this->load->view('union/edit_union', $data);
        }
    
    public function update_union($id)
        {
           //  $login_id=   $this->session->userdata('login_id');
           $data['name'] = $this->input->post('name');
           $data['bn_name'] =$this->input->post('bn_name');
           $data['status'] = $this->input->post('status');
           $data['country_id'] = $this->input->post('country_id');
           $data['division_id'] = $this->input->post('division_id');
           $data['district_id'] = $this->input->post('district_id');
           $data['upazila_id'] = $this->input->post('upazila_id');
           $data['url'] =$this->input->post('url');
           $data['created_at'] = date('Y-m-d H:i:s');
            $this->Admin_model->update_function('id', $id, 'unions', $data);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>union Update Successfully.</span>');
            redirect('admin/union_list', 'refresh');
        }
    public function delete_union(){
            $id = $this->input->get('id');
            $this->Admin_model->delete_function_cond('unions','id='.$id);
            $this->session->set_flashdata('success', '<span><strong>Success!</strong>union Delete Successfully.</span>');
            redirect('admin/union_list', 'refresh');
        }
        // union module ended

public function add_user($value='')
{
	$data['login_id']= $this->user_login_id;
	 $this->load->view('site_setting/add_admin');
 }

public function add_user_post($value='')
{
	   
		$data['user_name']=$this->input->post('username');
		$data['email']=$this->input->post('email');
		$data['phone_number']=$this->input->post('phone_number');
		$data['password']=$this->encryptIt($this->input->post('password'));
		$data['user_type']=1;
		$data['verfiy_status']=1;
		$insert=$this->Admin_model->insert_ret('user_login', $data);
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data inserted Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Update');     
		}
				redirect('admin','refresh');
}
public function status_update($edit_id,$update_status)
{
   
   
	$data['verfiy_status']=$update_status;
	$update=$this->Admin_model->update_function('id', $edit_id,'user_login',$data);
	$this->session->set_flashdata('Successfully','Status Change Successfully Done');
		if($update==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Delete');     
		}
		
	redirect("admin/user_list",'refresh');
}

public function delete_user($uid)
{
		$delete=$this->Admin_model->delete_function('user_login','id',$uid);
		// $delete_d=$this->Admin_model->delete_function('purchase_details', 'purchase_id', $id);
		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Delete');     
		}
		redirect('admin/user_list','refresh');
}

//  ========== manage  user list  end =========// 



 /////////////////////********  Page-Settings  Start *******////////////////////////


		 // ----------   Aboutus-starts ------ ///

		 public function abouts_us(){

			$data['abouts_us_data'] = $this->Admin_model->select_with_where('id,abouts_us','status=1', 'page_settings');

		 

			$this->load->view('page/abouts_us',$data);

			}


			 public function update_abouts_us_post($id=1)

			{
				$data['abouts_us']=$this->input->post('abouts_us');
				$data['created_at'] = date('Y-m-d h:i:a');
				$this->Admin_model->update_function('id',$id, 'page_settings', $data);
				

					redirect('admin/abouts_us','refresh');
				}


				 // ----------   Aboutus-Ends ------ ///

		 public function career(){

			$data['abouts_us_data'] = $this->Admin_model->select_with_where('id,career','status=1', 'page_settings');

		 

			$this->load->view('page/career',$data);

			} 
			 public function update_career_post($id=1)

			{
				$data['career']=$this->input->post('abouts_us');
				$data['created_at'] = date('Y-m-d h:i:a');
				$this->Admin_model->update_function('id',$id, 'page_settings', $data);
				

					redirect('admin/career','refresh');
				}


			 // ----------   terms & conditions starts ------ 

			public function terms_conditions(){

			$data['terms_data'] = $this->Admin_model->select_with_where('id,terms_conditions', 'status=1', 'page_settings');

		 

			$this->load->view('page/terms_conditions',$data);

			}

			 public function update_terms_conditions_post($id=1)

			{
				$data['terms_conditions']=$this->input->post('terms_conditions');
				$data['created_at'] = date('Y-m-d h:i:a');
				$this->Admin_model->update_function('id',$id, 'page_settings', $data);
				

					redirect('admin/terms_conditions','refresh');
				}


				// ----------   terms & conditions ends ------ 
				
				  // ----------   privacy & policy starts ------// 

				public function privacy_policy(){

					$data['terms_data'] = $this->Admin_model->select_with_where('id,privacy_policy', 'status=1', 'page_settings');
		
					$this->load->view('page/privacy_policy',$data);
		
					}
		
					 public function update_privacy_policy_post($id=1)
		
					{
						$data['privacy_policy']=$this->input->post('privacy_policy');
						$data['created_at'] = date('Y-m-d h:i:a');
						$this->Admin_model->update_function('id',$id, 'page_settings', $data);
						
		
							redirect('admin/privacy_policy','refresh');
						}
		
		
				// ----------   privacy & policy ends ------//  

				// ----------   privacy & policy starts ------// 

				public function return_refunds(){

					$data['return_refunds_data'] = $this->Admin_model->select_with_where('id,return_refunds', 'status=1', 'page_settings');

					$this->load->view('page/return_refunds',$data);

					}

					public function update_return_refunds_post($id=1)

					{
						$data['return_refunds']=$this->input->post('return_refunds');
						$data['created_at'] = date('Y-m-d h:i:a');
						$this->Admin_model->update_function('id',$id, 'page_settings', $data);
						

							redirect('admin/privacy_policy','refresh');
						}


						// ----------   privacy & policy ends ------//  



				///////////////////// ********  Page-Settings  Ends ******* ////////////////////



	public function category()

	{

		$data['category_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'category');

		$this->load->view('category/category_list', $data);
	}

	public function add_category()

	{

		$data['category_list'] = $this->Admin_model->select_with_where('*','status=1', 'category');

		$data['specification_list'] = $this->Admin_model->select_with_where('*', 'spe_status=1', 'specification');
		$this->load->view('category/add_category', $data);
	}


	public function add_category_post()
	{

		$data['category_name'] = $cat_id = $this->input->post('category_name');
		$data['parent_id'] = empty($this->input->post('parent_cat')) ? null : $this->input->post('parent_cat');

		$data['show_status'] = $this->input->post('show_status');
		$menu_option = $this->input->post('menu_option');
		$top_categories = $this->input->post('top_categories');
		$data['created_at'] = date('Y-m-d H:i:s');
		
		$data['menu_option ']=0;

		if($menu_option=='on')
		{
			$data['menu_option']=1;
		}
		
		$data['top_categories ']=0;

		if($top_categories=='on')
		{
			$data['top_categories']=1;
		}
		
		$id = $this->Admin_model->insert_ret('category', $data);
		$spec = [];
		$options = array();
		$options = $this->input->post('specification_name');
		
		if(!empty($options)) {
		foreach ($options as $option) {
		$data_2['specification_id'] = $option;
		$data_2['category_id'] = $id;
		$this->Admin_model->insert('category_specification', $data_2);
	}
	
	}
	//  for category image  
	
	if ($_FILES['files']['name']) {

		$data_img['cat_image'] = '';
		$i_ext = explode('.', $_FILES['files']['name']);
		$target_path = 'category_'.uniqid().'_'.$id.'_'.'.' . end($i_ext);

		$size = getimagesize($_FILES['files']['tmp_name']);
		
		

		if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/category/' . $target_path)) {
			$data_img['cat_image'] = $target_path;
		}


		if ($size[0] == 121 || $size[1] == 121) { } else {
			$imageWidth = 121; //Contains the Width of the Image

			$imageHeight = 121;

			$this->resize($imageWidth, $imageHeight, "uploads/category/" . $target_path, "uploads/category/" . $target_path);
		}

		$this->Admin_model->update_function('category_id', $id, 'category', $data_img);
	}

	
	// for feature image category=======
	if ($_FILES['files_image']['name']) {

		$data_img['feature_image'] = '';
		$i_ext = explode('.', $_FILES['files_image']['name']);
		$target_path = 'featured_category_'.uniqid().'_'.$id.'_'. '.' . end($i_ext);

		$size = getimagesize($_FILES['files_image']['tmp_name']);
		
		

		if (move_uploaded_file($_FILES['files_image']['tmp_name'], 'uploads/category/' . $target_path)) {
			$data_img['feature_image'] = $target_path;
		}


		if ($size[0] == 1918 || $size[1] == 629) { } else {
			$imageWidth = 1918; //Contains the Width of the Image

			$imageHeight = 629;

			$this->resize($imageWidth, $imageHeight, "uploads/category/" . $target_path, "uploads/category/" . $target_path);
		}

		$this->Admin_model->update_function('category_id', $id, 'category', $data_img);
	}

		
	   redirect('admin/add_category', 'refresh');
	}

	public function edit_category($id)
	{

		$data['category_list'] = $this->Admin_model->select_with_where('*','category_id=' . $id .'','category');

		$data['category_list_parent'] = $this->Admin_model->select_with_where('*', 'status=1','category');

		$this->load->view('category/edit_category', $data);
	}

	public function update_category_post($id)
	{

		$cat_id=$this->input->post('cat_id');
		$data['category_name'] = $this->input->post('category_name');
		// $data['parent_id'] = ($this->input->post('parent_cat'));
		$data['parent_id'] = empty($this->input->post('parent_cat')) ? null : $this->input->post('parent_cat');
		$data['show_status'] = $this->input->post('show_status');
		$menu_option = $this->input->post('menu_option');
		$data['created_at'] = date('Y-m-d h:i:a');
	   
		$top_categories = $this->input->post('top_categories');
		
		$data['menu_option ']=0;
		if($menu_option=='on')
		{
			$data['menu_option']=1;
		}
	   
		$data['top_categories ']=0;
		
		if($top_categories=='on')
		{
			$data['top_categories']=1;
		}
		
		$this->Admin_model->update_function('category_id', $cat_id, 'category', $data);


	if ($_FILES['files']['name']) {

		$data_img['cat_image'] = '';
		$i_ext = explode('.', $_FILES['files']['name']);
		$target_path = 'category_'.uniqid().'_'.$cat_id.'_'. $cat_id .'.' . end($i_ext);

		$size = getimagesize($_FILES['files']['tmp_name']);
		
		

		if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/category/' . $target_path)) {
			$data_img['cat_image'] = $target_path;
		}


		if ($size[0] == 121 || $size[1] == 121) { } else {
			$imageWidth = 121; //Contains the Width of the Image

			$imageHeight = 121;

			$this->resize($imageWidth, $imageHeight, "uploads/category/" . $target_path, "uploads/category/" . $target_path);
		}

		$this->Admin_model->update_function('category_id', $cat_id, 'category', $data_img);
	}

	
	// for feature image category=======
	if ($_FILES['files_image']['name']) {

		$data_img['feature_image'] = '';
		$i_ext = explode('.', $_FILES['files_image']['name']);
		$target_path = 'featured_category_'.uniqid().'_'.$cat_id.'_'. $cat_id .'.' . end($i_ext);

		$size = getimagesize($_FILES['files_image']['tmp_name']);
		
		

		if (move_uploaded_file($_FILES['files_image']['tmp_name'], 'uploads/category/' . $target_path)) {
			$data_img['feature_image'] = $target_path;
		}


		if ($size[0] == 1918 || $size[1] == 629) { } else {
			$imageWidth = 1918; //Contains the Width of the Image

			$imageHeight = 629;

			$this->resize($imageWidth, $imageHeight, "uploads/category/" . $target_path, "uploads/category/" . $target_path);
		}

		$this->Admin_model->update_function('category_id', $id, 'category', $data_img);
	}


		redirect('admin/category', 'refresh');
	}

	public function delete_category($id ='')
	{

		$data['status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('category_id', $id, 'category',$data);
		redirect('admin/category', 'refresh');
		
	}
 public function affliate()
   {

	   $data['voucher_data'] = $this->Admin_model->select_with_where('*', 'status=1', 'affliate');
	   $this->load->view('gift_voucher/affliate', $data);
   }
   public function add_affliate()
   {

	   $this->load->view('gift_voucher/add_affliate');
   }
   public function add_affliate_post()
   {

	   $login_id=  $this->session->userdata('login_id');
	   $data['voucher_name'] = $this->input->post('gift_name');
	   $data['voucher_price'] = $this->input->post('gift_price');
	   $data['v_short_describe'] = $this->input->post('short_descrp');
	   $data['show_status'] = $this->input->post('show_status');
	   $data['created_at'] = date('Y-m-d H:i:s');

	   $id = $this->Admin_model->insert_ret('affliate', $data);

	   if ($_FILES['files']['name']) {

		   $data_img['voucher_image'] = '';
		   $i_ext = explode('.', $_FILES['files']['name']);
		   $target_path = 'gift_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

		   $size = getimagesize($_FILES['files']['tmp_name']);

		   if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/gift/' . $target_path)) {
			   $data_img['voucher_image'] = $target_path;
		   }


		   if ($size[0] == 1918 || $size[1] == 629) { } else {
			   $imageWidth = 1918; //Contains the Width of the Image

			   $imageHeight = 629;

			   $this->resize($imageWidth, $imageHeight, "uploads/gift/" . $target_path, "uploads/gift/" . $target_path);
		   }

		   $this->Admin_model->update_function('id', $id, 'affliate', $data_img);
	   }


	   redirect('admin/affliate', 'refresh');
   }
   public function edit_affliate($id)
   {

	   $data['aff_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'affliate');
	   $this->load->view('gift_voucher/edit_affliate', $data);
   }

	public function update_affliate_post($id)
   {

	   $login_id=  $this->session->userdata('login_id');
	   $data['voucher_name'] = $this->input->post('gift_name');
	   $data['voucher_price'] = $this->input->post('gift_price');
	   $data['v_short_describe'] = $this->input->post('short_descrp');
	   $data['show_status'] = $this->input->post('show_status');
	   $data['created_at'] = date('Y-m-d H:i:s');
	   $this->Admin_model->update_function('id', $id,'affliate',$data);
	   //$this->load->view('gift_voucher/affliate', $data);

	   if ($_FILES["files"]['name']) {
		   $pre_image = $this->input->post('pre_img');
		   $path_to_file = 'uploads/gift/' . $pre_image;
		   if (unlink($path_to_file)) { }

		   $data_img['voucher_image'] = '';
		   $i_ext = explode('.', $_FILES['files']['name']);
		   $target_path = 'gift_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

		   $size = getimagesize($_FILES['files']['tmp_name']);

		   if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/gift/' . $target_path)) {
			   $data_img['voucher_image'] = $target_path;
		   }


		   if ($size[0] == 1918 || $size[1] == 629) { } else {
			   $imageWidth = 1918; //Contains the Width of the Image

			   $imageHeight = 629;

			   $this->resize($imageWidth, $imageHeight, "uploads/gift/" . $target_path, "uploads/gift/" . $target_path);
		   }

		   $this->Admin_model->update_function('id', $id, 'affliate', $data_img);
	   }


	   redirect('admin/affliate', 'refresh');
   }
  
 public function gift_voucher()
   {

	   $data['voucher_data'] = $this->Admin_model->select_with_where('*', 'status=1', 'gift_tbl');
	   $this->load->view('gift_voucher/voucher_list', $data);
   }

   public function add_voucher()
   {

	   $this->load->view('gift_voucher/add_voucher');
   }


   public function add_voucher_post()
   {

	   $login_id=  $this->session->userdata('login_id');
	   $data['voucher_name'] = $this->input->post('gift_name');
	   $data['voucher_price'] = $this->input->post('gift_price');
	   $data['v_short_describe'] = $this->input->post('short_descrp');
	   $data['show_status'] = $this->input->post('show_status');
	   $data['created_at'] = date('Y-m-d H:i:s');

	   $id = $this->Admin_model->insert_ret('gift_tbl', $data);

	   if ($_FILES['files']['name']) {

		   $data_img['voucher_image'] = '';
		   $i_ext = explode('.', $_FILES['files']['name']);
		   $target_path = 'gift_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

		   $size = getimagesize($_FILES['files']['tmp_name']);

		   if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/gift/' . $target_path)) {
			   $data_img['voucher_image'] = $target_path;
		   }


		   if ($size[0] == 1918 || $size[1] == 629) { } else {
			   $imageWidth = 1918; //Contains the Width of the Image

			   $imageHeight = 629;

			   $this->resize($imageWidth, $imageHeight, "uploads/gift/" . $target_path, "uploads/gift/" . $target_path);
		   }

		   $this->Admin_model->update_function('id', $id, 'gift_tbl', $data_img);
	   }


	   redirect('admin/gift_voucher', 'refresh');
   }


   public function edit_voucher($id)
   {

	   $data['voucher_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'gift_tbl');
	   $this->load->view('gift_voucher/edit_voucher', $data);
   }


   public function update_voucher_post($id)
   {

	   $login_id=  $this->session->userdata('login_id');
	   $data['voucher_name'] = $this->input->post('gift_name');
	   $data['voucher_price'] = $this->input->post('gift_price');
	   $data['v_short_describe'] = $this->input->post('short_descrp');
	   $data['show_status'] = $this->input->post('show_status');
	   $data['created_at'] = date('Y-m-d H:i:s');
	   $this->Admin_model->update_function('id', $id,'gift_tbl',$data);
	   $this->load->view('gift_voucher/voucher_list', $data);

	   if ($_FILES["files"]['name']) {
		   $pre_image = $this->input->post('pre_img');
		   $path_to_file = 'uploads/gift/' . $pre_image;
		   if (unlink($path_to_file)) { }

		   $data_img['voucher_image'] = '';
		   $i_ext = explode('.', $_FILES['files']['name']);
		   $target_path = 'gift_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

		   $size = getimagesize($_FILES['files']['tmp_name']);

		   if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/gift/' . $target_path)) {
			   $data_img['voucher_image'] = $target_path;
		   }


		   if ($size[0] == 1918 || $size[1] == 629) { } else {
			   $imageWidth = 1918; //Contains the Width of the Image

			   $imageHeight = 629;

			   $this->resize($imageWidth, $imageHeight, "uploads/gift/" . $target_path, "uploads/gift/" . $target_path);
		   }

		   $this->Admin_model->update_function('id', $id, 'gift_tbl', $data_img);
	   }


	   redirect('admin/gift_voucher', 'refresh');
   }

   public function delete_voucher($id = "")
   {


	   $data['status'] = 2;
	   $id = $id;

	   $this->Admin_model->update_function('id', $id, 'gift_tbl', $data);

	   redirect('admin/gift_voucher', 'refresh');
   }


	public function get_specifications()
	{
		$cat_id = $this->input->post('cat_id');
		// echo $cat_id;die();

		$data = $this->Admin_model->select_where_left_join('*,specification.name as spec_name,specification.id as spec_id', 'category_specification', 'specification', 'category_specification.specification_id=specification.id', 'category_specification.category_id=' . $cat_id);


		foreach ($data as $value) {  // spec query

			// echo $value['spec_name'];
			
			echo '<div class="form-group row">
				<input  type="hidden" name="spec_id[]" value="' . $value['spec_id'] . '">
				<label class="col-md-3 label-control" for="eventRegInput1">' . ucwords($value['spec_name']) . '</label>
				<div class="col-md-9">
					<input type="text" id="eventRegInput1" class="form-control" placeholder=' . strtoupper($value['spec_name']) . ' name="spec_name[]">
					</div>
					</div>';
		}
	}



	//   ==========  Site Settings   Starts========


	public function add_mps()
	{


		$this->load->view('site_setting/add_mps');
	}

	public function add_mps_post()  // add menu positions name
	{

		$data['name'] = $this->input->post('menu_name');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->insert('menu_position_settings', $data);
		redirect('admin/add_mps','refresh');
	}


	public function menu_site()  // menu  functions
	{

			$data['menu_pos_data'] = $this->Admin_model->select_left_join(
			'*,
			site_menu.id as menu_id ,
			menu_position_settings.name as position_name',
			'site_menu',
			'menu_position_settings',
			'site_menu.menu_positions=menu_position_settings.id',
			'site_menu.menu_st=1'
		);

		$this->load->view('site_setting/menu_setting_list', $data);
	}

	public function menu_settigs() 
		// add menu setting 
	{

		$data['menu_pos_data'] = $this->Admin_model->select_with_where('*', 'positions_st=1', 'menu_position_settings');
		$this->load->view('site_setting/menu_settings_form', $data);
	}

	public function menu_settings_post()   // add menu setting post
	{

		$data['menu_name'] = $menu_name = $this->input->post('menu_name');
		$data['menu_link'] = $this->input->post('menu_link');
		$data['menu_positions'] = $this->input->post('menu_positions');
		$data['show_status'] = $this->input->post('show_status');
		$data['menu_slug'] = strtolower(str_replace(" ", "-", $menu_name));
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->insert('site_menu', $data);
		redirect('admin/menu_site', 'refresh');
	}

	public function edit_settings($id)
	{   
		// edit menu settings


		$data['menu_data'] = $this->Admin_model->select_where_left_join(
			'*,site_menu.id as menu_id ,
			menu_position_settings.name as position_name',
			'site_menu',
			'menu_position_settings',
			'site_menu.menu_positions=menu_position_settings.id',
			'site_menu.id=' . $id
		);

		$data['all_menu_list'] = $this->Admin_model->select_with_where('*', 'positions_st=1', 'menu_position_settings');

		$this->load->view('site_setting/edit_settings', $data);
	}



	public function update_menusettings_post($id)   // edit menu  settings post 
	{

		$data['menu_name'] = $menu_name = $this->input->post('menu_name');
		$data['menu_link'] = ($this->input->post('menu_link'));
		$data['menu_positions'] = $this->input->post('menu_positions');
		$data['menu_slug'] = strtolower(str_replace(" ", "-", $menu_name));
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d h:i:a');


		$this->Admin_model->update_function('id', $id, 'site_menu', $data);


		redirect('admin/menu_site', 'refresh');
	}

	public function delete_menu($id='')
	{
		
		$data['menu_st'] = 2;
		$id = $id;
		$this->Admin_model->update_function('id',$id,'site_menu',$data);


		redirect('admin/menu_site', 'refresh');
	}

	//   ========== Manage  Site Settings Ends ========///

	// ///  ========== Manage Pages Starts ======== /////



	public function page_list(){

		$data['ads_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'ads');
		$this->load->view('page/page_list',$data);


	}


	public function about_us(){

		$this->load->view('page/about_us');


	}

	public function set_payment_gateway($value='')
	{

		$data['payment_gateway']=$this->Admin_model->select_all('payment_gateway');
		$this->load->view('settings/set_payment_gateway',$data);
	}
	public function set_seo($value='')
	{

		$data['seo']=$this->Admin_model->select_all('seo');

		// $data['seo']=$this->Admin_model->select_with_where('*','seo_id=1','seo');
		$data['total_seo']=count($data['seo']);
		if(count($data['seo'])!=0)
		{
		$data['seo_title']=$data['seo'][0]['seo_title'];
		$data['seo_keyword']=$data['seo'][0]['seo_keyword'];
		$data['tag']=$data['seo'][0]['tag'];
		$data['seo_keyword_tag']=$data['seo'][0]['seo_keyword_tag'];
		$data['seo_meta_description']=$data['seo'][0]['seo_meta_description'];
		$data['fb_link']=$data['seo'][0]['fb_link'];
		$data['yo_link']=$data['seo'][0]['yo_link'];
		$data['ins_link']=$data['seo'][0]['ins_link'];
		$data['tw_link']=$data['seo'][0]['tw_link'];
		$data['rss_link']=$data['seo'][0]['rss_link'];    
		}
		else
		{
		$data['seo_title']='';
		$data['seo_keyword']='';
		$data['tag']='';
		$data['seo_keyword_tag']='';
		$data['seo_meta_description']='';
		$data['fb_link']='';
		$data['yo_link']='';
		$data['ins_link']='';
		$data['tw_link']='';
		$data['rss_link']='';
		}

		$this->load->view('settings/set_seo',$data);
	}
	public function set_seo_post($value='')
	{
		$total_seo=$this->input->post('total_seo');
		$data['seo_title']=$this->input->post('seo_title');
		$data['seo_keyword']=$this->input->post('seo_keyword');
		$data['tag']=$this->input->post('tag');
		$data['seo_keyword_tag']=$this->input->post('seo_keyword_tag');
		$data['seo_meta_description']=$this->input->post('seo_meta_description');
		$data['fb_link']=$this->input->post('fb_link');
		$data['yo_link']=$this->input->post('yo_link');
		$data['ins_link']=$this->input->post('ins_link');
		$data['tw_link']=$this->input->post('tw_link');
		$data['rss_link']=$this->input->post('rss_link');

		if($total_seo==0)
		{
			$insert=$this->Admin_model->insert_ret('seo', $data);
		}
		else
		{
			$insert=$this->Admin_model->update_all('seo',$data);        
		}

	   
		
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}

		redirect('admin/set_seo','refresh');
	}
	
	public function add_payment_gateway(){
		
		$this->load->view('settings/add_payment_gateway');
	}
	
	public function add_payment_gateway_post($value='')
	{
		$data['com_title']=$this->input->post('com_title');
		$data['signature_key']=$this->input->post('signature_key');
		$data['merchant_id']=$this->input->post('merchant_id');
		$data['store_id']=$this->input->post('store_id');
		$data['action_url']=addslashes($this->input->post('action_url'));
		$data['success_url']=addslashes($this->input->post('success_url'));
		$data['failed_url']=addslashes($this->input->post('failed_url'));
		$data['cancel_url']=addslashes($this->input->post('cancel_url'));
		$insert=$this->Admin_model->insert_ret('payment_gateway', $data);
		
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}

		redirect('admin/set_payment_gateway','refresh');

	}
	public function edit_payment_gateway_post($value='')
	{
		$pid=$this->input->post('pid');
		$data['com_title']=$this->input->post('com_title');
		$data['signature_key']=$this->input->post('signature_key');
		$data['merchant_id']=$this->input->post('merchant_id');
		$data['store_id']=$this->input->post('store_id');
		$data['action_url']=addslashes($this->input->post('action_url'));
		$data['success_url']=addslashes($this->input->post('success_url'));
		$data['failed_url']=addslashes($this->input->post('failed_url'));
		$data['cancel_url']=addslashes($this->input->post('cancel_url'));
		$insert=$this->Admin_model->update_function('payid',$pid,'payment_gateway',$data);
		

		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}

		redirect('admin/set_payment_gateway','refresh');

	}
	public function delete_gateway($id)
	{
		$delete=$this->Admin_model->delete_function('payment_gateway', 'payid', $id);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Delete');     
		}
		 redirect('admin/set_payment_gateway','refresh');
	}

	public function edit_gateway($gateway_id)
	{
			$data['payment_gateway']=$this->Admin_model->select_with_where('*', 'payid=' . $gateway_id . '', 'payment_gateway');
			$this->load->view('settings/edit_gateway',$data);
	}
	public function update_gateway($id,$ac_st)
	{
		if($ac_st==1)
		{
			$up['act_st']=0;
		}
		else
		{
		   $up['act_st']=1;   
		}

		$delete=$this->Admin_model->update_function('payid',$id,'payment_gateway',$up);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Updated Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Update');     
		}
		 redirect('admin/set_payment_gateway','refresh');
	}

	public function set_sms_gateway($value='')
	{

		$data['sms_gateway']=$this->Admin_model->select_all('sms_gateway');
		$this->load->view('settings/set_sms_gateway',$data);   
	   
	}


	public function set_sms_gateway_post($value='')
	{
		$data['com_title']=$this->input->post('com_title');
		$data['sms_key']=$this->input->post('auth_key');
		$data['api_url']=$this->input->post('api_url');
		$insert=$this->Admin_model->insert_ret('sms_gateway', $data);
		
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}
		 redirect('admin/set_sms_gateway','refresh');
	}
	public function delete_sms_gateway($id)
	{
		$delete=$this->Admin_model->delete_function('sms_gateway', 'smsid', $id);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Delete');     
		}
		 redirect('admin/set_sms_gateway','refresh');
	}

	public function update_sms_gateway($id,$ac_st)
	{
		if($ac_st==1)
		{
			$up['sms_act']=0;
		}
		else
		{
		   $up['sms_act']=1;   
		}

		$delete=$this->Admin_model->update_function('smsid',$id,'sms_gateway',$up);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Updated Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Update');     
		}
		 redirect('admin/set_sms_gateway','refresh');
	}

	public function edit_sms_gateway($gateway_id)
	{
			$data['sms_gateway']=$this->Admin_model->select_with_where('*', 'smsid=' . $gateway_id . '', 'sms_gateway');
			$this->load->view('settings/edit_sms_gateway',$data);
	}

	public function edit_sms_gateway_post($value='')

	{
		$sms_id=$this->input->post('sms_id');
		$data['com_title']=$this->input->post('com_title');
		$data['api_url']=$this->input->post('api_url');
		$data['sms_key']=$this->input->post('auth_key');

		$insert=$this->Admin_model->update_function('smsid',$sms_id,'sms_gateway',$data);
		

		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}

		 redirect('admin/set_sms_gateway','refresh');

	}


	public function set_sms_template($value='')
	{

			$data['sms_template']=$this->Admin_model->select_all('sms_template');
			$data['mobile_subscriber']=$this->Admin_model->select_all('mobile_subscriber');
			
			$this->load->view('settings/sms_template',$data);  
	}

	public function send_mobile_sms($value='')
	{
		$sms=$this->input->post('sms');

		$data['subscribe']=$this->Admin_model->select_all('mobile_subscriber');
		$cn=count($data['subscribe']);
		if($cn!=0)
		{
			foreach ($subscribe as $key => $value)
			 {
				$subscriber_no=$value['subscriber_no'];
				$contact="88".$subscriber_no;
				$this->sendsms_library->send_single_sms('CMART',$contact,$sms);
			 } 

		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'SMS Send Successfully');
		redirect('admin/set_sms_template','refresh');   
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'No Subscrber Found Yet ');
		redirect('admin/set_sms_template','refresh');    
		}



	}

	public function set_email_template($value='')
	{

			$data['email_template']=$this->Admin_model->select_all('email_template');
			$this->load->view('settings/email_template',$data);  
	}

	public function email_set_post($value='')
	{
		$data['email_from']=$this->input->post('from_email');
		$data['email_subject']=$this->input->post('email_subject');
		$data['email_body']=$this->input->post('sms');
		$insert=$this->Admin_model->insert_ret('email_template', $data);
		
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}
		 redirect('admin/set_email_template','refresh');

	}

	public function delete_email_template($id)
		{

		$delete=$this->Admin_model->delete_function('email_template', 'stemp_id', $id);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Delete');     
		}
		 redirect('admin/set_email_template','refresh');

		} 


	public function update_email_template($id,$ac_st)
	{
		if($ac_st==1)
		{
			$up['act_st']=0;
		}
		else
		{
		   $up['act_st']=1;   
		}

		$delete=$this->Admin_model->update_function('stemp_id',$id,'email_template',$up);

		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Updated Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Update');     
		}
		 redirect('admin/set_email_template','refresh');
	}

	public function edit_email_template($stemp_id)
	{
			$data['email_template']=$this->Admin_model->select_with_where('*', 'stemp_id=' . $stemp_id . '', 'email_template');
			$this->load->view('settings/edit_email_template',$data);
	}

	public function email_edit_post($value='')
	{
		$emid=$this->input->post('email_id');
		$data['email_from']=$this->input->post('from_email');
		$data['email_subject']=$this->input->post('email_subject');
		$data['email_body']=$this->input->post('sms');
		$insert=$this->Admin_model->update_function('stemp_id',$emid,'email_template',$data);
		
		if($insert==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Saved Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Save');     
		}
		 redirect('admin/set_email_template','refresh');

	}
	public function update_page_content($page_name='')
	{
		if($page_name=='about_us')
		{
			if($_FILES["userfile"]['name'])
			{

				$data_img['about_us_image'] ='';
				$i_ext = explode('.', $_FILES['userfile']['name']);
				$target_path = 'about_us_image.' . end($i_ext);
			   
				$size = getimagesize($_FILES['userfile']['tmp_name']);

				if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/company/' . $target_path))
				{
					$data_img['about_us_image'] = $target_path;
				}

				$this->Admin_model->update_function('id',1, 'company', $data_img);

			}
		}

		$login_id = $this->session->userdata('login_id');
		$data[$page_name]=$this->input->post('details');
		$this->Admin_model->update_function('id', 1, 'company', $data);
		redirect('admin/page/'.$page_name,'refresh');
	}



		///  ========== Manage Pages Ends ======== /////







	// =========== Manage Color Start =========


	public function color()
	{
		$data['color_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'color');
		$this->load->view('color/color_list', $data);
	}

	public function add_color()
	{

		$this->load->view('color/add_color');
	}

	public function add_color_post()
	{
		$data['color_title'] = $this->input->post('color_name');
		$data['color_code'] = $this->input->post('color_code');
		$data['created_at'] = date('Y-m-d H:i:s');

		$this->Admin_model->insert('color', $data);
		redirect('admin/color', 'refresh');
	}

	public function edit_color($id)
	{
		$data['color_list'] = $this->Admin_model->select_with_where('*', 'color_id=' . $id . '', 'color');

		$this->load->view('color/edit_color', $data);
	}

	public function update_color_post($id)
	{


		$data['color_title'] = $this->input->post('color_name');
		$data['color_code'] = ($this->input->post('color_code'));
		$data['created_at'] = date('Y-m-d h:i:a');
		$this->Admin_model->update_function('color_id', $id, 'color', $data);


		redirect('admin/color', 'refresh');
	}

	public function delete_color($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);
		$data['status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('color_id', $id, 'color', $data);


		redirect('admin/color', 'refresh');
	}
	// =========== Manage Color  End =========


	// =========== Manage Branch  Starts=========///


	public function branch()
	{

		$data['branch_data'] = $this->Admin_model->select_with_where('*', 'branch_status=1', 'branch');

		$this->load->view('branch/branch_list', $data);
	}


	public function add_branch()
	{


		$this->load->view('branch/add_branch');
	}


	public function add_branch_post()
	{

		$data['branch_name'] = $this->input->post('branch_name');
		$data['city'] = $this->input->post('branch_city');
		$data['address'] = $this->input->post('branch_address');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->insert('branch', $data);
		redirect('admin/branch', 'refresh');
	}

	public function edit_branch($id)
	{

		$data['branch_data'] = $this->Admin_model->select_with_where('*', 'branch_id=' . $id . '', 'branch');
		$this->load->view('branch/edit_branch', $data);
	}


	public function update_branch_post($id)
	{


		$data['branch_name'] = $this->input->post('branch_name');
		$data['city'] = $this->input->post('branch_city');
		$data['address'] = $this->input->post('branch_address');
		$data['created_at'] = date('Y-m-d h:i:a');
		$this->Admin_model->update_function('branch_id', $id, 'branch', $data);


		redirect('admin/branch', 'refresh');
	}

	public function delete_branch($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);
		$data['branch_status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('branch_id', $id, 'branch', $data);


		redirect('admin/branch', 'refresh');
	}
	// =========== Manage Branch  Ends=========///


	// =========== Manage News  Start=========

	public function news()
	{

		$data['news_data'] = $this->Admin_model->select_with_where('*', 'news_status=1', 'news');
		$this->load->view('news/news_list', $data);
	}
	public function add_news()
	{

		$this->load->view('news/add_news');
	}
	
	public function add_news_post()
	{

		$login_id=  $this->session->userdata('login_id');
		$data['news_title'] = $this->input->post('news_head');
		$data['news_description'] = $this->input->post('news_describ');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');

		$id = $this->Admin_model->insert_ret('news', $data);

		if ($_FILES['files']['name']) {

			$data_img['image'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			$target_path = 'news_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/news/' . $target_path)) {
				$data_img['image'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/news/" . $target_path, "uploads/news/" . $target_path);
			}

			$this->Admin_model->update_function('id', $id, 'news', $data_img);
		}


		redirect('admin/news', 'refresh');
	}
	
	

	public function edit_news($id)
	{

		$data['news_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'news');
		$this->load->view('news/edit_news', $data);
	}

	public function update_news_post($id)
	{

		$login_id=  $this->session->userdata('login_id');
		$data['news_title'] = $this->input->post('news_head');
		$data['news_description'] = $this->input->post('news_describ');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->update_function('id', $id, 'news', $data);
		// $this->load->view('news/brand_list', $data);

		if ($_FILES["files"]['name']) {
			$pre_image = $this->input->post('pre_img');
			$path_to_file = 'uploads/news/' . $pre_image;
			if (unlink($path_to_file)) { }

			$data_img['image'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			$target_path = 'news_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/news/' . $target_path)) {
				$data_img['image'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/news/" . $target_path, "uploads/news/" . $target_path);
			}

			$this->Admin_model->update_function('id', $id, 'news', $data_img);
		}

		redirect('admin/news', 'refresh');
	}
	

	public function delete_news_data($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);
		$data['news_status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('id', $id, 'news', $data);


		redirect('admin/news', 'refresh');
	}

	// =========== Manage News  Ends=========

	// =========== Manage Advertise  Starts ========= //

	public function advertise()
	{
		$login_id=   $this->session->userdata('login_id');
		$data['ads_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'ads');
		$this->load->view("advertise/ads_list", $data);
	}

	public function add_ads()
	{

		$data['pro_list'] = $this->Admin_model->select_with_where('*', 'pro_status=1', 'product');
		
		$this->load->view('advertise/add_ads', $data);
	}

	public function add_ads_post()
	{
		$login_id=   $this->session->userdata('login_id');
		$data['product_id'] = $this->input->post('pro_name');
		$data['ads_name'] = $this->input->post('ads_name');
		$data['ads_position'] =$this->input->post('ads_position');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');
		$id = $this->Admin_model->insert_ret('ads', $data);


		if ($_FILES['files']['name']) {

			$data_img['advertise_imgs'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
		

		$target_path = 'ads_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/ads/' . $target_path)) {
				$data_img['advertise_imgs'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/ads/" . $target_path, "uploads/ads/" . $target_path);
			}

			$this->Admin_model->update_function('id', $id, 'ads', $data_img);
		}


		redirect('admin/advertise', 'refresh');
	}


	public function edit_ads($id)
	{
		$login_id=   $this->session->userdata('login_id');


		$data['ads_list'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'ads');


		$this->load->view('advertise/edit_ads', $data);
	}


	public function update_ads_post($id)

	{

		$login_id=$this->session->userdata('login_id');
		$data['product_id'] = $this->input->post('pro_name');
		$data['ads_position'] = $this->input->post('ads_position');
		$data['ads_name'] = $this->input->post('ads_name');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->update_function('id', $id, 'ads', $data);
		$this->load->view('advertise/ads_list', $data);
		
		if ($_FILES["files"]['name']) {

			$pre_image = $this->input->post('pre_img');
			$path_to_file = 'uploads/ads/' . $pre_image;
			if (unlink($path_to_file)) { }

			$data_img['advertise_imgs'] = '';
			$i_ext = explode('.', $_FILES['files']['name']); 
			$target_path = 'ads_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/ads/' . $target_path)) {
			$data_img['advertise_imgs'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/ads/" . $target_path, "uploads/ads/" . $target_path);
			}

			$this->Admin_model->update_function('id', $id, 'ads', $data_img);
		}

		redirect('admin/advertise', 'refresh');
		
	}

	public function delete_ads($id = "")
	{


		$data['status'] = 2;
		$id = $id;

		$this->Admin_model->update_function('id', $id, 'ads', $data);

		redirect('admin/advertise', 'refresh');
	}
	// ===========Manage Advertise Ends========= //


	// =========== Manage Contacts  Start=========

	public function contact()
	{

		$data['contacts_data'] = $this->Admin_model->select_with_where('*', 'status=1', 'contact');
		$this->load->view('contact/contact_list', $data);
	}



	public function add_contact_data()
	{

		$this->load->view('contact/add_contact_data');
	}

	public function add_contact_post()
	{
		$login_id = $this->session->userdata('login_id');
		$data['email'] = $this->input->post('email_name');
		$data['contact_no'] = $this->input->post('contact_number');
		$data['address'] = $this->input->post('contact_address');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->insert('contact', $data);
		redirect('admin/contact', 'refresh');
	}

	public function edit_contact($id)
	{

		$data['contact_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'contact');
		$this->load->view('contact/edit_contact', $data);
	}

	public function update_contact_post($id)
	{


		$data['email'] = $this->input->post('email_name');
		$data['contact_no'] = $this->input->post('contact_number');
		$data['address'] = $this->input->post('contact_address');
		$data['created_at'] = date('Y-m-d h:i:a');
		$this->Admin_model->update_function('id', $id, 'contact', $data);
		redirect('admin/contact', 'refresh');
	}

	public function delete_contact_data($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);
		$data['status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('id', $id, 'contact', $data);


		redirect('admin/contact', 'refresh');
	}

	// ===========  Manage Contacts  End=========

	// =========== Manage Slider  Starts=========


	public function slider()
	{

		$data['slider_data'] = $this->Admin_model->select_with_where('*', 'slider_status=1', 'slider');

		$this->load->view('slider/slider_list', $data);
	}
	public function add_slider()
	{
		$this->load->view('slider/add_slider');
	}



	public function add_slider_post()
	{

		$login_id=  $this->session->userdata('login_id');
		$data['slider_title'] = $this->input->post('slider_title');
		$data['slider_name'] = $this->input->post('slider_head');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');
		$id = $this->Admin_model->insert_ret('slider', $data);

		// $i_ext = explode('.', $_FILES['files']['name']);
		// $target_path = 'slider_'.$id.'_'. $login_id .'.' . end($i_ext);



		if ($_FILES['files']['name']) {

			$data_img['slider_image'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			$target_path = 'slider_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/slider/' . $target_path)) {
				$data_img['slider_image'] = $target_path;
			}


			if ($size[0] == 870 || $size[1] == 475) { } else {
				$imageWidth = 870; //Contains the Width of the Image

				$imageHeight = 475;

				$this->resize($imageWidth, $imageHeight, "uploads/slider/" . $target_path, "uploads/slider/" . $target_path);
			}

			$this->Admin_model->update_function('id', $id, 'slider', $data_img);
		}


		redirect('admin/slider', 'refresh');
	}


	public function edit_slider($id)
	{
		$login_id=   $this->session->userdata('login_id');
		$data['slider_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'slider');
		$this->load->view('slider/edit_slider', $data);
	}


	public function update_slider_post($id)
	{
		$login_id=   $this->session->userdata('login_id');
		$data['slider_title'] = $this->input->post('slider_title');
		$data['slider_name'] = $this->input->post('slider_head');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->update_function('id', $id, 'slider', $data);
		$this->load->view('slider/slider_list', $data);

		if ($_FILES["files"]['name']) {
			$pre_image = $this->input->post('pre_img');
			$path_to_file = 'uploads/slider/' . $pre_image;
			if (unlink($path_to_file)) { }

			$data_img['slider_image'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);

			

			$target_path = 'slider_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/slider/' . $target_path)) {
				$data_img['slider_image'] = $target_path;
			}


			if ($size[0] == 870 || $size[1] == 475) { } else {
				$imageWidth = 870; //Contains the Width of the Image

				$imageHeight = 475;

				$this->resize($imageWidth, $imageHeight, "uploads/slider/" . $target_path, "uploads/slider/" . $target_path);
			}

			$this->Admin_model->update_function('id', $id, 'slider', $data_img);
		}


		redirect('admin/slider', 'refresh');
	}

	public function delete_slider($id = "")
	{


		$data['slider_status'] = 2;
		$id = $id;

		$this->Admin_model->update_function('id', $id, 'slider', $data);

		redirect('admin/slider', 'refresh');
	}


	// ================Manage SLIDER ENDS===========

	// =========== Manage Brand  Starts=========


	public function brand()
	{

		$data['brand_data'] = $this->Admin_model->select_with_where('*', 'status=1', 'brand');
		$this->load->view('brand/brand_list', $data);
	}

	public function add_brand()
	{

		$this->load->view('brand/add_brand');
	}


	public function add_brand_post()
	{

		$login_id=  $this->session->userdata('login_id');
		$data['brand_name'] = $this->input->post('brand_name');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');

		$id = $this->Admin_model->insert_ret('brand', $data);

		// $i_ext = explode('.', $_FILES['files']['name']);
		// $target_path = 'brand_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);


		if ($_FILES['files']['name']) {

			$data_img['brand_img'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			$target_path = 'brand_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/brand/' . $target_path)) {
				$data_img['brand_img'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/brand/" . $target_path, "uploads/brand/" . $target_path);
			}

			$this->Admin_model->update_function('brand_id', $id, 'brand', $data_img);
		}


		redirect('admin/brand', 'refresh');
	}


	public function edit_brand($id)
	{

		$data['brand_data'] = $this->Admin_model->select_with_where('*', 'brand_id=' . $id . '', 'brand');
		$this->load->view('brand/edit_brand', $data);
	}


	public function update_brand_post($id)
	{

		$login_id=  $this->session->userdata('login_id');
		$data['brand_name'] = $this->input->post('brand_name');
		$data['show_status'] = $this->input->post('show_status');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->update_function('brand_id', $id, 'brand', $data);
		$this->load->view('brand/brand_list', $data);

		if ($_FILES["files"]['name']) {
			$pre_image = $this->input->post('pre_img');
			$path_to_file = 'uploads/brand/' . $pre_image;
			if (unlink($path_to_file)) { }

			$data_img['brand_img'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			$target_path = 'brand_'.uniqid().'_'.$id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/brand/' . $target_path)) {
				$data_img['brand_img'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/brand/" . $target_path, "uploads/brand/" . $target_path);
			}

			$this->Admin_model->update_function('brand_id', $id, 'brand', $data_img);
		}


		redirect('admin/brand', 'refresh');
	}

	public function delete_brand($id = "")
	{


		$data['status'] = 2;
		$id = $id;

		$this->Admin_model->update_function('brand_id', $id, 'brand', $data);

		redirect('admin/brand', 'refresh');
	}


	// ================   Manage BRAND  END============//



	// ================   Manage PRODUCT START ============

	public function product()
	{


		// $data['products_data'] = $this->Admin_model->select_where_join_asc(
		//     '*,  product.pro_id as prodct_id ,
		//         brand.brand_name as brnd_name',
		//     'product',
		//     'brand',
		//     'product.brand_id=brand.brand_id',
		//     'product.pro_status=1','product.pro_id'
		// );
		
		$data['products_data'] = $this->Admin_model->select_with_where('*', 'pro_status=1','product');
		
		$this->load->view('product/product_list', $data);
	}

	public function add_product()
	{

		$data['category_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'category');
		$data['brand_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'brand');
		$data['specification_list'] = $this->Admin_model->select_with_where('*', 'spe_status=1', 'specification');

		$this->load->view('product/add_product', $data);
	}


	public function add_product_post()
	{
	
		$login_id = $this->session->userdata('login_id');
		$data['product_name'] = $this->input->post('pro_name');
		$data['product_code'] = $this->input->post('pro_code');
		$data['pro_model'] = $this->input->post('pro_model');
		$data['cat_id'] = $pro_cat = $this->input->post('pro_category');
		$data['brand_id'] = $this->input->post('brand_name');
		$data['color_id'] = $this->input->post('pro_color');

		$new_arrivals=$this->input->post('new_arrivals');
		$featured_products=$this->input->post('featured_products');
		$best_sellings_products=$this->input->post('best_sellings_products');
	
		$aces=$this->input->post('aces');
		$graps_gams=$this->input->post('graps_gams');
		$mbl_tbs=$this->input->post('mbl_tbls');

		$deal_of_the_day=$this->input->post('deal_of_the_day');

		$data['pro_price'] = $this->input->post('pro_price');
		$data['pro_previous_price'] = $this->input->post('pre_price');
		$data['pro_dcount_price'] = $this->input->post('dscnt_price');
		$data['pro_short_descrp'] = $this->input->post('short_dscrb');
		$data['pro_descrp'] = $this->input->post('pro_details');
		$data['warrenty_start_date'] = $this->input->post('start_wrntydate');
		$data['warrenty_end_date'] = $this->input->post('end_wrntydate');
		$data['guarantee_start_date'] = $this->input->post('start_gurntedate');
		$data['guarantee_end_date'] = $this->input->post('end_gurntedate');
		$data['created_at'] = date('Y-m-d H:i:s');

		$data['new_arrivals ']=0;
		if($new_arrivals=='on')
		{
			$data['new_arrivals']=1;
		}

		$data['featured_products']=0;
		if($featured_products=='on')
		{
			$data['featured_products']=1;
		}

		$data['best_selling ']=0;
		if($best_sellings_products=='on')
		{
			$data['best_selling']=1;
		}
		
		$data['accesories']=0;
		if($aces=='on')
		{
			$data['accesories']=1;
		}

		$data['accesories']=0;
		if($aces=='on')
		{
			$data['accesories']=1;
		}

		$data['graps_games']=0;
		if($graps_gams=='on')
		{
			$data['graps_games']=1;
		}

		$data['mobile_tab']=0;
		if($mbl_tbs=='on')
		{
			$data['mobile_tab']=1;
		}
		
		if($deal_of_the_day=='on')
		{
			$data['deal_of_the_day']=1;
		}

		$id = $this->Admin_model->insert_ret('product',$data);

		$data_pro['profile_name'] = preg_replace('/[ ,]+/', '_', trim($data['product_name']));
		$data_pro['profile_name']=$data_pro['profile_name'].'_'.$id;
		$data_pro['profile_name'] = str_replace("'", '', $data_pro['profile_name']);

		$this->Admin_model->update_function('pro_id',$id, 'product', $data_pro);



		// ---------  Product Specifications Table Part Start-----//

			$pro_spec_insert = array();

			$pro_spec_insert = $this->input->post('spec_name');
			$pro_spec_id = $this->input->post('spec_id');


			if( !empty($pro_spec_insert) ) {
				foreach ($pro_spec_insert as $key => $value) {

			$data_2['specification_id'] = $pro_spec_id[$key];
			$data_2['category_id'] = $pro_cat;
			$data_2['product_cat_data'] = $value;
			$data_2['product_id'] = $id;

			$this->Admin_model->insert('product_specification', $data_2);
		}
		
		}

		// ---------   Product Specifications Table Part End-----//

			$files = $_FILES;
			$cpt = count($_FILES['userfile']['name']);
			$data_link['title_link']='product';
			for($i=0; $i<$cpt; $i++)
			{ 
					   
				if($files['userfile']['tmp_name'][$i]!='')
				{
					$i_ext = explode('.', $files['userfile']['name'][$i]);   
					$_FILES['userfile']['name']=$data_link['title_link'].'_'.uniqid().'_'.$i.'.'.end($i_ext);
	
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i]; 
	
					$oldFileName = $_FILES['userfile']['name'];
					$_FILES['userfile']['name'] =str_replace("'","", $oldFileName);
	
					$this->upload->initialize($this->set_upload_options($_FILES['userfile']['name'],'product/fresh'));
					$this->upload->do_upload();
					$this->upload->initialize($this->set_upload_options($_FILES['userfile']['name'],'product/'));
					//$this->upload->do_upload();  
					 
					$imageInformation = getimagesize($_FILES['userfile']['tmp_name']);
								
					$imageWidth = $imageInformation[0]; //Contains the Width of the Image
	
					$imageHeight = $imageInformation[1];
	
					
					// $this->create_thumbnail($_FILES['userfile']['name']);
		
					if($i==0)
					{
						
						$main_image['product_img']=explode('.', $_FILES['userfile']['name']);
						$main_image['product_img']=$main_image['product_img'][0].'_thumb.'.end($main_image['product_img']);
	
						$this->Admin_model->update_function('pro_id',$id, 'product', $main_image);
	
	
						// For thumbnail
						$this->create_thumbnail($_FILES['userfile']['name']);    
						$data_image['gallery_image']=$_FILES['userfile']['name'];
						$this->Admin_model->update_function('pro_id', $id, 'product', $data_image);
			
					}
	
					else
					{
						$data['product_data']=$this->Admin_model->select_with_where('*', 'pro_id='.$id, 'product');
	
						if($data['product_data'][0]['gallery_image']=='')
						{
							$data_image['gallery_image']=$_FILES['userfile']['name'];
						}
						else
						{
							$data_image['gallery_image']=$data['product_data'][0]['gallery_image'].','.$_FILES['userfile']['name'];
						}
						$this->Admin_model->update_function('pro_id', $id, 'product', $data_image);
					} 
				}
	
			   
			}
		
			
			

		  

		///  =======Product Gallery End=========== ///

		redirect('admin/product', 'refresh');
	}
	
	public function create_thumbnail($filename)
	{
		$base=base_url();
		$this->load->library('image_lib');
		$config['image_library']  = 'gd2';
		$config['source_image']   =FCPATH ."uploads/product/fresh/".$filename;
		$config['create_thumb']   = TRUE;
		$config['overwrite']      = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']          = 200;
		$config['height']         = 200;
		$config['new_image']      = FCPATH ."uploads/product/thumbnail/". $filename;               
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
	
	
	private function set_upload_options($file_name,$folder_name)
	{   
		//upload an image options
		$url=base_url();

		$config = array();
		 $config['file_name'] = $file_name;
		$config['upload_path'] = 'uploads/'.$folder_name;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '0';
		$config['overwrite']     = TRUE;

		return $config;
	}

	public function edit_product($id)
	{

		$login_id = $this->session->userdata('login_id');
		// =======    category query =========

		$data['all_cat_name'] = $this->Admin_model->select_with_where('*', 'status=1', 'category');


		$data['cat_list'] = $this->Admin_model->select_where_left_join(
			'*,
			category.category_name as cat_name',
			'product',
			'category',
			'product.cat_id=category.category_id',
			'product.pro_id=' . $id
		);

		// ==========    category query ===========

		$data['specification_list'] = $this->Admin_model->select_with_where('*', 'spe_status=1', 'specification');

		// =======  brand query=====

		$data['brand_list'] = $this->Admin_model->select_where_left_join(
			'*,
			brand.brand_name as brn_name',
			'product',
			'brand',
			'product.brand_id=brand.brand_id',
			'product.pro_id=' . $id
		);

		$data['all_brand_name'] = $this->Admin_model->select_with_where('*', 'status=1', 'brand');

		// =======  brand query=====//

		// =======  color query=====//

		$data['color_list'] = $this->Admin_model->select_where_left_join(
			'*,
			color.color_title as color_name',
			'product',
			'color',
			'product.color_id=color.color_id',
			'product.pro_id=' . $id
		);

		$data['all_color_name'] = $this->Admin_model->select_with_where(
			'*',
			'status=1',
			'color'
		);
		// =======  color query=====

		$data['products_data'] = $this->Admin_model->select_with_where('*', 'pro_id=' . $id . '', 'product');

		$data['pro_spec'] = $this->Admin_model->select_where_left_join(
			'*, specification.title
				as specification_name',
			'product_specification',
			'specification',
			'product_specification.specification_id=specification.id',
			'product_specification.product_id=' . $id
		);

		$this->load->view('product/edit_product', $data);
	}


	public function update_product_post($id)

	{   $login_id = $this->session->userdata('login_id');
		$data['product_name'] = $this->input->post('pro_name');
		$data['product_code'] = $this->input->post('pro_code');
		$data['pro_model'] = $this->input->post('pro_model');
		$data['cat_id'] = $this->input->post('pro_category');
		$data['brand_id'] = $this->input->post('brand_name');
		$data['color_id'] = $this->input->post('pro_color');
		
		
		$new_arrivals=$this->input->post('new_arrivals');
		$featured_products=$this->input->post('featured_products');
		$best_sellings_products=$this->input->post('best_sellings_products');
		$aces=$this->input->post('aces');
		$graps_gams=$this->input->post('graps_gams');
		$mbl_tbs=$this->input->post('mbl_tbls');
		$deal_of_the_day=$this->input->post('deal_of_the_day');
		
		
		$data['pro_price'] = $this->input->post('pro_price');
		$data['pro_previous_price'] = $this->input->post('pre_price');
		$data['pro_dcount_price'] = $this->input->post('dscnt_price');
		$data['pro_short_descrp'] = $this->input->post('short_dscrb');
		$data['pro_descrp'] = $this->input->post('pro_details');
		$data['warrenty_start_date'] = $this->input->post('start_wrntydate');
		$data['warrenty_end_date'] = $this->input->post('end_wrntydate');
		$data['guarantee_start_date'] = $this->input->post('start_gurntedate');
		$data['guarantee_end_date'] = $this->input->post('end_gurntedate');
		$data['created_at'] = date('Y-m-d H:i:s');
		
		
		$data['new_arrivals ']=0;
		if($new_arrivals=='on')
		{
			$data['new_arrivals']=1;
		}

		$data['featured_products']=0;
		if($featured_products=='on')
		{
			$data['featured_products']=1;
		}

		$data['best_selling ']=0;
		if($best_sellings_products=='on')
		{
			$data['best_selling']=1;
		}
		
		$data['accesories']=0;
		if($aces=='on')
		{
			$data['accesories']=1;
		}

		$data['accesories']=0;
		if($aces=='on')
		{
			$data['accesories']=1;
		}

		$data['graps_games']=0;
		if($graps_gams=='on')
		{
			$data['graps_games']=1;
		}

		$data['mobile_tab']=0;
		if($mbl_tbs=='on')
		{
			$data['mobile_tab']=1;
		}
			 
		$data['deal_of_the_day']=0;
		if($deal_of_the_day=='on')
		{
			$data['deal_of_the_day']=1;
		}

		
		$this->Admin_model->update_function('pro_id', $id, 'product', $data);
		

		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		$data_link['title_link']='product';

		for($i=0; $i<$cpt; $i++)
		{   
			if($files['userfile']['tmp_name'][$i]!='')
			{   
				$i_ext = explode('.', $files['userfile']['name'][$i]);   
				$_FILES['userfile']['name']=uniqid().'_'.$data_link['title_link'].'_'.$i.'.'.end($i_ext);

				$_FILES['userfile']['type']= $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['userfile']['error'][$i];
				$_FILES['userfile']['size']= $files['userfile']['size'][$i]; 

				$oldFileName = $_FILES['userfile']['name'];
				$_FILES['userfile']['name'] =str_replace("'","", $oldFileName);

				$this->upload->initialize($this->set_upload_options($_FILES['userfile']['name'],'product/fresh'));
				$this->upload->do_upload();

			 

				$this->upload->initialize($this->set_upload_options($_FILES['userfile']['name'],'product/'));
				$this->upload->do_upload();  
				

				
				$imageInformation = getimagesize($_FILES['userfile']['tmp_name']);
							
				$imageWidth = $imageInformation[0]; 

				$imageHeight = $imageInformation[1];

				

				if($i==0)
				{
					
				  
				   

					// $this->Admin_model->update_function('pro_id',$id, 'product', $main_image);
				  
						
					if($files['userfile']['name'][$i]!='')
					{
						
						// $main_image=$this->input->post('product_img');
						$main_image['product_img']=explode('.', $_FILES['userfile']['name']);
				
						$main_image['product_img']=$main_image['product_img'][0].'_thumb.'.end($main_image['product_img']);
						
			   
						$this->create_thumbnail($_FILES['userfile']['name']);
						$this->Admin_model->update_function('pro_id', $id, 'product',$main_image);
					}

				}

				else
				{
				   if($files['userfile']['name'][$i]!='')
					{ 
						$data['product_data']=$this->Admin_model->select_with_where('*', 'pro_id='.$id, 'product');

						if($data['product_data'][0]['gallery_image']=='0')
						{
							$data_image['gallery_image']=$_FILES['userfile']['name'];
						}
						else
						{
							$data_image['gallery_image']=$data['product_data'][0]['gallery_image'].','.$_FILES['userfile']['name'];
						}
						$this->Admin_model->update_function('pro_id', $id, 'product', $data_image);
					}
				}
			}
		}
		
		
		redirect('admin/product', 'refresh');
	}

	public function delete_product($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);
		$data['pro_status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('pro_id', $id, 'product', $data);


		redirect('admin/product', 'refresh');
	}

	// ================   Manage PRODUCT END ============


	// ================   Manage PRODUCT Tag Start ============


	public function product_tag()
	{

		$data['product_list'] = $this->Admin_model->select_where_left_join('*,product.product_name as pro_name', 'products_tag', 'product', 'products_tag.product_id=product.pro_id', 'products_tag.status=1');

		$this->load->view('products_tag/tag_list', $data);
	}

	public function add_tag_name()
	{

		$data['product_list'] = $this->Admin_model->select_with_where('*', 'pro_status=1', 'product');
		$this->load->view('products_tag/add_tag_name', $data);
	}

	public function add_tag_post()
	{


		$data['tag_name'] = $this->input->post('tag_name');
		$data['product_id'] = $this->input->post('product_tag');
		$data['created_at'] = date('Y-m-d H:i:s');

		$this->Admin_model->insert('products_tag', $data);
		redirect('admin/product_tag', 'refresh');
	}

	public function edit_tag($id)
	{

		$data['product_list'] = $this->Admin_model->select_where_left_join('*,product.product_name as pro_name', 'products_tag', 'product', 'products_tag.product_id=product.pro_id', 'products_tag.id=' . $id);

		$data['all_product_list'] = $this->Admin_model->select_with_where('*', 'pro_status=1', 'product');

		$this->load->view('products_tag/edit_tag', $data);
	}

	public function update_tag_post($id)
	{


		$data['tag_name'] = $this->input->post('tag_name');
		$data['product_id'] = $this->input->post('product_tag');
		$data['created_at'] = date('Y-m-d h:i:a');
		$this->Admin_model->update_function('id', $id, 'products_tag', $data);
		redirect('admin/product_tag', 'refresh');
	}

	public function delete_tag($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);

		$data['status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('id', $id, 'products_tag', $data);


		redirect('admin/product_tag', 'refresh');
	}

	// ================   Manage PRODUCT Tag END ============


	// ============== Manage Specification Start ==============



	public function specification()
	{

		$data['specification_data'] = $this->Admin_model->select_with_where(
			'*',
			'spe_status=1',
			'specification'
		);
		$this->load->view('specification/specification_list', $data);
	}
//mail sending config
	  private function mail_config()
	{
	  $config = array();
	  $config['protocol'] = 'SMTP';
	  $config['smtp_host'] = 'mail.cmart.com.bd';
	  $config['smtp_user'] = 'admin@cmart.com.bd';
	  $config['smtp_pass'] = 'rc01816306190';
	  $config['smtp_port'] = 26;
	  return $config;

	}

	  private function sendEmail($email,$subject,$view,$data,$admin_email='')
  {
	  
	  $config = $this->mail_config();
	  $this->email->initialize($config);
	  $this->email->set_newline("\r\n");
	  $this->email->from('info@cmart.com.bd', 'CMART');
	  $this->email->to($email);
	  $this->email->cc($admin_email);
	  $this->email->subject($subject);
	  $body = $this->load->view($view,$data,TRUE);
	  $this->email->message($body);
	  $this->email->set_mailtype('html');
	  $this->email->send();
  }
  
  //mail sending config

	public function add_specification()
	{

		$this->load->view('specification/add_specification');
	}

	public function add_specification_post()
	{

		$data['title'] = $spec_name = $this->input->post('spec_title');
		$data['name'] = strtolower(str_replace(" ", "-", $spec_name));
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->insert('specification', $data);
		redirect('admin/specification', 'refresh');
	}

	public function edit_specification($id)
	{



		$data['specification_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'specification');

		$this->load->view('specification/edit_specification', $data);
	}

	public function update_edit_specification_post($id)
	{


		$data['title'] = $spec_name = $this->input->post('spec_title');
		$data['name'] = strtolower(str_replace(" ", "-", $spec_name));
		$data['created_at'] = date('Y-m-d h:i:a');
		$this->Admin_model->update_function('id', $id, 'specification', $data);
		redirect('admin/specification', 'refresh');
	}


	public function delete_specification($id = '')
	{
		// $this->Admin_model->delete_function('color', 'color_id', $id);
		$data['spe_status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('id', $id, 'specification', $data);


		redirect('admin/specification', 'refresh');
	}

	// ============== Manage Specification Ends==============/////

	// ============== Manage Supplier Starts==============/////

	public function supplier()
	{
		$data['supp_list'] = $this->Admin_model->select_with_where('*', 'sup_status=1', 'supplier');
		$this->load->view('supplier/supp_list', $data);
	}

	public function add_supplier()
	{

		$this->load->view('supplier/add_supp');
	}
	public function add_supplier_post()
	{
		$data['sup_name'] = $this->input->post('supplier_name');
		$data['sup_phone_no'] = $this->input->post('supplier_phone_no');
		$data['sup_address'] = $this->input->post('supplier_address');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->insert('supplier', $data);
		redirect('admin/supplier', 'refresh');
	}

	public function edit_supplier($id)
	{
		$data['supp_list'] = $this->Admin_model->select_with_where('*', 'sup_id=' . $id . '', 'supplier');

		$this->load->view('supplier/edit_supp', $data);
	}

	public function update_su_post($id)

	{
		$data['sup_name'] = $this->input->post('supplier_name');
		$data['sup_phone_no'] = $this->input->post('supplier_phone_no');
		$data['sup_address'] = $this->input->post('supplier_address');
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->update_function('sup_id', $id, 'supplier', $data);
		redirect('admin/supplier', 'refresh');
	}

	public function delete_supplier($id = '')
	{
		$data['sup_status'] = 2;
		$id = $id;
		$this->Admin_model->update_function('sup_id', $id, 'supplier', $data);
		redirect('admin/supplier', 'refresh');
	}

	// ============== Manage Supplier Ends==============/////


// ============== Manage Purchase  Products Start ==============/////

	public function purchase_product()
	{


		$data['purchase_list'] = $this->Admin_model->select_left_join('*,supplier.sup_name as supp_name', 'purchases', 'supplier', 'purchases.supp_id=supplier.sup_id');

		$this->load->view('purchase/purchase_list', $data);

	}
	
	public function product_edit($id='')
	{
	   
	}

	public function delte_purchs($id)
	{
		$delete=$this->Admin_model->delete_function('purchases', 'id', $id);
		$delete_d=$this->Admin_model->delete_function('purchase_details', 'purchase_id', $id);
		if($delete==true)
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Data Delete Successfully');
		}
		else
		{
		$this->session->set_flashdata('type', 'success');
		$this->session->set_flashdata('msg', 'Failed to Delete');     
		}
		redirect('admin/purchase_product','refresh');
	}
		public function insert_purchase_product()
	{
		$login_id = $this->session->userdata('login_id');
		// purchase table insertion Start  /

		//  $buy_data['buy_code']=$buy_code;
		$buy_data['supp_id'] = $this->input->post('supplier_name');
		$buy_data['memo_no'] = $this->input->post('bill_no');
		$buy_data['notation'] = $this->input->post('notation');
		$bill = $buy_data['total_price'] = $this->input->post('credit');
		$paid = $buy_data['paid_amount'] = $this->input->post('debit');
		$buy_data['amt_to_pay'] = $this->input->post('unload_cost');
		$buy_data['date'] = $this->input->post('date');
		$buy_data['total_amount'] = $buy_data['paid_amount'] + $buy_data['amt_to_pay'];
	   

		//  $buy_data['total_price']-

		$remain = $bill - $paid;

		if ($remain > 0) {

			$buy_data['due_amount'] = $remain;
		} elseif ($remain < 0) {

			$buy_data['advance_amount'] = abs($remain);
		}

		$buy_data['created_at'] = date('Y-m-d H:i:s');

		$buy_id = $this->Admin_model->insert_ret('purchases', $buy_data);


		if ($_FILES['files']['name']) {

			$data_img['file'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			
			$target_path = 'purchases_'.uniqid().'_'.$buy_id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/purchases/' . $target_path)) {
				$data_img['file'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/purchases/" . $target_path, "uploads/purchases/" . $target_path);
			}

			$this->Admin_model->update_function('id', $buy_id, 'purchases', $data_img);
		}

		// purchase table insertion end  //

		// purchase details  insertion start  //

		$p_id = $this->input->post('p_id');
		$buy_price = $this->input->post('price');
		$buy_qty = $this->input->post('buy_qty');


		for ($i = 0; $i < count($p_id); $i++) {

			

		//buy details table insertion end  //
		
			$pur_detls['purchase_id'] = $buy_id;
			$pur_detls['product_id'] = $p_id[$i];
			$pur_detls['price'] = $buy_price[$i];
			$pur_detls['qty'] = $buy_qty[$i];

			$pur_detls['created_at'] = date('Y-m-d H:i:s');
			$this->Admin_model->insert('purchase_details', $pur_detls);

			

			//stock table insertion start //

			$stockCheck = $this->Admin_model->select_with_where('*', 'product_id=' . $p_id[$i] . '', 'stock');

			if(count($stockCheck)>0)
			{
				
				$stockHistory = [];
				$update = [];
				$update['stock']= $stockHistory['current_stock'] = $stockCheck[0]['stock']+$buy_qty[$i];
				$update['product_id']= $stockHistory['product_id'] = $p_id[$i];
				$update['updated_at'] = date('Y-m-d H:i:s');

				$stock_update = $this->Admin_model->update_function('product_id', $p_id[$i], 'stock', $update);


				$stockHistory['qty'] = $buy_qty[$i];
				$stockHistory['previous_stock'] = $stockCheck[0]['stock'];

				$this->Admin_model->insert('stock_histories', $stockHistory);

			}else{
				$stock = []; 
				$stock['stock'] = $stockHistory['current_stock'] = $buy_qty[$i];
				$stock['product_id'] = $stockHistory['product_id'] = $p_id[$i];
				$stock['created_at'] = date('Y-m-d H:i:s');
				$stock_save = $this->Admin_model->insert('stock', $stock);

				$stockHistory['previous_stock'] = 0;
				$stockHistory['qty'] = $buy_qty[$i];

				
				$stock_save = $this->Admin_model->insert('stock_histories', $stockHistory);
			}


				//  Stock Report table insertion start //

				$date = date('Y-m-d');
				$condition = "product_id= '" . $p_id[$i]."' and date='".$date."'";

				$stockReport = $this->Admin_model->select_with_where('*',$condition , 'stock_reports');


				if(count($stockReport)>0)
				{
				$insertStockUpdate = [];
				$insertStockUpdate['purchase_qty'] = $stockReport[0]['purchase_qty']+$buy_qty[$i];
				$insertStockUpdate['updated_at'] = date('Y-m-d H:i:s');


				$stock_report_update = $this->Admin_model->update_with_codition($condition,'stock_reports', $insertStockUpdate);

				}else{
					
				$product = $this->Admin_model->select_with_where('*', "pro_id= '" . $p_id[$i]."'", 'product');

					$insertStockReport = [];
					$insertStockReport['product_id'] = $p_id[$i];
					$insertStockReport['product_name'] = $product[0]['product_name'];
					$insertStockReport['opening_stock'] = count($stockCheck)> 0 ? $stockCheck[0]['stock'] : 0;
					$insertStockReport['purchase_qty'] = $buy_qty[$i];
					$insertStockReport['date'] = date('Y-m-d');
					$insertStockReport['created_at'] = date('Y-m-d H:i:s');


					$stock_report_save = $this->Admin_model->insert('stock_reports', $insertStockReport);
				}


		}


		// ===== stock_reports table insertation Ends ======

		redirect('admin/add_purchase_form','refresh');
	}



	public function view_purchase_details($id)

	{

		$data['purchase_details'] = $this->Admin_model->purchase_details($id);

		$this->load->view('purchase/view_purchase_details', $data);
	}


	public function add_purchase_form()

	{   // purchase product 


		$data['supp_list'] = $this->Admin_model->select_with_where('*', 'sup_status=1', 'supplier');
	   $data['product_list'] = $this->Admin_model->select_with_where('*', 'pro_status=1', 'product');
		 $data['color_list'] = $this->Admin_model->select_with_where('*', 'status=1', 'color');

		$this->load->view('purchase/purchase_product_form', $data);
	}


	public function edit_purchase($id)
	{

	   $data['supp_list'] = $this->Admin_model->select_with_where('*', 'sup_status=1', 'supplier');
	   $data['product_list'] = $this->Admin_model->select_with_where('*', 'pro_status=1', 'product');
		
		$data['purchase_products']=$this->Admin_model->select_with_where('*', 'purchase_id='.$id, 'purchase_details');
	   
	  
		
		 $data['purchase_edit']=$this->Admin_model->select_with_where('*', 'id='.$id, 'purchases');
		  $data['purchase_edit']= $data['purchase_edit'][0];
	   
	
		$this->load->view('purchase/edit', $data);

	}
	
	public function purchaseUpdate($id='')
	{
		$login_id = $this->session->userdata('login_id');
		// purchase table insertion Start  /
	   $buy_id=$id;

		$buy_data['supp_id'] = $this->input->post('supplier_name');
		$buy_data['memo_no'] = $this->input->post('bill_no');
		$buy_data['notation'] = $this->input->post('notation');
		$bill = $buy_data['total_price'] = $this->input->post('credit');
		$paid = $buy_data['paid_amount'] = $this->input->post('debit');
		$buy_data['amt_to_pay'] = $this->input->post('unload_cost');
		$buy_data['date'] = $this->input->post('date');
		$buy_data['total_amount'] = $buy_data['paid_amount'] + $buy_data['amt_to_pay'];
	   if(!empty($_FILES['files']['name']))
	   {
		   $buy_data['file']=$this->input->post('old_file');
	   }
	   
		$remain = $bill - $paid;

		if ($remain > 0) {

			$buy_data['due_amount'] = $remain;
		} elseif ($remain < 0) {

			$buy_data['advance_amount'] = abs($remain);
		}

		$buy_data['created_at'] = date('Y-m-d H:i:s');

	 
		$this->Admin_model->update_function('id', $buy_id, 'purchases', $buy_data);


		if ($_FILES['files']['name']) {

			$data_img['file'] = '';
			$i_ext = explode('.', $_FILES['files']['name']);
			
			$target_path = 'purchases_'.uniqid().'_'.$buy_id.'_'. $login_id .'.' . end($i_ext);

			$size = getimagesize($_FILES['files']['tmp_name']);

			if (move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/purchases/' . $target_path)) {
				$data_img['file'] = $target_path;
			}


			if ($size[0] == 1918 || $size[1] == 629) { } else {
				$imageWidth = 1918; //Contains the Width of the Image

				$imageHeight = 629;

				$this->resize($imageWidth, $imageHeight, "uploads/purchases/" . $target_path, "uploads/purchases/" . $target_path);
			}

			$this->Admin_model->update_function('id', $buy_id, 'purchases', $data_img);
		}

		// purchase table insertion end  //

		// purchase details  insertion start  //

		$p_id = $this->input->post('p_id');
	  
	   
		$buy_price = $this->input->post('price');
		$buy_qty = $this->input->post('buy_qty');
		
		$this->Admin_model->delete_query('purchase_id',$buy_id,'purchase_details');
		if(count($p_id)>0)
		{
		  for ($i = 0; $i < count($p_id); $i++) {

			

		//buy details table insertion end  //
		   
				$pur_detls['purchase_id'] = $buy_id;
			$pur_detls['product_id'] = $p_id[$i];
			$pur_detls['price'] = $buy_price[$i];
			$pur_detls['qty'] = $buy_qty[$i];

			$pur_detls['created_at'] = date('Y-m-d H:i:s');
			$this->Admin_model->insert('purchase_details', $pur_detls);
			
			

			

			//stock table insertion start //
	 
			if(!empty($p_id[$i]))
			{
			   $stockCheck = $this->Admin_model->select_with_where('*', 'product_id='.$p_id[$i], 'stock'); 
			}
			else{
				$stockCheck=[];
			}
			
		   
			

			if(count($stockCheck)>0)
			{
				
				$stockHistory = [];
				$update = [];
				$update['stock']= $stockHistory['current_stock'] = $stockCheck[0]['stock']+$buy_qty[$i];
				$update['product_id']= $stockHistory['product_id'] = $p_id[$i];
				$update['updated_at'] = date('Y-m-d H:i:s');

				$stock_update = $this->Admin_model->update_function('product_id', $p_id[$i], 'stock', $update);


				$stockHistory['qty'] = $buy_qty[$i];
				$stockHistory['previous_stock'] = $stockCheck[0]['stock'];

				$this->Admin_model->insert('stock_histories', $stockHistory);

			}else{
				$stock = []; 
				$stock['stock'] = $stockHistory['current_stock'] = $buy_qty[$i];
				$stock['product_id'] = $stockHistory['product_id'] = $p_id[$i];
				$stock['created_at'] = date('Y-m-d H:i:s');
				$stock_save = $this->Admin_model->insert('stock', $stock);

				$stockHistory['previous_stock'] = 0;
				$stockHistory['qty'] = $buy_qty[$i];

				
				$stock_save = $this->Admin_model->insert('stock_histories', $stockHistory);
			}


				//  Stock Report table insertion start //

				$date = date('Y-m-d');
				$condition = "product_id= '" . $p_id[$i]."' and date='".$date."'";

				$stockReport = $this->Admin_model->select_with_where('*',$condition , 'stock_reports');


				if(count($stockReport)>0)
				{
				$insertStockUpdate = [];
				$insertStockUpdate['purchase_qty'] = $stockReport[0]['purchase_qty']+$buy_qty[$i];
				$insertStockUpdate['updated_at'] = date('Y-m-d H:i:s');


				$stock_report_update = $this->Admin_model->update_with_codition($condition,'stock_reports', $insertStockUpdate);

				}else{
					
				$product = $this->Admin_model->select_with_where('*', "pro_id= '" . $p_id[$i]."'", 'product');

					$insertStockReport = [];
					$insertStockReport['product_id'] = $p_id[$i];
					$insertStockReport['product_name'] = $product[0]['product_name'];
					$insertStockReport['opening_stock'] = count($stockCheck)> 0 ? $stockCheck[0]['stock'] : 0;
					$insertStockReport['purchase_qty'] = $buy_qty[$i];
					$insertStockReport['date'] = date('Y-m-d');
					$insertStockReport['created_at'] = date('Y-m-d H:i:s');


					$stock_report_save = $this->Admin_model->insert('stock_reports', $insertStockReport);
				}


		}  
		}

		


		// ===== stock_reports table insertation Ends ======

		redirect('admin/edit_purchase/'.$buy_id,'refresh');
	
	}
	

	// === Ajax code fucntions for purchase  start === ///



	public function get_price()
	{
		$product_id = $this->input->post('p_id');
		$get_price = $this->Admin_model->select_with_where('*', 'pro_id=' . $product_id, 'product');
		//echo "<pre>";print_r($get_price);die();
		echo '<input id="price_id_0" type="text" class="form-control align-right subtotal" name="price" value="' . $get_price[0]['pro_price'] . '" readonly="">';
		echo '<span class="purchase_tk_mark">৳</span>';
	}

	public function get_product_details_ajax()
	{
		$p_id = $this->input->post('p_id');
		$p_details = $this->Admin_model->select_with_where('*', 'pro_id=' . $p_id, 'product');
		// echo "<pre>";print_r($p_details);die();
		echo json_encode($p_details);
	}

	//===  Ajax code fucntions  for purchase Ends ====/// 

	





	// ============== Manage Purchase  Products Ends==============/////


		// ============== Chart box =========///

		public function send_msg()
	{

			
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['subject'] = $this->input->post('subject');
			$data['mobile_no'] = $this->input->post('mobile_no');
			$data['message'] = $msg = $this->input->post('message');
			$data['created_at'] = date('Y-m-d H:i:s');
		
			$this->Admin_model->insert('customer_msg', $data);

			
			}
			
			public function message()
			{
		
		
			$data['msg_list'] = $this->Admin_model->select_with_where('*', 'status=1','customer_msg');

			$this->load->view('message/message_list', $data);

			}


		public function reply_message($id){

			 $data['reply_list'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'customer_msg');

			$this->load->view('message/reply_message',$data);

		}


		public function delete_message($id ='')
		{
			
			$data['status'] = 2;
			$id = $id;
			$this->Admin_model->update_function('id', $id,'customer_msg', $data);

			// print_r($data);die();

			redirect('admin/message','refresh');
		}


		

	
// ======= ****  Email function  start ****  =======//

public function send_email_function()

{
	
	

	
	
	
	$email=$this->input->post('msg_to');
	$userMsg = $this->input->post('msg');
	
	
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
	$this->email->subject('From Cmart Admin(Message Replied)');
	$msg = '<!DOCTYPE html>
	   <html lang="en">
	   <body style="margin:0px auto;width:80%;">
	   <div style="margin: 0;padding:50px!important;
			background:#f5f5f569;
			box-shadow: 10px 10px 10px 10px #d4d2d2;border-radius: 15px 15px 0px 0px;">
		 <img style="width:100px;" class="mx-auto mt-4" src="http://cmart.com.bd/frontassets/images/logo.png" alt="Cmart-image">
		 <hr>
			<p style="margin:10px:color:#000;">Dear-Shopper <span style="font-size:20px;">&#128515;
			</span><br>
		  
		   <p> <h4 style="line-height: 30.5px;color: #000;
	text-align: justify;
	font-weight: 500;">&#10024;
		   '.$userMsg.' &#10024;
		   
	</h4>
		   </p><br>
		 
		
			</p>
	   
		<p>Thanks By</p>
		<p>Cmart-Team .....</p><br>
		 <p style="text-transform: uppercase;">Any question, query or complain please contact us</p>
			<p> &#10004; Contact Us: Cmart limited</p>
			<p><span style="font-size:17px;">&#9742;</span> Cell-NO: +8809639177929</p>
			<p>&#9993; Mail: care@cmart.com.bd</p>
   
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
	
	$this->email->message($msg);
	 $this->email->set_mailtype('html');
	$this->email->send();
	
	redirect('admin/message', 'refresh');

}

// ======= ****  Email function end ****  =======//

	// ============== Chart box Ends =========///

	// ====   newsletter  start ===========

		
	public function send_newsletter()
	{
		
		$data['email'] = $this->input->post('sub_email');
		$data['created_at'] = date('Y-m-d H:i:s');
		$save = $this->Admin_model->insert('newsletter_tbl', $data);
			
	}
	public function news_letter()
	{


	$data['news_letter_list'] = $this->Admin_model->select_with_where('*', 'status=1','newsletter_tbl');
	$this->load->view('newsletter/news_lter_list', $data);

		}

		public function delete_news_letter($id = '')
		{
			
			$data['status'] = 2;
			$id = $id;
			$this->Admin_model->update_function('id', $id,'newsletter_tbl', $data);

			// print_r($data);die();

			redirect('admin/news_letter', 'refresh');
		}


  //      ========  Faq Starts ==========///
  public function faq()
  {

	  $data['faq_data'] = $this->Admin_model->select_with_where('*', 'status=1', 'faq_tbl');
	  $this->load->view('faq/faq_list', $data);
  }
  public function add_faq()
  {

	  $this->load->view('faq/add_faq');
  }

  public function add_faq_post()
  {

	  $data['name'] = $this->input->post('faq_name');
	  $data['faq_ques'] = $this->input->post('faq_ques');
	  $data['faq_ans'] = $this->input->post('faq_ans');
	  $data['show_status'] = $this->input->post('show_status');
	 
	  $data['created_at'] = date('Y-m-d H:i:s');
	  $this->Admin_model->insert('faq_tbl', $data);
	  redirect('admin/faq','refresh');
  }

  public function edit_faq($id)
  {

	  $data['faq_data'] = $this->Admin_model->select_with_where('*', 'id=' . $id . '', 'faq_tbl');
	  $this->load->view('faq/edit_faq', $data);
  }

  public function update_faq_post($id)
  {

	  $data['name'] = $this->input->post('name');
	  $data['faq_ques'] = $this->input->post('faq_ques');
	  $data['faq_ans'] = $this->input->post('faq_ans');
	  $data['show_status'] = $this->input->post('show_status');
	  $data['created_at'] = date('Y-m-d h:i:a');
	  $this->Admin_model->update_function('id', $id,'faq_tbl', $data);
	  redirect('admin/faq', 'refresh');

  }

  public function delete_faq_data($id ='')
  {
	  
	  $data['status'] = 2;
	  $id = $id;
	  $this->Admin_model->update_function('id', $id, 'faq_tbl', $data);

	  redirect('admin/faq', 'refresh');
  }

  //        ========  Faq Ends ==========///







		// ======  newsletter end ===========//

		////////////////////********  General Function Starts *******///////////////////////

 



	public function resize($width, $height, $source, $destination)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source;
		$config['overwrite'] = TRUE;
		$config['quality'] = "100%";
		$config['maintain_ratio'] = FALSE;
		$config['master_dim'] = 'height';
		$config['height'] = $height;
		$config['width'] = $width;
		$config['new_image'] = $destination;   
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
}

