<?php
class Model_Subject extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function getlevelsubjects($data = array()) {
		$condition="";
		if(isset($data['schoollavel_id']))
			{
				$condition .= "ss.schoollavel_id =" . "'" . $data['schoollavel_id'] . "'";
			}

		$this->db->select('*');
		$this->db->from('subject as s');
		$this->db->join('schoollavel_subject as ss', 's.id = ss.subject_id', 'inner');
		if($condition){
			$this->db->where($condition);	
		}

		$query = $this->db->get();

		return $query->result();

	}

	
	
public function getschools($data = array()) {
		$condition="";
		if(isset($data['filter_pid']))
			{
				$condition .= "pid =" . "'" . $data['filter_pid'] . "'";
			}

		$this->db->select('*');

		$this->db->from('school');
		if($condition){
			$this->db->where($condition);	
		}

		$query = $this->db->get();

		return $query->result();

	}

	
	
	
	
	
	
	
}
?>