<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewslots extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath.'/Model_Round2Slot');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }

        $data = array(
            "heading" => "Round 2 Slots",
            "slots" => $this->Model_Round2Slot->fetchBookedSlots(),
        );

        $this->load->view(adminpath . '/header', $data);
        $this->load->view(adminpath . '/viewslots', $data);
        $this->load->view(adminpath . '/footer');
    }
}

?>