<?php
class Model_Page extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getkeywordpage($keyword) {
		$condition = "linkname =" . "'" . $keyword . "'";
		$this->db->select('*');
		$this->db->from('page');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
	
	public function getsubpagecontent() {
		$this->db->select('*');
		$this->db->from('productimage');
		$query = $this->db->get();
		return $query->result();
	}
	

	
public function getsubpages($category_id) {
        $condition = "pid ='" . $category_id . "'";
        $this->db->select('page.*');
        $this->db->from('page');        
        $this->db->where($condition);        
        $query = $this->db->get();        
        return $query->result();
    }
	
	
	
	
	
	public function getallcategoriess() {
		
		$this->db->select('*');		
		
		$this->db->from('teamcat');
		
		$query = $this->db->get();		
		return $query->result();
	}
	
	
	
	public function getproductcategory($teamcat_id) {
		$condition = " 	teamcat_id =" . "'" . $teamcat_id . "'";
		$this->db->select('*');
		$this->db->from('team');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	
	
	
		
	
	
	
	
	
	
	
}
?>