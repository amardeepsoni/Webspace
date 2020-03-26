<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Popup extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function  getPopups() {
        return $this->db->select('*')->from('RecentNews')->get()->result();
    }

    public function getLatest($var){
       $res = $this->db->select('*')->from('popup')->where('page',$var)->where('enabled', 1)->order_by('id desc')->get()->result_array();
       
       if(!($res))
            return null;
         else
        {
            return $res[0];
        }
    }

    public function add($var){
        $this->db->insert('RecentNews', $var);     
    }

    public function remove($id){
        // $this->load->db('popup');
        $this->db->where('newsId', $id);
		$this->db->delete('RecentNews');

    }

    public function getlargestid(){
        $q = $this->db->select_max('id')->result();
        return $q;
    }

    public function enable($id){
        $this->db->where('newsId', $id);
        $data = array('enabled' => 1);
        $this->db->update('RecentNews', $data);
    }

    public function disable($id){
        
        $this->db->where('newsId', $id);
        $data = array('enabled' => 0);
        $this->db->update('RecentNews', $data);
    }
    

}	

?>