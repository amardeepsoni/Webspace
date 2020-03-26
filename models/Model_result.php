<?php

class Model_result extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function fetchSkillWiseScore($userId){
        $query = "select username, score, skill_1_score, skill_2_score, skill_3_score, skill_4_score, skill_5_score from tmp.help1 where username=".$userId;
        return $this->db->query($query)->get()->result_array();
    }

    public function fetchDistribution(){
        $query = "select * from tmp.tab2";
        return $this->db->query($query)->get()->result_array();
    }
    
    public function fetchSkillsData(){
        $query = "select * from tmp.tab3";
        return $this->db->query($query)->get()->result_array();
    }
}