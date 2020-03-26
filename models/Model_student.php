<?php

class Model_student extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function getstudents() {

		$this->db->select('*');

		$this->db->from('student');

        $this->db->order_by("level asc, class asc, username asc");
        $query = $this->db->get();

        return $query->result();

	}
	public function user_delete($id){

		$this->db->where('registrationno', $id);
		$this->db->delete('student');
        return $this->db->affected_rows();
    }
  public function deleteall($id){

	$this->db->where('category_id', $id);
	$this->db->delete('student');

}
// public function getlevel($studentreg){

//     return $this->db->select('level')->from('student')->where('username', $studentreg)->get()->row()->level;

// } 

// public function getcat($studentreg){

//   return $this->db->select('category_id')->from('student')->where('username', $studentreg)->get()->row()->category_id;

// } 
public function getdata($studentreg){

  $data = array(

    'level' => $this->db->select('level')->from('student')->where('username', $studentreg)->get()->row()->level,
    'category_id' =>$this->db->select('category_id')->from('student')->where('username', $studentreg)->get()->row()->category_id,
    'firstname' => $this->db->select('firstname')->from('student')->where('username', $studentreg)->get()->row()->firstname,
    'lastname' => $this->db->select('lastname')->from('student')->where('username', $studentreg)->get()->row()->lastname
  );
  return $data;
} 
public function searchStudents($student_Fname, $student_Lname, $school_name){


  return $this->db->select("student.registrationno, student.firstname, student.lastname, school.name, student.class")
  ->from("student, school")
  ->where("student.lastname like '%".$student_Lname."%'")
  ->where("student.firstname like '%".$student_Fname."%'")
  ->where("school.name like '%".$school_name."%'")
  ->where('student.category_id = school.category_id')
  ->get()->result();
}
}

?>