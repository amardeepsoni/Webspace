<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller {

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
        $data=array();


        $data['page_title'] = 'My Account';
        $data['meta_keyword'] = 'My Account';
        $data['meta_description'] = 'My Account';
        $this->load->model('Popup');
        $data['popup'] = $this->Popup->getLatest('stuacc');
        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        );
                
        $data['breadcrumbs'][] = array(
        'text' => 'My Account',
        'href' => base_url().'login'
        );


        $data['action'] = base_url().'login/checklogin';
        $data['forgotaction'] = base_url().'login/forgotpassword';


        $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['username']));
        $data['school'] = $this->student_model->getschool($this->session->userdata('studentlogged_in')['username']);
        $this->load->view('accountstudentheader',$data);
        $this->load->view('myaccount',$data);
        $this->load->view('modalview2', $data);
        $this->load->view('accountfooter');

    } 

    public function updateDOB() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!$this->session->userdata('studentlogged_in')['id']) {
                redirect('login');
            }
            $data['registrationno'] = $_SESSION['studentlogged_in']['registrationno'];
            $data['dob'] = $this->input->post('dob');
            $this->student_model->update($data);
            redirect(base_url() . 'myaccount');
        }
        else
            show_404();
    }
}

