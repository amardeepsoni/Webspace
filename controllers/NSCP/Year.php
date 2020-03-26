<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year extends CI_Controller {
	public function index($year) {
		if ($year == 2017 || $year == 2018 || $year == 2020) {
			$data['page_title'] = 'NSCP ' . $year;
			$this->load->model('Popup');

			$data['popup'] = $this->Popup->getLatest('NSCP');
			$this->load->view('header', $data);
			$this->load->view('NSCP/' . $year);
			$this->load->view('modalview', $data);
			$this->load->view('footer');
		} else {
			show_404();
		}

	}
}