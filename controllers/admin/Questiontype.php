<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questiontype extends CI_Controller {

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
		'text' => 'Question Type Manager',
		'href' => base_url().adminpath.'/questiontype'
		);
		$data['heading']="Question Type Manager";
		$this->load->model(adminpath.'/model_questiontype');
		$data['allquestiontypes']= array();


    	$results = $this->model_questiontype->getquestiontypes();
		if ($results) {  
			foreach($results as $val){
				$data['allquestiontypes'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'status' => $val->status,
					'href' => base_url().adminpath.'/questiontype/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/questiontype/delete';
		$data['activeaction'] = base_url().adminpath.'/questiontype/active';
		$data['inactiveaction'] = base_url().adminpath.'/questiontype/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/questiontype',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_questiontype');
			$this->model_questiontype->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/questiontype');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_questiontype');
			$this->model_questiontype->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/questiontype');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_questiontype');
			$this->model_questiontype->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/questiontype');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_questiontype');
			$postdata = array();
			$postdata['name'] = $this->input->post('name');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
			$postdata['status'] = '1';

			$checkname=$this->model_questiontype->checkquestiontypealready($postdata['name']);
			if($checkname){
				$this->session->set_flashdata('questiontypenotify', 'Question Type already exist.');
			}
			else{
				$this->model_questiontype->add($postdata);
				$this->session->set_flashdata('questiontypemsg', 'Question Type Added Successfully.');
			}
			redirect(adminpath.'/questiontype');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_questiontype');
			$postdata = array();
			$postdata['name'] = $this->input->post('name');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';
			$this->model_questiontype->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('questiontypemsg', 'Modify Successfully.');
			redirect(adminpath.'/questiontype');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_questiontype');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Question Type Manager',
		'href' => base_url().adminpath.'/questiontype'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Question Type',
		'href' => '#'
		);
		$data['heading']="Add Question Type";
		$data['action'] = base_url().adminpath.'/questiontype/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Question Type',
		'href' => '#'
		);
		$data['heading']="Edit Question Type";
		$data['action'] = base_url().adminpath.'/questiontype/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_questiontype->getquestiontype($this->input->get('id'));
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
    	
		$data['cancel'] = base_url().adminpath.'/questiontype';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/questiontypeform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}