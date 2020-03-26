<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoollavel extends CI_Controller {

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
		'text' => 'schoollavel Manager',
		'href' => base_url().adminpath.'/schoollavel'
		);
		$data['heading']="schoollavel Manager";
		$this->load->model(adminpath.'/model_schoollavel');
		$data['allschoollavels']= array();	
		
		$results = $this->model_schoollavel->getschoollavels();
		if ($results) {  
			foreach($results as $val){
				$data['allschoollavels'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'status' => $val->status,
					'href' => base_url().adminpath.'/schoollavel/edit?id=' . $val->id
				);
			}
		}
		
		
			$data['allcategorys']= array();	
    	$results = $this->model_schoollavel->getcategorys(0);
		if ($results) {  
			foreach($results as $val){
				$subresults = $this->model_schoollavel->getcategorys($val->id);
				$subcategory= array();	 
				if ($subresults) { 
					foreach($subresults as $val1){

						$subresults1 = $this->model_schoollavel->getcategorys($val1->id);
						$subcategory1= array();	 
						if ($subresults1) { 
							foreach($subresults1 as $val2){
								$subcategory1[] = array(
									'id' => $val2->id,
									'name' => $val2->name,
									'status' => $val2->status,
									'href' => base_url().adminpath.'/schoollavel/edit?id=' . $val2->id
								);
							}
						}

						$subcategory[] = array(
							'id' => $val1->id,
							'name' => $val1->name,
							'child' => $subcategory1,
							'status' => $val1->status,
							'href' => base_url().adminpath.'/schoollavel/edit?id=' . $val1->id
						);
					}
				}
				$data['allcategorys'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'child' => $subcategory,
					'status' => $val->status,
					'href' => base_url().adminpath.'/schoollavel/edit?id=' . $val->id
				);
			}
		}
		
		
		
		
		
		
		
		
		
		$data['deleteaction'] = base_url().adminpath.'/schoollavel/delete';
		$data['activeaction'] = base_url().adminpath.'/schoollavel/active';
		$data['inactiveaction'] = base_url().adminpath.'/schoollavel/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/schoollavel',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_schoollavel');
			$this->model_schoollavel->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/schoollavel');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_schoollavel');
			$this->model_schoollavel->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/schoollavel');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_schoollavel');
			$this->model_schoollavel->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/schoollavel');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_schoollavel');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."cms/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="cms/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
		
		
			$postdata['pid'] = $this->input->post('pid');
			$postdata['home'] = $this->input->post('home');
			$postdata['name'] = $this->input->post('name');
			$postdata['linkname'] = $this->input->post('linkname');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['description'] = $this->input->post('description');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_schoollavel->add($postdata);
			$this->session->set_flashdata('schoollavelnotify', 'Username and Password not Valid.');
			redirect(adminpath.'/schoollavel');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_schoollavel');
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."cms/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="cms/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
		
		
			$postdata['pid'] = $this->input->post('pid');
			$postdata['home'] = $this->input->post('home');
			$postdata['name'] = $this->input->post('name');
			$postdata['linkname'] = $this->input->post('linkname');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['description'] = $this->input->post('description');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_schoollavel->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('schoollavelnotify', 'Username and Password not Valid.');
			redirect(adminpath.'/schoollavel');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_schoollavel');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'schoollavel Manager',
		'href' => base_url().adminpath.'/schoollavel'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add schoollavel',
		'href' => '#'
		);
		$data['heading']="Add schoollavel";
		$data['action'] = base_url().adminpath.'/schoollavel/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit schoollavel',
		'href' => '#'
		);
		$data['heading']="Edit schoollavel";
		$data['action'] = base_url().adminpath.'/schoollavel/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_schoollavel->getschoollavel($this->input->get('id'));
    	}

    	if ($this->input->post('pid')) {
      		$data['pid'] = $this->input->post('pid');
    	} elseif (isset($info)) {
			$data['pid'] = $info->pid;
		} else {
      		$data['pid'] = '';
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

		


    	if ($this->input->post('linkname')) {
      		$data['linkname'] = $this->input->post('linkname');
    	} elseif (isset($info)) {
			$data['linkname'] = $info->linkname;
		} else {
      		$data['linkname'] = '';
    	}

    	if ($this->input->post('page_title')) {
      		$data['page_title'] = $this->input->post('page_title');
    	} elseif (isset($info)) {
			$data['page_title'] = $info->page_title;
		} else {
      		$data['page_title'] = '';
    	}


    	if ($this->input->post('meta_keyword')) {
      		$data['meta_keyword'] = $this->input->post('meta_keyword');
    	} elseif (isset($info)) {
			$data['meta_keyword'] = $info->meta_keyword;
		} else {
      		$data['meta_keyword'] = '';
    	}


    	if ($this->input->post('meta_description')) {
      		$data['meta_description'] = $this->input->post('meta_description');
    	} elseif (isset($info)) {
			$data['meta_description'] = $info->meta_description;
		} else {
      		$data['meta_description'] = '';
    	}


    	

    	if ($this->input->post('description')) {
      		$data['description'] = $this->input->post('description');
    	} elseif (isset($info)) {
			$data['description'] = $info->description;
		} else {
      		$data['description'] = '';
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


    	
		
		
		
		$data['allcategorys']= array();	
    	$results = $this->model_schoollavel->getcategorys(0);
		if ($results) {  
			foreach($results as $val){
				$subresults = $this->model_schoollavel->getcategorys($val->id);
				$subcategory= array();	 
				if ($subresults) { 
					foreach($subresults as $val1){

						$subresults1 = $this->model_schoollavel->getcategorys($val1->id);
						$subcategory1= array();	 
						if ($subresults1) { 
							foreach($subresults1 as $val2){
								$subcategory1[] = array(
									'id' => $val2->id,
									'name' => $val2->name
								);
							}
						}

						$subcategory[] = array(
							'id' => $val1->id,
							'name' => $val1->name,
							'child' => $subcategory1
						);
					}
				}
				$data['allcategorys'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'child' => $subcategory
				);
			}
		}
		
		
		
		
		
		
		

		$data['cancel'] = base_url().adminpath.'/schoollavel';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/schoollavelform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}