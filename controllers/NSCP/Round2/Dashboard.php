<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('round2_login')['username']) {
            redirect(round2path . '/login');
        }
        $this->load->model(round2path . '/Model_Round2');
        $data = array(
            'username' => $_SESSION['round2_login']['username'],
            'firstname' =>  $_SESSION['round2_login']['firstname'],
            'lastname' =>  $_SESSION['round2_login']['lastname']
        );
        $data['skills'] = $this->Model_Round2->getSkills();
        $data['attempted'] = $this->Model_Round2->getAttempted($data['username'], $_SESSION['round2_login']['level']);
        // $data['a'] = array();
        // foreach ($data['skills'] as $skill) {
        //     foreach ($data['attempted'] as $att) {
        //         if ($skill->skill_id == $att['skill_id']) {
        //             // $data['a'][$skill->skill_id]["attempted"] = 1;
        //             array_push($data['a'], array($skill->skill_id =>1)
        //         ); 
        //         }

        //          else array_push($data['a'], array($skill->skill_id =>0) 
        //          )
        //         ;
        //     }
        // }
        $this->load->view(round2path . '/dashboard', $data);
    }
}
