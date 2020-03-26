<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schooldashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		// Loading the School_model
        $this->load->model(array('school_model'));  
	} 
	public function index(){
		// Redirect user if not logged in 
		if(!$this->session->userdata('schoollogged_in')['id']){ 
            redirect('schoollogin');
		}
		//Loading the model_student
		$this->load->model('model_student');
		// Setting the page description
		$data=array();
		$data['page_title']="My School Dashboard";
		$data['meta_keyword']="My School Dashboard";
		$data['meta_description']="My School Dashboard";
		$data['heading']="";
		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => base_url().'schoolaccount'
		);
		$data['breadcrumbs'][] = array(
		'text' => 'My School Dashboard',
		'href' => base_url().'schooldashboard'
		);
		$data['allstudents']= array();	
		$results = $this->model_student->getstudents();
		if ($results) {  
			foreach($results as $val){
				$data['allstudents'][] = array(
					'id' => $val->id,					
					'category_id' => $val->category_id,	
					'firstname' => $val->firstname,
					'lastname' => $val->lastname,
					'mobile' => $val->mobile,
					'email' => $val->email,
				);
			}
		}
		// Setting schoolinfo variable 	
		$data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
		//Loading the views
		$this->load->view('accountheader',$data);
		$this->load->view('schooldashboard',$data);
		$this->load->view('accountfooter');
	}
}



