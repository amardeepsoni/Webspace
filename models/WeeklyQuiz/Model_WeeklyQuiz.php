<?php
class Model_WeeklyQuiz extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb',TRUE);
    }

    public function  getSkills() {
        return $this->quizdb->select('*')->from('skill')->where('round', 1)->get()->result();
    }

    public function  getQuizzes($level , $skill_id) {
        return $this->quizdb->select('*')->from('quiz')->where(array(
            'status' => 1,
            'belongs_to' => 2,
            'Level' => $level,
            'skill_id' => $skill_id
        ))->order_by('difficulty_index' , 'asc')->get()->result();
    }

    public  function getQuizDetailsByQuizid($quizid) {
        $query = $this->quizdb->select('*')->from('quiz')->where('quizid', $quizid)->limit(1)->get();
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

    public function getAnswer($quesid) {
        $query = $this->quizdb->select('*')->from('answer')->where('quesid',$quesid)->get();
        return $query->row();
    }

    public function saveResponse($data) {
        return $this->quizdb->insert('user_answer',$data);
    }

    public  function  insertUserHistory($data) {
        return $this->quizdb->insert('history',$data);
    }

    public function getINTResponse($username,$quesid) {
       return $this->quizdb->select('user_response')->from('user_answer')->where(array(
           'username' => $username,
           'quesid' => $quesid
       ))->get()->row();
    }

    public function checkOptions($quesid) {
        return $this->quizdb->select('*')->from('options')->where('quesid', $quesid)->get()->num_rows();
    }

    public function getCorrectMCQAns($quesid) {
        $query = $this->quizdb->query('select a.text, a.option_label, a.img from options as a, answer as b where a.quesid = b.quesid and a.option_label = b.answer and a.quesid = '.$quesid);
        return $query->row();
    }

    public function getCorrectINTAns($quesid) {
        return $this->quizdb->select('*')->from('answer')->where('quesid',$quesid)->get()->row();
    }

    public function  updateResponse($data) {
         $this->quizdb->where(array(
            'username' => $data['username'],
            'quesid' => $data['quesid']
        ))->update('user_answer', $data);
        return $this->quizdb->affected_rows();
    }

    public function getCorrectResponsesByQuizID($username,$quizid) {
        return $this->quizdb->query('select a.username, a.quesid, a.flag from user_answer as a , questions as q where q.quizid = '.$quizid.' and a.flag = 1 and q.quesid = a.quesid and a.username = '.$username)->result();
    }
    public function getIncorrectResponsesByQuizID($username,$quizid) {
        return $this->quizdb->query('select a.username, a.quesid, a.flag from user_answer as a , questions as q where q.quizid = '.$quizid.' and a.flag = -1 and q.quesid = a.quesid and a.username = '.$username)->result();
    }

    public function clearUserResponses($username,$quizid) {
        $this->quizdb->query('delete b.* from questions as a, user_answer as b where a.quesid = b.quesid and b.username = '.$username.' and a.quizid = '.$quizid);
        return $this->quizdb->affected_rows();
    }

    public function clearUserHistory($username,$quizid) {
        return $this->quizdb->where(array(
            'username' => $username,
            'quizid' => $quizid
        ))->delete('history');
    }

    public function getUserHistory($username,$quizid) {
        return $this->quizdb->select('*')->from('history')->where(array(
            'username' => $username,
            'quizid' => $quizid
        ))->get()->row();
    }

    public function updateUserHistory($data) {
        $this->quizdb->where(array(
            'username' => $data['username'],
            'quizid' => $data['quizid']
        ))->update('history',$data);
        return $this->quizdb->affected_rows();
    }

    public function getMCQResponse($username, $quesid) {
        return $this->quizdb->query('select a.user_response, b.text, b.img from user_answer as a, options as b where a.quesid = b.quesid and  a.user_response = b.option_label and a.username = '.$username.' and a.quesid = '.$quesid)->row();
    }

    public function getUserResponse($username, $quesid) {
        return $this->quizdb->select('user_response')->from('user_answer')->where(array(
            'username' => $username,
            'quesid' => $quesid
        ))->get()->row();
    }

}