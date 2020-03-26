<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Countries extends CI_Controller {



	public function index()

	{

		$data=array();



		$data['page_title']="Select Country - Genuine Embassy Attestation Services";

		$data['meta_keyword']="Select Country - Genuine Embassy Attestation Services";

		$data['meta_description']="Select Country - Genuine Embassy Attestation Services";

		$data['heading']="Select Country";

		$data['breadcrumbs'][] = array(

		'text' => 'Home',

		'href' => base_url()

		);

				

		$data['breadcrumbs'][] = array(

		'text' => 'Select Country',

		'href' => base_url().'countries'

		);



		$this->load->view('header',$data);

		$this->load->view('countries',$data);

		$this->load->view('footer');

	}

}

