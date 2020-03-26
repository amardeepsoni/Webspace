<?php

class Model_Remarks extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb',TRUE);
        $this->load->database();

        // $this->intellifydb = $this->load->database('intellify',TRUE);
    }

    public function insert($data) {
        return $this->quizdb->insert('remarks',$data);
    }

    public function update($data) {
        return $this->quizdb->where(array(
            'upper_bound' => $data['upper_bound'],
            'user_type' => $data['user_type']
        ))->update('remarks',$data);
    }

    public function getRemarks($upper_bound, $user_type) {
        return $this->quizdb->select('*')->from('remarks')->where(array(
            'upper_bound' => $upper_bound,
            'user_type' => $user_type
        ))->get()->num_rows();
    }

    public function getAllRemarks() {
        return $this->quizdb->select('*')->from('remarks')->get()->result();
    }

    public function getcountbylevel($level){

        switch($level){
            case 0: return $this->db->select('*')->from('exportlevel0')->order_by('count desc')->get()->result();
            case 1: return $this->db->select('*')->from('exportlevel1')->order_by('count desc')->get()->result();
            case 2: return $this->db->select('*')->from('exportlevel2')->order_by('count desc')->get()->result();
            case 3: return $this->db->select('*')->from('exportlevel3')->order_by('count desc')->get()->result();
            case 'all': return $this->db->select('*')->from('exportqual')->order_by('count desc')->get()->result();
        }

    }
}