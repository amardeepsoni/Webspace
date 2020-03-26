<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_faq extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function  getFaq() {
        return $this->db->select('*')->from('faq')->get()->result();
	}

    public function getLatest($var){
       $res = $this->db->select('*')->from('faq')->where('page',$var)->where('enabled', 1)->order_by('id desc')->get()->result_array();
       
       if(!($res))
            return null;
         else
        {
            return $res[0];
        }
    }

    public function add($var){
        $this->db->insert('faq', $var);     
    }

    public function remove($id){
        // $this->load->db('faq');
        $this->db->where('id', $id);
        $this->db->delete('faq');

    }

    public function getlargestid(){
        $q = $this->db->select_max('id')->result();
        return $q;
    }

    public function enable($id){
        $this->db->where('id', $id);
        $data = array('enabled' => 1);
        $this->db->update('faq', $data);
    }

    public function disable($id){
        
        $this->db->where('id', $id);
        $data = array('enabled' => 0);
        $this->db->update('faq', $data);
    }
}
?>