<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
            redirect(adminpath.'/dashboard');
        }

		$data['action']=base_url("admin/login");
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('loginnotify', 'Username and Password not Valid.');
			} 
			else  {
				$this->load->model(adminpath.'/model_user');
				$result = $this->model_user->logincheck($data);
				if ($result == TRUE) {
					$username = $this->input->post('username');
					$result = $this->model_user->userinfo($username);
					if ($result != false)	{
						$session_data = array(
						'id' => $result[0]->id,
						'usertype_id' => $result[0]->usertype_id,
						'usertype' => $result[0]->usertype,
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					redirect(adminpath.'/dashboard');
					}
				}
				else {
					$this->session->set_flashdata('loginnotify', 'Username and Password not Valid.');
				}
			}

		}
		$this->load->view(adminpath.'/login',$data);
	}

 	public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect(adminpath.'/login', 'refresh');
    }

}
	