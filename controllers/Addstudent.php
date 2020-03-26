<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addstudent extends CI_Controller {

	public function index() {

		$data = array();
		// Redirect user if not logged in
		if (!$this->session->userdata('schoollogged_in')['id']) {
			redirect('schoollogin');
		}
		$data['page_title'] = 'Add Student';
		$data['title'] = 'Add Student';
		//Action to add the studnets to the database
		$data['action'] = base_url() . 'addstudent/add';
		//Load the model_schoollavel model

		$this->load->model('model_schoollavel');
		// Fetching all the levels from the model_schoollavel
		$data['allschoollavels'] = array();
		$results = $this->model_schoollavel->getschoollavels();
		if ($results) {
			foreach ($results as $val) {
				$data['allschoollavels'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}
		// Fetching all the classs from the model_schoollavel
		$data['allschoolclasss'] = array();
		$results = $this->model_schoollavel->getschoolclass();
		if ($results) {
			foreach ($results as $val) {
				$data['allschoolclasss'][] = array(
					'id' => $val->id,
					'name' => $val->name,
				);
			}
		}
		// Load the views
		$this->load->view('accountheader', $data);
		$this->load->view('addstudent', $data);
		$this->load->view('accountfooter');
	}
	//Function to add the students
	public function add() {
		// Empty json array
		$json = array();
		// decode all the input data
		$first_name = json_decode($this->input->post('firstname'));
		$last_name = json_decode($this->input->post('lastname'));
		$email = json_decode($this->input->post('email'));
		$mobile = json_decode($this->input->post('mobile'));
		$level = json_decode($this->input->post('level'));
		$class = json_decode($this->input->post('classs'));
		// For loop to insert all the rows into database
		for ($count = 0; $count < count($first_name); $count++) {
			$first_name_clean = $first_name[$count];
			$last_name_clean = $last_name[$count];
			$email_clean = $email[$count];
			$mobile_clean = $mobile[$count];
			$level_clean = $level[$count];
			$class_clean = $class[$count];
			// Check if all the fields are filled
			if ($first_name_clean != '' && $last_name_clean != '' && $email_clean != '' && $mobile_clean != '' && $level_clean != '' && $class_clean != '') {
				if ($this->input->server('REQUEST_METHOD') == 'POST') {
					// Load the model
					$this->load->model('student_model');
					$checkaccount = $this->student_model->read_by_email($email_clean);
					// Check if the students already exists or not
					if ($checkaccount) {
						//Set the message
						$json['error'] = "This email already in our database.";
					} else {
						// Read the category_id of the school
						$category_id = $this->session->userdata('schoollogged_in')['id'];
						$this->load->model('school_model');
						// Read the recount of the school
						$res = $this->school_model->read_regcount($category_id);
						$regcount = $res->regcount;
						//Logic to generate the registrationno for the students
						if (strlen((string) $category_id) == 1) {
							$id = '000' . $category_id;
						} else if (strlen((string) $category_id) == 2) {
							$id = '00' . $category_id;
						} else if (strlen((string) $category_id) == 3) {
							$id = '0' . $category_id;
						} else {
							$id = $category_id;
						}

						$regcount++;
						if (strlen((string) $regcount) == 1) {
							$reg_count = '00' . $regcount;
						} else if (strlen((string) $regcount) == 2) {
							$reg_count = '0' . $regcount;
						} else {
							$reg_count = $regcount;
						}
						date_default_timezone_set('Asia/Kolkata');
						$reg_no = $id . $reg_count;
						$password = md5($reg_no);
						$data['regcount'] = $regcount;
						$data['category_id'] = $category_id;
						$data['student'] = (object) $postData = [
							'firstname' => $first_name_clean,
							'lastname' => $last_name_clean,

							'registrationno' => $reg_no,
							'category_id' => $this->session->userdata('schoollogged_in')['id'],
							'class' => $class_clean,
							'level' => $level_clean,
							'email' => $email_clean,
							'mobile' => $mobile_clean,
							'username' => $reg_no,
							'password' => $password,
							'mpassword' => $reg_no,
							'date_added' => date('Y-m-d h:i:s', time()),
						];
						//Add the data to the database
						if ($this->student_model->create($postData)) {
							// update the reg_count of the school
							$this->load->model('school_model');
							$this->school_model->updatereg_count($data);
							//Set the message after sucecss
							$json['success'] = "Successfully added student.";
						}
					}
				}
			}
		}
		if ($json) {
			echo json_encode($json);
		}

	}

	public function uploadFile() {
		$this->load->model('student_model');
		$this->load->model('school_model');
		$this->load->library('S3');
		$category_id = $_SESSION['schoollogged_in']['id'];
		$regcount = $this->school_model->read_regcount($category_id)->regcount;
		$filename = $_FILES['file']['tmp_name'];
		if ($_FILES["file"]["size"] > 0) {
			$ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
			if ($ext !== "csv") {
				echo "<script type=\"text/javascript\">
                           alert(\"Invalid File:Please Upload CSV(.csv) File.\");
                         </script>";
				redirect(base_url() . 'addstudent');
				die();
			}
			//Upload to S3
			$fileUploadName = time() . '_' . $_SESSION["schoollogged_in"]["id"] . "_" . $_SESSION["schoollogged_in"]["name"] . '_' . $_FILES['file']['name'];
			$this->s3->putObjectFile($filename, "codepipeline-ap-south-1-323045938757", 'Intellify_CSV/StudentRegistrationCSV/' . $fileUploadName, S3::ACL_PRIVATE);

			$handle = fopen($filename, "r");
			$i = 0;
			$j = 0;
			while ($data = fgetcsv($handle)) {
				if ($j) {
					$firstname = $data[1];
					$lastname = $data[2];
					$email = $data[3];
					$mobile = $data[4];
					$class = $data[5];

					if ($firstname && $class >= 5 && $class <= 12) {
//                        print_r($this->student_model->readRedundantStudent($firstname, $lastname, $class, $email, $mobile));

						if (!$this->student_model->readRedundantStudent($firstname, $lastname, $class, $email, $mobile)) {
							$i++;
							if ($class <= 6) {
								$level = 0;
							} else if ($class >= 7 && $class <= 8) {
								$level = 1;
							} else if ($class >= 9 && $class <= 10) {
								$level = 2;
							} else {
								$level = 3;
							}

							if (strlen((string) $category_id) == 1) {
								$id = '000' . $category_id;
							} else if (strlen((string) $category_id) == 2) {
								$id = '00' . $category_id;
							} else if (strlen((string) $category_id) == 3) {
								$id = '0' . $category_id;
							} else {
								$id = $category_id;
							}

							if (strlen((string) ($regcount + $i)) == 1) {
								$reg_count = '00' . ($regcount + $i);
							} else if (strlen((string) ($regcount + $i)) == 2) {
								$reg_count = '0' . ($regcount + $i);
							} else {
								$reg_count = ($regcount + $i);
							}
							date_default_timezone_set('Asia/Kolkata');
							$reg_no = $id . $reg_count;
							$password = md5($reg_no);
							$result = $this->student_model->create(array(
								'category_id' => $category_id,
								'firstname' => $firstname,
								'lastname' => $lastname,
								'email' => $email,
								'mobile' => $mobile,
								'username' => $reg_no,
								'registrationno' => $reg_no,
								'password' => $password,
								'level' => $level,
								'class' => $class,
								'status' => -1,
								'date_added' => date('Y-m-d h:i:s', time()),

							));
						}
					}

				}
				$j++;
			}
			$regcount += $i;
//            print_r($regcount);

			$this->school_model->updatereg_count(array(
				'regcount' => $regcount,
				'category_id' => $category_id,
			));
			fclose($handle);
		}
		redirect(base_url() . '/studentlist');
	}

	public function addSingleStudent() {
		$category_id = $this->session->userdata('schoollogged_in')['id'];
		$this->load->model('student_model');
		$this->load->model('school_model');
		// Read the recount of the school
		$res = $this->school_model->read_regcount($category_id);
		$regcount = $res->regcount;
		if (strlen((string) $category_id) == 1) {
			$id = '000' . $category_id;
		} else if (strlen((string) $category_id) == 2) {
			$id = '00' . $category_id;
		} else if (strlen((string) $category_id) == 3) {
			$id = '0' . $category_id;
		} else {
			$id = $category_id;
		}

		$regcount++;
		if (strlen((string) $regcount) == 1) {
			$reg_count = '00' . $regcount;
		} else if (strlen((string) $regcount) == 2) {
			$reg_count = '0' . $regcount;
		} else {
			$reg_count = $regcount;
		}

		$reg_no = $id . $reg_count;
		$password = md5($reg_no);
		$data['regcount'] = $regcount;
		$data['category_id'] = $category_id;
		$class = $this->input->post('class');
		if ($class <= 6) {
			$level = 0;
		} else if ($class >= 7 && $class <= 8) {
			$level = 1;
		} else if ($class >= 9 && $class <= 10) {
			$level = 2;
		} else {
			$level = 3;
		}
		date_default_timezone_set('Asia/Kolkata');

		$data['student'] = (object) $postData = [
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'registrationno' => $reg_no,
			'category_id' => $this->session->userdata('schoollogged_in')['id'],
			'class' => $this->input->post('class'),
			'level' => $level,
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('contact'),
			'username' => $reg_no,
			'password' => $password,
			'status' => -1,
			'date_added' => date('Y-m-d h:i:s', time()),
		];
		if ($this->student_model->create($postData)) {
			// update the reg_count of the school
			$this->school_model->updatereg_count($data);
			//Set the message after sucecss
		}
		redirect(base_url() . 'studentlist');

	}
}
