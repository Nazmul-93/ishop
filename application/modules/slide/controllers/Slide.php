<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends MX_Controller {

    protected $user_login_id; 
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct() 
	{
		$this->load->library("session");
		$this->load->model('Slide_model');
		$this->load->library('upload');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('inflector');
        $this->load->library('email');

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
		$data['data'] = $this->Slide_model->select_all('slides');
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
        $login_id =   $this->session->userdata('login_id');
        $data['slide_name'] = $this->input->post('slide_name');
		$data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $login_id;
		$id = $this->Slide_model->insert_ret(' slides', $data);
		
        if ($_FILES['slide_img']['name']) {
			$data_img['slide_img'] = '';
            $i_ext = explode('.', $_FILES['slide_img']['name']);
			$target_path = 'slide_' . uniqid() . '_' . $id . '_.' . end($i_ext);
            $size = getimagesize($_FILES['slide_img']['tmp_name']);
            if (move_uploaded_file($_FILES['slide_img']['tmp_name'], 'uploads/slide/' . $target_path)) {
                $data_img['slide_img'] = $target_path; 
            }
            if ($size[0] == 1900 || $size[1] == 700) {
            } else { 
                $imageWidth = 1900;
                $imageHeight = 700;
                $this->resize($imageWidth, $imageHeight, "slide" . $target_path, "slide" . $target_path);
            }

            $add = $this->Slide_model->update_function('slide_id', $id, 'slides', $data_img);
        }
        if($add)
            $this->setSessionSuccessMessage('Slide add Successfully');
        else
            $this->setSessionErrorMessage('Unable to add slide');

        redirect('slide', 'refresh');
	}
	
	public function edit($id){
		$data['data'] = $this->Slide_model->select_with_where('*', 'slide_id=' . $id . '', 'slides', 'row');
		$data['content']='edit';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
		$lastImage = $this->Slide_model->select_with_where('*', 'slide_id=' . $id . '', 'slides');

        $login_id = $this->user_login_id;
        $data['slide_name'] = $this->input->post('slide_name');
		$data['status'] = $this->input->post('status');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $update = $this->Slide_model->update_function('slide_id', $id, 'slides', $data);

        if ($_FILES['slide_img']['name']) {
            $path_to_file = 'uploads/slide/' . $lastImage[0]['slide_img'];
            if ($lastImage[0]['slide_img'] != null)
                unlink($path_to_file);

            $data_img['slide_img'] = '';
            $i_ext = explode('.', $_FILES['slide_img']['name']);
            $target_path = 'slide_' . uniqid() . '_' . $id . '_' . $login_id . '.' . end($i_ext);
            $size = getimagesize($_FILES['slide_img']['tmp_name']);
            if (move_uploaded_file($_FILES['slide_img']['tmp_name'], 'uploads/slide/' . $target_path)) {
                $data_img['slide_img'] = $target_path;
                }
                if ($size[0] == 1900 || $size[1] == 700) {
                    } else {
                        $imageWidth = 1900;
                        $imageHeight = 700;
                        $this->resize($imageWidth, $imageHeight, "slide" . $target_path, "slide" . $target_path);
                    }
            $update = $this->Slide_model->update_function('slide_id', $id, 'slides', $data_img);
        }
 
        if($update)
            $this->setSessionSuccessMessage('Slide update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update Slide');
        redirect('slide', 'refresh');
    }
    public function delete($id){
        $lastImage = $this->Slide_model->select_with_where('*', 'slide_id=' . $id . '', 'slides');
        $path_to_file = 'uploads/slide/' . $lastImage[0]['slide_img'];
        unlink($path_to_file);
        
        $delete = $this->Slide_model->delete_function_cond('slides','slide_id='.$id);
            if($delete)
                $this->setSessionSuccessMessage('Slide delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Slide');
        
        redirect('slide', 'refresh');
    }
    
    public function check_slide_avalibility()  
    {  
    $slidename=  $this->input->post('slidename');
    $data=count($this->Slide_model->select_with_where('*', 'slide_name="' . $slidename .'"', 'slides'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
}

