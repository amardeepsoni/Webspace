<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

    private function runScript($csvPath,$total,$skill1_1,$skill1_2,$skill2_1,$skill2_2,$skill3_1,$skill3_2,$skill4_1,$skill4_2,$skill5_1,$skill5_2) {
         $o = shell_exec('python3 -W ignore scripts/result_analysis.py '.$csvPath.' 5 '.$total.' '.$skill1_1.' '.$skill1_2.' '.$skill2_1.' '.$skill2_2.' '.$skill3_1.' '.$skill3_2.' '.$skill4_1.' '.$skill4_2.' '.$skill5_1.' '.$skill5_2.'  2>&1');
        if($o) {
//            print_r($o);
            return true ;
        }
        else {
            $ch = curl_init('https://api.intellify.in/api/SetQualifications');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $response = curl_exec($ch);
            $status = curl_getinfo($ch);
            return false;
        }
    }

    private function runQuesScript($csvPath , $qtype , $quizid , $path) {

        $o = shell_exec('python3 -W ignore scripts/question_upload.py '.$csvPath.' '.$qtype.' '.$quizid.' '.$path.' 2>&1');
       if($o) {
//            print_r($o);
           return true ;
       }
        else
            return false;
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }
        $this->load->view(adminpath.'/header');
        $this->load->view(adminpath.'/uploadCSV');
        $this->load->view(adminpath.'/footer');
    }

    public function uploadData() {
        $this->load->library('S3');
//        print_r($_FILES);
//        print_r($this->input->post('user_file'));
            $fileName = time().'_'.$_FILES['user_file']['name'];
            $fileTempName = $_FILES['user_file']['tmp_name'];
            $ext = pathinfo(basename($_FILES['user_file']['name']), PATHINFO_EXTENSION);
            if(($ext!="csv") || $_FILES['user_file']['size']<=0) {
                $this->session->set_flashdata('uploadFail','Something Went Wrong');
                redirect(base_url().adminpath.'/UploadController');
            }
            if ($this->s3->putObjectFile($fileTempName, "codepipeline-ap-south-1-323045938757", 'Intellify_CSV/Round1/'.$fileName, S3::ACL_PRIVATE)) {
                    $total = $this->input->post('total');
                    $skill1_1 = $this->input->post('skill1_1');
                    $skill1_2 = $this->input->post('skill1_2');
                    $skill2_1 = $this->input->post('skill2_1');
                    $skill2_2 = $this->input->post('skill2_2');
                    $skill3_1 = $this->input->post('skill3_1');
                    $skill3_2 = $this->input->post('skill3_2');
                    $skill4_1 = $this->input->post('skill4_1');
                    $skill4_2 = $this->input->post('skill4_2');
                    $skill5_1 = $this->input->post('skill5_1');
                    $skill5_2 = $this->input->post('skill5_2');
                    $result = $this->runScript($fileTempName,$total,$skill1_1,$skill1_2,$skill2_1,$skill2_2,$skill3_1,$skill3_2,$skill4_1,$skill4_2,$skill5_1,$skill5_2);
                    if($result)
                        $this->session->set_flashdata('uploadFail','Something Went Wrong');
                    else
                        $this->session->set_flashdata('uploadSuccess','Uploaded Successfully');
            }
            else
                $this->session->set_flashdata('uploadFail','Something Went Wrong');

        redirect(base_url().adminpath.'/UploadController');
    }

    public function uploadQuesImages() {
//     print_r($_FILES);
//        phpinfo();
     $this->load->library('S3');
     $quizid = $this->input->post('quizid');
     $result = false;
     for($i = 0; $i < count($_FILES['ques_images']['name']); $i++ ) {
         $ext = pathinfo(basename($_FILES['ques_images']['name'][$i]), PATHINFO_EXTENSION);
         if(($ext=="png" || $ext=="jpeg" || $ext=="jpg") && $_FILES['ques_images']['size'][$i]>0){
             $fileName = $_FILES['ques_images']['name'][$i];
            $fileTempName = $_FILES['ques_images']['tmp_name'][$i];
            if($this->s3->putObjectFile($fileTempName, "codepipeline-ap-south-1-323045938757", 'Intellify_IMG/Quiz_IMG/'.$quizid.'/questions/'.$fileName, S3::ACL_PRIVATE))
                 $result = true;
            else {
                 $result = false;
                 break;
             }
         }
     }
        if($result)
            $this->session->set_flashdata('uploadSuccess','Uploaded Successfully');
        else
            $this->session->set_flashdata('uploadFail','Something Went Wrong');

        $this->load->model(adminpath.'/Model_updateExam');
        $questionData = array(
            'quizid' => $this->input->post('quizid'),
            'mcq2' => 0,
            'mcq4' => 0,
            'integer' => 0,
            'success' => "",
            'error' => "",
            'action' => base_url() . adminpath . '/AddExam/submitQuestions'
        );
        $questionData['total'] = $this->Model_updateExam->getExamByID($questionData['quizid'])->total;
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/addExamQuestions', $questionData);
        $this->load->view(adminpath . '/footer');
    }

    public function uploadOptionsImages() {
//     print_r($_FILES);
        $this->load->library('S3');
        $quizid = $this->input->post('quizid');
        $result = false;
        for($i = 0; $i < count($_FILES['options_images']['name']); $i++ ) {
            $ext = pathinfo(basename($_FILES['options_images']['name'][$i]), PATHINFO_EXTENSION);
            if(($ext=="png" || $ext=="jpeg" || $ext=="jpg") && $_FILES['options_images']['size'][$i]>0){
                $fileName = $_FILES['options_images']['name'][$i];
                $fileTempName = $_FILES['options_images']['tmp_name'][$i];
                if($this->s3->putObjectFile($fileTempName, "codepipeline-ap-south-1-323045938757", 'Intellify_IMG/Quiz_IMG/'.$quizid.'/options/'.$fileName, S3::ACL_PRIVATE))
                    $result = true;
                else {
                    $result = false;
                    break;
                }
            }
        }
        if($result)
            $this->session->set_flashdata('uploadSuccess','Uploaded Successfully');
        else
            $this->session->set_flashdata('uploadFail','Something Went Wrong');

        $this->load->model(adminpath.'/Model_updateExam');
        $questionData = array(
            'quizid' => $this->input->post('quizid'),
            'mcq2' => 0,
            'mcq4' => 0,
            'integer' => 0,
            'success' => "",
            'error' => "",
            'action' => base_url() . adminpath . '/AddExam/submitQuestions'
        );
        $questionData['total'] = $this->Model_updateExam->getExamByID($questionData['quizid'])->total;
        $this->load->view(adminpath . '/header');
        $this->load->view(adminpath . '/addExamQuestions', $questionData);
        $this->load->view(adminpath . '/footer');
    }

    public function uploadQuesData() {
        $this->load->library('S3');
        $fileName = time().'_'.$_FILES['user_file']['name'];
        $fileTempName = $_FILES['user_file']['tmp_name'];
        if ($this->s3->putObjectFile($fileTempName, "codepipeline-ap-south-1-323045938757", 'Intellify_CSV/Questions/'.$fileName, S3::ACL_PRIVATE)) {
            $quizid = $this->input->post('quizid');
            $path =  'https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/Quiz_IMG/'.$quizid;
            $result = $this->runQuesScript($fileTempName, $this->input->post('qtype'), $quizid , $path);
           // redirect(adminpath.'/AllExams');
            $this->load->model(adminpath.'/Model_updateExam');
            $questionData = array(
                'quizid' => $this->input->post('quizid'),
                'mcq2' => 0,
                'mcq4' => 0,
                'integer' => 0,
                'action' => base_url() . adminpath . '/AddExam/submitQuestions'
            );
            $questionData['total'] = $this->Model_updateExam->getExamByID($questionData['quizid'])->total;
            if($result)
                $this->session->set_flashdata('uploadFail','Something Went Wrong');
            else
                $this->session->set_flashdata('uploadSuccess','Uploaded Successfully');
            $this->load->view(adminpath . '/header');
            $this->load->view(adminpath . '/addExamQuestions', $questionData);
            $this->load->view(adminpath . '/footer');
        }
        else
        {
            $this->session->set_flashdata('uploadFail','Something Went Wrong');
            $this->load->model(adminpath.'/Model_updateExam');
            $questionData = array(
                'quizid' => $this->input->post('quizid'),
                'mcq2' => 0,
                'mcq4' => 0,
                'integer' => 0,
                'action' => base_url() . adminpath . '/AddExam/submitQuestions'
            );
            $questionData['total'] = $this->Model_updateExam->getExamByID($questionData['quizid'])->total;
            $this->load->view(adminpath . '/header');
            $this->load->view(adminpath . '/addExamQuestions', $questionData);
            $this->load->view(adminpath . '/footer');
        }
    }
}
