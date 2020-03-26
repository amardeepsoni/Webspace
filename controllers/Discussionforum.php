<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussionforum extends CI_Controller {

	public function index() {
		$data['page_title'] = "Discussion Forum";
		$data['title'] = "Discussion Forum";
		$this->load->model('Model_discussion');

		$data['posts'] = array();
		$results = $this->Model_discussion->getPosts();
		if ($results) {
			foreach ($results as $val) {
				$data['posts'][] = array(
					'post_id' => $val->id,
					'post_text' => $val->post_detail,
					'student_name' => $val->student_name,
					'student_email' => $val->student_email,
					'created_at' => $val->created_at,

				);
			}
		}

		// Load the views

		$this->load->view('DiscussionForum', $data);

	}

	public function addPost() {

		$this->load->model('Model_discussion');
		date_default_timezone_set('Asia/Kolkata');
		$now = date('Y-m-d h:i:s', time());
		$post_detail = $this->input->post('post_detail');
		$post_topic = $this->input->post('topic');

		$data['student_id'] = $this->input->post('student_id');
		$data['student_email'] = $this->input->post('student_email');
		$data['student_name'] = $this->input->post('student_name');
		$data['topic'] = filter_var($post_topic, FILTER_SANITIZE_STRING);
		$data['post_detail'] = filter_var($post_detail, FILTER_SANITIZE_STRING);
		$data['created_at'] = $now;

		$this->Model_discussion->add($data);
		redirect('/Discussionforum');
	}
}
