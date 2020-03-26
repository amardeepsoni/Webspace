<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WeeklyQuiz/Model_WeeklyQuiz');
    }

    public function index($quizid)
    {
        if (!$this->session->userdata('studentlogged_in')['username']) {
            redirect( 'login');
        }
        $data['page_title'] = "Result";
        $data['quizDetails'] = $this->Model_WeeklyQuiz->getQuizDetailsByQuizid($quizid);
        $data['questionDetails'] = $this->Model_WeeklyQuiz->getQuestionsByQuizID($quizid);
        $data['userHistory'] = $this->Model_WeeklyQuiz->getUserHistory($_SESSION['studentlogged_in']['username'],$quizid);

        $i = 0;
        foreach ($data['questionDetails'] as $ques) {
            if($this->Model_WeeklyQuiz->checkOptions($ques->quesid)) {
               $data['questionDetails'][$i]->correctAns = $this->Model_WeeklyQuiz->getCorrectMCQAns($ques->quesid);
               $data['questionDetails'][$i]->userResponse =  $this->Model_WeeklyQuiz->getMCQResponse($_SESSION['studentlogged_in']['username'],$ques->quesid);
           }
           else {
               $data['questionDetails'][$i]->correctAns = $this->Model_WeeklyQuiz->getCorrectINTAns($ques->quesid);
               $data['questionDetails'][$i]->userResponse = $this->Model_WeeklyQuiz->getINTResponse($_SESSION['studentlogged_in']['username'],$ques->quesid);
           }
            $i++;
        }
        $this->load->view('accountstudentheader',$data);
        $this->load->view('WeeklyQuiz/quizResult', $data);
        $this->load->view('accountfooter');
    }
}