<?php
class Model_Image extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
	{
		$this->db->insert('image', $data);
	}
public function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('image',$data);
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('image');
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
	        $this->db->update('image',$postdata);
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
	        $this->db->update('image',$postdata);
        }
	}
public function getimage($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('image');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getimages() {
		$this->db->select('*');
		$this->db->from('image');
		$query = $this->db->get();
		return $query->result();
	}
}
?>