<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->model(adminpath.'/model_user');
			$postdata = array();
			$category = $this->input->post('category');
			$postdata['page_title'] = $this->input->post('page_title');
			$postdata['meta_keyword'] = $this->input->post('meta_keyword');
			$postdata['meta_description'] = $this->input->post('meta_description');
			$postdata['address'] = $this->input->post('address');
			$postdata['context'] = $this->input->post('context');
			$postdata['phone'] = $this->input->post('phone');
			$postdata['email'] = $this->input->post('email');
			$postdata['fax'] = $this->input->post('fax');
			$postdata['googlemap'] = $this->input->post('googlemap');
			$postdata['socialsites'] = $this->input->post('socialsites');
			$postdata['feed'] = $this->input->post('feed');
			$postdata['follow'] = $this->input->post('follow');
			$postdata['facebook'] = $this->input->post('facebook');
			$postdata['gplus'] = $this->input->post('gplus');
			$postdata['twitter'] = $this->input->post('twitter');
			$postdata['aboutpro1'] = $this->input->post('aboutpro1');
			$postdata['aboutpro2'] = $this->input->post('aboutpro2');
			$postdata['aboutpro3'] = $this->input->post('aboutpro3');
			$postdata['aboutpro4'] = $this->input->post('aboutpro4');
			$this->model_user->updateprofile($postdata);
			$this->session->set_flashdata('settingnotify', 'Your profile has been successfully updated.');
			redirect(adminpath.'/setting');
		}

		$this->getform();

    }

    public function getform() {
		
		$this->load->model(adminpath.'/model_user');
			
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Setting',
		'href' => base_url().adminpath.'/setting'
		);
				
		$data['heading']="Setting";

		$data['action'] = base_url().adminpath.'/setting';


      	$info = $this->model_user->userinfo($this->session->userdata['logged_in']['username']);


    	if ($this->input->post('page_title')) {
      		$data['page_title'] = $this->input->post('page_title');
    	} elseif (isset($info)) {
			$data['page_title'] = $info[0]->page_title;
		} else {
      		$data['page_title'] = '';
    	}


    	if ($this->input->post('meta_keyword')) {
      		$data['meta_keyword'] = $this->input->post('meta_keyword');
    	} elseif (isset($info)) {
			$data['meta_keyword'] = $info[0]->meta_keyword;
		} else {
      		$data['meta_keyword'] = '';
    	}


    	if ($this->input->post('meta_description')) {
      		$data['meta_description'] = $this->input->post('meta_description');
    	} elseif (isset($info)) {
			$data['meta_description'] = $info[0]->meta_description;
		} else {
      		$data['meta_description'] = '';
    	}


    	if ($this->input->post('address')) {
      		$data['address'] = $this->input->post('address');
    	} elseif (isset($info)) {
			$data['address'] = $info[0]->address;
		} else {
      		$data['address'] = '';
    	}
		
		
		if ($this->input->post('context')) {
      		$data['context'] = $this->input->post('context');
    	} elseif (isset($info)) {
			$data['context'] = $info[0]->context;
		} else {
      		$data['context'] = '';
    	}


    	if ($this->input->post('phone')) {
      		$data['phone'] = $this->input->post('phone');
    	} elseif (isset($info)) {
			$data['phone'] = $info[0]->phone;
		} else {
      		$data['phone'] = '';
    	}

    	if ($this->input->post('email')) {
      		$data['email'] = $this->input->post('email');
    	} elseif (isset($info)) {
			$data['email'] = $info[0]->email;
		} else {
      		$data['email'] = '';
    	}

    	if ($this->input->post('fax')) {
      		$data['fax'] = $this->input->post('fax');
    	} elseif (isset($info)) {
			$data['fax'] = $info[0]->fax;
		} else {
      		$data['fax'] = '';
    	}

    	if ($this->input->post('googlemap')) {
      		$data['googlemap'] = $this->input->post('googlemap');
    	} elseif (isset($info)) {
			$data['googlemap'] = $info[0]->googlemap;
		} else {
      		$data['googlemap'] = '';
    	}

    	if ($this->input->post('socialsites')) {
      		$data['socialsites'] = $this->input->post('socialsites');
    	} elseif (isset($info)) {
			$data['socialsites'] = $info[0]->socialsites;
		} else {
      		$data['socialsites'] = '';
    	}



if ($this->input->post('feed')) {
      		$data['feed'] = $this->input->post('feed');
    	} elseif (isset($info)) {
			$data['feed'] = $info[0]->feed;
		} else {
      		$data['feed'] = '';
    	}
		
		
		
if ($this->input->post('follow')) {
      		$data['follow'] = $this->input->post('follow');
    	} elseif (isset($info)) {
			$data['follow'] = $info[0]->follow;
		} else {
      		$data['follow'] = '';
    	}
		
		
		
if ($this->input->post('facebook')) {
      		$data['facebook'] = $this->input->post('facebook');
    	} elseif (isset($info)) {
			$data['facebook'] = $info[0]->facebook;
		} else {
      		$data['facebook'] = '';
    	}
		
		
		
if ($this->input->post('gplus')) {
      		$data['gplus'] = $this->input->post('gplus');
    	} elseif (isset($info)) {
			$data['gplus'] = $info[0]->gplus;
		} else {
      		$data['gplus'] = '';
    	}
		
		
		
if ($this->input->post('twitter')) {
      		$data['twitter'] = $this->input->post('twitter');
    	} elseif (isset($info)) {
			$data['twitter'] = $info[0]->twitter;
		} else {
      		$data['twitter'] = '';
    	}
		
		
if ($this->input->post('aboutpro1')) {
      		$data['aboutpro1'] = $this->input->post('aboutpro1');
    	} elseif (isset($info)) {
			$data['aboutpro1'] = $info[0]->aboutpro1;
		} else {
      		$data['aboutpro1'] = '';
    	}
		
		
		
if ($this->input->post('aboutpro2')) {
      		$data['aboutpro2'] = $this->input->post('aboutpro2');
    	} elseif (isset($info)) {
			$data['aboutpro2'] = $info[0]->aboutpro2;
		} else {
      		$data['aboutpro2'] = '';
    	}
		
		
		
if ($this->input->post('aboutpro3')) {
      		$data['aboutpro3'] = $this->input->post('aboutpro3');
    	} elseif (isset($info)) {
			$data['aboutpro3'] = $info[0]->aboutpro3;
		} else {
      		$data['aboutpro3'] = '';
    	}
		
		
		
if ($this->input->post('aboutpro4')) {
      		$data['aboutpro4'] = $this->input->post('aboutpro4');
    	} elseif (isset($info)) {
			$data['aboutpro4'] = $info[0]->aboutpro4;
		} else {
      		$data['aboutpro4'] = '';
    	}








		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/profileform',$data);
		$this->load->view(adminpath.'/footer');
				
	}
}