<?php
class Model_Setting extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getheaderbanners() {
		$this->db->select('*');
		$this->db->from('headerbanner');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getteams() {
		$this->db->select('*');
		$this->db->from('team');
		$this->db->LIMIT('6');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function gettestimonials() {
		$this->db->select('*');
		$this->db->from('testimonials');
		$this->db->LIMIT('4');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	public function getvideoss() {
		$this->db->select('*');
		$this->db->from('image');		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getphotos() {
		$this->db->select('*');
		$this->db->from('sampleflat');		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getinnteams() {
		$this->db->select('*');
		$this->db->from('team');		
		$query = $this->db->get();
		return $query->result();
	}
	
	
		
	
	
	public function getsampleflats() {
		$this->db->select('*');
		$this->db->from('sampleflat');		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function gethomeproducts() {
		$this->db->select('*');
		$this->db->from('product');			
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getwebsiteinfo() {
		$this->db->select('*');
		$this->db->from('user');		
		$query = $this->db->get();
		return $query->row();
	}

	public function getadminmenu($user_id) {
		$condition = "menu_user.user_id ='" . $user_id . "'";
		$this->db->select('menu.*');
		$this->db->from('menu');
		$this->db->join('menu_user', 'menu_user.menu_id = menu.id','left');
		$this->db->where($condition);
		// $this->db->order_by("ordernum","asc");
		$query = $this->db->get();
		//$this->db->last_query();
		return $query->result();
	}

	public function getallmenu() {
		$this->db->select('menu.*');
		$this->db->from('menu');
		// $this->db->order_by("ordernum","asc");
		$query = $this->db->get();
		//$this->db->last_query();
		return $query->result();
	}

	public function getusertype($id) {
		$this->db->select('*');
		$this->db->from('usertype');
		$query = $this->db->get();
		//$this->db->last_query();
		return $query->result();
	}

	
	
}
?>