<?php
class Model_schoollavel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getschoollavel($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('schoollavel');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function getschoollavels() {
		$this->db->select('*');
		$this->db->from('schoollavel');
		$query = $this->db->get();
		return $query->result();
	}
	public function getschoolclass() {
		$this->db->select('*');
		$this->db->from('schoolclass');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	public function getcategorys($pid) {
		$condition = "pid =" . "'" . $pid . "'";
		$this->db->select('*');
		$this->db->from('schoollavel');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}

	
	
	
	
	
	
	
}
?>