<?php
class Model_Projects extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getprojects() {
		$this->db->select('*');
		$this->db->from('projects');		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function gethomeprojects() {
		$this->db->select('*');
		$this->db->from('projects');		
		$query = $this->db->get();
		return $query->result();
	}
	
}
?>