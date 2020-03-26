<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class chapter extends CI_Controller {



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

		'text' => 'Chapter Manager',

		'href' => base_url().adminpath.'/chapter'

		);

		$data['heading']="chapter Manager";

		$this->load->model(adminpath.'/model_chapter');



		$data['allchapters']= array();	


		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0

		);


    	$results = $this->model_chapter->getchapters($fildata);

		if ($results) {  

			foreach($results as $val){

				$data['allchapters'][] = array(

					'id' => $val->id,

					'name' => $val->name,

					'status' => $val->status,

					'href' => base_url().adminpath.'/chapter/edit?id=' . $val->id

				);

			}

		}

		

		$data['deleteaction'] = base_url().adminpath.'/chapter/delete';

		$data['activeaction'] = base_url().adminpath.'/chapter/active';

		$data['inactiveaction'] = base_url().adminpath.'/chapter/inactive';

		$this->load->view(adminpath.'/header');

		$this->load->view(adminpath.'/chapter',$data);

		$this->load->view(adminpath.'/footer');



    }

    public function active(){



		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_chapter');

			$this->model_chapter->active($_POST['table_records']);

    	}

    	redirect(adminpath.'/chapter');

    }

    public function inactive(){



		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_chapter');

			$this->model_chapter->inactive($_POST['table_records']);

    	}

    	redirect(adminpath.'/chapter');

    }

    public function delete(){



		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_chapter');

			$this->model_chapter->delete($_POST['table_records']);

    	}

    	redirect(adminpath.'/chapter');

    }

    public function add() {

        

		 if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_chapter');
			$this->load->model(adminpath.'/model_subject');

			$postdata = array();

			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));
			

			$postdata['id'] = '';

			$postdata['name'] = $this->input->post('name');

			$postdata['subject_id'] = $this->input->post('subject_id');

			$postdata['subject'] = $subject_info->name;

			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];

			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];

			$postdata['ordernum'] = $this->input->post('ordernum');

			$postdata['date_added'] = date('Y-m-d H:i:s');

			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];

			$postdata['status'] = '1';



			$checkname=$this->model_chapter->checkchapteralready($postdata['name'],$this->session->userdata['logged_in']['id']);

			if($checkname){

				$this->session->set_flashdata('chapternotify', 'Chapter name already exist.');

			}

			else{

				$this->model_chapter->add($postdata);

				$this->session->set_flashdata('chaptermsg', 'Chapter Added Successfully.');

			}



			redirect(adminpath.'/chapter');

		}

		$this->getform();

		

    }	

     public function edit() {

        

		 if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_chapter');
			$this->load->model(adminpath.'/model_subject');

			$postdata = array();
			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));

			 

			$postdata['id'] = $this->input->get('id');

			$postdata['name'] = $this->input->post('name');

			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
			
			$postdata['subject_id'] = $this->input->post('subject_id');

			$postdata['subject'] = $subject_info->name;

			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];

			$postdata['ordernum'] = $this->input->post('ordernum');

			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];

			$postdata['date_modify'] = date('Y-m-d H:i:s');

			$postdata['status'] = '1';



			

			$this->model_chapter->edit($this->input->get('id'),$postdata);

			$this->session->set_flashdata('chaptermsg', 'Chapter edit Successfully.');



			redirect(adminpath.'/chapter');

		}

		$this->getform();

		

    }	

    public function getform() {

		

		$this->load->model(adminpath.'/model_chapter');
		$this->load->model(adminpath.'/model_subject');

			

		$data['breadcrumbs'] = array();



		$data['breadcrumbs'][] = array(

		'text' => 'Home',

		'href' => '#'

		);

				

		$data['breadcrumbs'][] = array(

		'text' => 'Chapter Manager',

		'href' => base_url().adminpath.'/chapter'

		);

				

		if (!$this->input->get('id')) {

		$data['breadcrumbs'][] = array(

		'text' => 'Add Chapter',

		'href' => '#'

		);

		$data['heading']="Add Chapter";

		$data['action'] = base_url().adminpath.'/chapter/add';

		} else {

		$data['breadcrumbs'][] = array(

		'text' => 'Edit Chapter',

		'href' => '#'

		);

		$data['heading']="Edit Chapter";

		$data['action'] = base_url().adminpath.'/chapter/edit?id=' . $this->input->get('id');

		}

		

		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {

      		$info = $this->model_chapter->getchapter($this->input->get('id'));

    	}



		if ($this->input->post('name')) {

      		$data['name'] = $this->input->post('name');

    	} elseif (isset($info)) {

			$data['name'] = $info->name;

		} else {

      		$data['name'] = '';

    	}

		

		if ($this->input->post('subject_id')) {
      		$data['subject_id'] = $this->input->post('subject_id');
    	} elseif (isset($info)) {
			$data['subject_id'] = $info->subject_id;
		} else {
      		$data['subject_id'] = '';
    	}

    	if ($this->input->post('pid')) {

      		$data['pid'] = $this->input->post('pid');

    	} elseif (isset($info)) {

			$data['pid'] = $info->pid;

		} else {

      		$data['pid'] = '';

    	}



		if ($this->input->post('ordernum')) {

      		$data['ordernum'] = $this->input->post('ordernum');

    	} elseif (isset($info)) {

			$data['ordernum'] = $info->ordernum;

		} else {

      		$data['ordernum'] = '';

    	}

		

    	$data['allchapters']= array();	

    	$results = $this->model_chapter->getchapters(0);

		if ($results) {  

			foreach($results as $val){

				$data['allchapters'][] = array(

					'id' => $val->id,

					'name' => $val->name

				);

			}

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

		$data['cancel'] = base_url().adminpath.'/chapter';		

		$this->load->view(adminpath.'/header');

		$this->load->view(adminpath.'/chapterform',$data);

		$this->load->view(adminpath.'/footer');

				

	}

}