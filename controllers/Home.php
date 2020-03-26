<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->model('model_setting');
		$this->load->model('model_page');

		$data['page_title'] = webdata()->page_title;

		$data['meta_keyword'] = webdata()->meta_keyword;

		$data['meta_description'] = webdata()->meta_description;

		$data['action'] = base_url('register');

		$this->load->model('Popup');

		// $data['popup'] = $this->Popup->getLatest('home');

		$this->load->model('model_testimonials');

		$data['testimonials'] = array();
		$results = $this->model_testimonials->gettestimonials(0);
		if ($results) {
			foreach ($results as $val) {
				if ($val->image) {
					$image = UPLOADFILE . $val->image;
				} else {
					$image = UPLOADFILE . 'no_image.jpg';
				}
				$data['testimonials'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'home' => $val->home,
					'designation' => $val->designation,
					'description' => $val->description,
					'link' => $val->link,
					'image' => $image,

				);
			}
		}

		$this->load->model('model_projects');

		$data['homeprojects'] = array();
		$results = $this->model_projects->gethomeprojects(0);
		if ($results) {
			foreach ($results as $val) {

				if ($val->icon) {
					$icon = UPLOADFILE . $val->icon;
				} else {
					$icon = UPLOADFILE . 'no_image.jpg';
				}

				$data['homeprojects'][] = array(
					'id' => $val->id,
					'name' => $val->name,
					'home' => $val->home,
					'shortdescription' => $val->shortdescription,
					'icon' => $icon,
					'link' => $val->link,

				);
			}
		}

		$this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('modalview', $data);
		$this->load->view('footer');

		//get user ip

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			//ip from share internet
			$ips['ips'] = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			//ip pass from proxy
			$ips['ips'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ips['ips'] = $_SERVER['REMOTE_ADDR'];
		}

		$this->load->model('Model_clientIP');
		date_default_timezone_set('Asia/Kolkata');
		$now = date('Y-m-d h:i:s', time());
		$ips['created_at'] = $now;
		$this->Model_clientIP->clientInfo($ips);
		//get user ip

	}
}
