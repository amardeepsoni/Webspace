<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_discussion extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getPosts() {
		return $this->db->select('*')->from('main_forum')->where('status', null)->order_by('created_at', "DESC")->get()->result();
	}
	public function getPostsadmin() {
		return $this->db->select('*')->from('main_forum')->order_by('created_at', "DESC")->get()->result();
	}
	public function getPostByID($id) {

		return $this->db->select('*')->from('main_forum')->where('id', $id)->get()->result();
	}
	public function getAnsByPID($id) {
		return $this->db->select('*')->from('forum_post_ans')->where('post_id', $id)->where('status', null)->get()->result();
	}

	public function add($var) {
		$this->db->insert('main_forum', $var);
	}
//admin and users can remove
	public function remove($id) {
		// $this->load->db('faq');
		$this->db->where('id', $id);
		$this->db->delete('main_forum');

	}

	public function update($id) {
		// $this->load->db('faq');

		$this->db->where('id', $id);
		$this->db->update('main_forum');

	}
//admin disable
	public function disable($id) {
		// $this->load->db('faq');
		$this->db->set('status', '1');
		$this->db->where('id', $id);
		$this->db->update('main_forum');

	}

}
?>