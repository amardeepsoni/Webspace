<?php
class Model_Testimonials extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function gettestimonials() {
		$this->db->select('*');
		$this->db->from('testimonials');		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
}
?>