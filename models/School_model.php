<?php defined('BASEPATH') OR exit('No direct script access allowed');



class School_model extends CI_Model {



	private $table = "school";

 
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function read()

	{

		$query =  $this->db->query('select category_id, name, image, email, contact_person_name, mobile, mobile1, contact_person_designation,                                       intern, address, date_registered,                                                                 regcount, school_type from school order by category_id');

		if(!$query)
		    return 0;
		else
		    return $query->result();

	}

	public function getdata($id){
		$data = array(
			'id'=>$id,
			'name'=>$this->db->select('name')->from('school')->where('category_id', $id)->get()->row()->name,
			'mobile' => $this->db->select('mobile')->from('school')->where('category_id', $id)->get()->row()->mobile
		);

		return $data;
	}
	public function read_regcount($id)
	{
		$query = $this->db->query('select regcount from school where category_id = ?',$id);
		if ($query)
			return $query->row();
		else
			return 0;
	} 

 

	public function read_by_id($id)

	{
		$query =  $this->db->select('*')->from('school')->where('category_id',$id)->get();
		if($query)
		    return $query->row();
		else
		    return 0;

	} 

    public function read_manager($id) {
        return $this->db->get_where('olympiad_managers',array("category_id" => $id))->row();
    }

	public function read_by_email($email = null)

	{

		return $this->db->select("*")->from($this->table)->where('email',$email)->get()->row();

	}


    public function create($data)

    {
        if($this->db->insert($this->table,$data))
            return true;
        else
            return false;

    }


    public function create_manager($data) {
        return $this->db->insert('olympiad_managers',$data);
    }



	public function validatelogin($data)

		{

			$enc_pass  = md5($data['password']);

			$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $enc_pass . "'";

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

 	

	public function schoolinfo($email) {

		$query = $this->db->query('select * from school where email=?', $email );

		if ($query->num_rows()) {

			return $query->row();

		} else {

			return false;

		}

	}

	//Update school details
	public function update($data)

	{
		 $this->db->where('category_id',$data['category_id'])->update($this->table,$data);
        return $this->db->affected_rows();
    }

	//Update Reg Count
	public function updatereg_count($data)
	{
		$this->db->set('regcount', $data['regcount']); //value that used to update column  
		$this->db->where('category_id', $data['category_id']); //which row want to upgrade  
		$this->db->update($this->table);  //table name
        return $this->db->affected_rows();
	}
	//SET Regcount to Zero
	public function updatereg_co($id)
	{
		$this->db->set('regcount', 0); //value that used to update column  
		$this->db->where('category_id', $id); //which row want to upgrade  
		$this->db->update($this->table);  //table name
	}
	//Get Password
    public function getpassword($id) {
        $query = $this->db->query('select password from school where category_id = ?',$id);
        if($query)
            return $query->row();
        else
            return 0;
    }

    //Update password
	public function passwordupdate($data)

	{
	    $this->db->where('category_id',$data['category_id'])->update($this->table,$data);
        return $this->db->affected_rows();
    }

 

	public function delete($id = null)

	{

		$this->db->where('id',$id)

			->delete($this->table);



		if ($this->db->affected_rows()) {

			return true;

		} else {

			return false;

		}
	} 

	//Add new school query to school_help table in database
	public function addQuery($data) {
        return $this->db->insert('school_help',$data);
    }

    public function getQueries($id) {
        $query = $this->db->select('*')->from('school_help')->where('category_id',$id)->order_by('solved','asc')->get();
        return $query->result();
    }

    public function getAllQueries() {
        $query = $this->db->select('*')->from('school_help')->order_by('solved, date desc ')->get();
        return $query->result();
    }

    public function answerQuery($data) {
        $this->db->where('id',$data['id'])->update('school_help',$data);
        return $this->db->affected_rows();
    }
}

