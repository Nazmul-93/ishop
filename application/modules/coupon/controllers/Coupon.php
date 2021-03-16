<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coupon extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct()  
	{ 
		$this->load->library("session");
		$this->load->model('Coupon_model');
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
        $data['data'] = $this->Coupon_model->select_with_where('*', 'deleted_at is NULL', 'coupons');
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
        
        $this->form_validation->set_rules('coupon_code','Coupon Code','required | is_unique');
        $this->form_validation->set_rules('discount_type','Discount Type','required');
        $this->form_validation->set_rules('discount','Discount','required');
        $this->form_validation->set_rules('start_date','Start Date','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        if ($this->form_validation->run()==FALSE) {
              $this->add();
        }else{
            $data['login_id'] = $this->user_login_id;
            $data['coupon_code'] = ucfirst($this->input->post('coupon_code'));
            $data['discount_type'] = $this->input->post('discount_type');
            $data['discount'] = $this->input->post('discount');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['day'] = $this->input->post('day');
            $data['min_purchase'] = $this->input->post('min_purchase');
            $data['status'] = $this->input->post('status');
            $data['created_at'] = date('Y-m-d H:i:s');
        
        $save = $this->Coupon_model->insert_ret('coupons', $data);

        if ($save)
            $this->setSessionSuccessMessage('Coupon save Successfully');
        else
            $this->setSessionErrorMessage('Unable to Save coupon');

        redirect('coupon', 'refresh');
        }
	}
	 
	public function edit($id){
		$data['data'] = $this->Coupon_model->select_with_where('*', 'coupon_id=' . $id . '', 'coupons', 'row');
        $data['content']='edit';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
        
        $this->form_validation->set_rules('coupon_code','Coupon Code','required');
        $this->form_validation->set_rules('discount_type','Discount Type','required');
        $this->form_validation->set_rules('discount','Discount','required');
        $this->form_validation->set_rules('start_date','Start Date','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        if ($this->form_validation->run()==FALSE) {
              $this->edit($id);
        }else{
            
            $data['coupon_code'] = ucfirst($this->input->post('coupon_code'));
            $data['discount_type'] = $this->input->post('discount_type');
            $data['discount'] = $this->input->post('discount');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['day'] = $this->input->post('day');
            $data['min_purchase'] = $this->input->post('min_purchase');
            $data['status'] = $this->input->post('status');
            $data['updated_at'] = date('Y-m-d h:i:a');
            
        $update = $this->Coupon_model->update_function('coupon_id', $id, 'coupons', $data);
        if ($update)
            $this->setSessionSuccessMessage('Coupon update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update coupon');
        redirect('coupon', 'refresh');
        }
    }
    
    
    public function delete($id){
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $update = $this->Coupon_model->update_function('coupon_id', $id, 'coupons', $data);
            if($update)
                $this->setSessionSuccessMessage('Coupon delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Coupon');
        redirect('coupon', 'refresh');
    }
    
    public function check_couponcode_avalibility()  
    {  
    $couponcode=  $this->input->post('couponcode');
    $data=count($this->Coupon_model->select_with_where('*', 'coupon_code="' . $couponcode .'"', 'coupons'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
    
   
}

