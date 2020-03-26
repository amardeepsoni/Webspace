<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddExam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath . '/Model_addExam');

    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            if($usertype=="content" || $usertype=="admin")
                redirect(adminpath . '/login');
        }
        $data = array();

        $data['breadcrumbs'][] = array(
            'text' => 'Add Exam',
            'href' => base_url() . adminpath . '/AddExam'
        );
        $data['heading'] = "Add Exam";
        $data['action'] = base_url() . adminpath . '/AddExam/addQuestions';
        $data['skills'] = $this->Model_addExam->getAllSkills();
        //Add quiz page
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/addExam', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function addQuestions()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $mcq2 = $this->input->post('mcq2');
            $mcq4 = $this->input->post('mcq4');
            $integer = $this->input->post('integer');
            $data = array(
                'title' => $this->input->post('title'),
                'total' => ($mcq2 + $mcq4 + $integer),
                'correct' => abs($this->input->post('correct')),
                'wrong' => abs($this->input->post('wrong')),
                'time' => $this->input->post('time'),
                'level' => $this->input->post('level'),
                'belongs_to' => $this->input->post('belongs_to'),
                'difficulty_index' => $this->input->post('difficulty_index'),
                'instructions' => $this->input->post('instructions')
            );
            if($data['belongs_to'] == 2) $data['status'] = 1;
            else $data['status'] = 0;
            $data['skill_id'] = $this->input->post('skill_id');
            $result = $this->Model_addExam->addQuiz($data);
            if ($result) {
                $quizDetails = $this->Model_addExam->getQuizDetails($data);
                $questionData = array(
                    'quizid' => $quizDetails->quizid,
                    'total' => $quizDetails->total,
                    'mcq2' => $mcq2,
                    'mcq4' => $mcq4,
                    'integer' => $integer,
                    'success' => "",
                    'error' => "",
                    'action' => base_url() . adminpath . '/AddExam/submitQuestions'
                );
                $this->load->view(adminpath . '/header');
                $this->load->view(adminpath . '/addExamQuestions.php', $questionData);
                $this->load->view(adminpath . '/footer');
            } else {
                redirect(adminpath . '/AddExam');
            }
        } else
            show_404();
    }

    public function submitQuestions()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $quizid = $this->input->post('quizid');
            $qdataMCQ = $this->input->post('qdataMCQ');
            $qdataINT = $this->input->post('qdataINT');
//            print_r($qdataMCQ);
//            print_r($qdataINT);
            //Save MCQ type questions in database
            if($qdataMCQ)
            foreach ($qdataMCQ as $qdata) {
                $result = $this->Model_addExam->saveMCQ($qdata,$quizid);
                if($result) {
                    $quesid = $this->Model_addExam->getQuesDetails($qdata['qnstext'],$quizid)[0]->quesid;
                    //Save corresponding options
                    $i=0;
                    foreach ($qdata['option'] as $option) {
                        if($i==0) $option_label = 'A';
                        else if ($i==1) $option_label = 'B';
                        else if ($i==2) $option_label = 'C';
                        else if ($i==3) $option_label = 'D';
                        $this->Model_addExam->addOptions(array(
                            'text' => $option,
                            'option_label' => $option_label,
                            'quesid' =>  $quesid
                        ));
                        if($i == $qdata['correct']) {
                            //Save answer in answer table
                            $this->Model_addExam->saveMCQanswer(array (
                                'quesid' => $quesid,
                                'answer' => $option_label
                            ));
                        }
                        $i++;
                    }
                }
                else
                    redirect($_SERVER['REQUEST_URI'], 'refresh');
                //redirect(base_url().adminpath.'/AllExams');
            }

            //Save integer type questions in database
            if($qdataINT)
            foreach($qdataINT as $qdata) {
                $result = $this->Model_addExam->saveINT($qdata,$quizid);
                if($result) {
                    $quesid = $this->Model_addExam->getQuesDetails($qdata['qnstext'],$quizid)[0]->quesid;
                    //Save corresponding answer
                    $this->Model_addExam->saveINTanswer(array (
                        'quesid' => $quesid,
                        'answer' => $qdata['correct']
                    ));

                }
                else
                    redirect($_SERVER['REQUEST_URI'], 'refresh');
            }
            echo "<body><script type='text/javascript'>alert('Quiz has been added');</script></body>";
            redirect(base_url().adminpath.'/AllExams');
        }
        else
            show_404();
    }
}