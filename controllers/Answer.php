<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends CI_Controller {

	public function index($id) {
		// get post
		$this->load->model('Model_discussion');
		$data['post'] = array();
		$results = $this->Model_discussion->getPostByID($id);

		if ($results) {
			// Select Operation
			$results = $results[0];
			$data['post'][] = array(
				'post_id' => $results->id,
				'post_text' => $results->post_detail,
				'student_name' => $results->student_name,
				'student_email' => $results->student_email,
				'created_at' => $results->created_at,

			);
		}
		//end post section

		// get answer
		$data['post_ans'] = array();
		$answers = $this->Model_discussion->getAnsByPID($id);

		if ($answers) {
			// Select Operation

			foreach ($answers as $answer) {
				# code...
				$data['post_ans'][] = array(
					'ans_id' => $answer->ans_id,
					'ans_owner' => $answer->ans_owner,
					'ans' => $answer->ans,
					'upvotes' => $answer->upvotes,
					'downvotes' => $answer->downvotes,
					'created_at' => $answer->created_at,

				);

			}

		}
		//end get answer

		//upvote

		// Load the views

		$this->load->view('answers', $data);

	}

//}
	public function addAns($id) {

		$this->load->model('Model_discussion_ans');
		$now = date("Y-m-d H:i:s");
		$answer = $this->input->post('answer');
		$data['post_id'] = $id;
		$data['ans_owner'] = $this->input->post('student_name');
		$data['ans'] = filter_var($answer, FILTER_SANITIZE_STRING);
		$data['created_at'] = $now;

		$this->Model_discussion_ans->add_ans($data);
		redirect('/Discussionforum');
	}

	public function upVote() {
		$this->load->model('Model_discussion_ans');

		$data = $this->Model_discussion_ans->upvote();
		echo json_encode($data);

	}

	public function downVote() {
		$this->load->model('Model_discussion_ans');
		try {
			$data = $this->Model_discussion_ans->downvote();
			echo json_encode($data);
		} catch (Exception $e) {
			echo 'Message: ' . $e->getMessage();
		}

	}
}

/*
$ans_ids = $this->input->post('upvote');
$data['postans'] = array();
if ($ans_ids) {

# code...
$variable = $this->Model_discussion_ans->upvote($ans_ids);
if ($variable) {
# code...

$data['postans'][] = array(
'ans_ids' => $ans_ids,
'variable' => $variable,
);

echo $postans['variable'];
} else {
$data['postans'][] = array(
'ans_ids' => $ans_ids);}

} else {
$data['postans'][] = array(
'ans_ids' => "ok");
}
echo "false";

}
 */