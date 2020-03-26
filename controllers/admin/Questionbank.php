<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionbank extends CI_Controller {

	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect(adminpath . '/login');
		}

		$data = array();
		$data['breadcrumbs'][] = array(
			'text' => 'Home',
			'href' => '#',
		);

		$data['breadcrumbs'][] = array(
			'text' => 'Question Bank Manager',
			'href' => base_url() . adminpath . '/questionbank',
		);
		$data['heading'] = "Question Bank Manager";
		$data['allquestionbanks'] = array();
		$this->load->model(adminpath . '/model_questionbank');
		$this->load->model(adminpath . '/model_subject');
		$this->load->model(adminpath . '/model_schoollavel');

		if (isset($_GET['schoollavel_id'])) {
			$schoollavel_id = $_GET['schoollavel_id'];
			$data['schoollavel_id'] = $_GET['schoollavel_id'];
		} else {
			$schoollavel_id = "";
			$data['schoollavel_id'] = 0;
		}

		if (isset($_GET['subject_id'])) {
			$subject_id = $_GET['subject_id'];
			$data['subject_id'] = $_GET['subject_id'];
		} else {
			$subject_id = "";
			$data['subject_id'] = 0;
		}

		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'schoollavel_id' => $schoollavel_id,
			'subject_id' => $subject_id,

		);

		$results = $this->model_questionbank->getquestionbanks($fildata);
		if ($results) {
			foreach ($results as $val) {
				$data['allquestionbanks'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'status' => $val->status,
					'href' => base_url() . adminpath . '/questionbank/edit?id=' . $val->id,
				);
			}
		}

		$data['allschoollavels'] = array();
		$results = $this->model_schoollavel->getschoollavels();
		if ($results) {
			foreach ($results as $val) {
				$data['allschoollavels'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}
		$data['allsubjects'] = array();
		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0,

		);
		$results = $this->model_subject->getsubjects($fildata);
		if ($results) {
			foreach ($results as $val) {
				$data['allsubjects'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}

		$data['deleteaction'] = base_url() . adminpath . '/questionbank/delete';
		$data['activeaction'] = base_url() . adminpath . '/questionbank/active';
		$data['inactiveaction'] = base_url() . adminpath . '/questionbank/inactive';
		$this->load->view(adminpath . '/header');
		$this->load->view(adminpath . '/questionbank', $data);
		$this->load->view(adminpath . '/footer');

	}
	public function active() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath . '/model_questionbank');
			if (isset($_POST['table_records'])) {
				$this->model_questionbank->active($_POST['table_records']);
			}
		}
		redirect(adminpath . '/questionbank');
	}
	public function inactive() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath . '/model_questionbank');
			if (isset($_POST['table_records'])) {
				$this->model_questionbank->inactive($_POST['table_records']);
			}
		}
		redirect(adminpath . '/questionbank');
	}
	public function delete() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath . '/model_questionbank');
			if (isset($_POST['table_records'])) {
				$this->model_questionbank->delete($_POST['table_records']);
			}
		}
		redirect(adminpath . '/questionbank');
	}
	public function generateQuiz() {
		if (!$this->session->userdata('logged_in')) {
			redirect(adminpath . '/login');
		}

		$this->load->model(adminpath . '/model_questionbank');

	}
	public function add() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath . '/model_questionbank');
			$this->load->model(adminpath . '/model_subject');

			$this->load->model(adminpath . '/model_schoollavel');
			$postdata = array();

			$schoollavel_info = $this->model_schoollavel->getschoollavel($this->input->post('schoollavel_id'));

			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));
			$postdata['topic_id'] = "";
			$postdata['topic'] = "";
			$postdata['perquestionmark'] = $this->input->post('perquestionmark');
			$postdata['negativemark'] = $this->input->post('negativemark');

			$postdata['name'] = $this->input->post('name');
			$postdata['language'] = $this->input->post('language');
			$postdata['subject_id'] = $this->input->post('subject_id');
			$postdata['subject'] = $subject_info->name;

			$postdata['schoollavel_id'] = $this->input->post('schoollavel_id');
			$postdata['schoollavel'] = $schoollavel_info->name;
			$postdata['rightanswer'] = $this->input->post('rightanswer');
			$postdata['explain'] = $this->input->post('explain');
			$postdata['videolink'] = $this->input->post('videolink');
			$postdata['answeroption'] = $this->input->post('answeroption');
			$postdata['user_id'] = $this->session->userdata['logged_in']['id'];
			$postdata['ip'] = $_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
			$postdata['date_added'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';

			if ($_FILES['image']['name'] != '') {
				$allowed_filetypes = array('.pdf', '.doc', '.docx', '.gif', '.jpg', '.jpeg', '.png', '.PNG');
				$expdoc_file = $_FILES['image']['name'];
				$expdoc_file = str_replace('', '-', $expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file, '.'), strlen($expdoc_file) - 1);
				if (!in_array($ext, $allowed_filetypes)) {
					die('The file you attempted to upload is not allowed.');
				}

				$random_digit = rand(0000, 9999);
				$expdoc_file = $random_digit . $expdoc_file;
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE . "questionbank/" . $expdoc_file) or $error = "Not Uploaded";
				$imgname = "questionbank/" . $expdoc_file;
				$postdata['image'] = $imgname;
			}

			if ($_FILES['explainattachment']['name'] != '') {
				$allowed_filetypes = array('.pdf', '.doc', '.docx', '.gif', '.jpg', '.jpeg', '.png');
				$expdoc_file = $_FILES['explainattachment']['name'];
				$expdoc_file = str_replace('', '-', $expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file, '.'), strlen($expdoc_file) - 1);
				if (!in_array($ext, $allowed_filetypes)) {
					die('The file you attempted to upload is not allowed.');
				}

				$random_digit = rand(0000, 9999);
				$expdoc_file = $random_digit . $expdoc_file;
				move_uploaded_file($_FILES['explainattachment']['tmp_name'], DIR_IMAGE . "questionbank/" . $expdoc_file) or $error = "Not Uploaded";
				$imgname = "questionbank/" . $expdoc_file;
				$postdata['explainattachment'] = $imgname;
			}

			$checkname = $this->model_questionbank->checkquestionbankalready($postdata['name'], $this->session->userdata['logged_in']['id']);
			if ($checkname) {
				$this->session->set_flashdata('questionbanknotify', 'Question Bank already exist.');
			} else {
				$this->model_questionbank->add($postdata);
				$this->session->set_flashdata('questionbankmsg', 'Question Bank Added Successfully.');
			}
			redirect(adminpath . '/questionbank');
		}
		$this->getform();

	}
	public function edit() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath . '/model_questionbank');
			$this->load->model(adminpath . '/model_subject');
			$this->load->model(adminpath . '/model_schoollavel');
			$postdata = array();

			$schoollavel_info = $this->model_schoollavel->getschoollavel($this->input->post('schoollavel_id'));
			$subject_info = $this->model_subject->getsubject($this->input->post('subject_id'));

			$postdata['name'] = $this->input->post('name');
			$postdata['language'] = $this->input->post('language');
			$postdata['perquestionmark'] = $this->input->post('perquestionmark');
			$postdata['negativemark'] = $this->input->post('negativemark');
			$postdata['subject_id'] = $this->input->post('subject_id');
			$postdata['subject'] = $subject_info->name;

			$postdata['schoollavel_id'] = $this->input->post('schoollavel_id');
			$postdata['schoollavel'] = $schoollavel_info->name;

			$postdata['rightanswer'] = $this->input->post('rightanswer');
			$postdata['explain'] = $this->input->post('explain');
			$postdata['videolink'] = $this->input->post('videolink');
			$postdata['answeroption'] = $this->input->post('answeroption');
			$postdata['user_id'] = $this->session->userdata['logged_in']['id'];
			$postdata['ip'] = $_SERVER['REMOTE_ADDR'];
			$postdata['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
			$postdata['date_modify'] = date('Y-m-d H:i:s');
			$postdata['status'] = '1';

			if ($_FILES['image']['name'] != '') {
				$allowed_filetypes = array('.pdf', '.doc', '.docx', '.gif', '.jpg', '.jpeg', '.png', '.PNG');
				$expdoc_file = $_FILES['image']['name'];
				$expdoc_file = str_replace('', '-', $expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file, '.'), strlen($expdoc_file) - 1);
				if (!in_array($ext, $allowed_filetypes)) {
					die('The file you attempted to upload is not allowed.');
				}

				$random_digit = rand(0000, 9999);
				$expdoc_file = $random_digit . $expdoc_file;
				move_uploaded_file($_FILES['image']['tmp_name'], DIR_IMAGE . "questionbank/" . $expdoc_file) or $error = "Not Uploaded";
				$imgname = "questionbank/" . $expdoc_file;
				$postdata['image'] = $imgname;
			}

			if ($_FILES['explainattachment']['name'] != '') {
				$allowed_filetypes = array('.pdf', '.doc', '.docx', '.gif', '.jpg', '.jpeg', '.png');
				$expdoc_file = $_FILES['explainattachment']['name'];
				$expdoc_file = str_replace('', '-', $expdoc_file);
				$ext = substr($expdoc_file, strpos($expdoc_file, '.'), strlen($expdoc_file) - 1);
				if (!in_array($ext, $allowed_filetypes)) {
					die('The file you attempted to upload is not allowed.');
				}

				$random_digit = rand(0000, 9999);
				$expdoc_file = $random_digit . $expdoc_file;
				move_uploaded_file($_FILES['explainattachment']['tmp_name'], DIR_IMAGE . "questionbank/" . $expdoc_file) or $error = "Not Uploaded";
				$imgname = "questionbank/" . $expdoc_file;
				$postdata['explainattachment'] = $imgname;
			}

			$this->model_questionbank->edit($this->input->get('id'), $postdata);
			$this->session->set_flashdata('questionbankmsg', 'Modify Successfully.');
			redirect(adminpath . '/questionbank');
		}
		$this->getform();

	}
	public function getform() {

		$this->load->model(adminpath . '/model_questionbank');
		$this->load->model(adminpath . '/model_schoollavel');
		$this->load->model(adminpath . '/model_subject');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => 'Home',
			'href' => '#',
		);

		$data['breadcrumbs'][] = array(
			'text' => 'Question Bank Manager',
			'href' => base_url() . adminpath . '/questionbank',
		);

		if (!$this->input->get('id')) {
			$data['breadcrumbs'][] = array(
				'text' => 'Add Question Bank',
				'href' => '#',
			);
			$data['heading'] = "Add Question Bank";
			$data['action'] = base_url() . adminpath . '/questionbank/add';
		} else {
			$data['breadcrumbs'][] = array(
				'text' => 'Edit Question Bank',
				'href' => '#',
			);
			$data['heading'] = "Edit Question Bank";
			$data['action'] = base_url() . adminpath . '/questionbank/edit?id=' . $this->input->get('id');
		}

		if ($this->input->get('id') && $this->input->server('REQUEST_METHOD') != 'POST') {
			$info = $this->model_questionbank->getquestionbank($this->input->get('id'));
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

		if ($this->input->post('rightanswer')) {
			$data['rightanswer'] = $this->input->post('rightanswer');
		} elseif (isset($info)) {
			$data['rightanswer'] = adminquestionrightoption($this->input->get('id'), $info->rightanswer);
		} else {
			$data['rightanswer'] = '';
		}

		if ($this->input->post('explaintext')) {
			$data['explaintext'] = $this->input->post('explaintext');
		} elseif (isset($info)) {
			$data['explaintext'] = $info->explaintext;
		} else {
			$data['explaintext'] = '';
		}

		if ($this->input->post('videolink')) {
			$data['videolink'] = $this->input->post('videolink');
		} elseif (isset($info)) {
			$data['videolink'] = $info->videolink;
		} else {
			$data['videolink'] = '';
		}

		if ($this->input->post('perquestionmark')) {
			$data['perquestionmark'] = $this->input->post('perquestionmark');
		} elseif (isset($info)) {
			$data['perquestionmark'] = $info->perquestionmark;
		} else {
			$data['perquestionmark'] = '';
		}
		if ($this->input->post('negativemark')) {
			$data['negativemark'] = $this->input->post('negativemark');
		} elseif (isset($info)) {
			$data['negativemark'] = $info->negativemark;
		} else {
			$data['negativemark'] = '';
		}

		$data['allschoollavels'] = array();
		$results = $this->model_schoollavel->getschoollavels();
		if ($results) {
			foreach ($results as $val) {
				$data['allschoollavels'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}
		$data['allsubjects'] = array();
		$fildata = array(
			'filter_user' => $this->session->userdata['logged_in']['id'],
			'filter_pid' => 0,

		);
		$results = $this->model_subject->getsubjects($fildata);
		if ($results) {
			foreach ($results as $val) {
				$data['allsubjects'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}

		$data['answeroptions'] = array();
		if (isset($info)) {
			$answerresults = $this->model_questionbank->getquestionanswer($this->input->get('id'));
			if ($answerresults) {
				foreach ($answerresults as $answerresult) {
					$data['answeroptions'][] = array(
						'orderno' => $answerresult->orderno,
						'value' => $answerresult->answer,
					);
				}
			}
		} else {
			for ($i = 1; $i <= 2; $i++) {
				$data['answeroptions'][] = array(
					'orderno' => $i,
					'value' => '',
				);
			}
		}

		if (isset($info)) {
			if ($info->image) {
				$thumbimage = resizeimage($info->image, 100, 80);
				$data['image'] = "<img src='" . $thumbimage . "' title='" . $info->name . "'/>";
			} else {
				$thumbimage = resizeimage('no_image.jpg', 100, 80);
				$data['image'] = "<img src='" . $thumbimage . "' title='" . $info->name . "'/>";
			}
		} else {
			$thumbimage = resizeimage('no_image.jpg', 100, 80);
			$data['image'] = "<img src='" . $thumbimage . "'/>";
		}

		if (isset($info)) {
			if ($info->explainattachment) {
				$thumbimage = resizeimage($info->explainattachment, 100, 80);
				$data['explainattachment'] = "<img src='" . $thumbimage . "' title='" . $info->name . "'/>";
			} else {
				$thumbimage = resizeimage('no_image.jpg', 100, 80);
				$data['explainattachment'] = "<img src='" . $thumbimage . "' title='" . $info->name . "'/>";
			}
		} else {
			$thumbimage = resizeimage('no_image.jpg', 100, 80);
			$data['explainattachment'] = "<img src='" . $thumbimage . "'/>";
		}

		$data['cancel'] = base_url() . adminpath . '/questionbank';

		$this->load->view(adminpath . '/header');
		$this->load->view(adminpath . '/questionbankform', $data);
		$this->load->view(adminpath . '/footer');

	}
}