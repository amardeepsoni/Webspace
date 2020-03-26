<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('WeeklyQuiz/Model_WeeklyQuiz');
	}

	public function index($quizid) {
		if (!$this->session->userdata('studentlogged_in')['username']) {
			redirect('login');
		}
		//Check whether quiz exists
		$quizDetails = $this->Model_WeeklyQuiz->getQuizDetailsByQuizid($quizid);
		if (!$quizDetails || $quizDetails->Level != $_SESSION['studentlogged_in']['level']) {
			$this->load->view('errors/wrong.php');
			return;
		}

		//Check whether he has already scored more than 50% in the quiz
		$userHistory = $this->Model_WeeklyQuiz->getUserHistory($_SESSION['studentlogged_in']['username'], $quizid);
		if ($userHistory) {
			//If he has scored greater than 50% then redirect to result page
			if ($userHistory->score >= ($quizDetails->total * $quizDetails->correct) / 2) {
				redirect(base_url() . 'WeeklyQuiz/Result/' . $quizid);
			}

			//Else clear the history and user answer table to allow him to reappear in quiz
			else {
				$this->Model_WeeklyQuiz->clearUserResponses($_SESSION['studentlogged_in']['username'], $quizid);
				$this->Model_WeeklyQuiz->clearUserHistory($_SESSION['studentlogged_in']['username'], $quizid);
			}
		}

		$data = array();
		$data['page_title'] = "Quiz";
		$data['quizDetails'] = $quizDetails;
		//Get question details
		$data['questionDetails'] = $this->Model_WeeklyQuiz->getQuestionsByQuizID($quizid);
		$i = 0;
		foreach ($data['questionDetails'] as $ques) {
			$data['questionDetails'][$i]->options = $this->Model_WeeklyQuiz->getOptionsByQuestionID($ques->quesid);
			$i++;
		}

		$this->load->view('WeeklyQuiz/quizView', $data);
		$this->load->view('accountfooter');
	}
	public function handleUserResponse() {
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 604800');
		header("Access-Control-Allow-Headers: *");
		header("Content-type: application/json");
		header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
		if (!$this->session->userdata('studentlogged_in')['username']) {
			redirect('login');
		}
		if ($this->input->server('REQUEST_METHOD') == 'OPTIONS') {
			exit(0);
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$userAnswer = $this->input->post('userAnswer');
			$quesid = $this->input->post('quesid');
			$correctAns = $this->Model_WeeklyQuiz->getAnswer($quesid)->answer;
			if ($correctAns == $userAnswer) {
				$flag = 1;
			} else {
				$flag = -1;
			}

			if ($this->Model_WeeklyQuiz->getUserResponse($_SESSION['studentlogged_in']['username'], $quesid)) {
				$this->Model_WeeklyQuiz->updateResponse(array(
					'username' => $_SESSION['studentlogged_in']['username'],
					'quesid' => $quesid,
					'flag' => $flag,
					'user_response' => $userAnswer,
				));
			} else {
				$this->Model_WeeklyQuiz->saveResponse(array(
					'username' => $_SESSION['studentlogged_in']['username'],
					'quesid' => $quesid,
					'flag' => $flag,
					'user_response' => $userAnswer,
				));
			}

		} else {
			show_404();
		}

	}

	public function submit($quizid) {
		if (!$this->session->userdata('studentlogged_in')['username']) {
			redirect('login');
		}
		$quizDetails = $this->Model_WeeklyQuiz->getQuizDetailsByQuizid($quizid);
		$correctResponses = $this->Model_WeeklyQuiz->getCorrectResponsesByQuizID($_SESSION['studentlogged_in']['username'], $quizid);
		$incorrectResponses = $this->Model_WeeklyQuiz->getIncorrectResponsesByQuizID($_SESSION['studentlogged_in']['username'], $quizid);
		$correct = count($correctResponses);
		$wrong = count($incorrectResponses);
		$score = $correct * $quizDetails->correct - $wrong * $quizDetails->wrong;
		$userHistory = $this->Model_WeeklyQuiz->getUserHistory($_SESSION['studentlogged_in']['username'], $quizid);
		if ($userHistory) {
			$this->Model_WeeklyQuiz->updateUserHistory(array(
				'username' => $_SESSION['studentlogged_in']['username'],
				'quizid' => $quizid,
				'correct' => $correct,
				'wrong' => $wrong,
				'score' => $score,
			));
		} else {
			$this->Model_WeeklyQuiz->insertUserHistory(array(
				'username' => $_SESSION['studentlogged_in']['username'],
				'quizid' => $quizid,
				'correct' => $correct,
				'wrong' => $wrong,
				'score' => $score,
			));
		}
		redirect(base_url() . 'WeeklyQuiz/Result/' . $quizid);
	}

}