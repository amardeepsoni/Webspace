<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentResult extends CI_Controller
{
    // function __construct(){
    //     parent::__construct();
    //     $this->load->model('Model_studentResult');
    // }
    public function round1()
    {
        // Redirect if a user not logged in
        if (!$this->session->userdata('studentlogged_in')['id']) {
            redirect('login');
        }
        $this->load->model(adminpath.'/Model_Remarks');
        $this->load->model('Model_studentresult');
        $data=array();
        
        $data['page_title'] = 'Round 1 Results';
        $data['meta_keyword'] = 'Round 1 Results';
        $data['meta_description'] = 'Round 1 Results';
        $data['heading'] = 'Round 1 Results';

        $data['remarks'] = $this->Model_Remarks->getAllRemarks();
        $data['skillWiseScores'] = $this->Model_studentresult->fetchSkillWiseScore($this->session->userdata('studentlogged_in')['registrationno']);
        $data['distribution'] = $this->Model_studentresult->fetchDistribution($this->session->userdata('studentlogged_in')['level']);
        $data['skillsData'] = $this->Model_studentresult->fetchSkillsData($this->session->userdata('studentlogged_in')['level']);
        $data['rank'] = $this->Model_studentresult->getRank($this->session->userdata('studentlogged_in')['registrationno']);
        $data['skillsData'] = $this->Model_studentresult->skillsData($this->session->userdata('studentlogged_in')['registrationno']);
        $data['questionsData'] = $this->Model_studentresult->questionsData();
        $data['remarks'] = $this->Model_studentresult->fetchRemarks($this->session->userdata('studentlogged_in')['registrationno'], $this->session->userdata('studentlogged_in')['level']);
        $data['qualified'] = $this->Model_studentresult->qualificationStatus($this->session->userdata('studentlogged_in')['registrationno']);
        $data['schoolRank'] = $this->Model_studentresult->fetchRank($this->session->userdata('studentlogged_in')['category_id'],$this->session->userdata('studentlogged_in')['registrationno']);

        $this->load->view('accountstudentheader',$data);
        $this->load->view('student_result_r1',$data);
        $this->load->view('accountfooter');
    }

    public function round2()
    {
        // Redirect if a user not logged in
        if (!$this->session->userdata('studentlogged_in')['id']) {
            redirect('login');
        }
        $this->load->model(adminpath.'/Model_Remarks');

        $data=array();
        $data['page_title'] = "Result";
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();

        $this->load->view('accountstudentheader',$data);
        $this->load->view('student_result_r2',$data);
        $this->load->view('accountfooter');
    }

    public function overAll()
    {
        // Redirect if a user not logged in
        if (!$this->session->userdata('studentlogged_in')['id']) {
            redirect('login');
        }

        $this->load->model(adminpath.'/Model_Remarks');

        $data=array();
        $data['page_title'] = "Result";
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();

        $this->load->view('accountstudentheader',$data);
        $this->load->view('student_result_overAll',$data);
        $this->load->view('accountfooter');
    }
}