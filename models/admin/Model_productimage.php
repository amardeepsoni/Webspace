<?php
class Model_Productimage extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
	{
		$this->db->insert('productimage', $data);
	}
public function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('productimage',$data);
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('productimage');
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
	        $this->db->update('productimage',$postdata);
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
	        $this->db->update('productimage',$postdata);
        }
	}
public function getproductimage($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('productimage');
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
		$this->db->from('productimage pi');
		$this->db->join('page as p', 'p.id = pi.product_id');
		$query = $this->db->get();
		return $query->result();
	}
}
?>