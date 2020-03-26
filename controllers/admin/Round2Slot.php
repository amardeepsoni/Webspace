<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Round2Slot extends CI_Controller
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
            "slots" => $this->Model_Round2Slot->fetchSlots()
        );

        $this->load->view(adminpath . '/header', $data);
        $this->load->view(adminpath . '/Round2Slot', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function addSlot()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        if ($this->input->post()) {
            $postData = array(
                "date" => $this->input->post("slotDate"),
                "start" => $this->input->post("startTime"),
                "end" => $this->input->post("endTime"),
                "count" => $this->input->post("count")
            );
            $this->Model_Round2Slot->addSlot($postData);
            redirect(adminpath.'/Round2Slot');
        }
    }

    public function deleteSlot($slotId)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $this->Model_Round2Slot->deleteSlot($slotId);
        redirect(adminpath.'/Round2Slot');
    }
}

?>