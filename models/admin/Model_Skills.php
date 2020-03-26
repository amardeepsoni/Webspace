<?php
class Model_Skills extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb', TRUE);
    }

    public function  getSkills() {
        return $this->quizdb->select('*')->from('skill')->get()->result();
    }

    public function delete($id) {
        $this->quizdb->where('skill_id',$id)->delete('skill');
        return $this->quizdb->affected_rows();
    }

    public function add($data) {
        return $this->quizdb->insert('skill',$data);
    }

    public function update($data) {
        $this->quizdb->where('skill_id', $data['skill_id'])->update('skill',$data);
        return $this->quizdb->affected_rows();
    }

    public function getQuizzesBySkillID($skill_id) {
        return $this->quizdb->select('*')->from('quiz')->where('skill_id',$skill_id)->get()->result();
    }

    public function checkSkill($name) {
        return $this->quizdb->select('*')->from('skill')->where('skill_name',$name)->get()->num_rows();
    }
}