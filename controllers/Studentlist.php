<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentlist extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(array('school_model'));
	}
	public function index() {
		// Redirect user if not logged in
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		//Load the models
		$this->load->model('model_student');
		$this->load->model('model_page');
		$data = array();
		$data['page_title'] = "Student List";
		$data['meta_keyword'] = "Student List";
		$data['meta_description'] = "Student List";
		$data['heading'] = "Student List";
		$data['breadcrumbs'][] = array(
			'text' => 'Home',
			'href' => base_url() . 'schoolaccount',
		);
		$data['breadcrumbs'][] = array(
			'text' => 'Student List',
			'href' => base_url() . 'studentlist',
		);
		// Load the model_schoollavel for fetching the levels
		$this->load->model('model_schoollavel');
		$data['allschoollavels'] = array(); // contains all the level with name
		$results = $this->model_schoollavel->getschoollavels();
		if ($results) {
			foreach ($results as $val) {
				$data['allschoollavels'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}
		// Load the model_schoollavel for fetching the classs
		$data['allschoolclasss'] = array(); // contains all the classs with name
		$results = $this->model_schoollavel->getschoolclass();
		if ($results) {
			foreach ($results as $val) {
				$data['allschoolclasss'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}

		// category_id of the logged in school
		$data['category_id'] = $this->session->userdata('schoollogged_in')['id'];

		$data['allstudents'] = array();
		// Fetch all the students details from the model_student
		$results = $this->model_student->getstudents();
		if ($results) {
			foreach ($results as $val) {
				$data['allstudents'][] = array(
					'id' => $val->id,
					'category_id' => $val->category_id,
					'firstname' => $val->firstname,
					'lastname' => $val->lastname,
					'mobile' => $val->mobile,
					'registrationno' => $val->registrationno,
					'level' => $val->level,
					'class' => $val->class,
					'email' => $val->email,
					'status' => $val->status,
					'date_added' => $val->date_added,
				);
			}
		}

		$data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
		//Loading the views
		$this->load->view('accountheader', $data);
		$this->load->view('studentlist', $data);
		$this->load->view('accountfooter');
	}
	public function fetch() {
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		$json = array();
		$reg_no = json_decode($this->input->post('reg_no'));
		$this->load->model('student_model');
		$result = $this->student_model->read_by_reg_no($reg_no);
		$json['reg_no'] = $reg_no;
		if ($result) {
			$json['firstname'] = $result->firstname;
			$json['lastname'] = $result->lastname;
			$json['email'] = $result->email;
			$json['mobile'] = $result->mobile;
			$json['level'] = $result->level;
			$json['class'] = $result->class;
		}
		echo json_encode($json);
	}
	//Function to delete a student
	public function delete_row($user_id) {

		$this->load->model('model_student');
		$this->model_student->user_delete($user_id);
		redirect(base_url() . "/studentlist");
	}
	//Function to deleteall the student and set regcount to zero
	public function deleteall($user_id) {
		if ($_SESSION['schoollogged_in']['id'] != $user_id) {
			redirect('schoollogin');
		}
		$this->load->model('model_student');
		$this->model_student->deleteall($user_id);
		$this->load->model('school_model');
		$this->school_model->updatereg_co($user_id);
		redirect(base_url() . "/studentlist");
	}
	//Function to edit the details of a student
	public function update($user_id) {
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		$this->load->model('student_model');
		$data['student'] = (object) $postData = [
			'registrationno' => $user_id,
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'class' => $this->input->post('class'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
		];
		if ($this->input->post('password')) {
			$postData['password'] = md5($this->input->post('password'));
		}
		if ($postData['class'] <= 6) {
			$postData['level'] = 0;
		} else if ($postData['class'] >= 7 && $postData['class'] <= 8) {
			$postData['level'] = 1;
		} else if ($postData['class'] >= 9 && $postData['class'] <= 10) {
			$postData['level'] = 2;
		} else {
			$postData['level'] = 3;
		}

		$this->student_model->update($postData);
		redirect(base_url() . "/studentlist");
	}
	//Function to export the details into excel file
	public function export_csv() {
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		$this->load->model('student_model');
		$fileName = 'studentlist_' . $_SESSION['schoollogged_in']['id'] . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=" . $fileName);
		header("Content-Type: application/csv; ");
		$studentDetails = $this->student_model->getStudentDetails($_SESSION['schoollogged_in']['id']);
		$file = fopen('php://output', 'w');
		$header = array("Registration no.", "First Name", "Last Name", "Email", "Mobile", "Class");
		fputcsv($file, $header);
		foreach ($studentDetails as $key => $line) {
			fputcsv($file, $line);
		}
		fclose($file);
		exit;
//        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);
	}
}
