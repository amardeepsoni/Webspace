<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amenitiesnspecification extends CI_Controller {

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
		'text' => 'Amenities & Features and  Specification  Manager',
		'href' => base_url().adminpath.'/amenitiesnspecification'
		);
		$data['heading']="Amenities & Features and  Specification  Manager";
		$this->load->model(adminpath.'/model_amenitiesnspecification');
		$data['allamenitiesnspecifications']= array();	

		$data['allamenitiesnspecifications']= array();	
    	$results = $this->model_amenitiesnspecification->getamenitiesnspecifications();
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
				$data['allamenitiesnspecifications'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'productname' => $val->productname,
					'image' => $image,
					'status' => $val->status,
					'href' => base_url().adminpath.'/amenitiesnspecification/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/amenitiesnspecification/delete';
		$data['activeaction'] = base_url().adminpath.'/amenitiesnspecification/active';
		$data['inactiveaction'] = base_url().adminpath.'/amenitiesnspecification/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/amenitiesnspecification',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_amenitiesnspecification');
			$this->model_amenitiesnspecification->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/amenitiesnspecification');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_amenitiesnspecification');
			$this->model_amenitiesnspecification->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/amenitiesnspecification');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_amenitiesnspecification');
			$this->model_amenitiesnspecification->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/amenitiesnspecification');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_amenitiesnspecification');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."amenitiesnspecification/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="amenitiesnspecification/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }

			$postdata['name'] = $this->input->post('name');
			$postdata['amtorfeatuire'] = $this->input->post('amtorfeatuire');
			$postdata['iocn'] = $this->input->post('iocn');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['product_id'] = $this->input->post('product_id');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_amenitiesnspecification->add($postdata);
			$this->session->set_flashdata('productimagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/amenitiesnspecification');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_amenitiesnspecification');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."amenitiesnspecification/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="amenitiesnspecification/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['amtorfeatuire'] = $this->input->post('amtorfeatuire');
			$postdata['iocn'] = $this->input->post('iocn');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');	
			$postdata['product_id'] = $this->input->post('product_id');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_amenitiesnspecification->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('productimagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/amenitiesnspecification');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_amenitiesnspecification');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Amenities & Features and  Specification  Manager',
		'href' => base_url().adminpath.'/image'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Amenities & Features and  Specification ',
		'href' => '#'
		);
		$data['heading']="Add Amenities & Features and  Specification ";
		$data['action'] = base_url().adminpath.'/amenitiesnspecification/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Amenities & Features and  Specification ',
		'href' => '#'
		);
		$data['heading']="Edit Amenities & Features and  Specification ";
		$data['action'] = base_url().adminpath.'/amenitiesnspecification/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_amenitiesnspecification->getamenitiesnspecification($this->input->get('id'));
    	}

    	$this->load->model(adminpath.'/model_product');
    	$data['products'] = $this->model_product->getproducts();

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		if ($this->input->post('amtorfeatuire')) {
      		$data['amtorfeatuire'] = $this->input->post('amtorfeatuire');
    	} elseif (isset($info)) {
			$data['amtorfeatuire'] = $info->amtorfeatuire;
		} else {
      		$data['amtorfeatuire'] = '';
    	}
			if ($this->input->post('iocn')) {
      		$data['iocn'] = $this->input->post('iocn');
    	} elseif (isset($info)) {
			$data['iocn'] = $info->iocn;
		} else {
      		$data['iocn'] = '';
    	}
			if ($this->input->post('shortdescription')) {
      		$data['shortdescription'] = $this->input->post('shortdescription');
    	} elseif (isset($info)) {
			$data['shortdescription'] = $info->shortdescription;
		} else {
      		$data['shortdescription'] = '';
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
		$data['cancel'] = base_url().adminpath.'/amenitiesnspecification';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/amenitiesnspecificationform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}