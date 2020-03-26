<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poem_model extends CI_Model
{

    private $table = "poems";

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read_by_reg_no($reg_no) {
        $query = $this->db->query('select * from poems where reg_no = ?',$reg_no);
        return $query->result();
    }

    public function read_by_poem_id($data) {
        $query = $this->db->get_where($this->table,$data);
        return $query->row();
    }

    public function create ($data) {
        return $this->db->insert($this->table,$data);
    }

    public function update($data) {
         $this->db->where($data)->update($this->table,$data);
         return $this->db->affected_rows();
    }

    public function delete_by_poem_id($data) {
        $this->db->where($data)->delete($this->table);
        return $this->db->affected_rows();
    }

}

