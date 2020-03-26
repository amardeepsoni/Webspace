<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addpopup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Popup');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $data['heading'] = "Add Recent News";

        $this->load->view(adminpath . '/header', $data);
        $this->load->view(adminpath . '/addpopup', $data);
        $this->load->view(adminpath . '/footer');
    }

    public function add()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $this->load->model('Popup');

        $this->load->library('S3');
        $data = array();
        $filename = $_FILES['file']['tmp_name'];
        $data = array();
        $fileUploadName = $_FILES['file']['name'];
        
        $this->s3->putObjectFile($filename, "codepipeline-ap-south-1-323045938757", 'Intellify_IMG/POPUP_IMG/' . $fileUploadName, S3::ACL_PRIVATE);
        
        $allowedImg = array('gif', 'png', 'jpg','JPG','PNG','GIF');
        $allowedVid = array('mp4','avi','mkv','MKV','MP4','AVI' );
        $info = new SplFileInfo($fileUploadName);
        $ext = $info->getExtension();
        if (in_array($ext, $allowedImg)) {
         $data['imageURL'] =  'https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/POPUP_IMG/' . $fileUploadName;
        
        }
        if(in_array($ext, $allowedVid))
        {
            $data['videoURL'] =  'https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/POPUP_IMG/' . $fileUploadName;
        
        }

        
        $data['text'] = $this->input->post('text');
        $data['heading'] = $this->input->post('heading');


        $this->Popup->add($data);
        redirect(adminpath);
    }
}
