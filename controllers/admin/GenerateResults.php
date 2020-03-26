<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenerateResults extends CI_Controller {

    public function Round2() {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $usertype = $this->session->userdata("logged_in ")["usertype"];
        if($usertype=="content")
            redirect(adminpath.'/login');

        $ch = curl_init('https://api.intellify.in/api/SetHistory');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        $status = curl_getinfo($ch);
        if($status['http_code'] == 200)
            $this->session->set_flashdata('resultSuccess','Results Generated Successfully');
        else
            $this->session->set_flashdata('resultFail','Something Went Wrong');
//        print_r($status);
//        print_r($response);
        redirect(base_url().adminpath.'/Dashboard');
    }


    public function Round3() {
        if (!$this->session->userdata('logged_in')) {
            redirect(adminpath . '/login');
        }
        $govtStudents = $this->input->post('govt');
        $privateStudents = $this->input->post('private');
        $ch = curl_init('https://api.intellify.in/api/SetR3Result/'.$govtStudents.'/'.$privateStudents);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        $status = curl_getinfo($ch);
        if($status['http_code'] == 200)
            $this->session->set_flashdata('resultSuccess','Results Generated Successfully');
        else
            $this->session->set_flashdata('resultFail','Something Went Wrong');
//        print_r($status);
//        print_r($response);
        redirect(base_url().adminpath.'/Dashboard');
    }
}