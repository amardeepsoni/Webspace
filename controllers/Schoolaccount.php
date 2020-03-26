<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolaccount extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Loading the school model
        $this->load->model(array('school_model'));  
    } 
    //all post details without slider
    public function index($id = null)
    { 
        //Not logged in redirect to schoollogin
        if(!$this->session->userdata('schoollogged_in')['id']){ 
            redirect('schoollogin');
        }
        //Empty array for the data
        $data=array();
        $data['page_title'] = 'My Account';
        $data['meta_keyword'] = 'My Account';
        $data['meta_description'] = 'My Account';
        $this->load->model('Popup');
		
        // $data['popup']   = $this->Popup->getLatest('schacc');
		

        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        ); 
        $data['breadcrumbs'][] = array(
        'text' => 'My Account',
        'href' => base_url().'schoollogin'
        );
        
        // Fetching schoolinfo and stored into schoolinfo array
        $data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
        // Loading the views
        $this->load->view('accountheader',$data);
        $this->load->view('schoolaccount',$data);
        $this->load->view('modalview2', $data);

        $this->load->view('accountfooter');

    } 


}

