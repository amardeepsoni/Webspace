<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderhistory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(         
            'student_model'
        ));  
    } 
 
    //all post details without slider
    public function index($id = null)
    { 
         if(!$this->session->userdata('studentlogged_in')['id']){ 
            redirect('login');
        }
        $data="";


        $data['page_title'] = 'Edit Profile';
        $data['meta_keyword'] = 'Edit Profile';
        $data['meta_description'] = 'Edit Profile';

        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        );
                
        $data['breadcrumbs'][] = array(
        'text' => 'Edit Profile',
        'href' => base_url('orderhistory')
        );


        
        $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['email']));
        

        $data['action'] = base_url('orderhistory');
        $this->load->view('accountheader',$data);
        $this->load->view('orderhistory',$data);
        $this->load->view('accountfooter');
    } 


  
}

