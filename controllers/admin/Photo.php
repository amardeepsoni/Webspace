<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller {

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
		'text' => 'photo Manager',
		'href' => base_url().adminpath.'/photo'
		);
		$data['heading']="photo Manager";
		$this->load->model(adminpath.'/model_photo');
		$data['allproducts']= array();	
    	$results = $this->model_photo->getproducts();
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
				$data['allproducts'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'category' => $val->category,
					'image' => $image,
					'status' => $val->status,
					'href' => base_url().adminpath.'/photo/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/photo/delete';
		$data['activeaction'] = base_url().adminpath.'/photo/active';
		$data['inactiveaction'] = base_url().adminpath.'/photo/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/photo',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_photo');
			$this->model_photo->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/photo');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_photo');
			$this->model_photo->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/photo');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_photo');
			$this->model_photo->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/photo');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_photo');
			$postdata = array();
			if($_FILES['bigimage']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx','.gif','.jpg','.jpeg','.png');			
				$expdoc_file=$_FILES['bigimage']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['bigimage']['tmp_name'], DIR_IMAGE."product/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="product/".$expdoc_file;
				$postdata['bigimage'] =$imgname;
			 }
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."product/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="product/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$category = $this->input->post('category');
			$postdata['home'] = $this->input->post('home');
			$postdata['name'] = $this->input->post('name');
			$postdata['mrpprice'] = $this->input->post('mrpprice');
			$postdata['linkname'] = $this->input->post('linkname');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['specification'] = $this->input->post('specification');
			$postdata['feature'] = $this->input->post('feature');
			$postdata['ordernum'] = $this->input->post('ordernum');			
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_photo->add($postdata,$category);
			$this->session->set_flashdata('photonotify', 'Username and Password not Valid.');
			redirect(adminpath.'/photo');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_photo');
			$postdata = array();
			if($_FILES['bigimage']['name'] <>'')
		 	{
				$allowed_filetypes = array('.pdf','.doc','.docx','.gif','.jpg','.jpeg','.png');			
				$expdoc_file=$_FILES['bigimage']['name'];
				$expdoc_file = str_replace('','-',$expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file,'.'), strlen($expdoc_file)-1);
				if(!in_array($ext,$allowed_filetypes))
					die('The file you attempted to upload is not allowed.');
				$random_digit=rand(0000,9999);
				$expdoc_file=$random_digit.$expdoc_file;
				move_uploaded_file($_FILES['bigimage']['tmp_name'], DIR_IMAGE."product/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="product/".$expdoc_file;
				$postdata['bigimage'] =$imgname;
			 }
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."product/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="product/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$category = $this->input->post('category');
			$postdata['name'] = $this->input->post('name');
			$postdata['home'] = $this->input->post('home');
			$postdata['latest'] = $this->input->post('latest');
			$postdata['mrpprice'] = $this->input->post('mrpprice');
			$postdata['price'] = $this->input->post('price');
			$postdata['linkname'] = $this->input->post('linkname');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['specification'] = $this->input->post('specification');
			$postdata['feature'] = $this->input->post('feature');
			$postdata['ordernum'] = $this->input->post('ordernum');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_photo->edit($this->input->get('id'),$postdata,$category);
			$this->session->set_flashdata('photonotify', 'Username and Password not Valid.');
			redirect(adminpath.'/photo');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_photo');
		$this->load->model(adminpath.'/model_category');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'photo Manager',
		'href' => base_url().adminpath.'/photo'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add photo',
		'href' => '#'
		);
		$data['heading']="Add photo";
		$data['action'] = base_url().adminpath.'/photo/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit photo',
		'href' => '#'
		);
		$data['heading']="Edit photo";
		$data['action'] = base_url().adminpath.'/photo/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_photo->getproduct($this->input->get('id'));
    	}

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '0';
    	}
		
		if ($this->input->post('home')) {
      		$data['home'] = $this->input->post('home');
    	} elseif (isset($info)) {
			$data['home'] = $info->home;
		} else {
      		$data['home'] = '';
    	}

		if ($this->input->post('latest')) {
      		$data['latest'] = $this->input->post('latest');
    	} elseif (isset($info)) {
			$data['latest'] = $info->latest;
		} else {
      		$data['latest'] = '';
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
		
		
		
		
		if ($this->input->post('feature')) {
      		$data['feature'] = $this->input->post('feature');
    	} elseif (isset($info)) {
			$data['feature'] = $info->feature;
		} else {
      		$data['feature'] = '';
    	}
		
		
		if ($this->input->post('specification')) {
      		$data['specification'] = $this->input->post('specification');
    	} elseif (isset($info)) {
			$data['specification'] = $info->specification;
		} else {
      		$data['specification'] = '';
    	}
		
		
		
		  	if ($this->input->post('ordernum')) {
      		$data['ordernum'] = $this->input->post('ordernum');
    	} elseif (isset($info)) {
			$data['ordernum'] = $info->ordernum;
		} else {
      		$data['ordernum'] = '';
    	}

    	if ($this->input->post('price')) {
      		$data['price'] = $this->input->post('price');
    	} elseif (isset($info)) {
			$data['price'] = $info->price;
		} else {
      		$data['price'] = '';
    	}

    	if ($this->input->post('mrpprice')) {
      		$data['mrpprice'] = $this->input->post('mrpprice');
    	} elseif (isset($info)) {
			$data['mrpprice'] = $info->mrpprice;
		} else {
      		$data['mrpprice'] = '';
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
					$data['image'] = "<img src='".$thumbimage."' />";
			}
    	if (isset($info)) {
    		if($info->bigimage) {	
					$thumbimage=resizeimage($info->bigimage,100,80);
					$data['bigimage'] = "<img src='".$thumbimage."' title='".$info->name."'/>";
				}
			else {
					$thumbimage=resizeimage('no_image.jpg',100,80);
					$data['bigimage'] = "<img src='".$thumbimage."' title='".$info->name."'/>";
				}
    	}
    	else {
					$thumbimage=resizeimage('no_image.jpg',100,80);
					$data['bigimage'] = "<img src='".$thumbimage."' />";
				}

    	$data['allpcategory']= array();	
    	$results = $this->model_category->getcategorys(0);
		if ($results) {  
			foreach($results as $val){
				$subresults = $this->model_category->getcategorys($val->id);
				$subcategory= array();	 
				if ($subresults) { 
					foreach($subresults as $val1){
						$subresults1 = $this->model_category->getcategorys($val1->id);
						$subcategory1= array();	 
						if ($subresults1) {
							foreach($subresults1 as $val2){
								$catchecked="";
								if($this->model_photo->getproductcategory($data['id'],$val2->id)){
									$catchecked="checked";
								} 
								$subcategory1[] = array(
									'id' => $val2->id,
									'catchecked' => $catchecked,
									'name' => $val2->name
								);
							}
						}

						$catchecked="";
							if($this->model_photo->getproductcategory($data['id'],$val1->id)){
								$catchecked="checked";
							} 

						$subcategory[] = array(
							'id' => $val1->id,
							'name' => $val1->name,
							'catchecked' => $catchecked,
							'child' => $subcategory1
						);
					}
				}
				$catchecked="";
				if($this->model_photo->getproductcategory($data['id'],$val->id)){
					$catchecked="checked";
				}
				$data['allpcategory'][] = array(
					'id' => $val->id,
					'catchecked' =>$catchecked,
					'name' => $val->name,
					'child' => $subcategory
				);
			}
		}

		$data['cancel'] = base_url().adminpath.'/photo';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/photoform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}