<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacherlist extends CI_Controller
{

    public function index()
    {
         // Redirect user if not logged in
         if (!$this->session->userdata('schoollogged_in')['id']) {
            redirect('schoollogin');
        }
        $this->load->model('Model_teacher', 'mt');
        
        $data['page_title'] = 'Add Teacher';
        $data['title'] = 'Add Teacher';
        $data['teacher_list'] = $this->mt->fetch_all_teachers($this->session->userdata('schoollogged_in')['name']);
        
        $this->load->view('accountheader', $data);
        $this->load->view('viewteacher',$data);
        $this->load->view('accountfooter');
    }
}
