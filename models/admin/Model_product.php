<?php
class Model_product extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data,$category)
	{
		$this->db->insert('product', $data);
		$insert_id = $this->db->insert_id();
		for ($i = 0; $i <= count($category)-1; $i++)
        {
        	$data = array(
		        'category_id'  =>  $category[$i],
		        'product_id'   =>  $insert_id
		    );
			$this->db->insert('product_category', $data);
        }

	}
public function edit($id,$data,$category)
	{
		$this->db->where('id',$id);
		$this->db->update('product',$data);
		$this->db->where('product_id', $id);
        $this->db->delete('product_category');
        for ($i = 0; $i <= count($category)-1; $i++)
        {
        	$data = array(
		        'category_id'  =>  $category[$i],
		        'product_id'   =>  $id
		    );
			$this->db->insert('product_category', $data);
        }
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('product');
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
	        $this->db->update('product',$postdata);
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
	        $this->db->update('product',$postdata);
        }
	}
public function getproduct($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('product');
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
		$this->db->from('product_category');
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
		$this->db->from('product as p');
		$this->db->join('product_category as pc', 'p.id = pc.product_id', 'inner');
		$this->db->join('category as c', 'c.id = pc.category_id', 'inner');
		$this->db->group_by('pc.product_id'); 
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getproductss() {
		
		$this->db->select('*');
		$this->db->from('product');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	
	
	
}
?>