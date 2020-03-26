<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addquiz extends CI_Controller
{

    public function index()
    {
        $this->load->view('add_quiz');
    }
    public function setquiz()
    {
        $this->load->model('Model_quiz', 'mq');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $q_id  = rand(1000, 9999);
            $user = $this->session->userdata('teacherlogin')['id'];        //  User Session ID REPlace
            $quiz_data = array(
                'class' => strip_tags(trim($this->input->post('class'))),
                'board' => strip_tags(trim($this->input->post('board'))),
                'q_id'  => $q_id,
                'user_id'   => $user,
            );
            // print_r($quiz_data);
            if ($this->mq->add_quiz($quiz_data)) {
                $data['quiz'] = $this->mq->quiz_fetched($q_id);
                $this->session->set_flashdata('quiz_form', $quiz_data);
                redirect('addquiz');
            }
        }
    }
    public function addquestion()
    {
        $this->load->model('Model_quiz', 'mq');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get the form fields and remove whitespace.            
            $mcq_response = array(
                'question'  => strip_tags(trim($this->input->post('mcq_question'))),
                'option_a'  => strip_tags(trim($this->input->post('option_a'))),
                'option_b'  => strip_tags(trim($this->input->post('option_b'))),
                'option_c'  => strip_tags(trim($this->input->post('option_c'))),
                'option_d'  => strip_tags(trim($this->input->post('option_d'))),
                'solution'  => strip_tags(trim($this->input->post('solution'))),
                'link'  => strip_tags(trim($this->input->post('solution_link'))),
                'q_id'  => strip_tags(trim($this->input->post('q_id'))),
                'type'  => strip_tags(trim($this->input->post('type'))),
            );
            $this->mq->add_question($mcq_response);
        }
    }
}
