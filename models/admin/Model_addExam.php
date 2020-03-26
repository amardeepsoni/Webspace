<?php
class Model_addExam extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb',TRUE);
    }

    public function getAllSkills() {
        $query = $this->quizdb->query('select * from skill where skill_id > 0');
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function addQuiz($data) {
      return  $this->quizdb->insert('quiz',$data);
    }

    public function getQuizDetails($data) {
        $query = $this->quizdb->select('*')->from('quiz')->where(array(
            'title' => $data['title'],
            'skill_id' => $data['skill_id'],
            'level' => $data['level'],
            'belongs_to' => $data['belongs_to'],
            'difficulty_index' => $data['difficulty_index']
        ))->limit(1)->get();
        if($query->num_rows())
            return $query->row();
        else
            return false;
    }

    public function saveMCQ($qdata,$quizid) {
       return $this->quizdb->insert('questions',array(
            'qnstext' => $qdata['qnstext'],
            'quizid' => $quizid
        ));
    }

    public function getQuesDetails($qnstext,$quizid) {
        $query = $this->quizdb->select('*')->from('questions')->where(array(
            'qnstext' => $qnstext ,
            'quizid' => $quizid
            ))->order_by('quesid','desc')->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function  addOptions($data) {
        return $this->quizdb->insert('options',$data);
    }

    public function saveMCQanswer($data) {
        return $this->quizdb->insert('answer',$data);
    }

    public function getOptionDetails($option,$quesid) {
        $query = $this->quizdb->select('*')->from('options')->where(array (
            'text' => $option ,
            'quesid' => $quesid
            ))->limit(1)->get();
        if($query->num_rows())
            return $query->row();
        else
            return false;
    }

    public function saveINT($qdata,$quizid) {
        return $this->quizdb->insert('questions',array(
            'qnstext' => $qdata['qnstext'],
            'quizid' => $quizid
        ));
    }

    public function saveINTanswer($data) {
        return $this->quizdb->insert('answer',$data);
    }
}