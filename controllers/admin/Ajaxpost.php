<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxpost extends CI_Controller {
		
	public function questiontype()
	{
		$json = array();
		$questiontype_id=$_POST['questiontype_id'];
		 if ($this->input->server('REQUEST_METHOD') == 'POST') {}

		echo json_encode($json);
	}

	public function addanswer()
	{
		$json = array();
		$rowCount=$_GET['rowCount'];
		$data="";
		$data.="<tr id=pro".$rowCount.">";
		$data.="<td><input type='text' id='answeroption'  class='form-control col-md-7 col-xs-6' name='answeroption[]' placeholder='Answer Option No. ".$rowCount."'></td>";
		$data.="</tr>";


		$json['sucess']=$data;
		echo json_encode($json);
	}

	public function getsubjectchapter()
	{
		$this->load->model(adminpath.'/model_chapter');
		$subject_id=$_GET['subject_id'];
		$data="";

		$json = array(
			'chapters' => $this->model_chapter->getchaptersBySubjectId($subject_id)	
		);
		echo json_encode($json);
	}

	public function getsubjectchaptertopic()
	{
		$this->load->model(adminpath.'/model_topic');
		$subject_id=$_GET['subject_id'];
		$chapter_id=$_GET['chapter_id'];
		$data="";
		$json = array(
			'topics' => $this->model_topic->gettopicsBychapteridSubjectId($subject_id,$chapter_id)	
		);
		echo json_encode($json);
	}

	public function getquestions(){
		$json = array();
		$subquery="";
		if(isset($_GET['subject_id'])){
			$subquery.="subject_id='".$_GET['subject_id']."'";
		}
		if(isset($_GET['schoollavel_id'])){
			if(!empty($subquery)){
				$subquery.=" and schoollavel_id='".$_GET['schoollavel_id']."'";
			}
			else{
				$subquery.="schoollavel_id='".$_GET['schoollavel_id']."'";
			}
		}

		$this->load->model(adminpath.'/model_questionbank');

		$questionresults=$this->model_questionbank->getquestionfortestpanel($subquery);
		$data="";
		if($questionresults){
			foreach($questionresults as $questionresult){
				$data.="<tr>
					<td>".$questionresult->name."</td>
					<td><a onclick='addquestion(".$questionresult->id.");' class='btn btn-success'>Add</a></td>
				</tr>";
			}
		}
		$json['sucess']=$data;
		echo json_encode($json);
	}

	public function addtestquestion(){
		$json = array();
		$questionid=$_GET['questionid'];
		$ttlquestion=$_GET['ttlquestion'];
		$testpanelid=$_GET['testpanelid'];
		$random=$_GET['random'];
		$this->load->model(adminpath.'/model_questionbank');
		$this->load->model(adminpath.'/model_testpanel');
		$questionresults=$this->model_questionbank->addtestquestion($questionid,$random,$testpanelid);
		if(isset($questionresults['error'])){
			$json['error']=$questionresults['error'];
		}
		else {


			$alltempquestion="";	
	    	$results = $this->model_testpanel->gettempquestions($random);
			if ($results) {  
				foreach($results as $val){
					$alltempquestion = "<tr>
					<td><input type='hidden' id='questionid' name='questionid[]' value='".$val->id."'/>".$val->name."</td>
					</tr>";
				}
			}

			$json['ttlquestion']=$ttlquestion+1;

			$json['sucess']=$alltempquestion;
		}

		echo json_encode($json);
	}

}
?>