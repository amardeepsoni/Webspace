<?php
class Model_Round2 extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb', TRUE);
    }

    public function getSkills() {
        return $this->quizdb->select('*')->from('skill')->where('round',2)->get()->result();
    }

    public function getAttempted($username, $level) {
        $attempted = array();
        $skills = $this->getSkills();
        foreach($skills as $skill){
            // $quizDetails = $this->getQuizDetails($level,$skill->skill_id);
            // if($quizDetails)
            //     $attempted[$skill->skill_id] = $this->checkUser($username, $quizDetails->quizid);
            $query = $this->quizdb->query("select username from quizdb.history, quizdb.quiz where history.quizid = quiz.quizid and quiz.skill_id=".$skill->skill_id. " and username=".$username)->result_array();
            $attempted[$skill->skill_id] = count($query) ? true : false;
        }
        return $attempted;
    }



    public function getQuizDetails($level,$skill_id) {
        $query = $this->quizdb->select('*')->from('quiz')->where(array(
          'Level' => $level,
          'belongs_to' => 1,
          'skill_id' => $skill_id
        ))->limit(1)->get();
        if ($query->num_rows())
            return $query->row();
        else
            return false;
    }

    public function getQuestionsByQuizID($quizid) {
        $query = $this->quizdb->select('quesid, qnstext , questions_img , quizid')->from('questions')->where('quizid',$quizid)->get();
        return $query->result();

    }

    public function getOptionsByQuestionID($quesid) {
        $query = $this->quizdb->select('*')->from('options')->where('quesid',$quesid)->get();
        return $query->result();
    }

    public  function getQuizDetailsByQuizid($quizid) {
        $query = $this->quizdb->select('*')->from('quiz')->where('quizid', $quizid)->limit(1)->get();
        if ($query->num_rows())
            return $query->row();
        else
            return false;
    }

    public function getSkillByID($skillid){
        return $this->quizdb->select('skill_name')->from('skill')->where('skill_id', $skillid)->get()->row();
    }

    public function getAnswer($quesid) {
        $query = $this->quizdb->select('*')->from('answer')->where('quesid',$quesid)->limit(1)->get();
        if ($query->num_rows())
            return $query->row();
        else
            return false;
    }

    public function saveResponse($data) {
        return $this->quizdb->insert('user_answer',$data);
    }

    public function  checkUser($username, $quizid) {
        $query = $this->quizdb->select('*')->from('history')->where(array(
            'username' => $username,
            'quizid' => $quizid
        ))->limit(1)->get();
        if ($query->num_rows())
            return true;
        else
            return false;
    }

    public  function  updateUserHistory($data) {
        return $this->quizdb->insert('history',$data);
    }

//    public  function  checkUser($username, $skill_id) {
//        $query = $this->quizdb->select('*')->from('user_answer')->where()->limit(1)->get();
//        if ($query->num_rows())
//            return $query->row();
//        else
//            return false;
//    }

}