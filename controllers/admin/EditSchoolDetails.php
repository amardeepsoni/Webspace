<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditSchoolDetails extends CI_Controller
{
    public function index() {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $this->load->view(adminpath.'/header');
        $this->load->view(adminpath.'/editSchoolDetails');
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
            $this->load->model('school_model');
            $data = array(
                'category_id'  => $this->input->post('category_id'),
                'password' => md5($this->input->post('password'))
            );
//            print_r($data);
            if ($this->school_model->passwordupdate($data)) {
                $this->session->set_flashdata('updateSchoolDetailSuccess','Updated Successfully');
            }
            else{
                $this->session->set_flashdata('updateSchoolDetailFail', 'Something Went Wrong');
            }
            redirect(base_url().adminpath.'/EditSchoolDetails');
        }
        else
            show_404();
    }
}