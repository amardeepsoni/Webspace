<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationStats extends CI_Controller
{
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $this->load->model(adminpath.'/model_school');
        $data['schools'] = $this->model_school->getAllSchools();
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/registrationStats',$data);
        $this->load->view(adminpath . '/footer');
    }
}