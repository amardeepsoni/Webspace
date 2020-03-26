<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveRegistration extends CI_Controller {

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $this->load->model(adminpath.'/model_school');
        $data['schools'] = $this->model_school->getAllSchools();
        $data['hiddenSchools'] = $this->model_school->getHiddenSchools();
        $i = 0;
        foreach ($data['schools'] as $school) {
            $data['schools'][$i]->disapprovedStudents = count($this->model_school->getDisapprovedStudents($school->category_id));
            $i++;
        }
        $data['heading'] = "Approve Registration";
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath.'/ApproveRegistration',$data);
        $this->load->view(adminpath . '/footer');
    }

    public function approveAll ($id) {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $this->load->model(adminpath.'/model_student');
        $this->model_student->approveAllStudents($id);
        redirect(base_url().adminpath.'/ApproveRegistration');
    }
    public function hide(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/Model_school');
			if(isset($_POST['table_records'])){
			$this->Model_school->hide($_POST['table_records']);
			}
    	}
    	redirect(adminpath.'/ApproveRegistration');
    }
    public function show(){

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/Model_school');
			if(isset($_POST['table_records'])){
			$this->Model_school->show($_POST['table_records']);
			}
    	}
    	redirect(adminpath.'/ApproveRegistration');
    }
}
