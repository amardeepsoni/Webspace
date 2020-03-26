<?php
class Model_Testpanel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


	public function gettestpanels($data = array()) {
		$condition="";
		if(!empty($data['filter_user']))
			{
				$condition .= "user_id =" . "'" . $data['filter_user'] . "'";
			}
		if(!empty($data['subject_id'])){
			if(!empty($condition))
				{
					$condition .= " and subject_id =" . "'" . $data['subject_id'] . "'";
				}
			else{
				$condition .= " subject_id =" . "'" . $data['subject_id'] . "'";
			}
		}

		if($data['category_id']){
			if(!empty($condition))
				{
					$condition .= " and category_id =" . "'" . $data['category_id'] . "'";
				}
			else{
				$condition .= " category_id =" . "'" . $data['category_id'] . "'";
				}	
		}	
		$this->db->select('*');

		$this->db->from('testpanel');

		$this->db->where($condition);

		$query = $this->db->get();

		// echo $this->db->last_query();

		return $query->result();

	}


	public function gettestpanel($id) {
		$condition="";
		$condition .= " id =" . "'" . $id . "'";
		$this->db->select('*');

		$this->db->from('testpanel');

		$this->db->where($condition);

		$query = $this->db->get();

		// echo $this->db->last_query();

		return $query->row();

	}


	public function gettesttotalquestion($id) {
		$condition="";
		$condition .= " testpanel_id =" . "'" . $id . "'";
		$this->db->select('COUNT(DISTINCT id) AS total');

		$this->db->from('testpanel_question');

		$this->db->where($condition);

		$query = $this->db->get();

		// echo $this->db->last_query();

		return $query->row();

	}

	public function gettestquestions($test_id) {

        $condition = "testpanel_question.testpanel_id ='" . $test_id . "' and questionbank.user_id=1 ";
        $this->db->select('questionbank.*');
        $this->db->from('testpanel_question');  
        $this->db->join('questionbank','testpanel_question.question_id=questionbank.id','left');        
        $this->db->where($condition);        
        $query = $this->db->get();        
        return $query->result();

	}

	public function getquestionanswers($questionbank_id) {

        $condition = "questionbank_id ='" . $questionbank_id . "'";
        $this->db->select('*');
        $this->db->from('answer');         
        $this->db->where($condition);        
        $query = $this->db->get();        
        return $query->result();


	}

	public function getteestlatesttimer($testpanel_id) {

        $condition = "student_id ='" . $this->session->userdata('studentlogged_in')['id'] . "'";
        $condition .= "and testpanel_id ='" . $testpanel_id . "'";
        $this->db->select('*');
        $this->db->from('testpanel_answerbyuser');         
        $this->db->where($condition);  
		$this->db->order_by("timer", "ASC");        
        $query = $this->db->get();        
        return $query->row();

	}

	public function checkanswerbyuser($data) {

        $condition = "student_id ='" . $data['student_id'] . "'";
        $condition .= "and testpanel_id ='" . $data['testpanel_id'] . "'";
        $condition .= "and question_id ='" . $data['question_id'] . "'";
        $this->db->select('*');
        $this->db->from('testpanel_answerbyuser');         
        $this->db->where($condition);      
        $query = $this->db->get();        
        return $query->row();

	}

	public function deleteanswerbyuser($data) {

        $condition = "student_id ='" . $data['student_id'] . "'";
        $condition .= "and testpanel_id ='" . $data['testpanel_id'] . "'";
        $condition .= "and question_id ='" . $data['question_id'] . "'";        
        $this->db->where($condition);        
        $this->db->delete('testpanel_answerbyuser'); 
	}

	public function addanswerbyuser($data) {
		$this->db->insert('testpanel_answerbyuser', $data);
	}


}
?>