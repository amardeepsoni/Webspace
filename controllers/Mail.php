<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Mail';
        $data['title'] = 'Mail';
        // Load the views
        $this->load->view('header',$data);
        $this->load->view('mail',$data);
        $this->load->view('footer');
    }

    public function send(){
        echo "succees";
    }
}