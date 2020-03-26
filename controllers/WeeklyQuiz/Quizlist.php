<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizlist extends CI_Controller {
	public function index($skill_id) {
		if (!$this->session->userdata('studentlogged_in')['id']) {
			redirect('login');
		}
		$data = array(
			'username' => $_SESSION['studentlogged_in']['username'],
			'page_title' => 'Quizlist',
		);
		$this->load->model('WeeklyQuiz/Model_WeeklyQuiz');
		$data['quizzes'] = $this->Model_WeeklyQuiz->getQuizzes($_SESSION['studentlogged_in']['level'], $skill_id);
		if (count($data['quizzes'])) {
			$i = 0;
			foreach ($data['quizzes'] as $quiz) {
				$history = $this->Model_WeeklyQuiz->getUserHistory($_SESSION['studentlogged_in']['username'], $quiz->quizid);
				if ($history) {

					if ($history->score < ($quiz->total * $quiz->correct) / 2) {
						$data['css'][$quiz->quizid] = "red";

					} else if ($history->score > ($quiz->total * $quiz->correct) / 2) {

						$data['css'][$quiz->quizid] = "limegreen";

					}

					if ($history->score < ($quiz->total * $quiz->correct) / 2) {
						break;
					} else {
						$data['quizzes'][$i]->flag = 1;
					}

				} else {
					$data['css'][$quiz->quizid] = "yellow";
					break;
				}
				$i++;
			}
			if ($i < count($data['quizzes'])) {
				$data['quizzes'][$i]->flag = 1;
			}

//        print_r($data);

			$this->load->view('accountstudentheader', $data);
			$this->load->view('WeeklyQuiz/quizlist', $data);
			$this->load->view('accountfooter');
		} else {
			$this->load->view('accountstudentheader', $data);
			$this->load->view('WeeklyQuiz/noquiz', $data);
			$this->load->view('accountfooter');
		}
	}

}