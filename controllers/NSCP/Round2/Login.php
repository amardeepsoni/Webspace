<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index() {
        if($this->session->userdata('round2_login')['username']){
            redirect(round2path.'/dashboard');
        }
        $data = array(
            'action' => base_url().round2path.'/login/validate'
        );
        $this->load->view(round2path.'/login',$data);
    }

    public function validate()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->model(round2path.'/Model_Round2Login');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->Model_Round2Login->checkLogin($data);
            if($result) {
                $student_data = $this->Model_Round2Login->getStudentDetails($data['username']);
                $session_data = array(
                    'category_id' => $student_data->category_id,
                    'firstname' => $student_data->firstname,
                    'lastname' => $student_data->lastname,
                    'username' => $student_data->username,
                    'email' => $student_data->email,
                    'level' => $student_data->level
                );
                //print_r($session_data);
                $this->session->set_userdata('round2_login', $session_data);
                redirect(round2path.'/dashboard');
            }
            else {
                $this->session->set_flashdata('loginnotify', 'Username and Password not Valid.');
                redirect(round2path.'/login');
            }
        }
        else
            show_404();
    }


    public function logout() {
        $this->session->unset_userdata('round2_login');
        redirect(round2path.'/login', 'refresh');
    }
}