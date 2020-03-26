<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(round2path . '/Model_Round2');
    }
    public function skill($skill_id) {
        if(!$this->session->userdata('round2_login')['username']){
            redirect(round2path.'/login');
        }
        $quizDetails = $this->Model_Round2->getQuizDetails($_SESSION['round2_login']['level'],$skill_id);
        if($quizDetails) {
            $data = array(
                'quizDetails' => $quizDetails
            );
            if ($this->Model_Round2->checkUser($_SESSION['round2_login']['username'], $quizDetails->quizid))
                $this->load->view(round2path.'/submitQuiz');
            else
                $this->load->view(round2path.'/instructions',$data);
        }
        else {
            $this->load->view('errors/wrong.php');
        }
    }

    public function checkQuizStatus ($quizid) {
        if(!$this->session->userdata('round2_login')['username']){
            redirect(round2path.'/login');
        }
        $quizDetails = $this->Model_Round2->getQuizDetailsByQuizid($quizid);
        if($quizDetails) {
            if ($quizDetails->status)
            {
                echo $_GET["callback"] . "(".json_encode( 1 ). ");";
            }
        }
    }
}