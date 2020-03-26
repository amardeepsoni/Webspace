<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageSkills extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath . '/Model_Skills');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $data = array();
        $data['heading'] = "Manage Skills";
        $data['skills'] = $this->Model_Skills->getSkills();
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/manageSkills', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function add() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!$this->session->userdata('logged_in')) {
                    redirect(adminpath . '/login');
            }
            $usertype = $this->session->userdata("logged_in ")["usertype"];
            if($usertype=="content")
                redirect(adminpath.'/login');
            $data = array(
                'skill_name' => $this->input->post('skill_name'),
                'round' => $this->input->post('round')
            );

            if($this->Model_Skills->checkSkill($data['skill_name'])) {
                $this->session->set_flashdata('skillAddFail', 'Skill Already Exists');
                redirect(base_url().adminpath.'/ManageSkills');
            }
            $this->load->library('S3');
            $ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
            if($ext!="png" && $ext!="jpeg" && $ext!="jpg"){
                $this->session->set_flashdata('skillAddFail', 'Image Format Not Supported');
                redirect(base_url().adminpath.'/ManageSkills');
            }
            $filename = $_FILES['file']['tmp_name'];
            $fileUploadName = 'SKILL_NAME_'.$data['skill_name'].'__ROUND__'.$data['round'].'__'.$_FILES['file']['name'];
            $this->s3->putObjectFile($filename, "codepipeline-ap-south-1-323045938757", 'Intellify_IMG/Skill_IMG/'.$fileUploadName, S3::ACL_PRIVATE);
            $data['image'] =  'https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/Skill_IMG/'.$fileUploadName;

            if($this->Model_Skills->add($data)) {
                $this->session->set_flashdata('skillAddSuccess', 'Skill added successfully');
            }
            else
                $this->session->set_flashdata('skillAddFail', 'Something Went Wrong');

            redirect(base_url().adminpath.'/ManageSkills');
        }
        else
            show_404();
    }

    public function update() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if (!$this->session->userdata('logged_in')) {
                if($usertype=="olympiad" || $usertype=="admin")
                    redirect(adminpath . '/login');
            }

            $data = array(
                'skill_name' => $this->input->post('skill_name'),
                'skill_id' => $this->input->post('skill_id'),
                'round' => $this->input->post('round')
            );

            if($_FILES['file']['size']) {
                $this->load->library('S3');
                $ext = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
                if($ext!="png" && $ext!="jpeg" && $ext!="jpg"){
                    $this->session->set_flashdata('skillUpdateFail', 'Image Format Not Supported');
                    redirect(base_url().adminpath.'/ManageSkills');
                }
                $filename = $_FILES['file']['tmp_name'];
                $fileUploadName = 'SKILL_NAME_'.$data['skill_name'].'__ROUND__'.$data['round'].'__'.$_FILES['file']['name'];
                $this->s3->putObjectFile($filename, "codepipeline-ap-south-1-323045938757", 'Intellify_IMG/Skill_IMG/'.$fileUploadName, S3::ACL_PRIVATE);
                $data['image'] =  'https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/Skill_IMG/'.$fileUploadName;
            }

            if($this->Model_Skills->update($data)) {
                $this->session->set_flashdata('skillUpdateSuccess', 'Skill Updated Successfully');
            }
            else
                $this->session->set_flashdata('skillUpdateFail', 'Something Went Wrong');

            redirect(base_url().adminpath.'/ManageSkills');
        }
        else
            show_404();
    }

    public function delete($id) {
            if (!$this->session->userdata('logged_in')) {
                if($usertype=="olympiad" || $usertype=="admin")
                    redirect(adminpath . '/login');
            }
            $this->load->model(adminpath.'/Model_updateExam');
            $quizzes = $this->Model_Skills->getQuizzesBySkillID($id);
            foreach ($quizzes as $quiz) {
                $this->Model_updateExam->removeExam($quiz->quizid);
            }
            if($this->Model_Skills->delete($id)) {
                $this->session->set_flashdata('skillDeleteSuccess', 'Skill deleted successfully');
            }
            else
                $this->session->set_flashdata('skillDeleteFail', 'Something Went Wrong');
            redirect(base_url().adminpath.'/ManageSkills');

    }

}