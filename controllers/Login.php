<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		if ($this->session->userdata('studentlogged_in')['id']) {
			redirect('myaccount');
		}
		$data = array();

		$data['page_title'] = 'Login';
		$data['meta_keyword'] = 'Login';
		$data['meta_description'] = 'Login';

		$data['breadcrumbs'][] = array(
			'text' => 'Home',
			'href' => base_url(),
		);

		$data['breadcrumbs'][] = array(
			'text' => 'Login',
			'href' => base_url() . 'login',
		);

		$data['action'] = base_url() . 'login/checklogin';
		$data['forgotaction'] = base_url() . 'login/forgotpassword';

		$this->load->view('accountstudentheader', $data);
		$this->load->view('login', $data);
		$this->load->view('accountfooter');
	}

	public function checklogin() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			if (!preg_match('/^\d+$/', htmlspecialchars($this->input->post('username')))) {

				$this->session->set_flashdata('loginnotify', 'Email and Password not Valid.');
				redirect('login');
			} else {
				$data['username'] = $this->input->post('username');
				$data['password'] = $this->input->post('password');

				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('loginnotify', 'Email and Password not Valid.');
					redirect('login');
				} else {
					$this->load->model('student_model');
					$result = $this->student_model->logincheck($data);
					if ($result == TRUE) {
						$username = $this->input->post('username');
						$result = $this->student_model->studentinfo($username);
						if ($result != false) {
							$session_data = array(
								'id' => $result->id,
								'registrationno' => $result->registrationno,
								'category_id' => $result->category_id,
								'firstname' => $result->firstname,
								'lastname' => $result->lastname,
								'level' => $result->level,
								'class' => $result->class,
								'username' => $result->username,
								'email' => $result->email,
								'mobile' => $result->mobile,
							);
							// Add user data in session
							$this->session->set_userdata('studentlogged_in', $session_data);
							if ($this->session->userdata('schoollogged_in')['id']) {
								$this->session->unset_userdata('schoollogged_in');
							}
							redirect('myaccount');
						}
					} else {
						$this->session->set_flashdata('loginnotify', 'Username and Password not Valid.');
						redirect('login');
					}
				}

			}
		}
	}

	public function forgotpassword() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$data['email'] = $this->input->post('email');
			$this->form_validation->set_rules('email', 'email', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('forgotnotify', 'Email not Valid.');
				redirect('forgotpassword');
			} else {
				$this->load->model('student_model');
				$result = $this->student_model->checkmail($data['email']);
				if ($result == TRUE) {
					$email = $this->input->post('email');
					$result = $this->student_model->customerinfo($email);
					if ($result != false) {

						$message = "<div style='width:600px; border:solid 1px #40383b'>";

						$message = $message . "<table width='100%' border='0' cellspacing='0' cellpadding='20'>";

						$message = $message . " <tr>";

						$message = $message . "<td bgcolor='#ffffff' style='border-bottom: solid 6px #40383b'>";

						$message = $message . "Dear " . $result[0]->firstname . " " . $result[0]->surname;

						$message = $message . ",<br />

						<br />";

						$message = $message . "<b>Your new password is:</b> " . $result[0]->mpassword . " <br /><br />";

						$message = $message . "

						You can change your password at any time by logging into your account.<br />

						<br />

						Regards,<br />

						Team NCHHW 2018 <br />";

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
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('forgotnotify', 'Email not Valid.');
					redirect('login');
				}
			}

		}
	}

	public function logout() {
		$this->session->unset_userdata('studentlogged_in');

		redirect('/');

	}

}
