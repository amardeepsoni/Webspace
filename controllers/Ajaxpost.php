<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Ajaxpost extends CI_Controller {

		public function saveanswerbyuser()
			{
				$json = array();
				$data['testname'] = $_POST['testname'];
			    $data['testpanel_id'] = $_POST['testpanel_id'];
			    $data['student_id'] = $_POST['student_id'];
			    $data['studentname'] = $_POST['studentname'];
			    $data['studentemail'] = $_POST['studentemail'];
			    $data['rightanswer'] = $_POST['rightanswer'];
			    $data['save'] = $_POST['save'];
			    $data['savemark'] = $_POST['savemark'];
			    $data['mark'] = $_POST['mark'];
			    $data['timer'] = $_POST['timer'];
			    $data['question_id'] = $_POST['question_id'];
				$data['date_added'] = date('Y-m-d H:i:s');
				$data['ip'] =$_SERVER['REMOTE_ADDR'];
				$data['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
				$data['date_modify'] = date('Y-m-d H:i:s');
				$this->load->model('model_testpanel');
				$checked = $this->model_testpanel->checkanswerbyuser($data);
				if($checked){
					$this->model_testpanel->deleteanswerbyuser($data);
					$this->model_testpanel->addanswerbyuser($data);
					$json['success']="Done";
				}
				else{
					$this->model_testpanel->addanswerbyuser($data);
				}	$json['success']="Done";
				echo json_encode($json);
			}
		public function savemarkanswerbyuser()
			{
				$json = array();
				$data['testname'] = $_POST['testname'];
			    $data['testpanel_id'] = $_POST['testpanel_id'];
			    $data['student_id'] = $_POST['student_id'];
			    $data['studentname'] = $_POST['studentname'];
			    $data['studentemail'] = $_POST['studentemail'];
			    $data['rightanswer'] = $_POST['rightanswer'];
			    $data['save'] = $_POST['save'];
			    $data['savemark'] = $_POST['savemark'];
			    $data['mark'] = $_POST['mark'];
			    $data['timer'] = $_POST['timer'];
			    $data['question_id'] = $_POST['question_id'];
				$data['date_added'] = date('Y-m-d H:i:s');
				$data['ip'] =$_SERVER['REMOTE_ADDR'];
				$data['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
				$data['date_modify'] = date('Y-m-d H:i:s');
				$this->load->model('model_testpanel');
				$checked = $this->model_testpanel->checkanswerbyuser($data);
				if($checked){
					$this->model_testpanel->deleteanswerbyuser($data);
					$this->model_testpanel->addanswerbyuser($data);
					$json['success']="Done";
				}
				else{
					$this->model_testpanel->addanswerbyuser($data);
				}	$json['success']="Done";
				echo json_encode($json);
			}
		
	}

?>