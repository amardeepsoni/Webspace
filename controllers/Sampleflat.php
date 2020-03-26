<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampleflat extends CI_Controller {

	public function index()
	{
		$data="";

		$data['page_title']="Sample Flat";
		$data['meta_keyword']="Sample Flat";
		$data['meta_description']="Sample Flat";
		$data['heading']="Sample Flat";
		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => base_url()
		);
		
		
		
		$this->load->model('model_setting');
		
		
		$data['sampleflats']= array();	
    	$results = $this->model_setting->getsampleflats();
		if ($results) {  
			foreach($results as $val){
				if($val->image) {	
					$image = UPLOADFILE.$val->image;
				}
				else {
					$image = UPLOADFILE.'no_image.jpg';
				}
				$data['sampleflats'][] = array(
					'name' => $val->name,
					'home' => $val->home,										
				    'image' => $image
				);
			}
		}
		
		
		
		
		
		
		
		
		
				
		$data['breadcrumbs'][] = array(
		'text' => 'Sample Flat',
		'href' => base_url().'sampleflat'
		);

		$this->load->view('header',$data);
		$this->load->view('sampleflat',$data);
		$this->load->view('footer');
	}
}
