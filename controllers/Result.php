<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(adminpath.'/Model_Remarks');
    } 

    public function round1() {
        if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
        $data = array();
        $this->load->helper('url');
        $data['page_title'] = 'Result';
        $data['title'] = 'Result';
        $data['heading']="Result";
        $data['category_id'] = $this->session->userdata('schoollogged_in')['id'];
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();
        $data['action'] = base_url()."result/gresult";
        $this->load->view('accountheader',$data);
        $this->load->view('result_r1',$data);
        $this->load->view('accountfooter');
    }

    public function round2() {
        if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
        $data = array();
        $this->load->helper('url');
        $data['page_title'] = 'Result';
        $data['title'] = 'Result';
        $data['heading']="Result";
        $data['category_id'] = $this->session->userdata('schoollogged_in')['id'];
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();

        $data['action'] = base_url()."result/gresult";
        $this->load->view('accountheader',$data);
        $this->load->view('result_r2',$data);
        $this->load->view('accountfooter');
    }

    public function overall() {
        if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
        $data = array();
        $this->load->helper('url');
        $data['page_title'] = 'Result';
        $data['title'] = 'Result';
        $data['heading']="Result";
        $data['category_id'] = $this->session->userdata('schoollogged_in')['id'];
        $data['remarks'] = $this->Model_Remarks->getAllRemarks();

        $data['action'] = base_url()."result/gresult";
        $this->load->view('accountheader',$data);
        $this->load->view('result_overAll',$data);
        $this->load->view('accountfooter');
    }

    public function export_csv($school_id){
        if(!$this->session->userdata('logged_in')){
            redirect('schoollogin');
        }
		$this->load->model(adminpath.'/model_school');
		$fileName = 'schooldata_'.$school_id.'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=". $fileName);
        header("Content-Type: application/csv; ");
        $studentDetails = $this->model_school->fetchHistory($school_id);
        $file = fopen('php://output', 'w');
        $header = array("Username","First Name","Last Name","Class","Status","Skill1", "Skill2","Skill3", "Skill4", "Skill5", "Total");
        fputcsv($file, $header);
        foreach ($studentDetails as $key=>$line){
            fputcsv($file,$line);
        }
        fclose($file);
        //exit;
        // redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);
    }

    public function gresult(){
        $json = array();
        $this->load->helper('url');
        $path = base_url(). 'intellify/intellify-master/';
        shell_exec('cd ' .$path );
        shell_exec('python analyse.py');
        $category_id = $this->session->userdata('schoollogged_in')['id'];
        if (strlen((string)$category_id) == 1) $id = '500' . $category_id;
        else if (strlen((string)$category_id) == 2) $id = '50' . $category_id;
        else $id = '5' . $category_id;
        redirect($path . 'data/' . $id . '/data.html');
        //echo json_encode($json);

    }
}