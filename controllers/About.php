<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'About Us';
        $data['title'] = 'About us';
        $this->load->model('Popup');
        $data['popup'] = $this->Popup->getLatest('about');
        // Load the views
        $this->load->view('header',$data);
        $this->load->view('about',$data);
        $this->load->view('modalview',$data);

        $this->load->view('footer');
    }
}