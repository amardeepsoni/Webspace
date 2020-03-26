<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index() {
        if(!$this->session->userdata('studentlogged_in')['id']){
            redirect('login');
        }
        $data = array(
            'username' => $_SESSION['studentlogged_in']['username'],
            'page_title' => 'Dashboard'
        );
        $this->load->model('WeeklyQuiz/Model_WeeklyQuiz');
        $data['skills'] = $this->Model_WeeklyQuiz->getSkills();
        $this->load->view('accountstudentheader',$data);
        $this->load->view('WeeklyQuiz/dashboard',$data);
        $this->load->view('accountfooter');
    }

}