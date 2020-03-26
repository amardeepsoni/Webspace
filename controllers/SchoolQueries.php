<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolQueries extends CI_Controller
{

    public function index() {
        if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
        $this->load->model('school_model');
        $data['page_title'] = 'Your Queries';
        $data['heading'] = 'Your Queries';
        $data['title'] = 'Your Queries';
        $data['name'] = $this->session->userdata('schoollogged_in')['name'];
        $data['email'] = $this->session->userdata('schoollogged_in')['email'];
        $data['action'] = base_url().'SchoolQueries/ask';
        $data['queries'] = $this->school_model->getQueries($_SESSION['schoollogged_in']['id']);
        $this->load->view('accountheader',$data);
        $this->load->view('schoolQueries',$data);
        $this->load->view('accountfooter');
    }

    public function ask() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if(!$this->session->userdata('schoollogged_in')['id']){
                redirect('schoollogin');
            }
            $this->load->model('school_model');
            $data = array(
                'subject' => $this->input->post('subject'),
                'query' => $this->input->post('query'),
                'answer' => 'Not answered yet',
                'solved' => 0,
                'category_id' => $_SESSION['schoollogged_in']['id'],
                'schoolname' => $this->session->userdata('schoollogged_in')['name'],
                'date' => date("Y-m-d")
            );
            $result = $this->school_model->addQuery($data);
//            print_r($result);
//            print_r($data);
            //  redirect(base_url().'SchoolQueries');
            echo "<script> window.close(); </script>";

        }
        else
            show_404();
    }
}