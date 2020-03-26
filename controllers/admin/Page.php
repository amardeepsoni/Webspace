<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
		'text' => 'Page Manager',
		'href' => base_url().adminpath.'/page'
		);
		$data['heading']="Page Manager";
		$this->load->model(adminpath.'/model_page');
		$data['allpages']= array();	
		
		$results = $this->model_page->getpages();
		if ($results) {  
			foreach($results as $val){
				$data['allpages'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'status' => $val->status,
					'href' => base_url().adminpath.'/page/edit?id=' . $val->id
				);
			}
		}
		
		
			$data['allcategorys']= array();	
    	$results = $this->model_page->getcategorys(0);
		if ($results) {  
			foreach($results as $val){
				$subresults = $this->model_page->getcategorys($val->id);
				$subcategory= array();	 
				if ($subresults) { 
					foreach($subresults as $val1){

						$subresults1 = $this->model_page->getcategorys($val1->id);
						$subcategory1= array();	 
						if ($subresults1) { 
							foreach($subresults1 as $val2){
								$subcategory1[] = array(
									'id' => $val2->id,
									'name' => $val2->name,
									'status' => $val2->status,
									'href' => base_url().adminpath.'/page/edit?id=' . $val2->id
								);
							}
						}

						$subcategory[] = array(
							'id' => $val1->id,
							'name' => $val1->name,
							'child' => $subcategory1,
							'status' => $val1->status,
							'href' => base_url().adminpath.'/page/edit?id=' . $val1->id
						);
					}
				}
				$data['allcategorys'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'child' => $subcategory,
					'status' => $val->status,
					'href' => base_url().adminpath.'/page/edit?id=' . $val->id
				);
			}
		}
		
		
		
		
		
		
		
		
		
		$data['deleteaction'] = base_url().adminpath.'/page/delete';
		$data['activeaction'] = base_url().adminpath.'/page/active';
		$data['inactiveaction'] = base_url().adminpath.'/page/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/page',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_page');
			$this->model_page->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/page');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_page');
			$this->model_page->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/page');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_page');
			$this->model_page->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/page');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_page');
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
			if($_FILES['banner']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx','.gif','.jpg','.jpeg','.png');			
				$expdoc_file=$_FILES['banner']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['banner']['tmp_name'], DIR_IMAGE."cms/".$expdoc_file) or $error = "Not Uploaded";
				$banner="cms/".$expdoc_file;
				$postdata['banner'] =$banner;
			 }
			if($_FILES['pdf']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx');			
				$expdoc_file=$_FILES['pdf']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['pdf']['tmp_name'], DIR_IMAGE."cms/".$expdoc_file) or $error = "Not Uploaded";
				$pdf="cms/".$expdoc_file;
				$postdata['pdf'] =$pdf;
			 }
			$postdata['pid'] = $this->input->post('pid');
			$postdata['home'] = $this->input->post('home');
			$postdata['name'] = $this->input->post('name');
			$postdata['bannerhead'] = $this->input->post('bannerhead');
			$postdata['linkname'] = $this->input->post('linkname');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_page->add($postdata);
			$this->session->set_flashdata('pagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/page');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_page');
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
			if($_FILES['banner']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx','.gif','.jpg','.jpeg','.png');			
				$expdoc_file=$_FILES['banner']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['banner']['tmp_name'], DIR_IMAGE."cms/".$expdoc_file) or $error = "Not Uploaded";
				$banner="cms/".$expdoc_file;
				$postdata['banner'] =$banner;
			 }
			if($_FILES['pdf']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx');			
				$expdoc_file=$_FILES['pdf']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['pdf']['tmp_name'], DIR_IMAGE."cms/".$expdoc_file) or $error = "Not Uploaded";
				$pdf="cms/".$expdoc_file;
				$postdata['pdf'] =$pdf;
			 }
			$postdata['pid'] = $this->input->post('pid');
			$postdata['home'] = $this->input->post('home');
			$postdata['name'] = $this->input->post('name');
			$postdata['bannerhead'] = $this->input->post('bannerhead');
			$postdata['linkname'] = $this->input->post('linkname');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_page->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('pagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/page');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_page');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Page Manager',
		'href' => base_url().adminpath.'/page'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Page',
		'href' => '#'
		);
		$data['heading']="Add Page";
		$data['action'] = base_url().adminpath.'/page/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Page',
		'href' => '#'
		);
		$data['heading']="Edit Page";
		$data['action'] = base_url().adminpath.'/page/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_page->getpage($this->input->get('id'));
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

		if ($this->input->post('bannerhead')) {
      		$data['bannerhead'] = $this->input->post('bannerhead');
    	} elseif (isset($info)) {
			$data['bannerhead'] = $info->bannerhead;
		} else {
      		$data['bannerhead'] = '';
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
    	if (isset($info)) {
    		if($info->banner) {	
					$thumbimage=resizeimage($info->banner,100,80);
					$data['banner'] = "<img src='".$thumbimage."' title='".$info->name."'/>";
				}
			else {
					$thumbimage=resizeimage('no_image.jpg',100,80);
					$data['banner'] = "<img src='".$thumbimage."' title='".$info->name."'/>";
				}
    	}
		else {
				$thumbimage=resizeimage('no_image.jpg',100,80);
				$data['banner'] = "<img src='".$thumbimage."' />";
			}

    	if (isset($info)) {
    		if($info->pdf) {	
					$data['pdf'] = "<a href='".$info->pdf."' target='_blank'>Click Here </a>";
				}
			else {
					$data['pdf'] = "";
				}
    	}
    	else {
				$data['pdf'] = "";
		}
		
		
		
		
		$data['allcategorys']= array();	
    	$results = $this->model_page->getcategorys(0);
		if ($results) {  
			foreach($results as $val){
				$subresults = $this->model_page->getcategorys($val->id);
				$subcategory= array();	 
				if ($subresults) { 
					foreach($subresults as $val1){

						$subresults1 = $this->model_page->getcategorys($val1->id);
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
		
		
		
		
		
		
		

		$data['cancel'] = base_url().adminpath.'/page';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/pageform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}