<?php

class Model_questiontype extends CI_Model {


    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

public function add($data)

	{

		$this->db->insert('questiontype', $data);

	}

public function edit($id,$data)

	{

		$this->db->where('id',$id);

		$this->db->update('questiontype',$data);

	}

public function delete($data)

	{

		foreach($data as $datarw){
			$this->db->where('id', $datarw);
        	$this->db->delete('questiontype');
		}

	}



public function active($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>1,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('questiontype',$postdata);

		}

	}

public function inactive($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>0,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('questiontype',$postdata);

		}

	}

public function getquestiontype($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('questiontype');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

public function getquestiontypebyname($name) {

		$condition = "name =" . "'" . $name . "'";

		$this->db->select('*');

		$this->db->from('questiontype');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

public function getquestiontypes($data = array()) {

		$condition="";

		$this->db->select('*');

		$this->db->from('questiontype');

		if(!empty($condition)){
			$this->db->where($condition);
		}

		$query = $this->db->get();

		return $query->result();

	}

public function checkquestiontypealready($name){

		$condition = "";

		if($name){

			$condition = "name =" . "'" . $name . "'";

		}

		$this->db->select('*');

		$this->db->from('questiontype');

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