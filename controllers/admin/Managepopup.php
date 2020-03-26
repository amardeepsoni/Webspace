<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managepopup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('/Popup');
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
        $data['heading'] = "Manage Pop-ups";
        $data['popups'] = $this->Popup->getPopups();
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/managepopups', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function delete($id)
    {
        if (!$this->session->userdata('logged_in')) {
            if ($usertype == "olympiad" || $usertype == "admin")
                redirect(adminpath . '/login');
        }

        $this->load->model('/popup');
        $this->Popup->remove($id);

        redirect(base_url() . adminpath . '/Managepopup');
    }

    public function enable($id) {
        if (!$this->session->userdata('logged_in')) {
            if($usertype=="olympiad" || $usertype=="admin")
                redirect(adminpath . '/login');
        }

        $this->load->model('/popup');
        $this->Popup->enable($id);
        
        redirect(base_url().adminpath.'/Managepopup');

    }

    public function disable($id) {
        if (!$this->session->userdata('logged_in')) {
            if($usertype=="olympiad" || $usertype=="admin")
                redirect(adminpath . '/login');
        }

        $this->load->model('/popup');
        $this->Popup->disable($id);
        
        redirect(base_url().adminpath.'/Managepopup');

    }
}
