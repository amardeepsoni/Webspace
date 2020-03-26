<?php
class Model_photo extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data,$category)
	{
		$this->db->insert('photo', $data);
		$insert_id = $this->db->insert_id();
		for ($i = 0; $i <= count($category)-1; $i++)
        {
        	$data = array(
		        'category_id'  =>  $category[$i],
		        'product_id'   =>  $insert_id
		    );
			$this->db->insert('photo_category', $data);
        }

	}
public function edit($id,$data,$category)
	{
		$this->db->where('id',$id);
		$this->db->update('photo',$data);
		$this->db->where('product_id', $id);
        $this->db->delete('photo_category');
        for ($i = 0; $i <= count($category)-1; $i++)
        {
        	$data = array(
		        'category_id'  =>  $category[$i],
		        'product_id'   =>  $id
		    );
			$this->db->insert('photo_category', $data);
        }
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('photo');
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
	        $this->db->update('photo',$postdata);
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
	        $this->db->update('photo',$postdata);
        }
	}
public function getproduct($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('photo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getproductcategory($product_id,$category_id) {
		$condition = "product_id ='" . $product_id . "' and category_id ='" . $category_id . "'";
		$this->db->select('*');
		$this->db->from('photo_category');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getproducts() {
		$this->db->select('GROUP_CONCAT(c.name SEPARATOR ",") as category, p.id, p.name, p.image, p.status', false);
		$this->db->from('photo as p');
		$this->db->join('photo_category as pc', 'p.id = pc.product_id', 'inner');
		$this->db->join('category as c', 'c.id = pc.category_id', 'inner');
		$this->db->group_by('pc.product_id'); 
		$query = $this->db->get();
		return $query->result();
	}
}
?>