<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

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
		'text' => 'subject Manager',
		'href' => base_url().adminpath.'/subject'
		);
		$data['heading']="subject Manager";
		$this->load->model(adminpath.'/model_subject');

		$data['allsubjects']= array();	
		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0

		);
    	$results = $this->model_subject->getsubjects($fildata);
		if ($results) {  
			foreach($results as $val){
				$data['allsubjects'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'status' => $val->status,
					'href' => base_url().adminpath.'/subject/edit?id=' . $val->id
				);
			}
		}
		
		$data['deleteaction'] = base_url().adminpath.'/subject/delete';
		$data['activeaction'] = base_url().adminpath.'/subject/active';
		$data['inactiveaction'] = base_url().adminpath.'/subject/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/subject',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_subject');
			$this->model_subject->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/subject');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_subject');
			$this->model_subject->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/subject');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_subject');
			$this->model_subject->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/subject');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_subject');
			$postdata = array();
			
			$postdata['id'] = '';
			$schoollavel = $this->input->post('schoollavel');
			$postdata['name'] = $this->input->post('name');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['ordernum'] = $this->input->post('ordernum');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
			$postdata['status'] = '1';


			$checkname=$this->model_subject->checksubjectalready($postdata['name'],$this->session->userdata['logged_in']['id']);
			
			if($checkname){
				$this->session->set_flashdata('subjectnotify', 'subject name already exist.');
			}
			else{
				$this->model_subject->add($postdata,$schoollavel);
				$this->session->set_flashdata('subjectmsg', 'subject Added Successfully.');
			}

			redirect(adminpath.'/subject');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_subject');
			$postdata = array();
			 
			$schoollavel = $this->input->post('schoollavel');
			$postdata['id'] = $this->input->get('id');
			$postdata['name'] = $this->input->post('name');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['ordernum'] = $this->input->post('ordernum');
			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';

			
			$this->model_subject->edit($this->input->get('id'),$postdata,$schoollavel);
			$this->session->set_flashdata('subjectmsg', 'subject edit Successfully.');

			redirect(adminpath.'/subject');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_subject');
		$this->load->model(adminpath.'/model_schoollavel');			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'subject Manager',
		'href' => base_url().adminpath.'/subject'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add subject',
		'href' => '#'
		);
		$data['heading']="Add subject";
		$data['action'] = base_url().adminpath.'/subject/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit subject',
		'href' => '#'
		);
		$data['heading']="Edit subject";
		$data['action'] = base_url().adminpath.'/subject/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_subject->getsubject($this->input->get('id'));
    	}

		if ($this->input->post('name')) {
      		$data['name'] = $this->input->post('name');
    	} elseif (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
    	if ($this->input->post('pid')) {
      		$data['pid'] = $this->input->post('pid');
    	} elseif (isset($info)) {
			$data['pid'] = $info->pid;
		} else {
      		$data['pid'] = '';
    	}

    	if ($this->input->post('id')) {
      		$data['id'] = $this->input->post('id');
    	} elseif (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '';
    	}
		if ($this->input->post('ordernum')) {
      		$data['ordernum'] = $this->input->post('ordernum');
    	} elseif (isset($info)) {
			$data['ordernum'] = $info->ordernum;
		} else {
      		$data['ordernum'] = '';
    	}
		
    	$data['allsubjects']= array();	
    	$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0

		);
    	$results = $this->model_subject->getsubjects($fildata);
		if ($results) {  
			foreach($results as $val){
				$data['allsubjects'][] = array(
					'id' => $val->id,
					'name' => $val->name
				);
			}
		}


    	$data['allschoollavel']= array();	
    	$results = $this->model_schoollavel->getschoollavels(0);
		if ($results) {  
			foreach($results as $val){
				$catchecked="";
				if($this->model_subject->getsubjectschoollavel($data['id'],$val->id)){
					$catchecked="checked";
				}
				$data['allschoollavel'][] = array(
					'id' => $val->id,
					'catchecked' =>$catchecked,
					'name' => $val->name
				);
			}
		}



		$data['cancel'] = base_url().adminpath.'/subject';		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/subjectform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}