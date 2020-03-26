<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

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
		'text' => 'Testimonial Manager',
		'href' => base_url().adminpath.'/testimonials'
		);
		$data['heading']="Testimonials Manager";
		$this->load->model(adminpath.'/model_testimonials');
		

		$data['allimages']= array();	
    	$results = $this->model_testimonials->getimages();
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
					'href' => base_url().adminpath.'/testimonials/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/testimonials/delete';
		$data['activeaction'] = base_url().adminpath.'/testimonials/active';
		$data['inactiveaction'] = base_url().adminpath.'/testimonials/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/testimonials',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testimonials');
			$this->model_testimonials->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/testimonials');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testimonials');
			$this->model_testimonials->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/testimonials');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testimonials');
			$this->model_testimonials->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/testimonials');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testimonials');
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
			$postdata['designation'] = $this->input->post('designation');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['home'] = $this->input->post('home');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_testimonials->add($postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/testimonials');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testimonials');
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
			$postdata['designation'] = $this->input->post('designation');
			$postdata['home'] = $this->input->post('home');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_testimonials->edit($this->input->get('id'),$postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/testimonials');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_testimonials');
		$this->load->model(adminpath.'/model_category');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Testimonials Manager',
		'href' => base_url().adminpath.'/testimonials'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Testimonials',
		'href' => '#'
		);
		$data['heading']="Add Testimonials";
		$data['action'] = base_url().adminpath.'/testimonials/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Testimonials',
		'href' => '#'
		);
		$data['heading']="Edit Testimonials";
		$data['action'] = base_url().adminpath.'/testimonials/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_testimonials->getimage($this->input->get('id'));
    	}

		
			if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
				if ($this->input->post('designation')) {
      		$data['designation'] = $this->input->post('designation');
    	} elseif (isset($info)) {
			$data['designation'] = $info->designation;
		} else {
      		$data['designation'] = '';
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
		
					if ($this->input->post('home')) {
      		$data['home'] = $this->input->post('home');
    	} elseif (isset($info)) {
			$data['home'] = $info->home;
		} else {
      		$data['home'] = '';
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
		$data['cancel'] = base_url().adminpath.'/Model_Testimonials';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/testimonialsform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}