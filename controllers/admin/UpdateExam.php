<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateExam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath . '/Model_updateExam');
        $this->load->model(adminpath.'/Model_addExam');
    }

    public function inst(){
        $inst = $this->input->post('instructions');
        $quizid = $this->input->post('quizid');
        $this->Model_updateExam->updateinst($quizid, $inst);
        redirect(adminpath.'/EditExam/'. $quizid);

    }
    public function enable($quizid) {
        $this->Model_updateExam->enableExam($quizid);
        redirect(adminpath.'/AllExams');
    }

    public function disable($quizid) {
        $this->Model_updateExam->disableExam($quizid);
        redirect(adminpath.'/AllExams');
    }

    public function remove($quizid) {
        $this->Model_updateExam->removeExam($quizid);
        redirect(adminpath . '/AllExams');
    }

    public function deleteQuestion($quizid,$quesid) {
        $this->Model_updateExam->deleteQuestionByID($quizid,$quesid);
        redirect(base_url().adminpath.'/EditExam/'.$quizid);
    }

    public function addQuestion() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $mcq2 = $this->input->post('mcq2');
            $mcq4 = $this->input->post('mcq4');
            $quizid = $this->input->post('quizid');
            $integer = $this->input->post('integer');
            $this->load->model(adminpath.'/Model_updateExam');
            $questionData = array(
                    'quizid' => $quizid,
                    'mcq2' => $mcq2,
                    'mcq4' => $mcq4,
                    'integer' => $integer,
                    'action' => base_url() . adminpath . '/UpdateExam/submitQuestions'
                );
                $questionData['total'] = $this->Model_updateExam->getExamByID($questionData['quizid'])->total;
                $this->load->view(adminpath . '/header');
                $this->load->view(adminpath . '/addExamQuestions.php', $questionData);
                $this->load->view(adminpath . '/footer');

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
            redirect(base_url().adminpath.'/EditExam/'.$quizid);
        }
        else
            show_404();

    }

    public function clone($quizid){

        // $level = $this->input->post('level');
        $data['exam'] = $this->Model_updateExam->getExamByID($quizid);
        // $this->Model_updateExam->clone($quizid, $level);
        // $data['q']= $this->Model_updateExam->clone($quizid, $level);
        // redirect(base_url().adminpath.'/AllExams/');
        $this->load->model(adminpath . '/Model_addExam');
        $data['skills'] = $this->Model_addExam->getAllSkills();

        $this->load->view(adminpath.'/header');

        $this->load->view(adminpath.'/clone', $data);
		$this->load->view(adminpath.'/footer');

    }
    public function funclone($quizid){

        $level = $this->input->post('level');
        $title = $this->input->post('title');
        $belongsto=$this->input->post('belongsto');
        $skill = $this->input->post('skill_name');
        // $this->Model_updateExam->clone($quizid, $level);
        // $data['q']= 
        $this->Model_updateExam->clone($quizid, $level, $title, $skill, $belongsto);
        redirect(base_url().adminpath.'/AllExams/');
    }

    public function updatequestions()
    {
        
        $data['quizid'] = $this->input->post('quizid');
        $data['qMCQ'] = $this->input->post('qMCQ');
        $qMCQ = $this->input->post('qMCQ');

        // $this->load->view('/dummy', $data);

        foreach($qMCQ as $qdata){
            $this->Model_updateExam->updatequestion($qdata);
        }
    }
}