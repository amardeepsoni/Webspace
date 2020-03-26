<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudyMaterial extends CI_Controller {
	public function school() {
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		//model is study material loading the (study material table) from db
		$this->load->model('Model_studyMaterial');
		$data['studyMaterial'] = $this->Model_studyMaterial->getAll();
		$data['page_title'] = 'Study Material';
		$this->load->view('accountheader', $data);
		$this->load->view('schoolStudyMaterial', $data);
		$this->load->view('accountfooter');
	}

	public function studentDashboard() {
		if (!$this->session->userdata('studentlogged_in')['id']) {
			redirect('login');
		}

		//$data['studyMaterial'] = $this->Model_studyMaterial->getByLevel($_SESSION['studentlogged_in']['level']);
		$data['page_title'] = 'Study Material';
		$this->load->view('accountstudentheader', $data);
		$this->load->view('dashboardStudyMaterial', $data);
		$this->load->view('accountfooter');
	}

	public function student($lg) {
		if (!$this->session->userdata('studentlogged_in')['id']) {
			redirect('login');
		}
		$this->load->model('Model_studyMaterial');
		//$data['studyMaterial'] = $this->Model_studyMaterial->getByLevel($_SESSION['studentlogged_in']['level']);
		$data['lang'] = $lg;
		$data['page_title'] = 'Study Material';
		$this->load->view('accountstudentheader', $data);
		$this->load->view('studentStudyMaterial', $data);
		$this->load->view('accountfooter');
	}

	public function studentCritical() {
		if (!$this->session->userdata('studentlogged_in')['id']) {
			redirect('login');
		}
		$this->load->model('Model_studyMaterial');
		//$data['studyMaterial'] = $this->Model_studyMaterial->getByLevel($_SESSION['studentlogged_in']['level']);

		$data['page_title'] = 'Study Material';
		$this->load->view('accountstudentheader', $data);
		$this->load->view('studentCriticalThinking', $data);
		$this->load->view('accountfooter');
	}

	public function studentResources() {
		if (!$this->session->userdata('studentlogged_in')['id']) {
			redirect('login');
		}
		$this->load->model('Model_studyMaterial');
		//$data['studyMaterial'] = $this->Model_studyMaterial->getByLevel($_SESSION['studentlogged_in']['level']);

		$data['page_title'] = 'Study Material';
		$this->load->view('accountstudentheader', $data);
		$this->load->view('studentResources', $data);
		$this->load->view('accountfooter');
	}
}