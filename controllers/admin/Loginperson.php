<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginperson extends CI_Controller {

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
		'text' => 'Testimonial Manager',
		'href' => base_url().adminpath.'/loginperson'
		);
		$data['heading']="loginperson Manager";
		$this->load->model(adminpath.'/model_loginperson');
		

		$data['allimages']= array();	
    	$results = $this->model_loginperson->getimages();
		if ($results) {  
			foreach($results as $val){
			
				$data['allimages'][] = array(
					'id' => $val->id,
					'firstname' => $val->firstname,
					'lastname' => $val->lastname,
					'email' => $val->email,
					'mobile' => $val->mobile,				
					
					'href' => base_url().adminpath.'/loginperson/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/loginperson/delete';
		$data['activeaction'] = base_url().adminpath.'/loginperson/active';
		$data['inactiveaction'] = base_url().adminpath.'/loginperson/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/loginperson',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_loginperson');
			$this->model_loginperson->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/loginperson');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_loginperson');
			$this->model_loginperson->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/loginperson');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_loginperson');
			$this->model_loginperson->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/loginperson');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_loginperson');
			$postdata = array();
			
			$category = $this->input->post('category');				
			$postdata['name'] = $this->input->post('name');
			$postdata['designation'] = $this->input->post('designation');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['home'] = $this->input->post('home');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_loginperson->add($postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/loginperson');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_loginperson');
			$postdata = array();
		
			$category = $this->input->post('category');
			$postdata['name'] = $this->input->post('name');			
			$postdata['designation'] = $this->input->post('designation');
			$postdata['home'] = $this->input->post('home');
			$postdata['shortdescription'] = $this->input->post('shortdescription');
			$postdata['description'] = $this->input->post('description');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_loginperson->edit($this->input->get('id'),$postdata,$category);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/loginperson');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_loginperson');
		$this->load->model(adminpath.'/model_category');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'loginperson Manager',
		'href' => base_url().adminpath.'/loginperson'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add loginperson',
		'href' => '#'
		);
		$data['heading']="Add loginperson";
		$data['action'] = base_url().adminpath.'/loginperson/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit loginperson',
		'href' => '#'
		);
		$data['heading']="Edit loginperson";
		$data['action'] = base_url().adminpath.'/loginperson/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_loginperson->getimage($this->input->get('id'));
    	}

		
			if ($this->input->post('firstname')) {
      		$data['firstname'] = $this->input->post('firstname');
    	} elseif (isset($info)) {
			$data['firstname'] = $info->firstname;
		} else {
      		$data['firstname'] = '';
    	}
		
		
		
		
			if ($this->input->post('lastname')) {
      		$data['lastname'] = $this->input->post('lastname');
    	} elseif (isset($info)) {
			$data['lastname'] = $info->lastname;
		} else {
      		$data['lastname'] = '';
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
			
		
			

    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '0';
    	}

   
		$data['cancel'] = base_url().adminpath.'/Model_loginperson';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/loginpersonform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}