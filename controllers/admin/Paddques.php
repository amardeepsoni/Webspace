<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paddques extends CI_Controller {

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
		'href' => base_url().adminpath.'/paddques'
		);
		$data['heading']="Product Image Manager";
		$this->load->model(adminpath.'/model_paddques');
		$data['allproductimages']= array();	

		$data['allproductimages']= array();	
    	$results = $this->model_paddques->getproductimages();
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
					'href' => base_url().adminpath.'/paddques/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/paddques/delete';
		$data['activeaction'] = base_url().adminpath.'/paddques/active';
		$data['inactiveaction'] = base_url().adminpath.'/paddques/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/paddques',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_paddques');
			$this->model_paddques->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/paddques');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_paddques');
			$this->model_paddques->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/paddques');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_paddques');
			$this->model_paddques->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/paddques');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_paddques');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."paddques/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="paddques/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }

			$postdata['name'] = $this->input->post('name');
			$postdata['option1'] = $this->input->post('option1');
			$postdata['option2'] = $this->input->post('option2');
			$postdata['option3'] = $this->input->post('option3');
			$postdata['option4'] = $this->input->post('option4');
			$postdata['option5'] = $this->input->post('option5');
			$postdata['description'] = $this->input->post('description');
			$postdata['product_id'] = $this->input->post('product_id');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_paddques->add($postdata);
			$this->session->set_flashdata('paddquesnotify', 'Username and Password not Valid.');
			redirect(adminpath.'/paddques');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_paddques');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."paddques/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="paddques/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['option1'] = $this->input->post('option1');
			$postdata['option2'] = $this->input->post('option2');
			$postdata['option3'] = $this->input->post('option3');
			$postdata['option4'] = $this->input->post('option4');
			$postdata['option5'] = $this->input->post('option5');
			$postdata['description'] = $this->input->post('description');
			$postdata['product_id'] = $this->input->post('product_id');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_paddques->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('paddquesnotify', 'Username and Password not Valid.');
			redirect(adminpath.'/paddques');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_paddques');
			
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
		$data['action'] = base_url().adminpath.'/paddques/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Product Image',
		'href' => '#'
		);
		$data['heading']="Edit Product Image";
		$data['action'] = base_url().adminpath.'/paddques/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_paddques->getproductimage($this->input->get('id'));
    	}

    	$this->load->model(adminpath.'/model_product');
    	$data['products'] = $this->model_product->getproductss();

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
		if ($this->input->post('option1')) {
      		$data['option1'] = $this->input->post('option1');
    	} elseif (isset($info)) {
			$data['option1'] = $info->option1;
		} else {
      		$data['option1'] = '';
    	}
		if ($this->input->post('option2')) {
      		$data['option2'] = $this->input->post('option2');
    	} elseif (isset($info)) {
			$data['option2'] = $info->option2;
		} else {
      		$data['option2'] = '';
    	}
		if ($this->input->post('option3')) {
      		$data['option3'] = $this->input->post('option3');
    	} elseif (isset($info)) {
			$data['option3'] = $info->option3;
		} else {
      		$data['option3'] = '';
    	}
		if ($this->input->post('option4')) {
      		$data['option4'] = $this->input->post('option4');
    	} elseif (isset($info)) {
			$data['option4'] = $info->option4;
		} else {
      		$data['option4'] = '';
    	}
		if ($this->input->post('option5')) {
      		$data['option5'] = $this->input->post('option5');
    	} elseif (isset($info)) {
			$data['option5'] = $info->option5;
		} else {
      		$data['option5'] = '';
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
		$data['cancel'] = base_url().adminpath.'/paddques';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/paddquesform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}