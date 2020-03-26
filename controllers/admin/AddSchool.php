<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddSchool extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $data['heading'] = "Add School";
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/addSchool', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function upload() {
        $this->load->model('School_model');
        $this->load->library('S3');
        $filename = $_FILES['file']['tmp_name'];
        if($_FILES["file"]["size"] > 0)
        {
            $ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
            if($ext!=="csv"){
                echo "<script type=\"text/javascript\">
                           alert(\"Invalid File:Please Upload CSV(.csv) File.\");
                         </script>";
                redirect(base_url().adminpath.'/addSchool');
                die();
            }
            //Upload to S3
            $fileUploadName = time().$_FILES['file']['name'];
            $this->s3->putObjectFile($filename, "codepipeline-ap-south-1-323045938757", 'Intellify_CSV/SchoolRegistrationCSV/'.$fileUploadName, S3::ACL_PRIVATE);

            $handle = fopen($filename, "r");
            $i=0;
            while($data = fgetcsv($handle)) {
                if ($i) {
                    $data_school = array(
                        'contact_person_name' => $data[1],
                        'contact_person_designation' => $data[2],
                        'email' => $data[3],
                        'password' => md5($data[4]),
                        'name' => $data[5],
                        'mobile' => $data[6],
                        'mobile1' => $data[7],
                        'address' => $data[8],
                        'school_type' => $data[9],
                        'date_registered' => time()
                    );
                    $flag = false;
                    foreach ($data_school as $keyword) {
                        if (!$keyword) {
                            $flag = true;
                            break;
                        }
                    }
                    if($flag) continue;
                    $data_school['intern'] = $data[10];
                    if ($this->School_model->read_by_email($data_school['email'])) continue;
                    $result = $this->School_model->create($data_school);
                    $data_manager = array(
                        'name' => $data[11],
                        'email' => $data[12],
                        'contact_no' => $data[13]
                    );
                    //Store manager details
                    if ($data_manager['name'] || $data_manager['email'] || $data_manager['contact_no']) {
                        $data_manager['category_id'] = $this->School_model->read_by_email($data_school['email'])->category_id;
                        $this->School_model->create_manager($data_manager);
                    }
                }
                $i++;
            }
        }
        redirect(adminpath.'/registrationStats');
    }
}