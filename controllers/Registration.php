<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function index() {
		$data = array(
			'action' => base_url() . 'Registration/validate',
			'page_title' => "Registration",
		);
		$this->load->model('Popup');

		$data['popup'] = $this->Popup->getLatest('register');
		$this->load->view('header', $data);
		$this->load->view('registration', $data);
		$this->load->view('modalview', $data);

		$this->load->view('footer', $data);
	}

	public function validate() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model('School_model');
			date_default_timezone_set('Asia/Kolkata');

			$data = array(
				'contact_person_name' => $this->input->post('contact_person_name'),
				'contact_person_designation' => $this->input->post('contact_person_designation'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password1')),
				'name' => $this->input->post('institute_name'),
				'mobile' => $this->input->post('mobile'),
				'mobile1' => $this->input->post('mobile1'),
				'address' => $this->input->post('address'),
				'City' => $this->input->post('city'),
				'State' => $this->input->post('state'),
				'Pincode' => $this->input->post('pincode'),
				'school_type' => $this->input->post('Institute_type'),
				'date_registered' => date('Y-m-d h:i:s', time()),
			);

			$flag = 0;
			foreach ($data as $keyword) {
				if (!$keyword) {
					$flag = 1;

					break;

				}
			}

			if ($flag) {
				$cdata = array(
					'message' => 'All fields are not specified',
					'flag' => 2,
					'action' => base_url() . 'Registration/validate',
				);
				echo json_encode($cdata);

			} else {
				if ($this->School_model->read_by_email($data['email'])) {
					$cdata = array(
						'message' => 'Email already exists',
						'flag' => 0,
						'action' => base_url() . 'Registration/validate',
					);
					//                    print_r($cdata);
					echo json_encode($cdata);
				} else {
					$data['intern'] = $this->input->post('intern');
					$result = $this->School_model->create($data);
					//manager details
					$data_manager = array(
						'name' => $this->input->post('manager_name'),
						'email' => $this->input->post('manager_email'),
						'contact_no' => $this->input->post('manager_contactno'),
					);
					//Store manager details
					if ($data_manager['name'] || $data_manager['email'] || $data_manager['contact_no']) {
						$data_manager['category_id'] = $this->School_model->read_by_email($data['email'])->category_id;
						$this->School_model->create_manager($data_manager);
					}

					$cdata = array(
						'message' => 'Successfully Registered',
						'flag' => 1,
						'action' => base_url() . 'Registration/validate',
					);
					echo json_encode($cdata);
				}
			}
		} else {
			show_404();
		}

	}
}
