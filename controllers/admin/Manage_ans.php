<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_ans extends CI_Controller {

	public function index($id) {

		if (!$this->session->userdata('logged_in')) {

			redirect(adminpath . '/login', $usertype);

		} else {
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
						'status' => $answer->status,

					);

				}
			}
			//end get answer

			//upvote

			// Load the views
			$this->load->view(adminpath . '/header');
			$this->load->view(adminpath . '/manageAnswers', $data);
			$this->load->view(adminpath . '/footer');

		}
	}

//}
	public function addAns($id) {
		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}

		$this->load->model('Model_discussion_ans');
		$now = date("Y-m-d H:i:s");
		$data['post_id'] = $id;
		$data['ans_owner'] = $this->input->post('student_name');
		$data['ans'] = $this->input->post('answer');
		$data['created_at'] = $now;

		$this->Model_discussion_ans->add_ans($data);
		redirect('/Discussionforum');
	}

	public function upVote() {
		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion_ans');
		try {
			$data = $this->Model_discussion_ans->upvote();
			echo json_encode($data);
		} catch (Exception $e) {
			echo 'Message: ' . $e->getMessage();
		}

	}

	public function downVote() {
		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion_ans');
		try {
			$data = $this->Model_discussion_ans->downvote();
			echo json_encode($data);
		} catch (Exception $e) {
			echo 'Message: ' . $e->getMessage();
		}

	}

	public function disable($id) {

		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion_ans');
		$this->Model_discussion_ans->disable($id);
		redirect('/admin/Posts');
	}
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion_ans');
		$this->Model_discussion_ans->remove($id);
		redirect('/admin/posts');
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