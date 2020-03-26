<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditExam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath . '/Model_updateExam');
    }
    public function index($quizid) {
        $data['quizDetails'] = $this->Model_updateExam->getExamByID($quizid);
        if(!$data['quizDetails']) show_404();
        $data['questionDetails'] = $this->Model_updateExam->getQuestionsByQuizID($quizid);
        $i = 0;
        foreach ($data['questionDetails'] as $ques) {
            $data['questionDetails'][$i]->options = $this->Model_updateExam->getOptionsByQuestionID($ques->quesid);
            $data['questionDetails'][$i]->ayesha= $this->Model_updateExam->getCorrectAnsByID($ques->quesid);
            $i++;
        }
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/editExam', $data);
        $this->load->view(adminpath . '/footer');
    }
}