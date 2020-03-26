<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExtractData extends CI_Controller {
	public function index() {

		if (!$this->session->userdata('logged_in')) {
			if ($usertype == "content" || $usertype == "admin") {
				redirect(adminpath . '/login');
			}

		}
		// Load the views
		// $this->load->view(adminpath . '/header');
		$this->load->view(adminpath . '/extractData');
		// $this->load->view(adminpath . '/footer');

	}

}