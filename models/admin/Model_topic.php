<?php

class Model_Topic extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function add($data)

	{

		$this->db->insert('topic', $data);

	}

public function edit($id,$data)

	{

		$this->db->where('id',$id);

		$this->db->update('topic',$data);

	}



public function delete($data)

	{
		foreach($data as $datarw){
			$this->db->where('id', $datarw);
        	$this->db->delete('topic');
		}

	}



public function active($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>1,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('topic',$postdata);

		}

	}

public function inactive($data)

	{

		foreach($data as $datarw){
			$postdata=array(

			 'status'=>0,

			 );

	        $this->db->where('id', $postdata);

	        $this->db->update('topic',$postdata);

		}

	}



public function gettopic($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('topic');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

public function gettopics($data = array()) {
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

		$this->db->from('topic');

		$this->db->where($condition);

		$query = $this->db->get();

		return $query->result();

	}

public function checktopicalready($name,$user_id){



		if($name){

			$condition = "name =" . "'" . $name . "' and user_id=".$user_id;

		}

		$this->db->select('*');

		$this->db->from('topic');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();		

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

}


public function gettopicsBychapteridSubjectId($subject_id,$chapter_id) {

		$condition = "subject_id =" . "'" . $subject_id . "' and chapter_id =" . "'" . $chapter_id . "'";

		$this->db->select('*');

		$this->db->from('topic');

		$this->db->where($condition);

		$query = $this->db->get();

		return $query->result();

	}



}

?>