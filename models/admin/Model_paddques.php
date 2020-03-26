<?php
class Model_Paddques extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
	{
		$this->db->insert('paddques', $data);
	}
public function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('paddques',$data);
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('paddques');
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
	        $this->db->update('paddques',$postdata);
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
	        $this->db->update('paddques',$postdata);
        }
	}
public function getproductimage($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('paddques');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getproductimages() {
		$this->db->select('pi.id, p.name as productname, pi.name, pi.image, pi.status', false);
		$this->db->from('paddques pi');
		$this->db->join('product as p', 'p.id = pi.product_id');
		$query = $this->db->get();
		return $query->result();
	}
}
?>