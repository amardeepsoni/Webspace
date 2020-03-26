<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = "FAQ's";
        $data['title'] = "FAQ's";

		$this->load->model('model_faq');

		$data['faqs'] = array();
		$results = $this->model_faq->getfaq(0);
		if ($results) {
			foreach ($results as $val) {
		        // Select Operation
		        $data['faqs'][] = array(
		        	'id' => $val->id,
		            'questions' => $val->questions,
		            'answers' => $val->answers,
		            'audio_url' => $val->audio_url
		        );
	    	}

	    	 // Load the views
	        $this->load->view('header',$data);
	        $this->load->view('faq',$data);
	        $this->load->view('footer'); 
    	}
	}
}