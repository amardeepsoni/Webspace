<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	private $table = "student";

	function __construct()
    {   parent::__construct();
        $this->load->database();
    }

    public function create($data)
	{	 
		if($this->db->insert($this->table,$data))
		    return true;
		else
		    return false;
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','desc')
			->get()
			->result();
	} 

	//List details of all students belonging to same school
	public function read_by_id($id)
	{
	    $query = $this->db->query('select id, category_id, firstname, lastname, username, level, class,registrationno,
                                  email, mobile, mobile1, address, dob, gender, educationalqualification, date_added, date_modify,
                                   status from student where category_id = ?',$id);
        if($query)
            return $query->result();
        else
            return 0;
    	}
    //List details of a student with given registration number
    public function read_by_reg_no($reg_no)
    {
        $query = $this->db->query("select id, category_id, firstname, lastname, username, level, class,registrationno,
                                  email, mobile, mobile1, address, dob, gender, educationalqualification, date_added, date_modify,
                                   status from student where registrationno = ?",$reg_no);
        if($query)
            return $query->row();
        else
            return 0;
    }

	public function read_by_email($email = null)
	{
        if($this->db->select("id, category_id, firstname, lastname, username, level,registrationno,
                                  email, mobile, mobile1, address, dob, gender, educationalqualification, date_added, date_modify,
                                   status, ordernum")->from($this->table)->where('email',$email)->get()->row())
            return true;
        else
            return false;
	} 



	public function logincheck($data)
		{
			$enc_pass  = md5($data['password']);
			$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $enc_pass . "'";
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
			return true;
			} else {
			return false;
			}		
		}
 	
	public function studentinfo($username) {
		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	public function getschool($username) {
		$category_id = $this->db->query('select category_id from student where student.username = '.$username)->row()->category_id; 
		return $this->db->query('select name from school where school.category_id ='.$category_id)->row()->name;
	}
	public function update($data)
	{
		$this->db->where('registrationno',$data['registrationno'])->update($this->table,$data);
        return $this->db->affected_rows();
	}

    //Get Password
    public function getpassword($reg_no) {
        $query = $this->db->query('select password from student where registrationno = ?',$reg_no);
        if($query)
            return $query->row();
        else
            return 0;
    }

	public function passwordupdate($data)
	{
		 $this->db->where('registrationno',$data['registrationno'])
			->update($this->table,$data);
        return $this->db->affected_rows();
    }

	public function delete_by_reg_no($reg_no) {
	    $this->db->where('registrationno',$reg_no)->delete($this->table);
	    if($this->db->affected_rows())
	        return true;
	    else
	        return false;
    }
 
	public function delete($id)
	{
		$this->db->where('category_id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

    //Add new student query to student_help table in database
    public function addQuery($data) {
        return $this->db->insert('student_help',$data);
	}
	// Get all the user details for excel sheet

    function getStudentDetails($category_id){
        $query = $this->db->select('registrationno,firstname,lastname,email,mobile,class')->from('student')->where('category_id',$category_id)->order_by('class','asc')->get();
        return $query->result_array();
    }
    public function readRedundantStudent($firstname,$lastname,$class,$email,$mobile) {
	    $query = $this->db->select('*')->from('student')->where(
	        array(
	            'firstname' => $firstname,
                'lastname' => $lastname,
                'class' => $class,
                'email' => $email,
                'mobile' => $mobile
            )
        )->get();
	    return $query->num_rows();
   }
}
