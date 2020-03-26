<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddFaq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_faq');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $data['heading'] = "Add Faq";

        $this->load->view(adminpath . '/header', $data);
        $this->load->view(adminpath . '/addfaq', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function add()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $this->load->model('Model_faq');

        
        
        $data['questions'] = $this->input->post('questions');
        $data['answers'] = $this->input->post('answers');
        $data['audio_url'] = $this->input->post('audio_url');
       
        
        

        $this->Model_faq->add($data);
        redirect(adminpath);
    }
}
