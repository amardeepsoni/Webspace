<?php
class Model_clientIP extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function clientInfo($ip) {
		$this->db->insert('user_IPs', $ip);
	}

}
