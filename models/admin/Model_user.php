<?php
class Model_User extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


	public function add($data,$menudata)
		{
			$this->db->insert('user', $data);
			$user_id=$this->db->insert_id();
			if($menudata){
				foreach($menudata as $menu_id){
					$this->db->query("INSERT INTO menu_user SET user_id = '".$user_id."', menu_id = '" . $menu_id. "'");
				}
			}

		}
	public function edit($id,$data,$menudata)
		{
			$this->db->where('id',$id);
			$this->db->update('user',$data);
		     $this->db->where('user_id', $id);
		     $this->db->delete('menu_user');
			if($menudata){
				foreach($menudata as $menu_id){
					$this->db->query("INSERT INTO menu_user SET user_id = '".$id."', menu_id = '" . $menu_id. "'");
				}
			}
		}
	public function delete($data)
		{
			for ($i = 0; $i <= count($data); $i++)
	        {
		        $this->db->where('id', $data[$i]);
		        $this->db->delete('user');
		        $this->db->where('user_id', $data[$i]);
		        $this->db->delete('menu_user');
	        }
		}

	public function active($data)
		{
			for ($i = 0; $i <= count($data); $i++)
	        {
	        	$postdata=array(
				 'status'=>1,
				 );
		        $this->db->where('id', $data[$i]);
		        $this->db->update('user',$postdata);
	        }
		}
	public function inactive($data)
		{
			for ($i = 0; $i <= count($data); $i++)
	        {
	        	$postdata=array(
				 'status'=>0,
				 );
		        $this->db->where('id', $data[$i]);
		        $this->db->update('user',$postdata);
	        }
		}


	public function logincheck($data)
	{
		$enc_pass  = md5($data['password']);
		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $enc_pass . "' AND " . "status ='1'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		 // echo $this->db->last_query();
		if ($query->num_rows() == 1) {
		return true;
		} else {
		return false;
		}		
	}

	public function userinfo($username) {
		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
		return false;
		}
	}
	public function updateprofile($data)
	{
		$this->db->where('id',$this->session->userdata['logged_in']['id']);
		$this->db->update('user',$data);
	}
	public function getuser($user_id)
	{
		$condition = "id =" . $user_id;
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->row();
	}
	public function checkusermenus($user_id,$menu_id)
	{
		$condition = "user_id =" . $user_id ." and menu_id =" . $menu_id;
		$this->db->select('*');
		$this->db->from('menu_user');
		$this->db->where($condition);
		$query = $this->db->get();
		// echo $this->db->last_query()."</br>";
		return $query->row();
	}

	public function checkcuseralready($user_name)
	{
		$condition = "user_name ='" .$user_name."'" ;
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$query = $this->db->get();
		// echo $this->db->last_query()."</br>";
		return $query->row();
	}

	public function getusers()
	{
		$condition = "pid =" . "'1'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}

	public function menus() {
		$this->db->select('*');
		$this->db->from('menu');
		$query = $this->db->get();
		return $query->result();
	}

	public function getusertype($id) {
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('usertype');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->row();
	}
}

?>