<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolQueries extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            $usertype = $this->session->userdata("logged_in")["usertype"];
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $this->load->model('school_model');
        $data['queries'] = $this->school_model->getAllQueries();
        $data['heading'] = 'School Queries';
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/SchoolQueries', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function answer($id) {
        $data = array(
            'id' => $id,
            'answer' => $this->input->post('answer'),
            'solved' => 1,
        );
        $this->load->model('school_model');
        $this->school_model->answerQuery($data);
        redirect(base_url().adminpath.'/SchoolQueries');
    }
}