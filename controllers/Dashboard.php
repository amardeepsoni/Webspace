<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(       
            'student_model'
        ));  
    } 






	public function index()



	{
		
		 if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
		
		
         $this->load->model('model_student');

		$data=array();

		$data['page_title']="My Student Dashboard";



		$data['meta_keyword']="My Student Dashboard";



		$data['meta_description']="My Student Dashboard";



		$data['heading']="My Student Dashboard";



		$data['breadcrumbs'][] = array(



		'text' => 'Home',



		'href' => base_url()



		);





		$data['breadcrumbs'][] = array(



		'text' => 'My Student Dashboard',



		'href' => base_url().'dashboard'



		);
		
		
		
		
		
		
		
		
		
		
		
		
		
		$data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['email']));

		


		$this->load->view('accountstudentheader',$data);



		$this->load->view('dashboard',$data);



		$this->load->view('accountfooter');



	}



}



