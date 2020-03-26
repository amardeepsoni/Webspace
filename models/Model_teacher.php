<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_teacher extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function add_teacher($data)
    {
        return $this->db->insert('teachers',$data);
    }
    function fetch_all_teachers($school){
        return $this->db->select('*')->from('teachers')->where('school',$school)->get()->result_array();
    }
    function login_teacher($login){
        return $this->db->select('*')->from('teachers')->where($login)->get()->result_array();
    }
}
