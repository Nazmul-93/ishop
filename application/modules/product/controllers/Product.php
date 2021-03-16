<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MX_Controller {

    protected $user_login_id;
    
    // resize used in root Controller
    // setSessionSuccessMessage used in root Controller
    // setSessionErrorMessage used in root Controller

	function __construct() 
	{
		$this->load->library("session");
        $this->load->model('Product_model');
        $this->load->model('brand/Brand_model');
        $this->load->model('category/Category_model');
		$this->load->library('upload');
        $this->load->helper('text');
        $this->load->helper('common_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('inflector');
        $this->load->library('email');
        $this->load->library('form_validation');
        

		$this->user_login_id = $login_id = $this->session->userdata('login_id');
		// $name   =    $this->session->userdata('name');
		// $type   =    $this->session->userdata('type');
		 
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
        
        $data['data'] = $this->Product_model->select_with_where('*', 'deleted_at is NULL', 'products');
        $data['content']='index';
        $data['script']='script';
        $this->load->view('master/backend_master',$data);
		
	}
	
	public function add(){
        $data['brand_data'] = $this->Brand_model->select_all('brands');
        $data['category_data'] = $this->Category_model->select_all('categories');
		$data['content']='add';
        $data['script']='script'; 
        $this->load->view('master/backend_master',$data);
	}
	 
	public function save(){
        $this->form_validation->set_rules('product_name', 'DELL', 'required');
        $this->form_validation->set_rules('product_code', '0001', 'required');
        $this->form_validation->set_rules('product_price', '10000', 'required');
        $this->form_validation->set_rules('product_img', 'image', 'required');
        
        if($this->form_validation->run()==FALSE){
        // $data['empty_field'] = TRUE;
        // $this->setSessionSuccessMessage('filed is required');
        //     $this->session->set_flashdata('type', 'success');
		// $this->session->set_flashdata('msg', 'Data Updated Successfully');
            redirect('product/add', 'refresh');
            
		}else{
        $data['created_by'] = $this->user_login_id;
        $data['product_name'] = $this->input->post('product_name');
        $data['product_slug'] = strtolower(create_slug($this->input->post('product_name')));
        $data['product_code'] = $this->input->post('product_code');
        $data['quantity'] = $this->input->post('quantity');
        $data['short_description'] = $this->input->post('short_description');
        $data['long_description'] = $this->input->post('long_description');
        $data['product_model'] = $this->input->post('product_model');
        $data['featured_product'] = $this->input->post('featured_product');
        $data['product_price'] = $this->input->post('product_price');
        $data['product_discount_price'] = $this->input->post('product_discount_price');
        $data['discount_type'] = $this->input->post('discount_type');
        $data['warrenty'] = $this->input->post('warrenty');
        $data['guarantee'] = $this->input->post('guarantee');
        $data['category_id'] = $this->input->post('category_id');
        $data['brand_id'] = $this->input->post('brand_id');
        $data['color_id'] = $this->input->post('color_id');
        $data['supplier_id'] = $this->input->post('supplier_id');
		$data['status'] = $this->input->post('status');
        $data['created_at'] = date('Y-m-d H:i:s');
        
		$id = $this->Product_model->insert_ret(' products', $data);
		
        if ($_FILES['product_img']['name']) {
			$data_img['product_img'] = '';
            $i_ext = explode('.', $_FILES['product_img']['name']);
			$target_path = 'product_' . uniqid() . '_' . $id . '_.' . end($i_ext);
            $size = getimagesize($_FILES['product_img']['tmp_name']);
            if (move_uploaded_file($_FILES['product_img']['tmp_name'], 'uploads/product/' . $target_path)) {
                $data_img['product_img'] = $target_path; 
            }
            if ($size[0] == 800 || $size[1] == 800) {
            } else { 
                $imageWidth = 800;
                $imageHeight = 800;
                $this->resize($imageWidth, $imageHeight, "product" . $target_path, "product" . $target_path);
            }

            $add = $this->Product_model->update_function('product_id', $id, 'products', $data_img);
        }
        if($add)
            $this->setSessionSuccessMessage('Product add Successfully');
        else
            $this->setSessionErrorMessage('Unable to add product');

        redirect('product', 'refresh');
    }
}
	
	public function edit($id){
        $data['brand_data'] = $this->Brand_model->select_all('brands');
        $data['category_data'] = $this->Category_model->select_all('categories');
		$data['data'] = $this->Product_model->select_with_where('*', 'product_id=' . $id . '', 'products', 'row');
		$data['content']='edit';
        $this->load->view('master/backend_master',$data);
	}
	
	public function update($id){
		$lastImage = $this->Product_model->select_with_where('*', 'product_id=' . $id . '', 'products');

        $login_id = $this->user_login_id;
        $data['product_name'] = $this->input->post('product_name');
        $data['product_slug'] = strtolower(create_slug($this->input->post('product_name')));
        $data['product_code'] = $this->input->post('product_code');
        $data['quantity'] = $this->input->post('quantity');
        $data['short_description'] = $this->input->post('short_description');
        $data['long_description'] = $this->input->post('long_description');
        $data['product_model'] = $this->input->post('product_model');
        $data['featured_product'] = $this->input->post('featured_product');
        $data['product_price'] = $this->input->post('product_price');
        $data['product_discount_price'] = $this->input->post('product_discount_price');
        $data['discount_type'] = $this->input->post('discount_type');
        $data['product_img'] = $this->input->post('product_img');
        $data['point'] = $this->input->post('point');
        $data['warrenty'] = $this->input->post('warrenty');
        $data['guarantee'] = $this->input->post('guarantee');
        $data['category_id'] = $this->input->post('category_id');
        $data['brand_id'] = $this->input->post('brand_id');
        $data['color_id'] = $this->input->post('color_id');
        $data['supplier_id'] = $this->input->post('supplier_id');
		$data['status'] = $this->input->post('status');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $update = $this->Product_model->update_function('product_id', $id, 'products', $data);

        if ($_FILES['product_img']['name']) {
            $path_to_file = 'uploads/product/' . $lastImage[0]['product_img'];
            if ($lastImage[0]['product_img'] != null)
                unlink($path_to_file);

            $data_img['product_img'] = '';
            $i_ext = explode('.', $_FILES['product_img']['name']);
            $target_path = 'product_' . uniqid() . '_' . $id . '_' . $login_id . '.' . end($i_ext);
            $size = getimagesize($_FILES['product_img']['tmp_name']);
            if (move_uploaded_file($_FILES['product_img']['tmp_name'], 'uploads/product/' . $target_path)) {
                $data_img['product_img'] = $target_path;
                }
                if ($size[0] == 800 || $size[1] == 800) {
                    } else {
                        $imageWidth = 800; //Contains the Width of the Image
                        $imageHeight = 800;
                        $this->resize($imageWidth, $imageHeight, "product" . $target_path, "product" . $target_path);
                    }
            $update = $this->Product_model->update_function('product_id', $id, 'products', $data_img);
        }
 
        if($update)
            $this->setSessionSuccessMessage('Product update Successfully');
        else
            $this->setSessionErrorMessage('Unable to update product');
        redirect('product', 'refresh');
    }
    public function delete($id){
        
        $data['deleted_at'] = date('Y-m-d H:i:s');;
        $update = $this->Product_model->update_function('product_id', $id, 'products', $data);
            if($update)
                $this->setSessionSuccessMessage('Product delete successfully');
            else
                $this->setSessionErrorMessage('Unable to delete Product');
        
        redirect('product', 'refresh');
    }
    
    public function check_product_avalibility()  
    {  
    $productname=  $this->input->post('productname');
    $data=count($this->Product_model->select_with_where('*', 'product_name="' . $productname .'"', 'products'));
    if($data>0){  
        echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>This Name Already Exist </label>';  
        }else{  
        echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Available</label>';  
        } 
    } 
}

