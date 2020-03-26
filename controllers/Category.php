<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index()
	{
		$this->load->model('model_category');
		$this->load->model('model_testpanel');
		$data=array();
		$parts = explode('/', $this->uri->uri_string());
		$keyword = end($parts);
		if($keyword){
		
		$info = $this->model_category->getkeywordcategory($keyword);


		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => base_url()
		);

		

    	$categorybreadcrumbs=breadcrumbs($info->linkname);
    	if($categorybreadcrumbs){
    		foreach($categorybreadcrumbs as $categorybreadcrumb){
    			$data['breadcrumbs'][] = array(
					'text' => $categorybreadcrumb['text'],
					'href' => $categorybreadcrumb['href']
				);
    		}
    	}


		if (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}

		if (isset($info)) {
			$data['id'] = $info->id;
		} else {
      		$data['id'] = '';
    	}

    	if (isset($info)) {
			$data['page_title'] = $info->page_title;
		} else {
      		$data['page_title'] = '';
    	}


    	if (isset($info)) {
			$data['meta_keyword'] = $info->meta_keyword;
		} else {
      		$data['meta_keyword'] = '';
    	}


    	if (isset($info)) {
			$data['meta_description'] = $info->meta_description;
		} else {
      		$data['meta_description'] = '';
    	}


    	if (isset($info)) {
			$data['shortdescription'] = $info->shortdescription;
		} else {
      		$data['shortdescription'] = '';
    	}


    	if (isset($info)) {
			$data['description'] = $info->description;
		} else {
      		$data['description'] = '';
    	}

    	if (isset($info)) {
			$data['image'] = $info->image;
		} else {
      		$data['image'] = '';
    	}

    	if (isset($info)) {
			$data['banner'] = $info->banner;
		} else {
      		$data['banner'] = '';
    	}

    	$filterdata=array(
    		'category_id' => $info->id
    	);
    	
    	$data['alltest']= array();	
		$testresults = $this->model_testpanel->gettestpanels($filterdata);

		if($testresults){
			foreach($testresults as $testresult){

				if($testresult->image) {	
					$image = UPLOADFILE.$testresult->image;
				}
				else {
					$image = UPLOADFILE.'no_image.jpg';
				}


				$data['alltest'][] = array(
					'id' => $testresult->id,
					'name' => $testresult->name,
					'image' => $image,
					'startdate' => $testresult->startdate,
					'description' => $testresult->description,
					'href' => base_url('testpanel?testid='.$testresult->id)
				);
			}
		}

		
    	$this->load->view('header',$data);
    	$this->load->view('category',$data);
    	$this->load->view('footer');
		}
		else {
    		redirect('home');
		}
	}
}
