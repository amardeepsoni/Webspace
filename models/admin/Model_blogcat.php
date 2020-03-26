<?php
class Model_Blogcat extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data)
	{
		$this->db->insert('blogcat', $data);
	}
public function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('blogcat',$data);
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('blogcat');
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
	        $this->db->update('blogcat',$postdata);
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
	        $this->db->update('blogcat',$postdata);
        }
	}
public function getcategory($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('blogcat');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getcategorys($pid) {
		$condition = "pid =" . "'" . $pid . "'";
		$this->db->select('*');
		$this->db->from('blogcat');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
}
?>