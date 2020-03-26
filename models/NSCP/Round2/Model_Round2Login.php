<?php
class Model_Round2Login extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkLogin($data)
    {
        $query = $this->db->select('*')->from('student')->where(array(
            'username' => $data['username'],
            'password' => md5($data['password']),
            'status' => 1
        ))->get()->result_array();
        $schoolId = $query[0]['category_id'];
        if (count($query)){
            $this->db->trans_start();
            $this->db->query('SET time_zone = "Asia/Calcutta"');
            $slotQuery = $this->db->query('select * from round2slots where School='.$schoolId.' and date=curdate() and start<curtime() and end>curtime()')->result();
            $this->db->trans_complete();
            if(count($slotQuery)){
                return true;
            }
            return false;
            // return true;


        }
        return false;
        // return true;

    }

    public function getStudentDetails($username)
    {
        $query = $this->db->select('*')->from('student')->where('username', $username)->limit(1)->get();
        if ($query->num_rows())
            return $query->row();
        else
            return false;
    }
}