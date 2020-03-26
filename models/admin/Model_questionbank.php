<?php

class Model_questionbank extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function add($data)

	{


		$db = get_instance()->db->conn_id;

		$this->db->query("Insert Into questionbank SET

			user_id = '" .$data['user_id']. "', 

			name = '" . mysqli_real_escape_string($db, $data['name']) . "', 

			schoollavel_id = '" . $data['schoollavel_id'] . "', 

			schoollavel = '" . $data['schoollavel'] . "', 

			subject_id = '" . $data['subject_id'] . "', 

			subject = '" . $data['subject'] . "', 

			perquestionmark = '" . $data['perquestionmark'] . "', 
			negativemark = '" . $data['negativemark'] . "', 

			explaintext = '" . mysqli_real_escape_string($db, $data['explain']) . "', 

			videolink = '" .mysqli_real_escape_string($db, $data['videolink']). "',  

			ip = '" .$data['ip']. "',  

			user_agent = '" . $data['user_agent'] . "',

			date_added = '" . $data['date_added'] . "',

			status = '" . $data['status'] . "'

			");

			$questionbank_id = $this->db->insert_id();



			if(isset($data['image'])){
				$this->db->query("update questionbank SET image='".$data['image']."' where id ='".$questionbank_id."'");
			}
			if(isset($data['explainattachment'])){
				$this->db->query("update questionbank SET explainattachment='".$data['explainattachment']."' where id ='".$questionbank_id."'");
			}

			if($data['answeroption']){

				$orderno=1;

				foreach($data['answeroption'] as $answeroption){
					if(!empty($answeroption)){
						$this->db->query("Insert Into answer SET 

							questionbank_id ='".$questionbank_id."',

							answer = '" . mysqli_real_escape_string($db, $answeroption) . "', 

							orderno = '" .$orderno. "', 

							date_added = '" . $data['date_added'] . "'"

						);
						$answer_id = $this->db->insert_id();
						if($data['rightanswer']==$orderno){
							$this->db->query("update questionbank SET 
							rightanswer = '" . $answer_id . "'
							where id='".$questionbank_id."'
							");
						}
					}


					$orderno++;

				}

			}

	}

public function edit($id,$data)

	{
		$db = get_instance()->db->conn_id;
		$this->db->query("update questionbank SET 

			user_id = '" .$data['user_id']. "', 

			name = '" . mysqli_real_escape_string($db, $data['name']) . "', 

			schoollavel_id = '" . $data['schoollavel_id'] . "', 

			schoollavel = '" . $data['schoollavel'] . "', 

			subject_id = '" . $data['subject_id'] . "', 

			subject = '" . $data['subject'] . "', 

			perquestionmark = '" . $data['perquestionmark'] . "', 
			negativemark = '" . $data['negativemark'] . "', 

			explaintext = '" . mysqli_real_escape_string($db, $data['explain']) . "', 

			videolink = '" .mysqli_real_escape_string($db, $data['videolink']). "',  

			ip = '" .$data['ip']. "',  

			user_agent = '" . $data['user_agent'] . "',

			date_modify = '" . $data['date_modify'] . "',

			status = '" . $data['status'] . "'

			where id='".$id."'

			");

			if(isset($data['image'])){
				$this->db->query("update questionbank SET image='".$data['image']."' where id ='".$id."'");
			}
			if(isset($data['explainattachment'])){
				$this->db->query("update questionbank SET explainattachment='".$data['explainattachment']."' where id ='".$id."'");
			}


	        $this->db->where('questionbank_id', $id);

	        $this->db->delete('answer');

			if($data['answeroption']){

				$orderno=1;

				foreach($data['answeroption'] as $answeroption){

					$this->db->query("Insert Into answer SET 

						questionbank_id ='".$id."',

						answer = '" . mysqli_real_escape_string($db, $answeroption) . "', 

						orderno = '" .$orderno. "', 

						date_modify = '" . $data['date_modify'] . "'"

					);

					$answer_id = $this->db->insert_id();
						if($data['rightanswer']==$orderno){
							$this->db->query("update questionbank SET 
							rightanswer = '" . $answer_id . "'
							where id='".$id."'
							");
						}

					$orderno++;

				}

			}

	}

public function delete($data)

	{

		
		foreach($data as $datarw){

        $this->db->where('id', $datarw);

        $this->db->delete('questionbank');

        $this->db->where('questionbank_id', $datarw);

        $this->db->delete('answer');

        }

	}



public function active($data)

	{

		foreach($data as $datarw){

        	$postdata=array(

			 'status'=>1,

			 );

	        $this->db->where('id', $datarw);

	        $this->db->update('questionbank',$postdata);

        }

	}

public function inactive($data)

	{

		foreach($data as $datarw){

        	$postdata=array(

			 'status'=>0,

			 );

	        $this->db->where('id', $datarw);

	        $this->db->update('questionbank',$postdata);

        }

	}

public function getquestionbank($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('questionbank');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

public function getquestionbanks($data = array()) {

		$condition="";
		if(!empty($data['schoollavel_id'])) {
			$condition.=" schoollavel_id = '".$data['schoollavel_id']."'";
		}
		if(!empty($condition)){
			if(!empty($data['subject_id'])) {
				$condition.="and subject_id = '".$data['subject_id']."'";
			}
		}
		else{
			if(!empty($data['subject_id'])) {
				$condition.=" subject_id = '".$data['subject_id']."'";
			}
		}
		
		
		if(!empty($condition)){
			if(!empty($data['filter_user'])) {
				$condition.="and user_id = '".$data['filter_user']."'";
			}
		}
		else{
			if(!empty($data['filter_user'])) {
				$condition.=" user_id = '".$data['filter_user']."'";
			}
		}

		
		
		$this->db->select('*');

		$this->db->from('questionbank');
		if($condition){
			$this->db->where($condition);	
		}

		$query = $this->db->get();
		

		return $query->result();

	}

public function checkquestionbankalready($name,$user_id){

		$condition = "";

		if($name){

			$condition = "name =" . "'" . $name . "' and user_id=".$user_id;

		}

		$this->db->select('*');

		$this->db->from('questionbank');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();		

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

	public function getquestionanswer($id) {

		$condition = "questionbank_id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('answer');

		$this->db->where($condition);


		$query = $this->db->get();

		return $query->result();


	}

	public function getquestionfortestpanel($condition) {

		$this->db->select('*');

		$this->db->from('questionbank');

		$this->db->where($condition);
		
		$query = $this->db->get();

		return $query->result();

	}

	public function checktempquestion($questionbank_id,$random){

		$condition = "questionbank_id =" . "'" . $questionbank_id . "' and random =" . "'" . $random . "'";

		$this->db->select('*');

		$this->db->from('temp_questions');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();		

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}
	}

	public function checkquestion($question_id,$testpanel_id){

		$condition = "question_id =" . "'" . $question_id . "' and testpanel_id =" . "'" . $testpanel_id . "'";

		$this->db->select('*');

		$this->db->from('testpanel_question');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();		

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}
	}


	public function addtestquestion($questionbank_id,$random,$testpanelid)
		{
			$json=array();
			if($this->checktempquestion($questionbank_id,$random)){
				$json['error']="This question already in this paper.";
			}
			else if($this->checkquestion($questionbank_id,$testpanelid)){
				$json['error']="This question already in this paper.";
			}
			else{
				$this->db->query("Insert Into temp_questions SET
					questionbank_id = '" . $questionbank_id . "', 
					random = '" . $random . "'
				");
				$json['sucess']="This question already in this paper.";
			}


			return $json;
		}

}

?>