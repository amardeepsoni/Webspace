<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

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
		'text' => 'Image & Video Manager',
		'href' => base_url().adminpath.'/image'
		);
		$data['heading']="Image & Video Manager";
		$this->load->model(adminpath.'/model_image');
		$data['allimages']= array();	

		$data['allimages']= array();	
    	$results = $this->model_image->getimages();
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
				$data['allimages'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'image' => $image,
					'status' => $val->status,
					'href' => base_url().adminpath.'/image/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/image/delete';
		$data['activeaction'] = base_url().adminpath.'/image/active';
		$data['inactiveaction'] = base_url().adminpath.'/image/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/image',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_image');
			$this->model_image->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/image');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_image');
			$this->model_image->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/image');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_image');
			$this->model_image->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/image');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_image');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."image/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="image/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$category = $this->input->post('category');
			$postdata['name'] = $this->input->post('name');
			$postdata['home'] = $this->input->post('home');
			$postdata['videos'] = $this->input->post('videos');
			$postdata['vidorimg'] = $this->input->post('vidorimg');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_image->add($postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/image');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_image');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."image/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="image/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$category = $this->input->post('category');
			$postdata['name'] = $this->input->post('name');
			$postdata['home'] = $this->input->post('home');
			$postdata['vidorimg'] = $this->input->post('vidorimg');
			$postdata['videos'] = $this->input->post('videos');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_image->edit($this->input->get('id'),$postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/image');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_image');
		$this->load->model(adminpath.'/model_category');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Image & Video Manager',
		'href' => base_url().adminpath.'/image'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Image & Video',
		'href' => '#'
		);
		$data['heading']="Add Image & Video";
		$data['action'] = base_url().adminpath.'/image/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Image',
		'href' => '#'
		);
		$data['heading']="Edit Image & Video";
		$data['action'] = base_url().adminpath.'/image/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_image->getimage($this->input->get('id'));
    	}
		
				if ($this->input->post('home')) {
      		$data['home'] = $this->input->post('home');
    	} elseif (isset($info)) {
			$data['home'] = $info->home;
		} else {
      		$data['home'] = '';
    	}
		
		

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
			if ($this->input->post('videos')) {
      		$data['videos'] = $this->input->post('videos');
    	} elseif (isset($info)) {
			$data['videos'] = $info->videos;
		} else {
      		$data['videos'] = '';
    	}
		
					if ($this->input->post('vidorimg')) {
      		$data['vidorimg'] = $this->input->post('vidorimg');
    	} elseif (isset($info)) {
			$data['vidorimg'] = $info->vidorimg;
		} else {
      		$data['vidorimg'] = '';
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
		$data['cancel'] = base_url().adminpath.'/image';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/imageform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}