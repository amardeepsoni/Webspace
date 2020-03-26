<?php
class Model_studyMaterial extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getAll() {
        return $this->db->select('*')->from('study_material')->order_by('class','subject')->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('study_material',$data);
    }

    public function delete($id) {
        $this->db->where('id',$id)->delete('study_material');
        return $this->db->affected_rows();
    }
}
