<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect(adminpath . '/login');
		}

		$data["usertype"] = $this->session->userdata("logged_in")["usertype"];
		$this->load->view(adminpath . '/header');
		$this->load->view(adminpath . '/dashboard', $data);
		$this->load->view(adminpath . '/footer');

	}
}