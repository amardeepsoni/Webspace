<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewresults extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        $data["usertype"]=$this->session->userdata("logged_in")["usertype"];
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/viewresults',$data);
		$this->load->view(adminpath.'/footer');

	}
	
	public function student(){

		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

		$data["usertype"]=$this->session->userdata("logged_in")["usertype"];
        $this->load->model('Model_student');
		
		$studentid= $this->input->post('Stureg');
		$studentinf = $this->Model_student->getdata($studentid);
		$studentlevel = $studentinf['level'];
		$studentcat = $studentinf['category_id'];
		 


		$this->load->model(adminpath.'/Model_Remarks');
        $this->load->model('Model_studentresult');
        $data=array();
        
        $data['page_title'] = 'Round 1 Results';
        $data['meta_keyword'] = 'Round 1 Results';
        $data['meta_description'] = 'Round 1 Results';
        $data['heading'] = 'Round 1 Results';
        $data['studentid'] = $studentid;
        $data['studentlevel'] = $studentlevel;
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();
        $data['skillWiseScores'] = $this->Model_studentresult->fetchSkillWiseScore($studentid);
        $data['distribution'] = $this->Model_studentresult->fetchDistribution($studentlevel);
        $data['skillsData'] = $this->Model_studentresult->fetchSkillsData($studentlevel);
        $data['rank'] = $this->Model_studentresult->getRank($studentid);
        $data['skillsData'] = $this->Model_studentresult->skillsData($studentid);
        $data['questionsData'] = $this->Model_studentresult->questionsData();
        $data['remarks'] = $this->Model_studentresult->fetchRemarks($studentid, $studentlevel);
        $data['qualified'] = $this->Model_studentresult->qualificationStatus($studentid);
        $data['schoolRank'] = $this->Model_studentresult->fetchRank($studentcat, $studentid);

        $data['firstname'] = $studentinf['firstname'];
        $data['lastname'] = $studentinf['lastname'];

        $this->load->view('accountstudentheader',$data);
        $this->load->view(adminpath.'/student_result_r1',$data);
        $this->load->view('accountfooter');
    }
    
    public function school(){

        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        $data = array();
        $this->load->helper('url');
        $data['page_title'] = 'Result';
        $data['title'] = 'Result';
        $data['heading']="Result";
        $data['category_id'] = $this->input->post('Schoolreg');
        $this->load->model(adminpath.'/Model_Remarks');
        $this->load->model('School_model');
        
        $data['schoolinf']=$this->School_model->getdata($this->input->post('Schoolreg'));
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();
        $data['action'] = base_url()."result/gresult";
        $this->load->view('accountheader',$data);
        $this->load->view(adminpath.'/result_r1',$data);
        $this->load->view('accountfooter');
    }

    
    public function all(){

        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        $data = array();
        $this->load->helper('url');
        $data['page_title'] = 'Result';
        $data['title'] = 'Result';
        $data['heading']="Result";
        $data['level'] = $this->input->post('level');
        $this->load->model(adminpath.'/Model_Remarks');
        
        $data['remarks'] = $this->Model_Remarks->getcountbylevel($data['level']);
        $this->load->view('accountheader',$data);
        $this->load->view(adminpath.'/countschoolbylevel',$data);
        $this->load->view('accountfooter');
    }
}