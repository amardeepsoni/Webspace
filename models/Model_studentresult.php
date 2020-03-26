<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_studentresult extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function fetchSkillWiseScore($userId){
        $query1 = "select username, score, skill_1_score, skill_2_score, skill_3_score, skill_4_score, skill_5_score from quizdb.history where username=".$userId;
        $query =  $this->db->query($query1)->result_array();
        if(count($query)){
            return $query[0];
        }
        return false;

    }

    public function fetchDistribution($level){
        $query = "select * from tmp.tab2 where level=".$level;
        return $this->db->query($query)->result_array();
    }
    
    public function fetchSkillsData($level){
        $query = "select * from tmp.tab3 where level=".$level;
        return $this->db->query($query)->result_array();
    }

    public function getRank($userId){
        return $this->db->query("select school_rank from tmp.tab1 where username=".$userId)->result_array();
    }

    public function skillsData($userId){
        $query= $this->db->query("select * from tmp.Skill_wise_scores where username=".$userId)->result_array();
        if(count($query)){
            return $query[0];
        }
        return false;
    }
    
    public function questionsData(){
        return $this->db->query("select * from tmp.question_wise_correct")->result_array();
    }
    public function fetchRemarks($userId, $level){
        return $this->db->query("select remarks, upper_bound from quizdb.remarks where user_type='student' order by upper_bound ASC")->result_array();
    }

    public function qualificationStatus($userId){
        $query= $this->db->query("select status from intellify.student where username=".$userId)->result_array();
        if(count($query)){
            return $query[0]['status'];
        }
        return false;
    }
    public function fetchRank($schoolId, $username){
        // $query = "select school_rank from tmp.tab1 where username=".$username;
        $query = $this->db->query("select school_rank from tmp.tab1 where school_id=".$schoolId." and username=".$username)->result_array();
        if(count($query)){
            return $query[0]['school_rank'];
        }
        return false;
    }
}
?>