<?php

use GuzzleHttp\Psr7\Response;

defined('BASEPATH') or exit('No direct script access allowed');

class Quizes extends CI_Controller
{

    public function index($q_id)
    {
        echo 'Wrong extension';
    }
    public function applyquiz($q_id)
    {
        $this->load->model('Model_quiz', 'mq');
        if (($this->session->flashdata('quiz')['ques_no'])!=0) {
            $data['count'] = $this->session->flashdata('quiz')['ques_no'];
        } else {
            $data['count'] = 0;
        }
        $data['q_id'] = $q_id;
        $data['quizes'] = $this->mq->apply_quiz($q_id);
        
        $this->load->view('apply_quiz', $data);
    }
    public function result($q_id,$ques_no)
    {
        $quiz_result = array(
            'response'  => $this->input->post('quiz_response'),
            'user_id'   => $this->session->userdata('teacherlogin')['id'],      //Change User Id
            'ques' =>   $ques_no,
            'q_id' =>   $q_id,
        );
        $this->load->model('Model_quiz', 'mq');
        if ($this->mq->save_result($quiz_result)) {
            $ques_count['ques_no'] = ++$ques_no;
            $this->session->set_flashdata('quiz', $ques_count);            
            redirect('quizes/applyquiz/' . $quiz_result['q_id']);
        }
    }
}
