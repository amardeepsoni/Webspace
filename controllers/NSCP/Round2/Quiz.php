<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(round2path . '/Model_Round2');
    }

    public function index($quizid)
    {
        if (!$this->session->userdata('round2_login')['username']) {
            redirect(round2path . '/login');
        }
        $quizDetails = $this->Model_Round2->getQuizDetailsByQuizid($quizid);
        if (!$quizDetails || $quizDetails->Level != $_SESSION['round2_login']['level']) {
            $this->load->view('errors/wrong.php');
            return;
        }

        if ($this->Model_Round2->checkUser($_SESSION['round2_login']['username'], $quizid))
            $this->load->view(round2path.'/submitQuiz');
        else {
            $data = array();
            $data['quizDetails'] = $quizDetails;
            $data['questionDetails'] = $this->Model_Round2->getQuestionsByQuizID($quizid);
            $i = 0;
            foreach ($data['questionDetails'] as $ques) {
                $data['questionDetails'][$i]->options = $this->Model_Round2->getOptionsByQuestionID($ques->quesid);
                $i++;
            }
//            echo json_encode($data['questionDetails']);
            $this->Model_Round2->updateUserHistory(array(
                'username' => $_SESSION['round2_login']['username'],
                'quizid' => $quizid
            ));
            $data['skill_name'] = $this->Model_Round2->getSkillByID($data['quizDetails']->skill_id);
            $this->load->view(round2path . '/quizView', $data);
            $this->load->view(round2path . '/modalview', $data);
        }
    }

    public function handleUserResponse()
    {
        header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 604800');
        header ("Access-Control-Allow-Headers: *");
//        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Auth-Token, X-requested-with');
        header("Content-type: application/json");
        header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
        if (!$this->session->userdata('round2_login')['username']) {
            redirect(round2path . '/login');
        }
        if($this->input->server('REQUEST_METHOD') == 'OPTIONS')
            exit(0);
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $userAnswer = $this->input->post('userAnswer');
            $quesid = $this->input->post('quesid');
            $correctAns = $this->Model_Round2->getAnswer($quesid)->answer;
//            print_r($correctAns);
            if ($correctAns == $userAnswer)
                $flag = 1;
            else
                $flag = -1;
            $this->Model_Round2->saveResponse(array(
                'username' => $_SESSION['round2_login']['username'],
                'quesid' => $quesid,
                'flag' => $flag,
                'user_response' => $userAnswer
            ));
        } else
            show_404();
    }

}