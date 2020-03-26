<?php
class Model_studyMaterial extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAll() {
		return $this->db->select('*')->from('study_material')->where('category', 'Resources')->order_by('subject', 'class')->get()->result();
	}
	public function getByLevel($level) {
		return $this->db->select('*')->from('study_material')->where('subject', $subject)->order_by('class')->get()->result();
	}
	public function getBySubjects($classes) {
		return $this->db->select('*')->from('studentSubjects')->where('class', $classes)->get()->result();
	}
	public function getBySubjectsch($classes) {
		return $this->db->select('distinct(chapter)')->from('studentSubjects')->where('class', $classes)->get()->result();
	}
}