<?php

class Model_Category extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function add($data)

	{

		$this->db->insert('category', $data);

	}

public function edit($id,$data)

	{

		$this->db->where('id',$id);

		$this->db->update('category',$data);

	}

public function delete($data)

	{
		foreach($data as $datarw){
			$this->db->where('id', $datarw);
        	$this->db->delete('category');
		}

	}



public function active($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>1,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('category',$postdata);

		}

	}

public function inactive($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>0,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('category',$postdata);

		}

	}

public function getcategory($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('category');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

public function getcategorys($data = array()) {
		$condition="";
		if(!empty($data['filter_pid']))
			{
				$condition .= "pid =" . "'" . $data['filter_pid'] . "'";
			}
		if(!empty($condition))
			{
				$condition .= "and user_id =" . "'" . $data['filter_user'] . "'";
			}
		else{
			$condition .= " user_id =" . "'" . $data['filter_user'] . "'";
		}

		$this->db->select('*');

		$this->db->from('category');

		$this->db->where($condition);

		$query = $this->db->get();

		return $query->result();

	}

	

public function checkcategoryalready($name,$user_id){

		$condition = "";

		if($name){

			$condition = "name =" . "'" . $name . "' and user_id=".$user_id;

		}

		$this->db->select('*');

		$this->db->from('category');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();		

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

}

}

?>