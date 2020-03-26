<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addteacher extends CI_Controller
{

    public function index()
    {
        $data = array();
        // Redirect user if not logged in
        if (!$this->session->userdata('schoollogged_in')['id']) {
            redirect('schoollogin');
        }
        $data['page_title'] = 'Add Teacher';
        $data['title'] = 'Add Teacher';

        $this->load->view('accountheader', $data);
        $this->load->view('addteacher');
        $this->load->view('accountfooter');
    }
    public function add_record()
    {
        if (!$this->session->userdata('schoollogged_in')['id']) {
            redirect('schoollogin');
        }
        $this->load->model('Model_teacher', 'mt');
        $pass = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@#$'), 0, 10);
        $user_id = 'TCH'.rand(1111,9999);
        $add_details = array(
            'name'  =>  strip_tags($this->input->post('name')),
            'email'   => strip_tags($this->input->post('email')),
            'contact' => strip_tags($this->input->post('contact')),
            'gender' => strip_tags($this->input->post('gender')),
            'type' => 'nscp',
            'user_id'   => $user_id,
            'password'  => md5($pass),
            'school'   =>  $this->session->userdata('schoollogged_in')['name'],
        );
        if ($this->mt->add_teacher($add_details)) {
            $cdata = array(
                'message' => 'Teacher added Successfully!!',
                'flag' => 1,
            );
            $this->session->set_flashdata('register', $cdata);

            redirect('addteacher');
        } else {
            $cdata = array(
                'message' => 'Teacher not added!!',
                'flag' => 0,
            );
            $this->session->set_flashdata('register', $cdata);
            redirect('addteacher');
        }
    }
}
