<?php
class Model_Category extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getkeywordcategory($keyword) {
		$condition = "linkname =" . "'" . $keyword . "'";
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
	public function getcategories($data = array()) {
		$condition="";
		if(isset($data['filter_pid']))
			{
				$condition .= "pid =" . "'" . $data['filter_pid'] . "'";
			}

		$this->db->select('*');

		$this->db->from('category');
		if($condition){
			$this->db->where($condition);	
		}

		$query = $this->db->get();

		return $query->result();

	}

	
	
public function getschools($data = array()) {
		$condition="";
		if(isset($data['filter_pid']))
			{
				$condition .= "pid =" . "'" . $data['filter_pid'] . "'";
			}

		$this->db->select('*');

		$this->db->from('school');
		if($condition){
			$this->db->where($condition);	
		}

		$query = $this->db->get();

		return $query->result();

	}

	
	
	
	
	
	
	
}
?>