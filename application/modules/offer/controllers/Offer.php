<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct()  
	{
		$this->load->library("session");
		$this->load->model('Offer_model');
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
        $data['data'] = $this->Offer_model->select_with_where('*', 'deleted_at is NULL', 'offers');
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
        
        $this->form_validation->set_rules('offer_name','Offer Title ','required');
        $this->form_validation->set_rules('offer_type','Offer Code ','required');
        $this->form_validation->set_rules('offer_amount','Offer Code ','required');
        $this->form_validation->set_rules('offer_start_date','Offer Code ','required');
        $this->form_validation->set_rules('offer_end_date','Offer Code ','required');
        if ($this->form_validation->run()==FALSE) {
              $this->add();
        }else{
            $data['login_id'] = $this->user_login_id;
            $data['offer_name'] = ucfirst($this->input->post('offer_name'));
            $data['offer_type'] = $this->input->post('offer_type');
            $data['offer_amount'] = $this->input->post('offer_amount');
            $data['offer_start_date'] = $this->input->post('offer_start_date');
            $data['offer_end_date'] = $this->input->post('offer_end_date');
            $data['status'] = $this->input->post('status');
            $data['created_at'] = date('Y-m-d H:i:s');
        
        $save = $this->Offer_model->insert_ret('offers', $data);

        if ($save)
            $this->setSessionSuccessMessage('Offer save Successfully');
        else
            $this->setSessionErrorMessage('Unable to Save offer');

        redirect('offer', 'refresh');
        }
	}
	 
	public function edit($id){
		$data['data'] = $this->Offer_model->select_with_where('*', 'offer_id=' . $id . '', 'offers', 'row');
        $data['content']='edit';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
        
        $this->form_validation->set_rules('offer_name','Offer Name','required');
        $this->form_validation->set_rules('offer_type','Offer Type','required');
        $this->form_validation->set_rules('offer_amount','Offer Amount','required');
        $this->form_validation->set_rules('offer_start_date','Offer Start Date','required');
        $this->form_validation->set_rules('offer_end_date','Offer End Date','required');
        if ($this->form_validation->run()==FALSE) {
              $this->edit($id);
        }else{
            
            $data['offer_name'] = ucfirst($this->input->post('offer_name'));
            $data['offer_type'] = $this->input->post('offer_type');
            $data['offer_amount'] = $this->input->post('offer_amount');
            $data['offer_start_date'] = $this->input->post('offer_start_date');
            $data['offer_end_date'] = $this->input->post('offer_end_date');
            $data['status'] = $this->input->post('status');
            $data['updated_at'] = date('Y-m-d h:i:a');
            
        $update = $this->Offer_model->update_function('offer_id', $id, 'offers', $data);
        if ($update)
            $this->setSessionSuccessMessage('Offer update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update offer');
        redirect('offer', 'refresh');
        }
    }
    
    
    public function delete($id){
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $update = $this->Offer_model->update_function('offer_id', $id, 'offers', $data);
            if($update)
                $this->setSessionSuccessMessage('Offer delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Offer');
        redirect('offer', 'refresh');
    }
    
   
}

