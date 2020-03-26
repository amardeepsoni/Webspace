<?php
class Model_Page extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
	{
		$this->db->insert('page', $data);
	}
public function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('page',$data);
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('page');
        }
	}

public function active($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        	$postdata=array(
			 'status'=>1,
			 );
	        $this->db->where('id', $data[$i]);
	        $this->db->update('page',$postdata);
        }
	}
public function inactive($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        	$postdata=array(
			 'status'=>0,
			 );
	        $this->db->where('id', $data[$i]);
	        $this->db->update('page',$postdata);
        }
	}
public function getpage($id) {
		$condition = "id =" . "'" . $id . "'";
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
public function getpages() {
		$this->db->select('*');
		$this->db->from('page');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	public function getcategorys($pid) {
		$condition = "pid =" . "'" . $pid . "'";
		$this->db->select('*');
		$this->db->from('page');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}

	
	
	
	
	
	
	
}
?>