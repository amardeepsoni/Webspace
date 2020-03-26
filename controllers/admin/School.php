<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }
        $data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Promoters Manager',
		'href' => base_url().adminpath.'/school'
		);
		$data['heading']="Promoters Manager";
		$this->load->model(adminpath.'/model_school');
		

		$data['allimages']= array();	
    	$results = $this->model_school->getimages();
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
					'id' => $val->category_id,
					'name' => $val->name,
					'image' => $image,
//					'status' => $val->status,
					'href' => base_url().adminpath.'/school/edit?id=' . $val->category_id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/school/delete';
		$data['activeaction'] = base_url().adminpath.'/school/active';
		$data['inactiveaction'] = base_url().adminpath.'/school/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/school',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_school');
			$this->model_school->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/school');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_school');
			$this->model_school->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/school');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_school');
			$this->model_school->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/school');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_school');
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
			$postdata['email'] = $this->input->post('email');
			$postdata['conperson'] = $this->input->post('conperson');
			$postdata['know'] = $this->input->post('know');
			$postdata['who'] = $this->input->post('who');
			$postdata['intern'] = $this->input->post('intern');
			$postdata['mobile'] = $this->input->post('mobile');
			$postdata['mobile1'] = $this->input->post('mobile1');
			$postdata['address'] = $this->input->post('address');
			$postdata['password'] = md5($this->input->post('password'));
			$postdata['mpassword'] = $this->input->post('mpassword');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_school->add($postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/school');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_school');
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
			$postdata['email'] = $this->input->post('email');
			$postdata['conperson'] = $this->input->post('conperson');
			$postdata['know'] = $this->input->post('know');
			$postdata['who'] = $this->input->post('who');
			$postdata['intern'] = $this->input->post('intern');
			$postdata['mobile'] = $this->input->post('mobile');
			$postdata['mobile1'] = $this->input->post('mobile1');
			$postdata['address'] = $this->input->post('address');
            $postdata['password'] = md5($this->input->post('password'));
			$postdata['mpassword'] = $this->input->post('mpassword');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_school->edit($this->input->get('id'),$postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/school');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_school');
		
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Promoters Manager',
		'href' => base_url().adminpath.'/school'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Promoters',
		'href' => '#'
		);
		$data['heading']="Add Promoters";
		$data['action'] = base_url().adminpath.'/school/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Promoters',
		'href' => '#'
		);
		$data['heading']="Edit Promoters";
		$data['action'] = base_url().adminpath.'/school/edit?id=' . $this->input->get('category_id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_school->getimage($this->input->get('id'));
    	}

		
			if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
				if ($this->input->post('email')) {
      		$data['email'] = $this->input->post('email');
    	} elseif (isset($info)) {
			$data['email'] = $info->email;
		} else {
      		$data['email'] = '';
    	}
				if ($this->input->post('mobile')) {
      		$data['mobile'] = $this->input->post('mobile');
    	} elseif (isset($info)) {
			$data['mobile'] = $info->mobile;
		} else {
      		$data['mobile'] = '';
    	}
			
			
			
			if ($this->input->post('mobile1')) {
      		$data['mobile1'] = $this->input->post('mobile1');
    	} elseif (isset($info)) {
			$data['mobile1'] = $info->mobile1;
		} else {
      		$data['mobile1'] = '';
    	}
			
			if ($this->input->post('address')) {
      		$data['address'] = $this->input->post('address');
    	} elseif (isset($info)) {
			$data['address'] = $info->address;
		} else {
      		$data['address'] = '';
    	}
		
					if ($this->input->post('conperson')) {
      		$data['conperson'] = $this->input->post('conperson');
    	} elseif (isset($info)) {
			$data['conperson'] = $info->conperson;
		} else {
      		$data['conperson'] = '';
    	}
		
		
		if ($this->input->post('know')) {
      		$data['know'] = $this->input->post('know');
    	} elseif (isset($info)) {
			$data['know'] = $info->know;
		} else {
      		$data['know'] = '';
    	}
		
		
		if ($this->input->post('who')) {
      		$data['who'] = $this->input->post('who');
    	} elseif (isset($info)) {
			$data['who'] = $info->who;
		} else {
      		$data['who'] = '';
    	}
		
		
		if ($this->input->post('intern')) {
      		$data['intern'] = $this->input->post('intern');
    	} elseif (isset($info)) {
			$data['intern'] = $info->intern;
		} else {
      		$data['intern'] = '';
    	}
		
		
		
		
		
		
		
		if ($this->input->post('password')) {
      		$data['password'] = $this->input->post('password');
    	} elseif (isset($info)) {
			$data['password'] = $info->password;
		} else {
      		$data['password'] = '';
    	}
		
		if ($this->input->post('mpassword')) {
      		$data['mpassword'] = $this->input->post('mpassword');
    	} elseif (isset($info)) {
			$data['mpassword'] = $info->mpassword;
		} else {
      		$data['mpassword'] = '';
    	}
		
		
		

    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->category_id;
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
		$this->load->view(adminpath.'/schoolform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}