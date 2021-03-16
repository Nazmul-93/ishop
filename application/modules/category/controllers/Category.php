<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct() 
	{ 
		$this->load->library("session");
		$this->load->model('Category_model');
		$this->load->library('upload');
		$this->load->helper('text');
        $this->load->helper('common_helper');
		$this->load->helper(array('form', 'url'));

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
	
	public function index(){
        $data['all_category'] = $this->Category_model->select_all('categories');
        $data['parent_category'] = $this->Category_model->select_all('categories');
        $data['content']='index';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	 
	public function add(){
        $data['parent_category'] = $this->Category_model->select_all('categories');
		$data['content']='add';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	
	public function save(){
        $login_id =  $this->session->userdata('login_id');
        $data['category_name'] = $this->input->post('category_name');
        $data['slug'] = strtolower(create_slug($this->input->post('category_name')));
        if (empty($this->input->post('parent_id')))
        {

        }else{
         $data['parent_id'] = $this->input->post('parent_id');
        }
		$data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $login_id;
		$add_data = $this->Category_model->insert_ret('categories', $data);
        if($add_data)
            $this->setSessionSuccessMessage('Category Added Successfully');
        else
            $this->setSessionErrorMessage('Unable to Add Category');

        redirect('category', 'refresh');
	}
	
	public function edit($id){
        $data['parent_category'] = $this->Category_model->select_all('categories');
		$data['data'] = $this->Category_model->select_with_where('*', 'category_id=' . $id . '', 'categories', 'row');
        $data['content']='edit';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
		$lastImage = $this->Category_model->select_with_where('*','category_id=' . $id . '','categories');
        $login_id = $this->user_login_id;
        $data['category_name'] = $this->input->post('category_name');
        $data['slug'] = strtolower(create_slug($this->input->post('category_name')));
        if (empty($this->input->post('parent_id')))
        {

        }else{
         $data['parent_id'] = $this->input->post('parent_id');
        }
		$data['status'] = $this->input->post('status');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $update = $this->Category_model->update_function('category_id', $id, 'categories', $data);
        if($update)
            $this->setSessionSuccessMessage('Category update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update Category');
            redirect('category', 'refresh');
    }

    public function delete($id){
        
        $delete = $this->Category_model->delete_function_cond('categories','category_id='.$id);
            if($delete)
                $this->setSessionSuccessMessage('Category delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Category');
        
        redirect('category', 'refresh');
    }

    
    public function check_category_avalibility()  
    {  
    $category_name=  $this->input->post('category_name');
    $data=count($this->Category_model->select_with_where('*', 'category_name="' . $category_name .'"', 'categories'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
}

