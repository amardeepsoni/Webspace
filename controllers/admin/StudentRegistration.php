<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentRegistration extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $this->load->view(adminpath.'/header');
        $this->load->view(adminpath.'/studentRegistration');
        $this->load->view(adminpath.'/footer');
    }

    public function addStudent() {
        $category_id = $this->input->post('school_id');
        $this->load->model('student_model');
        $this->load->model('school_model');
        // Read the recount of the school
        $res = $this->school_model->read_regcount($category_id);
        $regcount = $res->regcount;
        if (strlen((string)$category_id) == 1) $id = '00' . $category_id;
        else if (strlen((string)$category_id) == 2) $id = '0' . $category_id;
        else $id = $category_id;
        $regcount++;
        if (strlen((string)$regcount) == 1) $reg_count = '00' . $regcount;
        else if (strlen((string)$regcount) == 2) $reg_count = '0' . $regcount;
        else $reg_count=$regcount;
        $reg_no = '6' . $id . $reg_count;
        $password = md5($reg_no);
        $data['regcount'] = $regcount;
        $data['category_id'] = $category_id;
        $class = $this->input->post('class');
        if ($class <= 6) $level = 0;
        else if ($class >= 7 && $class <= 8) $level = 1;
        else if ($class >= 9 && $class <= 10) $level = 2;
        else  $level = 3;
        $data['student'] = (object)$postData = [
            'firstname'    => $this->input->post('firstname'),
            'lastname'    => $this->input->post('lastname'),
            'registrationno' => $reg_no,
            'category_id' 	   => $category_id,
            'class' => $this->input->post('class'),
            'level' => $level,
            'email' 	   => $this->input->post('email'),
            'mobile' 	   => $this->input->post('contact'),
            'username'     => $reg_no,
            'password' 	   => $password,
            'status'   => -1,
            'date_added'  => date("Y-m-d"),
        ];
        if(!$this->student_model->readRedundantStudent($postData['firstname'], $postData['lastname'], $class, $postData['email'], $postData['mobile']))
        {
//            print_r('in here');
            if ($this->student_model->create($postData)){
            // update the reg_count of the school
            $this->school_model->updatereg_count($data);
            //Set the message after sucecss
            $this->session->set_flashdata('registrationSuccess', 'Student Registered Successfully');
            }
            else
                $this->session->set_flashdata('registrationFail', 'Something went wrong');
        }
        else
            $this->session->set_flashdata('registrationFail', 'Student already exists');
        redirect(base_url().adminpath.'/StudentRegistration');
    }

    public  function upload() {
        $this->load->model('student_model');
        $this->load->model('school_model');
        $this->load->library('S3');
        $category_id = $this->input->post('school_id');
        $schoolDetails = $this->school_model->read_by_id($category_id);
        $regcount = $schoolDetails->regcount;
        $filename = $_FILES['file']['tmp_name'];
        if($_FILES["file"]["size"] > 0)
        {

            $ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
            if($ext!=="csv"){
                echo "<script type=\"text/javascript\">
                           alert(\"Invalid File:Please Upload CSV(.csv) File.\");
                         </script>";
                redirect(base_url().adminpath.'/StudentRegistration');
                die();
            }
            //Upload to S3
            $fileUploadName = time().'_'.$category_id."_".$schoolDetails->name.'_byAdmin_'.$_FILES['file']['name'];
            $this->s3->putObjectFile($filename, "codepipeline-ap-south-1-323045938757", 'Intellify_CSV/StudentRegistrationCSV/'.$fileUploadName, S3::ACL_PRIVATE);
            $handle = fopen($filename, "r");
            $i=0;$j=0;
            while($data = fgetcsv($handle))
            {
                if($j) {
                    $firstname = $data[1];
                    $lastname = $data[2];
                    $email = $data[3];
                    $mobile = $data[4];
                    $class = $data[5];
                    if($firstname && $class>=5 && $class<=12) {
//                        print_r($this->student_model->readRedundantStudent($firstname, $lastname, $class, $email, $mobile));
                        if (!$this->student_model->readRedundantStudent($firstname, $lastname, $class, $email, $mobile)) {
                            $i++;
                            if ($class <= 6) $level = 0;
                            else if ($class >= 7 && $class <= 8) $level = 1;
                            else if ($class >= 9 && $class <= 10) $level = 2;
                            else  $level = 3;
                            if (strlen((string)$category_id) == 1) $id = '00' . $category_id;
                            else if (strlen((string)$category_id) == 2) $id = '0' . $category_id;
                            else $id = $category_id;
                            if (strlen((string)($regcount + $i)) == 1) $reg_count = '00' . ($regcount + $i);
                            else if (strlen((string)($regcount + $i)) == 2) $reg_count = '0' . ($regcount + $i);
                            else $reg_count = ($regcount + $i);
                            $reg_no = '6' . $id . $reg_count;
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
                                'status' => -1
                            ));
                        }
                    }
                }
                $j++;
            }
            $regcount+= $i;
//            print_r($regcount);
            if($this->school_model->updatereg_count(array(
                'regcount' => $regcount,
                'category_id' => $category_id
            )))
                $this->session->set_flashdata('uploadSuccess', 'Uploaded Successfully');
            else
                $this->session->set_flashdata('uploadFail', 'Upload Failed');
            fclose($handle);
        }
        redirect(base_url().adminpath.'/StudentRegistration/');
    }
}