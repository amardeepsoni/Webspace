<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenerateAttendanceSheet extends CI_Controller {
    public function round_1() {
        if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
        $o = shell_exec('python3 -W ignore scripts/Attendance/file.py '.$_SESSION['schoollogged_in']['id'].' round_1'.' 2>&1');
        if($o)
            print_r($o) ;
        else
            redirect(base_url().'scripts/Attendance/html/'.$_SESSION["schoollogged_in"]["id"].'.html');
    }

    public function round_2() {
        if(!$this->session->userdata('schoollogged_in')['id']){
            redirect('schoollogin');
        }
        $o = shell_exec('python3 -W ignore scripts/Attendance/file.py '.$_SESSION['schoollogged_in']['id'].' round_2'.' 2>&1');
        if($o)
            print_r($o) ;
        else
            redirect(base_url().'scripts/Attendance/html/'.$_SESSION["schoollogged_in"]["id"].'.html');
    }
}

