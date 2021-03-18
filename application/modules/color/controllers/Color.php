<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Color extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct() 
	{
		$this->load->library("session");
		$this->load->model('Color_model');
		$this->load->library('upload');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('inflector');
        $this->load->library('email');
        $this->load->library('form_validation');

		$this->user_login_id = $login_id = $this->session->userdata('login_id');
		
		 
		if($this->user_login_id =='')
		{
			$this->session->unset_userdata('login_id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('type');
			$this->session->set_userdata('log_err','Enter Email and Password First');
			redirect('login','refresh');
		}
	}
	
	public function index(){
        $data['data'] = $this->Color_model->select_with_where('*', 'deleted_at is NULL', 'colors');
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
        
        $this->form_validation->set_rules('color_title','Color Title ','required | is_unique');
        $this->form_validation->set_rules('color_code','Color Code ','required | is_unique');
        if ($this->form_validation->run()==FALSE) {
              $this->add();
        }else{
            $data['color_title'] = ucfirst($this->input->post('color_title'));
            $data['color_code'] = $this->input->post('color_code');
            $data['status'] = $this->input->post('status');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->user_login_id;
        
        $save = $this->Color_model->insert_ret('colors', $data);

        if ($save)
            $this->setSessionSuccessMessage('Color save Successfully');
        else
            $this->setSessionErrorMessage('Unable to Save color');

        redirect('color', 'refresh');
        }
	}
	 
	public function edit($id){
		$data['data'] = $this->Color_model->select_with_where('*', 'color_id=' . $id . '', 'colors', 'row');
        $data['content']='edit';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
        
        
        $this->form_validation->set_rules('color_title','Color Title ','required');
        $this->form_validation->set_rules('color_code','Color Code ','required');
        if ($this->form_validation->run()==FALSE) {
              $this->edit($id);
        }else{

        $data['color_title'] = ucfirst($this->input->post('color_title'));
        $data['color_code'] = ($this->input->post('color_code'));
        $data['status'] = $this->input->post('status');
        $data['updated_at'] = date('Y-m-d h:i:a');
        $update = $this->Color_model->update_function('color_id', $id, 'colors', $data);

        if ($update)
            $this->setSessionSuccessMessage('Color update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update color');
        redirect('color', 'refresh');
        }
    }
    
    
    public function delete($id){
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $update = $this->Color_model->update_function('color_id', $id, 'colors', $data);
            if($update)
                $this->setSessionSuccessMessage('Color delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Color');
        redirect('color', 'refresh');
    }
    
    public function check_colorname_avalibility()  
    {  
    $colorname=  $this->input->post('colorname');
    $data=count($this->Color_model->select_with_where('*', 'color_title="' . $colorname .'"', 'colors'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
    
    public function check_colorcode_avalibility()  
    {  
    $colorcode=  $this->input->post('colorcode');
    $data=count($this->Color_model->select_with_where('*', 'color_code="' . $colorcode .'"', 'colors'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
}

