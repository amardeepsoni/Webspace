<?php
class Model_allExams extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb', TRUE);
    }

    public function fetchExams() {
        $query = $this->quizdb->query('SELECT q.quizid , q.title , q.correct , q.wrong , q.total , q.time , q.date , q.status , 
                                        q.level , q.belongs_to , s.skill_name from quiz q, skill s where q.skill_id = s.skill_id');
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

}