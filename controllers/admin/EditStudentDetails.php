<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditStudentDetails extends CI_Controller
{
    public function index() {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');

        $this->load->view(adminpath.'/header');
        $this->load->view(adminpath.'/editStudentDetails');
        $this->load->view(adminpath.'/footer');
    }

    public function updatePassword() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!$this->session->userdata('logged_in')) {
                    redirect(adminpath . '/login');
            }
            $usertype = $this->session->userdata("logged_in ")["usertype"];
            if($usertype=="content")
                redirect(adminpath.'/login');
            $this->load->model('student_model');
            $data = array(
                'registrationno'  => $this->input->post('registrationno'),
                'password' => md5($this->input->post('password'))
            );
            if ($this->student_model->passwordupdate($data)) {
                $this->session->set_flashdata('updateStudentDetailSuccess','Updated Successfully');
            }
            else{
                $this->session->set_flashdata('updateStudentDetailFail', 'Something Went Wrong');
            }
            redirect(base_url().adminpath.'/EditStudentDetails');
        }
        else
            show_404();
    }
}