<?php
class Model_Sampleflat extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
	{
		$this->db->insert('sampleflat', $data);
	}
public function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('sampleflat',$data);
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('sampleflat');
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
	        $this->db->update('sampleflat',$postdata);
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
	        $this->db->update('sampleflat',$postdata);
        }
	}
public function getsampleflat($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('sampleflat');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getsampleflats() {
		$this->db->select('*');
		$this->db->from('sampleflat');
		$query = $this->db->get();
		return $query->result();
	}
}
?>