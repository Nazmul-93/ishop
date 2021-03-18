<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct() 
	{
		$this->load->library("session");
		$this->load->model('Unit_model');
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
        $data['data'] = $this->Unit_model->select_with_where('*', 'deleted_at is NULL', 'units');
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
        
        $this->form_validation->set_rules('unit_name','Unit Name ','required');
        if ($this->form_validation->run()==FALSE) {
              $this->add();
        }else{ 
            $data['unit_name'] = ucfirst($this->input->post('unit_name'));
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->user_login_id;
        $save = $this->Unit_model->insert_ret('units', $data);

        if ($save)
            $this->setSessionSuccessMessage('Unit save Successfully');
        else
            $this->setSessionErrorMessage('Unable to Save unit');

        redirect('unit', 'refresh');
        }
	}
	 
	public function edit($id){
		$data['data'] = $this->Unit_model->select_with_where('*', 'unit_id=' . $id . '', 'units', 'row');
        $data['content']='edit';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
        
        
        $this->form_validation->set_rules('unit_name','Unit Name','required');
        if ($this->form_validation->run()==FALSE) {
              $this->edit($id);
        }else{

        $data['unit_name'] = ucfirst($this->input->post('unit_name'));
        $data['updated_at'] = date('Y-m-d h:i:a');
        $update = $this->Unit_model->update_function('unit_id', $id, 'units', $data);

        if ($update)
            $this->setSessionSuccessMessage('Unit update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update unit');
        redirect('unit', 'refresh');
        }
    }
    
    
    public function delete($id){
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $update = $this->Unit_model->update_function('unit_id', $id, 'units', $data);
            if($update)
                $this->setSessionSuccessMessage('Unit delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Unit');
        redirect('unit', 'refresh');
    }
    
    public function check_unitname_avalibility()  
    {  
    $unitname=  $this->input->post('unitname');
    $data=count($this->Unit_model->select_with_where('*', 'unit_name="' . $unitname .'"', 'units'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
}

