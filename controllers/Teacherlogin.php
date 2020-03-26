<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Teacherlogin extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('teacherlogin')['id']) {
            redirect('teacherlogin/dashboard');
        }
        $this->load->view('teacher_login');
    }
    public function login()
    {
        $this->load->model('Model_teacher', 'mt');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $teacher_login = array(
                'email' => strip_tags(trim($this->input->post('t_email'))),
                'password' => md5(strip_tags(trim($this->input->post('t_password')))),
            );
            $result_login = $this->mt->login_teacher($teacher_login);
            $resultlogin = $result_login['0'];
            print_r($resultlogin);
            if ($result_login) {
                $session_data = array(
                    'id' => $resultlogin['user_id'],
                    'name' => $resultlogin['name'],
                    'email' => $resultlogin['email'],
                    'contact' => $resultlogin['contact'],
                    'gender' => $resultlogin['gender'],
                    'type' => $resultlogin['type'],
                    'school' => $resultlogin['school'],
                );
                // Add user data in session
                $this->session->set_userdata('teacherlogin', $session_data);
                if ($this->session->userdata('studentlogin')['id']) {
                    $this->session->unset_userdata('studentlogin');
                }
                redirect(base_url() . 'teacherlogin/dashboard');
            } else {
                // redirect(base_url() . 'teacherlogin');
            }
        }
    }
    public function dashboard()
    {
        $this->load->model('Model_quiz', 'mq');
        $data['quiz']   = $this->mq->show_quiz($this->session->userdata('teacherlogin')['id']);
        $this->load->view('teacher_dashboard',$data);
    }
    public function logout()
    {
        if ($this->session->userdata('teacherlogin')['id']) {                        
            $this->session->unset_userdata('teacherlogin');
            redirect(base_url().'teacherlogin');
        } else {
            redirect(base_url().'teacherlogin/dashboard');
        }
    }
}
