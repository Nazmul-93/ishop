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
		$data['content']='index';
		$data['script']='script';

        $this->load->view('master/backend_master',$data);

		// $this->load->view('index',$data);
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
       
    }else{
        $data['user_list'] = $this->Admin_model->select_with_where('*','user_type=6','user_login');
    }
    $this->load->view('user_list',$data);
	}
	
	

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

