<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteStudent extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $data["students"]= null;
        $this->load->view(adminpath.'/header');
        $this->load->view(adminpath.'/deleteStudent',$data);
        $this->load->view(adminpath.'/footer');
    }

    public function search_student(){
        if (!$this->session->userdata('logged_in')) {
                redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');
        $this->load->model("model_student");
        $data["students"] = $this->model_student->searchStudents($this->input->post("student_Fname"), $this->input->post("student_Lname"), $this->input->post("school_name"));
        $this->load->view(adminpath.'/header');
        $this->load->view(adminpath.'/deleteStudent',$data);
        $this->load->view(adminpath.'/footer');
    }
    public function delete() {
        $regno = $this->input->post('student_id');
        $this->load->model('model_student');
        if($this->model_student->user_delete($regno)) {
            $this->session->set_flashdata('deleteSuccess', 'Student deleted successfully');
        }
        else
            $this->session->set_flashdata('deleteFail', 'Something went wrong');
        redirect(base_url().adminpath.'/DeleteStudent');
    }
}