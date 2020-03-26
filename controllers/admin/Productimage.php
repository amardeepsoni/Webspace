<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productimage extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        $data="";
        $data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Product Image Manager',
		'href' => base_url().adminpath.'/productimage'
		);
		$data['heading']="Product Image Manager";
		$this->load->model(adminpath.'/model_productimage');
		$data['allproductimages']= array();	

		$data['allproductimages']= array();	
    	$results = $this->model_productimage->getproductimages();
		if ($results) {  
			foreach($results as $val){
				if($val->image) {	
					$thumbimage=resizeimage($val->image,100,80);
					$image = "<img src='".$thumbimage."' title='".$val->name."'/>";
				}
				else {
					$thumbimage=resizeimage('no_image.jpg',100,80);
					$image = "<img src='".$thumbimage."' title='".$val->name."'/>";
				}
				$data['allproductimages'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'productname' => $val->productname,
					'image' => $image,
					'status' => $val->status,
					'href' => base_url().adminpath.'/productimage/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/productimage/delete';
		$data['activeaction'] = base_url().adminpath.'/productimage/active';
		$data['inactiveaction'] = base_url().adminpath.'/productimage/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/productimage',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_productimage');
			$this->model_productimage->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/productimage');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_productimage');
			$this->model_productimage->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/productimage');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_productimage');
			$this->model_productimage->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/productimage');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_productimage');
			$postdata = array();
			if($_FILES['image']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx','.gif','.jpg','.jpeg','.png');			
				$expdoc_file=$_FILES['image']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."productimage/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="productimage/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }

			$postdata['name'] = $this->input->post('name');
			$postdata['description'] = $this->input->post('description');
			$postdata['product_id'] = $this->input->post('product_id');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_productimage->add($postdata);
			$this->session->set_flashdata('productimagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/productimage');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_productimage');
			$postdata = array();
			if($_FILES['image']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx','.gif','.jpg','.jpeg','.png');			
				$expdoc_file=$_FILES['image']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."productimage/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="productimage/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['description'] = $this->input->post('description');
			$postdata['product_id'] = $this->input->post('product_id');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_productimage->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('productimagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/productimage');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_productimage');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Product Image Manager',
		'href' => base_url().adminpath.'/image'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Product Image',
		'href' => '#'
		);
		$data['heading']="Add Product Image";
		$data['action'] = base_url().adminpath.'/productimage/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Product Image',
		'href' => '#'
		);
		$data['heading']="Edit Product Image";
		$data['action'] = base_url().adminpath.'/productimage/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_productimage->getproductimage($this->input->get('id'));
    	}

    	$this->load->model(adminpath.'/model_page');
    	$data['products'] = $this->model_page->getpages();

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
        if ($this->input->post('description')) {
      		$data['description'] = $this->input->post('description');
    	} elseif (isset($info)) {
			$data['description'] = $info->description;
		} else {
      		$data['description'] = '';
    	}
    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '0';
    	}


    	if ($this->input->post('product_id')) {
      		$data['product_id'] = $this->input->post('product_id');
    	} elseif (isset($info)) {
			$data['product_id'] = $info->product_id;
		} else {
      		$data['product_id'] = '0';
    	}

    	if (isset($info)) {
    		if($info->image) {	
					$thumbimage=resizeimage($info->image,100,80);
					$data['image'] = "<img src='".$thumbimage."' title='".$info->name."'/>";
				}
			else {
					$thumbimage=resizeimage('no_image.jpg',100,80);
					$data['image'] = "<img src='".$thumbimage."' title='".$info->name."'/>";
				}
    	}
    	else {
					$thumbimage=resizeimage('no_image.jpg',100,80);
					$data['image'] = "<img src='".$thumbimage."'/>";
				}
		$data['cancel'] = base_url().adminpath.'/productimage';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/productimageform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}