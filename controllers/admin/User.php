<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

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
		'text' => 'User Manager',
		'href' => base_url().adminpath.'/user'
		);
		$data['heading']="User Manager";
		$this->load->model(adminpath.'/model_user');
		

		$data['allusers']= array();	
    	$results = $this->model_user->getusers();
		if ($results) {  
			foreach($results as $val){
				$data['allusers'][] = array(
					'id' => $val->id,
					'firstname' => $val->firstname,
					'lastname' => $val->lastname,
					'user_name' => $val->user_name,
					'email' => $val->user_email,
					'phone' => $val->phone,
					'href' => base_url().adminpath.'/user/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/user/delete';
		$data['activeaction'] = base_url().adminpath.'/user/active';
		$data['inactiveaction'] = base_url().adminpath.'/user/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/user',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_user');
			$this->model_user->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/user');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_user');
			$this->model_user->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/user');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_user');
			$this->model_user->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/user');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_user');
			$postdata = array();

			$usertype=$this->model_user->getusertype($this->input->post('usertype_id'));
					
			$postdata['firstname'] = $this->input->post('firstname');
			$postdata['lastname'] = $this->input->post('lastname');
			$postdata['usertype_id'] = $usertype->id;
			$postdata['usertype'] = $usertype->name;
			$postdata['user_name'] = $this->input->post('user_name');
			$postdata['user_email'] = $this->input->post('user_email');
			$postdata['pid'] = '1';
			$postdata['phone'] = $this->input->post('phone');
			$postdata['user_password'] = md5($this->input->post('password'));
			$menudata = $this->input->post('menu');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';

			$checkname=$this->model_user->checkcuseralready($postdata['user_name']);

			if($checkname){

				$this->session->set_flashdata('usernotify', 'User name already exist.');

			}

			else{
			$this->model_user->add($postdata,$menudata);
				$this->session->set_flashdata('usermsg', 'USer Added Successfully.');
			}
			redirect(adminpath.'/user');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_user');
			$postdata = array();
		
			$usertype=$this->model_user->getusertype($this->input->post('usertype_id'));
					
			$postdata['firstname'] = $this->input->post('firstname');
			$postdata['lastname'] = $this->input->post('lastname');
			$postdata['usertype_id'] = $usertype->id;
			$postdata['usertype'] = $usertype->name;
			$postdata['user_name'] = $this->input->post('user_name');
			$postdata['user_email'] = $this->input->post('user_email');
			$postdata['pid'] = '1';
			$postdata['phone'] = $this->input->post('phone');
			if($this->input->post('password')){
				$postdata['user_password'] = md5($this->input->post('password'));	
			}
			$menudata = $this->input->post('menu');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_user->edit($this->input->get('id'),$postdata,$menudata);
			$this->session->set_flashdata('imagenotify', 'Username and Password not Valid.');
			redirect(adminpath.'/user');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_user');
		$this->load->model(adminpath.'/model_category');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'User Manager',
		'href' => base_url().adminpath.'/user'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add User',
		'href' => '#'
		);
		$data['heading']="Add User";
		$data['action'] = base_url().adminpath.'/user/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit User',
		'href' => '#'
		);
		$data['heading']="Edit User";
		$data['action'] = base_url().adminpath.'/user/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_user->getuser($this->input->get('id'));
    	}

    	if ($this->input->post('usertype_id')) {
      		$data['usertype_id'] = $this->input->post('usertype_id');
    	} elseif (isset($info)) {
			$data['usertype_id'] = $info->usertype_id;
		} else {
      		$data['usertype_id'] = '';
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

    	if ($this->input->post('user_email')) {
      		$data['user_email'] = $this->input->post('user_email');
    	} elseif (isset($info)) {
			$data['user_email'] = $info->user_email;
		} else {
      		$data['user_email'] = '';
    	}

    	if ($this->input->post('user_name')) {
      		$data['user_name'] = $this->input->post('user_name');
    	} elseif (isset($info)) {
			$data['user_name'] = $info->user_name;
		} else {
      		$data['user_name'] = '';
    	}

    	if ($this->input->post('phone')) {
      		$data['phone'] = $this->input->post('phone');
    	} elseif (isset($info)) {
			$data['phone'] = $info->phone;
		} else {
      		$data['phone'] = '';
    	}
			

    	if ($this->input->post('user_password')) {
      		$data['user_password'] = $this->input->post('user_password');
    	} elseif (isset($info)) {
			$data['user_password'] = $info->user_password;
		} else {
      		$data['user_password'] = '';
    	}

    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '0';
    	}

    	$data['allmenus']= array();	
    	$results = $this->model_user->menus();
		if ($results) {  
			foreach($results as $val){

				$checked="";
				if($this->input->get('id')){
					
    			$menuresult = $this->model_user->checkusermenus($this->input->get('id'),$val->id);
    			if($menuresult){
    				$checked="checked";
    			}	
				}

				$data['allmenus'][] = array(
					'id' => $val->id,
					'checked' => $checked,
					'name' => $val->name,
				);
			}
		}

   
		$data['cancel'] = base_url().adminpath.'/Model_user';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/userform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}