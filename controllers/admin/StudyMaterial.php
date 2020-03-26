<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudyMaterial extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            if ($usertype == "content" || $usertype == "admin")
                redirect(adminpath . '/login');
        }
        $this->load->model(adminpath . '/Model_studyMaterial');
        $data['studyMaterial'] = $this->Model_studyMaterial->getAll();
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/studyMaterial', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function upload()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!$this->session->userdata('logged_in')) {
                if ($usertype == "content" || $usertype == "admin")
                    redirect(adminpath . '/login');
            }
            $data = array(
                'chapter' => $this->input->post('chapter'),
                'class' => $this->input->post('class'),
                'subject' => $this->input->post('subject'),
                'category' => $this->input->post('category'),
                'contentUrl' => $this->input->post('contentUrl')
            );
            $this->load->library('S3');
            $fileName = $_FILES['file']['chapter'];
            $fileTempName = $_FILES['file']['tmp_name'];

            $path =  'StudyMaterial/';
            if ($data['subject'] == 'Math') $path .= 'Math/';
            else if ($data['subject'] == 'Science') $path .= 'Science/';
            else $path .= 'Resources/';
            if ($data['class'] == 1) $path .= 'class1/';
            else if ($data['class'] == 2) $path .= 'class2/';
            else if ($data['class'] == 3) $path .= 'class3/';
            else if ($data['class'] == 4) $path .= 'class4/';
            else if ($data['class'] == 5) $path .= 'class5/';
            else if ($data['class'] == 6) $path .= 'class6/';
            else if ($data['class'] == 7) $path .= 'class7/';
            else if ($data['class'] == 8) $path .= 'class8/';
            else if ($data['class'] == 9) $path .= 'class9/';
            else if ($data['class'] == 10) $path .= 'class10/';
            else if ($data['class'] == 11) $path .= 'class11/';
            else $path .= 'class12/';
            $path .= $fileName;
            if ($fileTempName != "") {
                if ($this->s3->putObjectFile($fileTempName, "codepipeline-ap-south-1-323045938757", $path, S3::ACL_PRIVATE)) {
                    $data['url'] = 'https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/' . $path;
                    $this->load->model(adminpath . '/Model_studyMaterial');
                    $result = $this->Model_studyMaterial->insert($data);
                    if ($result)
                        $this->session->set_flashdata('uploadSuccess', 'Uploaded Successfully');
                    else
                        $this->session->set_flashdata('uploadFail', 'Something Went Wrong');
                } else
                    $this->session->set_flashdata('uploadFail', 'Something Went Wrong');
                redirect(base_url() . adminpath . '/StudyMaterial');
            } else {
                $data['url'] = "";
                $this->load->model(adminpath . '/Model_studyMaterial');
                $result = $this->Model_studyMaterial->insert($data);
                if ($result)
                    $this->session->set_flashdata('uploadSuccess', 'Uploaded Successfully');
                else
                    $this->session->set_flashdata('uploadFail', 'Something Went Wrong');
                redirect(base_url() . adminpath . '/StudyMaterial');
            }
        } else
            show_404();
    }

    public function delete()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!$this->session->userdata('logged_in')) {
                if ($usertype == "content" || $usertype == "admin")
                    redirect(adminpath . '/login');
            }
            $id = $this->input->post('id');
            $url = $this->input->post('url');
            $path = substr($url, 73);
            //            print_r($path);
            $this->load->library('S3');
            if ($path != "") {
                if ($this->s3->deleteObject("codepipeline-ap-south-1-323045938757", $path)) {
                    $this->load->model(adminpath . '/Model_studyMaterial');
                    $result = $this->Model_studyMaterial->delete($id);
                    if ($result)
                        $this->session->set_flashdata('deleteSuccess', 'Deleted Successfully');
                    else
                        $this->session->set_flashdata('deleteFail', 'Something Went Wrong');
                } else
                    $this->session->set_flashdata('deleteFail', 'Something Went Wrong');
                redirect(base_url() . adminpath . '/StudyMaterial');
            } else {
                $this->load->model(adminpath . '/Model_studyMaterial');
                $result = $this->Model_studyMaterial->delete($id);
                if ($result)
                    $this->session->set_flashdata('deleteSuccess', 'Deleted Successfully');
                else
                    $this->session->set_flashdata('deleteFail', 'Something Went Wrong');
                redirect(base_url() . adminpath . '/StudyMaterial');
            }
        } else
            show_404();
    }
}
