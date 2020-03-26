<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remarks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath . '/Model_addExam');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $data['heading'] = "Add Remarks";
        $this->load->view(adminpath . '/header',$data);
        $this->load->view(adminpath . '/remarks', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function add() {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $this->load->model(adminpath.'/Model_Remarks');
        $result = false;
        for($i = 1; $i<=10; $i++) {
            $data = array(
                'upper_bound' => $this->input->post('below_'.$i*10),
                'remarks' =>  $this->input->post('remarks_'.$i*10),
                'user_type' => $this->input->post('user_type')
            );
            if($this->Model_Remarks->getRemarks($data['upper_bound'], $data['user_type'])) {
                $result = $this->Model_Remarks->update($data);
            }
            else {
            $result = $this->Model_Remarks->insert($data);
            }
        }
        if($result)
            $this->session->set_flashdata('Success', 'Remarks Added Successfully');
        else
            $this->session->set_flashdata('Exception', 'Something Went Wrong');
        redirect(base_url().adminpath.'/remarks');
    }
}