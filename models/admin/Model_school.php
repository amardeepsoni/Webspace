<?php

class Model_School extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function add($data) {

		$this->db->insert('school', $data);

	}

	public function edit($id, $data) {

		$this->db->where('category_id', $id);

		$this->db->update('school', $data);

	}

	public function delete($data) {

		for ($i = 0; $i <= count($data); $i++) {

			$this->db->where('category_id', $data[$i]);

			$this->db->delete('school');

		}

	}

	public function active($data) {

		for ($i = 0; $i <= count($data); $i++) {

			$postdata = array(

				'status' => 1,

			);

			$this->db->where('category_id', $data[$i]);

			$this->db->update('school', $postdata);

		}

	}

	public function inactive($data) {

		for ($i = 0; $i <= count($data); $i++) {

			$postdata = array(

				'status' => 0,

			);

			$this->db->where('category_id', $data[$i]);

			$this->db->update('school', $postdata);

		}

	}

	public function getAllSchools() {

		$this->db->select('*');

		$this->db->from('school')->where('status', NULL);
<<<<<<< HEAD
=======

		$query = $this->db->get();

		return $query->result();

	}
	public function getHiddenSchools() {

		$this->db->select('*');

		$this->db->from('school')->where('status', '1');
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64

		$query = $this->db->get();

		return $query->result();

	}
	public function getHiddenSchools() {

		$this->db->select('*');

		$this->db->from('school')->where('status', '1');

		$query = $this->db->get();

		return $query->result();

	}

	public function checkschoolalready($name, $id) {

		if ($name) {

			$condition = "name =" . "'" . $name . "' and category_id=" . $id;

		}

		$this->db->select('*');

		$this->db->from('school');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return false;

		}

	}

	public function getSchool($id) {

		$condition = "category_id =" . "'" . $id . "'";

		$this->db->select('*');

		$this->db->from('school');

		$this->db->where($condition);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->row();

		} else {

			return false;

		}

	}

	public function getDisapprovedStudents($category_id) {
		return $this->db->select('*')->from('student')->where(array(
			'category_id' => $category_id,
			'status' => -1,
		))->get()->result();
	}

	public function getStudentsBySchoolID($category_id) {
		return $this->db->select('*')->from('student')->where(array(
			'category_id' => $category_id,
		))->get()->result();
	}

	public function studentDetailsForCSV($category_id) {
		return $this->db->select('firstname,lastname,email,mobile,class,status,id')->from('student')->where(array(
			'category_id' => $category_id,
		))->get()->result_array();
	}

	public function studentLevelDetailsForCSV() {
		return $this->db->select("student.category_id, name, level, count(*)")->from("student, school")->where("student.category_id = school.category_id")->Group_by("category_id, level")->order_by("category_id")->get()->result_array();

	}

	public function fetchHistory($school_id) {
		return $this->db->query("select A.username, A.firstname, A.lastname, A.class, A.status, B.skill_1_score, B.skill_2_score, B.skill_3_score, B.skill_4_score, B.skill_5_score, B.score from intellify.student as A, quizdb.history as B, quizdb.quiz as C where A.username = B.username and B.quizid = C.quizid and A.category_id =" . $school_id . " and C.belongs_to = 0 and A.status != -1;")->result_array();
	}
	public function hide($status) {
		foreach ($status as $hide) {
			$postdata = array(
				'status' => 1,
			);
			$this->db->where('category_id', $hide);
			$this->db->update('school', $postdata);
		}
	}
	public function show($status) {
		foreach ($status as $show) {
			$postdata = array(
				'status' => NULL,
			);
			$this->db->where('category_id', $show);
			$this->db->update('school', $postdata);

		}
	}
	public function hide($status) {
		foreach($status as $hide){
        	$postdata=array(
			 'status'=>1,
			 );
	        $this->db->where('category_id', $hide);
	        $this->db->update('school',$postdata);
        }
	}
	public function show($status) {
		foreach($status as $show){
        	$postdata=array(
			 'status'=>NULL,
			 );
	        $this->db->where('category_id', $show);
	        $this->db->update('school',$postdata);

        }
	}
}

?>