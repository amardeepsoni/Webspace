<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class schoollogin extends CI_Controller {
	public function index() {
		if ($this->session->userdata('schoollogged_in')['id']) {
			redirect('schoolaccount');
		}

		$data = array();
		$data['page_title'] = 'schoollogin';
		$data['meta_keyword'] = 'schoollogin';
		$data['meta_description'] = 'schoollogin';
		$data['breadcrumbs'][] = array(
			'text' => 'Home',
			'href' => base_url(),
		);
		$data['breadcrumbs'][] = array(
			'text' => 'schoollogin',
			'href' => base_url() . 'schoollogin',
		);

		//Login action
		$data['action'] = base_url() . 'schoollogin/checkschoollogin';
		//Forgot action
		$data['forgotaction'] = base_url() . 'schoollogin/forgotpassword';

		// Loading views
		$this->load->view('accountheader', $data);
		$this->load->view('schoollogin', $data);
		$this->load->view('accountfooter');
	}

// Checkschoollogin function
	public function checkschoollogin() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", htmlspecialchars($this->input->post('email')))) {

				$this->session->set_flashdata('schoolloginnotify', 'Email and Password not Valid.');
				redirect('schoollogin');

			} else {
				$data['email'] = htmlspecialchars($this->input->post('email'));
				$data['password'] = htmlspecialchars($this->input->post('password'));
				// Form validation
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('schoolloginnotify', 'Email and Password not Valid.');
					redirect('schoollogin');
				} else {
					// Loading school_model
					$this->load->model('school_model');
					$result = $this->school_model->validatelogin($data);
					if ($result) {
						$email = $this->input->post('email');
						$result = $this->school_model->schoolinfo($email);
						if (true) {
							// Setting sessio data
							$session_data = array(
								'id' => $result->category_id,
								'name' => $result->name,
								'email' => $result->email,
								'regcount' => $result->regcount,
							);
							// Add user data in session
							$this->session->set_userdata('schoollogged_in', $session_data);
							if ($this->session->userdata('studentlogged_in')['id']) {
								$this->session->unset_userdata('studentlogged_in');
							}
							redirect(base_url() . 'schoolaccount');
						}
					}
					// Wrong Email and password
					else {
						$this->session->set_flashdata('schoolloginnotify', 'Username and Password not Valid.');
						redirect('schoollogin');
					}
				}

			}
		}
	}
// forgotpassword function
	public function forgotpassword() {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$data['email'] = $this->input->post('email');
			$this->form_validation->set_rules('email', 'email', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('forgotnotify', 'Email not Valid.');
				redirect('schoollogin');
			} else {
				$this->load->model('school_model');
				$result = $this->school_model->checkmail($data['email']);
				if ($result == TRUE) {
					$email = $this->input->post('email');
					$result = $this->school_model->customerinfo($email);
					if ($result != false) {
						$message = "<div style='width:600px; border:solid 1px #40383b'>";
						$message = $message . "<table width='100%' border='0' cellspacing='0' cellpadding='20'>";
						$message = $message . " <tr>";
						$message = $message . "<td bgcolor='#ffffff' style='border-bottom: solid 6px #40383b'>";
						$message = $message . "Dear " . $result[0]->firstname . " " . $result[0]->surname;
						$message = $message . ",<br /><br />";
						$message = $message . "<b>Your new password is:</b> " . $result[0]->mpassword . " <br /><br />";
						$message = $message . "You can change your password at any time by logging into your account.<br /><br />Regards,<br />Team NCHHW 2018 <br />";
						$message = $message . "</td>";
						$message = $message . " </tr>";
						$message = $message . "  </table>";
						$subject = "New password for " . $result[0]->firstname . "";
						$this->email->set_mailtype("html");
						$this->email->from($data['email'], "New password for " . $result[0]->firstname);
						$this->email->to($data['email']);
						$this->email->subject($subject);
						$this->email->message($message);
						$this->email->send();
						$this->session->set_flashdata('forgotnotify', 'Pssword send to your email.');
						redirect('schoollogin');
					}
				} else {
					$this->session->set_flashdata('forgotnotify', 'Email not Valid.');
					redirect('schoollogin');
				}
			}
		}
	}
// Logout function
	public function schoollogout() {
		$this->session->unset_userdata('schoollogged_in');
		redirect('schoollogin', 'refresh');
	}
}
