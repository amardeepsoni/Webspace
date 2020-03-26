<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Model_discussion_ans extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getByPost($id) {

		$res = $this->db->select('*')->from('forum_post_ans')->where('post_id', $id)->order_by('ans_date_time desc')->get()->result_array();

		if (!($res)) {
			return null;
		} else {
			return $res;
		}
	}
//add answer
	public function add_ans($var) {
		$this->db->insert('forum_post_ans', $var);
	}
//end add answer

	public function upvote() {
		try {
			$ans_id = $this->input->post('upvote');
			$owername = $this->input->post('owernames');
			$ownerid = $this->input->post('ownerids');
			$votegiven = $this->input->post('votegiven');
			$ans = $this->db->select('ans_id')->from('votes')->where('ans_id', $ans_id)->get()->num_rows();
			$row = $this->db->select('like_identity')->from('votes')->where('like_identity', $ownerid)->get()->num_rows();
			$rowdata = $this->db->select('vote')->from('votes')->where('like_identity', $ownerid)->where('ans_id', $ans_id)->get()->result();
			$rowdata_d = $this->db->select('down_v')->from('votes')->where('like_identity', $ownerid)->where('ans_id', $ans_id)->get()->result();
			if ($row > 0 && $ans > 0 && $rowdata[0]->vote == 0 && $rowdata_d[0]->down_v == 1) {

				$this->db->set('down_v', '0');
				$this->db->set('vote', '1');
				$this->db->where('like_identity', $ownerid);

				if ($this->db->update('votes')) {

					$this->db->set('downvotes', 'downvotes-1', false);
					$this->db->set('upvotes', 'upvotes+1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('downvotes, upvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}

			} else if ($row > 0 && $ans > 0 && $rowdata[0]->vote == 1 && $rowdata_d[0]->down_v == 0) {

				$this->db->set('vote', '0');
				$this->db->where('like_identity', $ownerid);

				if ($this->db->update('votes')) {

					$this->db->set('upvotes', 'upvotes-1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('upvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}

			} else if ($row > 0 && $ans > 0 && $rowdata[0]->vote == 0 && $rowdata_d[0]->down_v == 0) {

				$this->db->set('vote', '1');
				$this->db->where('like_identity', $ownerid);

				if ($this->db->update('votes')) {
					# code...

					$this->db->set('upvotes', 'upvotes+1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('upvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}
			} else {
				$upvote_user = array(
					'like_identity' => $ownerid,
					'vote' => '1',
					'ans_id' => $ans_id,
				);
				if ($this->db->insert('votes', $upvote_user)) {
					# code...
					$this->db->set('upvotes', 'upvotes+1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('upvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$datain = json_encode($result);
					return json_decode($datain);
				}
			}
		} catch (Exception $e) {
			echo 'Message: ' . $e->getMessage();
		}

	}
	public function downvote() {
		try {

			$ans_id = $this->input->post('downvote');
			$owername = $this->input->post('owernames');
			$ownerid = $this->input->post('ownerids');
			$votegiven = $this->input->post('d_votegiven');
			$ans = $this->db->select('ans_id')->from('votes')->where('ans_id', $ans_id)->get()->num_rows();
			$row = $this->db->select('like_identity')->from('votes')->where('like_identity', $ownerid)->get()->num_rows();
			$rowdata = $this->db->select('down_v')->from('votes')->where('like_identity', $ownerid)->where('ans_id', $ans_id)->get()->result();
			$rowdata_v = $this->db->select('vote')->from('votes')->where('like_identity', $ownerid)->where('ans_id', $ans_id)->get()->result();

			if ($row > 0 && $ans > 0 && $rowdata[0]->down_v == 0 && $rowdata_v[0]->vote == 1) {
				$this->db->set('down_v', '1');
				$this->db->set('vote', '0');
				$this->db->where('like_identity', $ownerid)->where('ans_id', $ans_id);

				if ($this->db->update('votes')) {
					$ans_id = $this->input->post('downvote');
					$this->db->set('downvotes', 'downvotes+1', false);
					$this->db->set('upvotes', 'upvotes-1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('downvotes, upvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}
			} else if ($row > 0 && $ans > 0 && $rowdata[0]->down_v == 1 && $rowdata_v[0]->vote == 0) {
				$this->db->set('down_v', '0');
				$this->db->where('like_identity', $ownerid)->where('ans_id', $ans_id);

				if ($this->db->update('votes')) {
					$ans_id = $this->input->post('downvote');
					$this->db->set('downvotes', 'downvotes-1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('downvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}
			} else if ($row > 0 && $ans > 0 && $rowdata[0]->down_v == 0 && $rowdata_v[0]->vote == 0) {
				$this->db->set('down_v', '1');
				$this->db->where('like_identity', $ownerid)->where('ans_id', $ans_id);

				if ($this->db->update('votes')) {
					$ans_id = $this->input->post('downvote');
					$this->db->set('downvotes', 'downvotes+1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('downvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}
			} else {

				$downvote_user = array(
					'like_identity' => $ownerid,
					'down_v' => '1',
					'ans_id' => $ans_id,
				);
				if ($this->db->insert('votes', $down_user)) {
					$ans_id = $this->input->post('downvote');
					$this->db->set('downvotes', 'downvotes+1', false);
					$this->db->where('ans_id', $ans_id);
					$this->db->update('forum_post_ans');
					$result = $this->db->select('downvotes')->from('forum_post_ans')->where('ans_id', $ans_id)->get()->result_array();
					$data = json_encode($result);
					return json_decode($data);
				}
			}

		} catch (Exception $e) {
			echo 'Message: ' . $e->getMessage();
		}

	}

	//admin and users can remove
	public function remove($id) {
		// $this->load->db('faq');
		$this->db->where('ans_id', $id);
		$this->db->delete('forum_post_ans');

	}
	//admin disable
	public function disable($id) {
		// $this->load->db('faq');
		$this->db->set('status', '1');
		$this->db->where('ans_id', $id);
		$this->db->update('forum_post_ans');

	}

}
?>