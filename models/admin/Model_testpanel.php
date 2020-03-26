<?php

class Model_testpanel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function add($data)

	{

		$this->db->query("Insert Into testpanel SET  

			user_id = '" . $data['user_id'] . "', 

			pid = '" . $data['pid'] . "', 

			name = '" . $data['name'] . "', 

			random = '" . $data['random'] . "', 

			subject_id = '" . $data['subject_id'] . "', 

			subject = '" . $data['subject'] . "', 

			schoollavel_id = '" . $data['schoollavel_id'] . "', 

			schoollavel = '" . $data['schoollavel'] . "', 

			testoption = '" . $data['testoption'] . "', 

			hour = '" . $data['hour'] . "', 

			minutes = '" . $data['minutes'] . "', 

			description = '" . $data['description'] . "',

			ip = '" .$data['ip']. "',  

			user_agent = '" . $data['user_agent'] . "',

			date_added = '" . $data['date_added'] . "',

			status = '" . $data['status'] . "'

			");

			$testpanel_id = $this->db->insert_id();


			if(isset($data['image'])){
				$this->db->query("update testpanel SET image='".$data['image']."' where id='".$testpanel_id."'");
			}

			if($data['questionid']){

				foreach($data['questionid'] as $questionid){


					$this->load->model(adminpath.'/model_questionbank');
					$questionrow = $this->model_questionbank->getquestionbank($questionid);



					$this->db->query("Insert Into testpanel_question SET 

						testpanel_id ='".$testpanel_id."',

						question_id = '" . $questionid . "',
					
						subject_id = '" . $questionrow->subject_id . "',

						subject = '" . $questionrow->subject . "',

						schoollavel_id = '" . $questionrow->schoollavel_id . "',

						schoollavel = '" . $questionrow->schoollavel . "',

						date_added = '" . $data['date_added'] . "'"

					);

				}

			}

		$this->db->where('random', $data['random']);

        $this->db->delete('temp_questions');

	}

public function edit($id,$data)

	{

		$this->db->query("update testpanel SET 

			user_id = '" . $data['user_id'] . "', 

			pid = '" . $data['pid'] . "', 

			name = '" . $data['name'] . "', 

			random = '" . $data['random'] . "', 

			subject_id = '" . $data['subject_id'] . "', 

			subject = '" . $data['subject'] . "', 

			schoollavel_id = '" . $data['schoollavel_id'] . "', 

			schoollavel = '" . $data['schoollavel'] . "', 


			testoption = '" . $data['testoption'] . "', 

			hour = '" . $data['hour'] . "', 

			minutes = '" . $data['minutes'] . "', 

			description = '" . $data['description'] . "',

			ip = '" .$data['ip']. "',  

			user_agent = '" . $data['user_agent'] . "',

			date_modify = '" . $data['date_modify'] . "',

			status = '" . $data['status'] . "'

			where id='".$id."'

			");

	        $this->db->where('testpanel_id', $id);

	        
			if(isset($data['image'])){
				$this->db->query("update testpanel SET image='".$data['image']."' where id='".$id."'");
			}

	        $this->db->delete('testpanel_question');

			if($data['questionid']){

				foreach($data['questionid'] as $questionid){

					$this->load->model(adminpath.'/model_questionbank');
					$questionrow = $this->model_questionbank->getquestionbank($questionid);


					$this->db->query("Insert Into testpanel_question SET 

						testpanel_id ='".$id."',

						question_id = '" . $questionid . "',

						schoollavel_id = '" . $questionrow->schoollavel_id . "',

						schoollavel = '" . $questionrow->schoollavel . "',

						subject_id = '" . $questionrow->subject_id . "',

						subject = '" . $questionrow->subject . "',

						date_added = '" . $data['date_added'] . "'"

					);

				}

			}

		$this->db->where('random', $data['random']);

        $this->db->delete('temp_questions');

	}

public function delete($data)

	{

		
		foreach($data as $datarw){

        $this->db->where('id', $datarw);

        $this->db->delete('testpanel');

        $this->db->where('testpanel_id', $datarw);

        $this->db->delete('testpanel_question');

        }

	}



public function active($data)

	{

		foreach($data as $datarw){

        	$postdata=array(

			 'status'=>1,

			 );

	        $this->db->where('id', $datarw);

	        $this->db->update('testpanel',$postdata);

        }

	}

public function inactive($data)

	{

		foreach($data as $datarw){

        	$postdata=array(

			 'status'=>0,

			 );

	        $this->db->where('id', $datarw);

	        $this->db->update('testpanel',$postdata);

        }

	}

public function gettestpanel($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('testpanel');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row();

		} else {

		return false;

		}

	}

	public function gettestpanels($data = array()) {
		$condition="";
		$condition .= "pid =" . "'" . $data['filter_pid'] . "'";
		if(!empty($data['filter_user']))
			{
				$condition .= "and user_id =" . "'" . $data['filter_user'] . "'";
			}
		if(isset($data['subject_id']) && $data['subject_id']){
					$condition .= " and subject_id =" . "'" . $data['subject_id'] . "'";
		}

		if(isset($data['schoollavel_id']) && $data['schoollavel_id']){
				$condition .= " and schoollavel_id =" . "'" . $data['schoollavel_id'] . "'";
			}	
		
		$this->db->select('*');

		$this->db->from('testpanel');

		$this->db->where($condition);

		$query = $this->db->get();

		// echo $this->db->last_query();

		return $query->result();

	}

public function checktestpanelalready($name){

		$condition = "";



		if($name){

			$condition = "name =" . "'" . $name . "'";

		}

		$this->db->select('*');

		$this->db->from('testpanel');

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

		$condition = "testpanel_id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('answer');

		$this->db->where($condition);


		$query = $this->db->get();

		return $query->result();


	}



	public function gettestpanelquestions($questionbank_id) {

		$condition = "testpanel_question.testpanel_id =" . "'" . $questionbank_id . "'";

		$this->db->select('*');

		$this->db->from('testpanel_question');

		$this->db->join('questionbank', 'questionbank.id = testpanel_question.question_id', 'left');

		$this->db->where($condition);


		$query = $this->db->get();

		// echo $this->db->last_query();


		return $query->result();


	}

	public function gettempquestions($random) {

		$condition = "random =" . "'" . $random . "'";

		$this->db->select('*');

		$this->db->from('temp_questions');

		$this->db->join('questionbank', 'questionbank.id = temp_questions.questionbank_id', 'left');

		$this->db->where($condition);


		$query = $this->db->get();

		// echo $this->db->last_query();


		return $query->result();


	}


	public function gettesttypes() {

		$this->db->select('*');

		$this->db->from('testtype');

		$query = $this->db->get();

		// echo $this->db->last_query();


		return $query->result();


	}

	
public function gettesttype($id) {

		$condition = "id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('testtype');

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