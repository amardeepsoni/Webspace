<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myletspractice extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(       
            'student_model'
        ));  
    } 
 
    //all post details without slider
    public function index($id = null)
    { 
        if(!$this->session->userdata('studentlogged_in')['id']){ 
            redirect('login');
        }
        $data=array();


        $data['page_title'] = "Let's Practice";
        $data['meta_keyword'] = "Let's Practice";
        $data['meta_description'] = "Let's Practice";

        $data['heading'] = "Let's Practice";



        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        );
                
        $data['breadcrumbs'][] = array(
        'text' => "Let's Practice",
        'href' => base_url().'login'
        );



        $data['action'] = base_url().'login/checklogin';
        $data['forgotaction'] = base_url().'login/forgotpassword';


        $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['username']));
//
//        $this->load->model('model_subject');
//        $data['subjects']=array();
//        if($data['studentinfo']->schoollavel_id){
//            $fildata = array(
//                'schoollavel_id' => $data['studentinfo']->schoollavel_id,
//            );
//            $subjects=$this->model_subject->getlevelsubjects($fildata);
//            if($subjects){
//                foreach($subjects as $subject){
//                    $data['subjects'][] = array(
//                        'id' => $subject->id,
//                        'name' => $subject->name,
//                    );
//                }
//            }
//
//        }

        $this->load->view('accountstudentheader',$data);
        $this->load->view('myletspractice',$data);
        $this->load->view('accountfooter');

    } 


}

