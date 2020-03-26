<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Contactus extends CI_Controller {



	public function index()

	{

		$data=array();



		$data['page_title']="Reach us
";

		$data['meta_keyword']="Reach us
";

		$data['meta_description']="Reach us
";

		$data['heading']="Contact <span class='heading-color'>Us </span>";

		$data['breadcrumbs'][] = array(

		'text' => 'Home',

		'href' => base_url()

		);

				

		$data['breadcrumbs'][] = array(

		'text' => 'Reach us
',

		'href' => base_url().'contactus'

		);



		$this->load->view('header',$data);

		$this->load->view('contactus',$data);

		$this->load->view('footer');

	}

}

