<?php defined('BASEPATH') or exit('No direct script access allowed');
class Model_round2slot extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getSelectedSlots($schoolid)
    {
        $q = "select * from round2slots where school = " . $schoolid;
        return $this->db->query($q)->result();
    }

    public function  getAll($r2count)
    {
        $r2count = $r2count > 200 ? 200 : $r2count;
        $query = "select * from round2slot where count - regcount >=" . $r2count;
        return $this->db->query($query)->result_array();
    }

    public function isreg($var)
    {
        // $query = "select id from round2slot where School =".$var ;
        // return $this->db->query($query)->result(); 
    }

    public function bookSlot($id, $schoolid, $count)
    {
        $query = "UPDATE `round2slot` SET
        `id` =" . $id . ",
        `date` = `date`,
        `start` =  `start` ,
        `end` = `end`,
        `count` = `count`,
        `regcount` = `regcount`+" . $count . "
        WHERE ((`id` = " . $id . "));";

        $data = $this->db->select('*')->from('round2slot')->where("id", $id)->get()->row();

        $query2 = "INSERT INTO `round2slots`
         (`id`, `date`, `start`, `end`, `Count`, `regcount`, `School`)
            VALUES
         ('" . $id . "', '" . $data->date . "','" . $data->start . "', '" . $data->end . "', '" . $data->count . "','" . $count . "', '" . $schoolid . "');";

        $this->db->query($query);
        $this->db->query($query2);
    }

    public function regcount($id)
    {
        $q = "select sum(regcount) as sum from round2slots where School = " . $id;

        $num = $this->db->query($q)->row()->sum;
        if (!$num) {
            $num = 0;
            return $num;
        }
        return $this->db->query($q)->row()->sum;
    }

    public function r2count($id)
    {
        $q = "select count(*) as count from student where status = 1 and category_id =" . $id;
        return $this->db->query($q)->row()->count;
    }
    
}
