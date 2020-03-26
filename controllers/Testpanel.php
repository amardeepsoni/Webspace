<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testpanel extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('studentlogged_in')['id']){ 
            redirect('login');
        }
		$this->load->model('model_category');
		$this->load->model('model_testpanel');
		$this->load->model('student_model');
		$data=array();

		$data['page_title']='Test Panel';
		$data['meta_keyword']='Test Panel';
		$data['meta_description']='Test Panel';

		if(isset($_GET['testid'])){		
			$testid=$_GET['testid'];
			$testinfo = $this->model_testpanel->gettestpanel($testid);

			$data['testname']=$testinfo->name;
			$data['testid']=$testinfo->id;
			$data['hour']="";
			$data['minutes']="";
			if($testinfo->totaltime){
				$time=explode(":", $testinfo->totaltime);
				$data['hour']=$time[0];
				$data['minutes']=$time[1];
			}

			$gettesttimer = $this->model_testpanel->getteestlatesttimer($testid);
			if($gettesttimer){
				$time=explode(":", $gettesttimer->timer);
				$data['hour']=$time[0];
				$data['minutes']=$time[1];
			}

			$totalquestionresult = $this->model_testpanel->gettesttotalquestion($testid);
			$data['totalquestion']=$totalquestionresult->total;
        
      		$data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['email']));

      		$data['allquestionbanks']=array();
			$results = $this->model_testpanel->gettestquestions($testid);
			if ($results) {  
				$rw=1;
				foreach($results as $val){


				$answers=array();
				$answerresults = $this->model_testpanel->getquestionanswers($val->id);
				if ($answerresults) {  
					foreach($answerresults as $answerresult){
						$answers[] = array(
							'id' => $answerresult->id,
							'answer' => $answerresult->answer
						);
					}
				}
				$save="0";
				$savemark="0";
				$rightanswer="";
				$postdata['student_id']=$this->session->userdata('studentlogged_in')['id'];
				$postdata['testpanel_id']=$testid;
				$postdata['question_id']=$val->id;
				$checked = $this->model_testpanel->checkanswerbyuser($postdata);
				if($checked){
					$save=$checked->save;
					$savemark=$checked->savemark;
					$rightanswer=$checked->rightanswer;
				}

					$data['allquestionbanks'][] = array(
						'pageid' => $rw,
						'id' => $val->id,
						'name' => $val->name,
						'image' => $val->image,
						'save' => $save,
						'savemark' => $savemark,
						'rightanswer' => $rightanswer,
						'answers' => $answers,
					);

				$rw++;
				}
			}

			$this->load->view('header',$data);
			$this->load->view('testpanel',$data);
			$this->load->view('footer');	
		}
		else{
			redirect('home');
		}
		
	}
}
