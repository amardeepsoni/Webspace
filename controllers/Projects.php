<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Projects extends CI_Controller {



	public function index()

	{

		$data=array();



		$data['page_title']="Projects";

		$data['meta_keyword']="Projects";

		$data['meta_description']="Projects";

		$data['heading']="Projects";

		$data['breadcrumbs'][] = array(

		'text' => 'Home',

		'href' => base_url()

		);

				

		$data['breadcrumbs'][] = array(

		'text' => 'Projects',

		'href' => base_url().'projects'

		);


$this->load->model('model_projects');

$data['projects']= array();	
    	$results = $this->model_projects->getprojects(0);
		if ($results) {  
			foreach($results as $val){
				if($val->image) {	
					$image = UPLOADFILE.$val->image;
				}

				else {
					$image = UPLOADFILE.'no_image.jpg';
				}
				$data['projects'][] = array(
				    'id' => $val->id,	
					'name' => $val->name,	
					'home' => $val->home,
					'subhead' => $val->subhead,		
					'shortdescription' => $val->shortdescription,							
					'description' => $val->description,	
				    'image' => $image

				);
			}
		}









		$this->load->view('header',$data);

		$this->load->view('projects',$data);

		$this->load->view('footer');

	}

}

