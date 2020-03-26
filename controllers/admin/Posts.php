<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function index() {

		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion');

		$data['posts'] = array();
		$results = $this->Model_discussion->getPostsadmin();
		if ($results) {
			foreach ($results as $val) {
				$data['posts'][] = array(
					'post_id' => $val->id,
					'post_topic' => $val->topic,
					'post_text' => $val->post_detail,
					'student_name' => $val->student_name,
					'student_email' => $val->student_email,
					'created_at' => $val->created_at,
					'status' => $val->status,

				);
			}
		}
		// Load the views
		$this->load->view(adminpath . '/header');
		$this->load->view(adminpath . '/Posts', $data);
		$this->load->view(adminpath . '/footer');

	}

	public function disable($id) {
		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion');
		$this->Model_discussion->disable($id);
		redirect('/admin/posts');
	}
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		$this->load->model('Model_discussion');
		$this->Model_discussion->remove($id);
		redirect('/admin/posts');
	}

}