<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testpanel extends CI_Controller {

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
		'text' => 'Test Manager',
		'href' => base_url().adminpath.'/testpanel'
		);
		$data['heading']="Test Manager";
		$this->load->model(adminpath.'/model_testpanel');
		$this->load->model(adminpath.'/model_subject');
		$this->load->model(adminpath.'/model_schoollavel');

		if(isset($_GET['subject_id'])) {
			$subject_id=$_GET['subject_id']; 
			$data['subject_id']=$_GET['subject_id']; 
		}
		else {
			$subject_id=""; 
			$data['subject_id']=0; 
		}

		if(isset($_GET['schoollavel_id'])) {
			$schoollavel_id=$_GET['schoollavel_id']; 
			$data['schoollavel_id']=$_GET['schoollavel_id']; 
		}
		else {
			$schoollavel_id=""; 
			$data['schoollavel_id']=0; 
		}
		$data['alltestpanels']= array();	
		$fildata = array(
			'filter_pid' => 0,
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'subject_id' => $subject_id,
			'schoollavel_id' => $schoollavel_id,

		);
		$data['alltestpanels']=getadmintestpanel($fildata);

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


		$data['allschoollavels']= array();	

    	$results = $this->model_schoollavel->getschoollavels();

		if ($results) {  

			foreach($results as $val){

				$data['allschoollavels'][] = array(

					'id' => $val->id,

					'name' => $val->name

				);

			}

		}

		$data['deleteaction'] = base_url().adminpath.'/testpanel/delete';
		$data['activeaction'] = base_url().adminpath.'/testpanel/active';
		$data['inactiveaction'] = base_url().adminpath.'/testpanel/inactive';
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/testpanel',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function active(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testpanel');
			$this->model_testpanel->active($_POST['table_records']);
    	}
    	redirect(adminpath.'/testpanel');
    }
    public function inactive(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testpanel');
			$this->model_testpanel->inactive($_POST['table_records']);
    	}
    	redirect(adminpath.'/testpanel');
    }
    public function delete(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testpanel');
			$this->model_testpanel->delete($_POST['table_records']);
    	}
    	redirect(adminpath.'/testpanel');
    }
    public function add() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testpanel');
			$this->load->model(adminpath.'/model_subject');
			$this->load->model(adminpath.'/model_schoollavel');
			$postdata = array();

			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));
			$schoollavel_info = $this->model_schoollavel->getschoollavel($this->input->post('schoollavel_id'));
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."testpanel/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="testpanel/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['pid'] = $this->input->post('pid');
			$postdata['random'] = $this->input->post('random');
			
			$postdata['subject_id'] = $this->input->post('subject_id');
			$postdata['subject'] = $subject_info->name;
			$postdata['schoollavel_id'] = $this->input->post('schoollavel_id');
			$postdata['schoollavel'] = $schoollavel_info->name;
			
			$postdata['questionid'] = $this->input->post('questionid');
			$postdata['testoption'] = $this->input->post('testoption');
			$postdata['hour'] = $this->input->post('hour');
			$postdata['minutes'] = $this->input->post('minutes');
			
			$postdata['description'] = $this->input->post('description');
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = $this->input->post('status');
			$this->model_testpanel->add($postdata);
			$this->session->set_flashdata('testpanelmsg', 'Test Added Successfully.');
			redirect(adminpath.'/testpanel');
		}
		$this->getform();
		
    }	
     public function edit() {
        
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_testpanel');
			$this->load->model(adminpath.'/model_subject');
			$this->load->model(adminpath.'/model_schoollavel');

			$postdata = array();

			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));
			$schoollavel_info = $this->model_schoollavel->getschoollavel($this->input->post('schoollavel_id'));
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
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE."testpanel/".$expdoc_file) or $error = "Not Uploaded";
				$imgname="testpanel/".$expdoc_file;
				$postdata['image'] =$imgname;
			 }
			$postdata['name'] = $this->input->post('name');
			$postdata['pid'] = $this->input->post('pid');
			$postdata['random'] = $this->input->post('random');
			$postdata['language'] = $this->input->post('language');
			$postdata['subject_id'] = $this->input->post('subject_id');
			$postdata['subject'] = $subject_info->name;
			$postdata['schoollavel_id'] = $this->input->post('schoollavel_id');
			$postdata['schoollavel'] = $schoollavel_info->name;
			
			$postdata['questionid'] = $this->input->post('questionid');
			$postdata['testoption'] = $this->input->post('testoption');
			$postdata['hour'] = $this->input->post('hour');
			$postdata['minutes'] = $this->input->post('minutes');
			
			$postdata['totalpercentage'] = $this->input->post('totalpercentage');
		
			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
			$postdata['description'] = $this->input->post('description');
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = $this->input->post('status');


			$this->model_testpanel->edit($this->input->get('id'),$postdata);
			$this->session->set_flashdata('testpanelmsg', 'Modify Successfully.');
			redirect(adminpath.'/testpanel');
		}
		$this->getform();
		
    }	
    public function getform() {
		
		$this->load->model(adminpath.'/model_testpanel');
		$this->load->model(adminpath.'/model_subject');
		$this->load->model(adminpath.'/model_schoollavel');
			

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Test Manager',
		'href' => base_url().adminpath.'/testpanel'
		);
				
		if (!$this->input->get('id')) {
		$data['breadcrumbs'][] = array(
		'text' => 'Add Test',
		'href' => '#'
		);
		$data['heading']="Add Test";
		$data['action'] = base_url().adminpath.'/testpanel/add';
		} else {
		$data['breadcrumbs'][] = array(
		'text' => 'Edit Test',
		'href' => '#'
		);
		$data['heading']="Edit Test";
		$data['action'] = base_url().adminpath.'/testpanel/edit?id=' . $this->input->get('id');
		}
		
		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
      		$info = $this->model_testpanel->gettestpanel($this->input->get('id'));
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

		if ($this->input->post('subject_id')) {
      		$data['subject_id'] = $this->input->post('subject_id');
    	} elseif (isset($info)) {
			$data['subject_id'] = $info->subject_id;
		} else {
      		$data['subject_id'] = '';
    	}
		if ($this->input->post('schoollavel_id')) {
      		$data['schoollavel_id'] = $this->input->post('schoollavel_id');
    	} elseif (isset($info)) {
			$data['schoollavel_id'] = $info->schoollavel_id;
		} else {
      		$data['schoollavel_id'] = '';
    	}
    	if ($this->input->post('hour')) {
      		$data['hour'] = $this->input->post('hour');
    	} elseif (isset($info)) {
			$data['hour'] = $info->hour;
		} else {
      		$data['hour'] = '0';
    	}
    	if ($this->input->post('minutes')) {
      		$data['minutes'] = $this->input->post('minutes');
    	} elseif (isset($info)) {
			$data['minutes'] = $info->minutes;
		} else {
      		$data['minutes'] = '0';
    	}

    	if ($this->input->post('testoption')) {
      		$data['testoption'] = $this->input->post('testoption');
    	} elseif (isset($info)) {
			$data['testoption'] = $info->testoption;
		} else {
      		$data['testoption'] = 'Free';
    	}
		

		if ($this->input->post('status')) {
      		$data['status'] = $this->input->post('status');
    	} elseif (isset($info)) {
			$data['status'] = $info->status;
		} else {
      		$data['status'] = '';
    	}

    	if ($this->input->post('pid')) {
      		$data['pid'] = $this->input->post('pid');
    	} elseif (isset($info)) {
			$data['pid'] = $info->pid;
		} else {
      		$data['pid'] = '';
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

		$data['allschoollavels']= array();	
		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0
		);
    	$results = $this->model_schoollavel->getschoollavels($fildata);
		if ($results) {  
			foreach($results as $val){
				$data['allschoollavels'][] = array(
					'id' => $val->id,
					'name' => $val->name
				);
			}
		}
		if (isset($info)) {
			$data['randomno']=$info->random;
		}
		else{

			$data['randomno']=rand();
		}

		$data['ttlquestion']=0;
		$data['alltestpanelquestions']=array();
		if (isset($info)) {
			$results = $this->model_testpanel->gettestpanelquestions( $info->id);
			if ($results) {  
				foreach($results as $val){
					
					$data['ttlquestion']++;

					$questionaltotal=questionalreadyothertest($val->id,$info->id);
					$data['alltestpanelquestions'][] = array(
						'id' => $val->id,
						'name' => $val->name,
						'total' => $questionaltotal['total'],
						'alreadytestname' => $questionaltotal['questiondata']
					);
				}
			}
		}


		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0,
			'subject_id' => 0,
			'schoollavel_id' => 0
		);

		$results=getadmintestpanel($fildata);
		if ($results) {  
			foreach($results as $val){

				$data['alltestpanels'][] = array(
					'id' => $val['id'],
					'name' => $val['name']
				);
			}
		}

    	
		$data['cancel'] = base_url().adminpath.'/testpanel';
		
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/testpanelform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}