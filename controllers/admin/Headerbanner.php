<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Headerbanner extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        $data=array();
        $data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Header Banner Manager',
		'href' => base_url().adminpath.'/headerbanner'
		);
		$data['heading']="Header Banner Manager";
		$this->load->model(adminpath.'/model_headerbanner');
		$data['allheaderbanners']= array();	
    	$results = $this->model_headerbanner->getheaderbanners();
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
				$data['allheaderbanners'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'image' => $image,
					'status' => $val->status,
					'href' => base_url().adminpath.'/headerbanner/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/headerbanner/delete';
		$data['activeaction'] = base_url().adminpath.'/headerbanner/active';
		$data['inactiveaction'] = base_url().adminpath.'/headerbanner/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/headerbanner',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_headerbanner');
			$this->model_headerbanner->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/headerbanner');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_headerbanner');
			$this->model_headerbanner->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/headerbanner');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_headerbanner');
			$this->model_headerbanner->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/headerbanner');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_headerbanner');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."headerbanner/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="headerbanner/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['heading1'] = $this->input->post('heading1');
			$postdata['heading2'] = $this->input->post('heading2');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_headerbanner->add($postdata);
			$this->session->set_flashdata('headerbannernotify', 'Username and Password not Valid.');
			redirect(adminpath.'/headerbanner');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_headerbanner');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."headerbanner/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="headerbanner/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['heading1'] = $this->input->post('heading1');
			$postdata['heading2'] = $this->input->post('heading2');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_headerbanner->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('headerbannernotify', 'Username and Password not Valid.');
			redirect(adminpath.'/headerbanner');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_headerbanner');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Header Banner Manager',
		'href' => base_url().adminpath.'/image'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Header Banner',
		'href' => '#'
		);
		$data['heading']="Add Header Banner";
		$data['action'] = base_url().adminpath.'/headerbanner/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Header Banner',
		'href' => '#'
		);
		$data['heading']="Edit Header Banner";
		$data['action'] = base_url().adminpath.'/headerbanner/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_headerbanner->getheaderbanner($this->input->get('id'));
    	}

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
		
				if ($this->input->post('heading1')) {
      		$data['heading1'] = $this->input->post('heading1');
    	} elseif (isset($info)) {
			$data['heading1'] = $info->heading1;
		} else {
      		$data['heading1'] = '';
    	}
		
				if ($this->input->post('heading2')) {
      		$data['heading2'] = $this->input->post('heading2');
    	} elseif (isset($info)) {
			$data['heading2'] = $info->heading2;
		} else {
      		$data['heading2'] = '';
    	}
		
		
		
		
		
		

    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '0';
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
		$data['cancel'] = base_url().adminpath.'/headerbanner';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/headerbannerform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}