<?php defined('BASEPATH') or exit('No direct script access allowed');
class Model_quiz extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('quizdb');
    }
    public function add_question($data)
    {
        if ($this->db->insert('add_quiz', $data)) {
            return true;
        }
    }
    public function add_quiz($data)
    {
            return $this->db->insert('new_quiz', $data);        
    }
    public function quiz_fetched($q_id)
    {
        return $this->db->select('*')->from('new_quiz')->where('q_id', $q_id)->get()->result_array();
    }
    public function show_quiz($u_id){
        return $this->db->select('*')->from('new_quiz')->where('user_id',$u_id)->get()->result_array();
    }
    function apply_quiz($q_id){
        $query = $this->db->select('*')->from('add_quiz')->where('q_id', $q_id)->get();
        $quiz['count'] = $query->num_rows();
        $quiz['result'] =  $query->result_array();
        return $quiz;
    }
    function save_result($data){
        return $this->db->insert('quiz_response', $data);
    }
}
