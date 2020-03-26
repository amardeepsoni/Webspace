<?php

class Model_Round2Slot extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fetchSlots(){
        $query = "select * from round2slot";
        return $this->db->query($query)->result_array();
    }

    public function fetchBookedSlots(){
        $query = "select * from round2slots order by School";
        return $this->db->query($query)->result_array();
    }

    public function addSlot($data){
        $data['regcount'] = 0;
        $this->db->insert('round2slot',$data);
    }

    public function deleteSlot($slotId){
        $this->db->delete('round2slot', array("id"=> $slotId));
    }
}

?>