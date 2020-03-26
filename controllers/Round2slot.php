<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Round2slot extends CI_Controller
{

	public function index()
	{
		// Redirect user if not logged in 
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		$this->load->model('Model_round2slot');
		$this->load->model('school_model');
		$schoolinfo = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
		$data = array(
			"page_title" => 'Round 2 Slot',
			"title" => 'Round 2 Slot',
			"heading" => 'Round 2 Slot',
			"schoolinfo" => $schoolinfo,
			"slot" => $this->Model_round2slot->isreg($schoolinfo->category_id),
			"regcount" => $this->Model_round2slot->regcount($schoolinfo->category_id),
			"r2count" => $this->Model_round2slot->r2count($schoolinfo->category_id),
			"regcount"=> $this->Model_round2slot->regcount($schoolinfo->category_id),

		);

		if ($data['r2count'] <= $data['regcount']) {		

			$data['selectedslots'] = $this->Model_round2slot->getSelectedSlots($data['schoolinfo']->category_id);

			$this->load->view('accountheader', $data);
			$this->load->view('r2success', $data);
			$this->load->view('accountfooter');
		} else {


			$data['slots'] = $this->Model_round2slot->getAll($data['r2count']);


			// Load the views
			$this->load->view('accountheader', $data);
			$this->load->view('round2slot', $data);
			$this->load->view('accountfooter');
		}
	}

	public function book($id)
	{
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		$count = $this->input->post("count");
		$this->load->model('school_model');
		$this->load->model('Model_round2slot');

		$data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
		$this->Model_round2slot->bookSlot($id, $data['schoolinfo']->category_id, $count);
		redirect('Round2slot');
	}
}
