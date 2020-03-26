<?php
class Model_recentNews extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllNews()
    {
        return $this->db->select('*')->from('RecentNews')->get()->result();
    }
   
}