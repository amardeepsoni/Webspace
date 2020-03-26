<?php
class Model_Blogscon extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data,$category)
	{
		$this->db->insert('blogs', $data);
		$insert_id = $this->db->insert_id();
		for ($i = 0; $i <= count($category)-1; $i++)
        {
        	$data = array(
		        'category_id'  =>  $category[$i],
		        'product_id'   =>  $insert_id
		    );
			$this->db->insert('blogs_blogcat', $data);
        }

	}
public function edit($id,$data,$category)
	{
		$this->db->where('id',$id);
		$this->db->update('blogs',$data);
		$this->db->where('product_id', $id);
        $this->db->delete('blogs_blogcat');
        for ($i = 0; $i <= count($category)-1; $i++)
        {
        	$data = array(
		        'category_id'  =>  $category[$i],
		        'product_id'   =>  $id
		    );
			$this->db->insert('blogs_blogcat', $data);
        }
	}
public function delete($data)
	{
		for ($i = 0; $i <= count($data); $i++)
        {
        $this->db->where('id', $data[$i]);
        $this->db->delete('blogs');
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
	        $this->db->update('blogs',$postdata);
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
	        $this->db->update('blogs',$postdata);
        }
	}
public function getproduct($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('blogs');
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
		$this->db->from('blogs_blogcat');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->row();
		} else {
		return false;
		}
	}
public function getproductss() {
		$this->db->select('GROUP_CONCAT(bc.name SEPARATOR ",") as blogcat, b.id, b.name, b.image, b.status', false);
		$this->db->from('blogs as b');
		$this->db->join('blogs_blogcat as bbc', 'b.id = bbc.product_id', 'inner');
		$this->db->join('blogcat as bc', 'bc.id = bbc.category_id', 'inner');
		$this->db->group_by('bbc.product_id'); 
		$query = $this->db->get();
		return $query->result();
	}
	


	
	
	
	
	
	
	
}
?>