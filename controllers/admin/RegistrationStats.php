<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationStats extends CI_Controller {
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect(adminpath . '/login');
		}
		$usertype = $this->session->userdata("logged_in ")["usertype"];
		if ($usertype == "content") {
			redirect(adminpath . '/login');
		}

		$this->load->model(adminpath . '/model_school');
		$data['schools'] = $this->model_school->getAllSchools();
		$i = 0;
		foreach ($data['schools'] as $school) {
			$data['schools'][$i]->students = $this->model_school->getStudentsBySchoolID($school->category_id);
			$i++;
		}
		$this->load->view(adminpath . '/header');
		$this->load->view(adminpath . '/registrationStats', $data);
		$this->load->view(adminpath . '/footer');
	}

	public function export_csv($school_id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('schoollogin');
		}
		$this->load->model(adminpath . '/model_school');
		$fileName = 'schooldata_' . $school_id . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=" . $fileName);
		header("Content-Type: application/csv; ");
		$studentDetails = $this->model_school->studentDetailsforCSV($school_id);
		$file = fopen('php://output', 'w');
		$header = array("First Name", "Last Name", "Email", "Mobile", "class", "Status", "ID");
		fputcsv($file, $header);
		foreach ($studentDetails as $key => $line) {
			fputcsv($file, $line);
		}
		fclose($file);
		exit;
//        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);
	}

	public function export_csv_all() {
		// if(!$this->session->userdata('logged_in'){
		//      redirect(adminpath.'/login')

		// }
		$this->load->model(adminpath . '/model_school');
		$fileName = 'ALL' . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=" . $fileName);
		header("Content-Type: application/csv; ");
		$schools = $this->model_school->studentLevelDetailsForCSV();
		$file = fopen('php://output', 'w');
		$header = array("Id ", "School Name", "Level", "Count");
		fputcsv($file, $header);
		foreach ($schools as $key => $line) {
			fputcsv($file, $line);
		}
		fclose($file);
		exit;
//        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);
	}
}
