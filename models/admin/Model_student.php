<?php

class Model_student extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getStudentsBySchoolID ($category_id) {
        $query =  $this->db->select('*')->from('student')->where('category_id',$category_id)->get();
        if($query)
            return $query->result();
        else
            return false;
    }
    public function approveAllStudents($category_id) {
        $this->db->where(array(
            'category_id' => $category_id,
            'status' => -1
        ))->update('student',array('status' => 0));
        return $this->db->affected_rows();
    }
}