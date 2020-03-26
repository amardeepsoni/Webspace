<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Poems extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Poem_model');
        if ($this->uri->segment(2) == 'poems')
            show_404();
    }

    //Validate user
    public function validate($reg_no){
        //Check if student is logged in
        if($this->session->userdata('student_login')){
            if($reg_no == $this->session->userdata('student_login')['reg_no'])
                return;
        }
        $this->response('Authentication Failed',401);
    }

    public function Index_get($poem_id = null) {
        $reg_no = $this->uri->segment(5);
        //Validate user
        $this->validate($reg_no);

        if(!$poem_id) {
            $result = $this->Poem_model->read_by_reg_no($reg_no);
            if (!$result) {
                $this->response('No records found', 404);
                return;
            }
        else {
                $this->response($result, 200);
                return;
            }
        }
        else {
            $result = $this->Poem_model->read_by_poem_id(array(
                'reg_no' => $reg_no,
                'poem_id' => $poem_id
            ));
            if (!$result) {
                $this->response('No record found', 404);
                return;
            }
            else {
                $this->response($result, 200);
                return;
            }
        }

    }

    public function Index_post() {
        $reg_no = $this->uri->segment(5);
        //Validate user
        $this->validate($reg_no);

        $data = array(
            'reg_no' => $reg_no,
            'poem' => $this->post('poem'),
            'colour_back' => $this->post('colour_back'),
            'colour_text' => $this->post('colour_text'),
            'title' => $this->post('title'),
            'genre' => $this->post('genre')
        );
        $flag = 0;
        foreach ($data as $keyword) {
            if (!$keyword) {
                $flag = 1;
                break;
            }
        }
        if ($flag) {
            $this->response('All fields are not specified', 400);
            return;
        }
        $result = $this->Poem_model->create($data);
        if ($result) {
            $this->response('Success', 200);
            return;
        } else {
            $this->response('Failed', 400);
            return;
        }
    }

    public function Index_put($poem_id) {
        $reg_no = $this->uri->segment(5);
        //Validate user
        $this->validate($reg_no);

        $data = array(
            'poem_id' => $poem_id,
            'reg_no' => $reg_no,
            'poem' => $this->put('poem'),
            'colour_back' => $this->put('colour_back'),
            'colour_text' => $this->put('colour_text'),
            'title' => $this->put('title'),
            'genre' => $this->put('genre')
        );
        $flag = 0;
        foreach ($data as $keyword) {
            if (!$keyword) {
                $flag = 1;
                break;
            }
        }
        if ($flag) {
            $this->response('All fields are not specified', 400);
            return;
        }
        $result = $this->Poem_model->update($data);
        if ($result) {
            $this->response('Success', 200);
            return;
        } else {
            $this->response('Failed', 400);
            return;
        }
    }

    public function Index_delete($poem_id) {
        $reg_no = $this->uri->segment(5);
        //Validate user
        $this->validate($reg_no);

        $result = $this->Poem_model->delete_by_poem_id(array(
            'reg_no' => $reg_no,
            'poem_id' => $poem_id
        ));
        if($result) {
            $this->response('Success',200);
            return;
        }
        else {
            $this->response('Failed',400);
            return;
        }
    }

}