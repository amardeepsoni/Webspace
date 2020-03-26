<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managefaq extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('/Model_faq');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if ($usertype == "content")
            redirect(adminpath . '/login');
        $data = array();
        $data['heading'] = "Manage Faq";
        $data['faqs'] = $this->Model_faq->getFaq();
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/managefaqs', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function delete($id)
    {
        if (!$this->session->userdata('logged_in')) {
            if ($usertype == "olympiad" || $usertype == "admin")
                redirect(adminpath . '/login');
        }

        $this->load->model('/Model_faq');
        $this->Model_faq->remove($id);

        redirect(base_url() . adminpath . '/Managefaq');
    }

    public function enable($id) {
        if (!$this->session->userdata('logged_in')) {
            if($usertype=="olympiad" || $usertype=="admin")
                redirect(adminpath . '/login');
        }

        $this->load->model('/Model_faq');
        $this->Model_faq->enable($id);
        
        redirect(base_url().adminpath.'/Managefaq');

    }

    public function disable($id) {
        if (!$this->session->userdata('logged_in')) {
            if($usertype=="olympiad" || $usertype=="admin")
                redirect(adminpath . '/login');
        }

        $this->load->model('Model_faq');
        $this->Model_faq->disable($id);
        
        redirect(base_url().adminpath.'/Managefaq');

    }
}
