<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllExams extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath . '/Model_allExams');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            if($usertype=="content" || $usertype=="admin")
                redirect(adminpath . '/login');
        }
        $data = array();

        $data['breadcrumbs'][] = array(
            'text' => 'All Exams',
            'href' => base_url() . adminpath . '/AllExams'
        );
        $data['heading'] = "All Exams";
        $data['allExams'] = $this->Model_allExams->fetchExams();
        $this->load->model(adminpath . '/Model_addExam');
        $data['skills'] = $this->Model_addExam->getAllSkills();


        //Add quiz page
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/allExams', $data);
        $this->load->view(adminpath . '/footer');
    }
}
