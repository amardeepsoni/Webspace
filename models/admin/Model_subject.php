<?php

class Model_subject extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	

public function add($data,$schoollavel)

	{

		$this->db->insert('subject', $data);
		$insert_id = $this->db->insert_id();
		for ($i = 0; $i <= count($schoollavel)-1; $i++)
        {
        	$data = array(
		        'schoollavel_id'  =>  $schoollavel[$i],
		        'subject_id'   =>  $insert_id
		    );
			$this->db->insert('schoollavel_subject', $data);
        }


	}

public function edit($id,$data,$schoollavel)

	{

		$this->db->where('id',$id);
		$this->db->update('subject',$data);
		$this->db->where('subject_id', $id);
		$this->db->delete('schoollavel_subject');
        for ($i = 0; $i <= count($schoollavel)-1; $i++)
        {
        	$data = array(
		        'schoollavel_id'  =>  $schoollavel[$i],
		        'subject_id'   =>  $id
		    );
			$this->db->insert('schoollavel_subject', $data);
        }

	}


public function delete($data)

	{
		foreach($data as $datarw){
			$this->db->where('id', $datarw);
        	$this->db->delete('subject');
		}

	}



public function active($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>1,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('subject',$postdata);

		}

	}

public function inactive($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>0,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('subject',$postdata);

		}

	}


public function getsubject($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('subject');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

public function getsubjects($data = array()) {

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

		$this->db->from('subject');

		$this->db->where($condition);

		$query = $this->db->get();

		return $query->result();

	}

public function checksubjectalready($name,$user_id){

		if($name){

			$condition = "name =" . "'" . $name . "' and user_id=".$user_id;

		}

		$this->db->select('*');

		$this->db->from('subject');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();	

		// echo $this->db->last_query();

		// exit();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

}


public function getsubjectschoollavel($subject_id,$schoollavel_id) {
		$condition = "schoollavel_id ='" . $schoollavel_id . "' and subject_id ='" . $subject_id . "'";
		$this->db->select('*');
		$this->db->from('schoollavel_subject');
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