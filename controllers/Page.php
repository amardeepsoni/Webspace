<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$this->load->model('model_page');
		$data=array();
		$parts = explode('/', $this->uri->uri_string());
		$keyword = end($parts);
		if($keyword){
			
		$data['subpagecontents'] = array();
    	$results = $this->model_page->getsubpagecontent();

		if ($results) {  

			foreach($results as $val){

				if($val->image) {	

					$image = UPLOADFILE.$val->image;

				}

				else {

					$image = UPLOADFILE.'no_image.jpg';

				}

				$data['subpagecontents'][] = array(

					'name' => $val->name,	

					'description' => $val->description,

					'image' => $image

				);

			}

		}




			
			
			
			
			
		
		$info = $this->model_page->getkeywordpage($keyword);

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => base_url()
		);
				
		$data['breadcrumbs'][] = array(
		'text' => $info->name,
		'href' => base_url().$info->linkname
		);

		if (isset($info)) {
			$data['name'] = $info->name;
		} else {
      		$data['name'] = '';
    	}
		
		if (isset($info)) {
			$data['bannerhead'] = $info->bannerhead;
		} else {
      		$data['bannerhead'] = '';
    	}
		
		
			if (isset($info)) {
			$data['images'] = $info->image;
		} else {
      		$data['images'] = '';
    	}

    	if (isset($info)) {
			$data['linkname'] = $info->linkname;
		} else {
      		$data['linkname'] = '';
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
    		if($info->image) {	
					$thumbimage=resizeimage($info->image,600,300);
					$data['image'] = $thumbimage;
				}
			else {
					$thumbimage=resizeimage('no_image.jpg',600,300);
					$data['image'] = $thumbimage;
				}
    	}
    	else {
				$thumbimage=resizeimage('no_image.jpg',600,300);
				$data['image'] = $thumbimage;
		}
    	if (isset($info)) {
    		if($info->banner) {	
					$thumbimage=resizeimage($info->banner,1366,400);
					$data['banner'] = $thumbimage;
				}
			else {
					$thumbimage=resizeimage('no_image.jpg',1366,400);
					$data['banner'] =$thumbimage;
				}
    	}
		else {
				$thumbimage=resizeimage('no_image.jpg',1366,400);
				$data['banner'] = $thumbimage;
			}

    	if (isset($info)) {
    		if($info->pdf) {	
					$data['pdf'] = "<a href='".$info->pdf."' target='_blank'>Click Here </a>";
				}
			else {
					$data['pdf'] = "";
				}
    	}
    	else {
				$data['pdf'] = "";
		}
		
		
		
		
		
			$data['subpages']= array();  
            $results = $this->model_page->getsubpages($info->id);
            if ($results) {
                foreach($results as $val){
                    if($val->image) {  
                        $thumbimage=resizeimage($val->image,500,334);
                        $image = $thumbimage;

                    }
                    else {

                        $thumbimage=resizeimage('no_image.jpg',500,334);
                        $image = $thumbimage;

                    }
                        $data['subpages'][] = array(
                        'id' => $val->id,
                        'name' => $val->name, 
					    'description' => $val->description,  
						'image' => $image,  
                        'href'  => base_url().$val->linkname
                        );
					}
				  }




		$data['catproducts']=array();



		$catresults = $this->model_page->getallcategoriess(0);



		if ($catresults) {



			foreach($catresults as $catval){



				$products= array();	



				$results = $this->model_page->getproductcategory($catval->id);







				if ($results) {



					foreach($results as $val){



						if($val->image) {	



							$thumbpdfcap=resizeimage($val->image,250,250);



							$image = $thumbpdfcap;



						}



						else {



							$thumbpdfcap=resizeimage('no_image.jpg',250,250);



							$image = $thumbpdfcap;



						}







						$products[] = array(

							'id' => $val->id,

							'name' => $val->name,

							'designation' => $val->designation,
							
							'shortdescription' => $val->shortdescription,


							'image' => $image



						);



					}



				}







				$data['catproducts'][] = array(
					'id' => $catval->id,
					'name' => $catval->name,
					'products' => $products



				);



			}



		}


$this->load->model('model_testimonials');

$data['testimonials']= array();	
    	$results = $this->model_testimonials->gettestimonials(0);
		if ($results) {  
			foreach($results as $val){
				if($val->image) {	
					$image = UPLOADFILE.$val->image;
				}

				else {
					$image = UPLOADFILE.'no_image.jpg';
				}
				$data['testimonials'][] = array(
				    'id' => $val->id,	
					'name' => $val->name,	
					'home' => $val->home,
					'designation' => $val->designation,							
					'description' => $val->description,									
                  
				    'image' => $image

				);
			}
		}



		
			$this->load->view('header',$data);
			$this->load->view('page',$data);
			$this->load->view('footer');
		}
		else {
    		redirect('home');
		}
	}
}
