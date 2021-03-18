<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct() 
	{
		$this->load->library("session");
		$this->load->model('Brand_model');
		$this->load->library('upload');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('inflector');
        $this->load->library('email');

		$this->user_login_id = $login_id = $this->session->userdata('login_id');
		 
		if($this->user_login_id=='')
		{
			$this->session->unset_userdata('login_id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('type');
			$this->session->set_userdata('log_err','Enter Email and Password First');
			redirect('login','refresh');
		}
	}
	
	public function index(){
        $data['data'] = $this->Brand_model->select_with_where('*', 'deleted_at is NULL', 'brands');
        $data['content']='index';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
		
	}
	
	public function add(){
		$data['content']='add';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	
	public function save(){
        $this->form_validation->set_rules('brand_name','Brand Name','required');
            if (empty($_FILES['brand_img']['name'])) {
                $this->form_validation->set_rules('brand_img','Image','required');
            }
        if ($this->form_validation->run()==FALSE) {
              $this->add();
        }else{
       
            $data['brand_name'] = $this->input->post('brand_name');
            $data['status'] = $this->input->post('status');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->user_login_id;
            $id = $this->Brand_model->insert_ret(' brands', $data);
            
            if ($_FILES['brand_img']['name']) {
                $data_img['brand_img'] = '';
                $i_ext = explode('.', $_FILES['brand_img']['name']);
                $target_path = 'brand_' . uniqid() . '_' . $id . '_.' . end($i_ext);
                $size = getimagesize($_FILES['brand_img']['tmp_name']);
                if (move_uploaded_file($_FILES['brand_img']['tmp_name'], 'uploads/brand/' . $target_path)) {
                    $data_img['brand_img'] = $target_path; 
                }
                if ($size[0] == 120 || $size[1] == 80) {
                } else { 
                    $imageWidth = 120;
                    $imageHeight = 80;
                    $this->resize($imageWidth, $imageHeight, "brand" . $target_path, "brand" . $target_path);
                }

                $add = $this->Brand_model->update_function('brand_id', $id, 'brands', $data_img);
            }
            if($add)
                $this->setSessionSuccessMessage('Brand add Successfully');
            else
                $this->setSessionErrorMessage('Unable to add brand');

            redirect('brand', 'refresh');
        }
	}
	 
	public function edit($id){
		$data['data'] = $this->Brand_model->select_with_where('*', 'brand_id=' . $id . '', 'brands', 'row');
		$data['content']='edit';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
        $this->form_validation->set_rules('brand_name','Brand Name','required');
        if ($this->form_validation->run()==FALSE) {
              $this->edit($id);
        }else{
            $lastImage = $this->Brand_model->select_with_where('*', 'brand_id=' . $id . '', 'brands');

            $login_id = $this->user_login_id;
            $data['brand_name'] = $this->input->post('brand_name');
            $data['status'] = $this->input->post('status');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $update = $this->Brand_model->update_function('brand_id', $id, 'brands', $data);

            if ($_FILES['brand_img']['name']) {
                $path_to_file = 'uploads/brand/' . $lastImage[0]['brand_img'];
                if ($lastImage[0]['brand_img'] != null)
                    unlink($path_to_file);

                $data_img['brand_img'] = '';
                $i_ext = explode('.', $_FILES['brand_img']['name']);
                $target_path = 'brand_' . uniqid() . '_' . $id . '_' . $login_id . '.' . end($i_ext);
                $size = getimagesize($_FILES['brand_img']['tmp_name']);
                if (move_uploaded_file($_FILES['brand_img']['tmp_name'], 'uploads/brand/' . $target_path)) {
                    $data_img['brand_img'] = $target_path;
                    }
                    if ($size[0] == 120 || $size[1] == 80) {
                        } else {
                            $imageWidth = 120; //Contains the Width of the Image
                            $imageHeight = 80;
                            $this->resize($imageWidth, $imageHeight, "brand" . $target_path, "brand" . $target_path);
                        }
                $update = $this->Brand_model->update_function('brand_id', $id, 'brands', $data_img);
            }
    
            if($update)
                $this->setSessionSuccessMessage('Brand update Successfully');
            else
                $this->setSessionErrorMessage('Unable to update brand');
            redirect('brand', 'refresh');
        }
    }
    public function delete($id){
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $update = $this->Brand_model->update_function('brand_id', $id, 'brands', $data);
            if($update)
                $this->setSessionSuccessMessage('Brand delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Brand');
        
        redirect('brand', 'refresh');
    }
    
    public function check_brand_avalibility()  
    {  
    $brandname=  $this->input->post('brandname');
    $data=count($this->Brand_model->select_with_where('*', 'brand_name="' . $brandname .'"', 'brands'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
}

