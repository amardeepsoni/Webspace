<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Blog | Intellify';
        $data['title'] = 'Blog | Intellify';
        $this->load->view('header',$data);
        $this->load->view('blog',$data);
        $this->load->view('footer');
    }

    public function post($postId){
        $data['page_title'] = 'Blog | Intellify';
        $data['title'] = 'Blog | Intellify';
        $data['postId'] = $postId;
        $this->load->view('header',$data);
        $this->load->view('blogPost',$data);
        $this->load->view('footer');
    }
}