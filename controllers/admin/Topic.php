<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Topic extends CI_Controller {



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

		'text' => 'Topic Manager',

		'href' => base_url().adminpath.'/topic'

		);

		$data['heading']="Topic Manager";

		$this->load->model(adminpath.'/model_topic');



		$data['alltopics']= array();	



		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0

		);
    	$results = $this->model_topic->gettopics($fildata);

		if ($results) {  

			foreach($results as $val){

				$data['alltopics'][] = array(

					'id' => $val->id,

					'name' => $val->name,

					'status' => $val->status,

					'href' => base_url().adminpath.'/topic/edit?id=' . $val->id

				);

			}

		}

		

		$data['deleteaction'] = base_url().adminpath.'/topic/delete';

		$data['activeaction'] = base_url().adminpath.'/topic/active';

		$data['inactiveaction'] = base_url().adminpath.'/topic/inactive';

		$this->load->view(adminpath.'/header');

		$this->load->view(adminpath.'/topic',$data);

		$this->load->view(adminpath.'/footer');



    }

    public function active(){



		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_topic');

			$this->model_topic->active($_POST['table_records']);

    	}

    	redirect(adminpath.'/topic');

    }

    public function inactive(){



		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_topic');

			$this->model_topic->inactive($_POST['table_records']);

    	}

    	redirect(adminpath.'/topic');

    }

    public function delete(){



		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_topic');

			$this->model_topic->delete($_POST['table_records']);

    	}

    	redirect(adminpath.'/topic');

    }

    public function add() {

        

		 if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_topic');
			$this->load->model(adminpath.'/model_chapter');
			$this->load->model(adminpath.'/model_subject');

			$postdata = array();

			 
			$chapter_info = $this->model_chapter->getchapter($this->input->post('chapter_id'));
			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));

			

			$postdata['id'] = '';

			$postdata['name'] = $this->input->post('name');

			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];

			$postdata['chapter_id'] = $this->input->post('chapter_id');

			$postdata['chapter'] = $chapter_info->name;

			$postdata['subject_id'] = $this->input->post('subject_id');
			
			$postdata['subject'] = $subject_info->name;	

			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];

			$postdata['ordernum'] = $this->input->post('ordernum');

			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];

			$postdata['date_added'] = date('Y-m-d H:i:s');

			$postdata['status'] = '1';



			$checkname=$this->model_topic->checktopicalready($postdata['name'],$this->session->userdata['logged_in']['id']);

			if($checkname){

				$this->session->set_flashdata('topicnotify', 'Topic name already exist.');

			}

			else{

				$this->model_topic->add($postdata);

				$this->session->set_flashdata('topicmsg', 'Topic Added Successfully.');

			}



			redirect(adminpath.'/topic');

		}

		$this->getform();

		

    }	

     public function edit() {

        

		 if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->model(adminpath.'/model_topic');
			$this->load->model(adminpath.'/model_chapter');
			$this->load->model(adminpath.'/model_subject');

			$postdata = array();

			 
			$chapter_info = $this->model_chapter->getchapter($this->input->post('chapter_id'));
			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));


			$postdata['id'] = $this->input->get('id');

			$postdata['name'] = $this->input->post('name');

			$postdata['chapter_id'] = $this->input->post('chapter_id');

			$postdata['chapter'] = $chapter_info->name;

			$postdata['subject_id'] = $this->input->post('subject_id');
			
			$postdata['subject'] = $subject_info->name;	

			$postdata['ip'] =$_SERVER['REMOTE_ADDR'];

			$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];

			$postdata['ordernum'] = $this->input->post('ordernum');

			$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];

			$postdata['date_modify'] = date('Y-m-d H:i:s');

			$postdata['status'] = '1';



			

			$this->model_topic->edit($this->input->get('id'),$postdata);

			$this->session->set_flashdata('topicmsg', 'Topic edit Successfully.');



			redirect(adminpath.'/topic');

		}

		$this->getform();

		

    }	

    public function getform() {

		

		$this->load->model(adminpath.'/model_topic');
		$this->load->model(adminpath.'/model_subject');

			

		$data['breadcrumbs'] = array();



		$data['breadcrumbs'][] = array(

		'text' => 'Home',

		'href' => '#'

		);

				

		$data['breadcrumbs'][] = array(

		'text' => 'Topic Manager',

		'href' => base_url().adminpath.'/topic'

		);

				

		if (!$this->input->get('id')) {

		$data['breadcrumbs'][] = array(

		'text' => 'Add Topic',

		'href' => '#'

		);

		$data['heading']="Add Topic";

		$data['action'] = base_url().adminpath.'/topic/add';

		} else {

		$data['breadcrumbs'][] = array(

		'text' => 'Edit Topic',

		'href' => '#'

		);

		$data['heading']="Edit Topic";

		$data['action'] = base_url().adminpath.'/topic/edit?id=' . $this->input->get('id');

		}

		

		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {

      		$info = $this->model_topic->gettopic($this->input->get('id'));

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


    	if ($this->input->post('subject_id')) {

      		$data['subject_id'] = $this->input->post('subject_id');

    	} elseif (isset($info)) {

			$data['subject_id'] = $info->subject_id;

		} else {

      		$data['subject_id'] = '';

    	}


    	if ($this->input->post('chapter_id')) {

      		$data['chapter_id'] = $this->input->post('chapter_id');

    	} elseif (isset($info)) {

			$data['chapter_id'] = $info->chapter_id;

		} else {

      		$data['chapter_id'] = '';

    	}



		if ($this->input->post('ordernum')) {

      		$data['ordernum'] = $this->input->post('ordernum');

    	} elseif (isset($info)) {

			$data['ordernum'] = $info->ordernum;

		} else {

      		$data['ordernum'] = '';

    	}

		

    	$data['alltopics']= array();	



    	$results = $this->model_topic->gettopics(0);

		if ($results) {  

			foreach($results as $val){

				$data['alltopics'][] = array(

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

		$data['cancel'] = base_url().adminpath.'/topic';		

		$this->load->view(adminpath.'/header');

		$this->load->view(adminpath.'/topicform',$data);

		$this->load->view(adminpath.'/footer');

				

	}

}