<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editprofile extends CI_Controller {

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


        $data['page_title'] = 'Edit Profile';
        $data['meta_keyword'] = 'Edit Profile';
        $data['meta_description'] = 'Edit Profile';

        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        );
                
        $data['breadcrumbs'][] = array(
        'text' => 'Edit Profile',
        'href' => base_url('editprofile')
        );


        
        $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['username']));
        

        $data['action'] = base_url('editprofile/update');
        $this->load->view('accountstudentheader',$data);
        $this->load->view('editprofile',$data);
        $this->load->view('accountfooter');
    } 


    public function update()
    {

        #-------------------------------# 

        // $data['testimonial'] = (object)$postData = [
        //     'registrationno'      => $this->input->post('id',true),
        //     'firstname'    => $this->input->post('firstname',true),
        //     'lastname'    => $this->input->post('lastname',true),
        //     'mobile'    => $this->input->post('mobile',true),
        //     'email'    => $this->input->post('email',true),
        //     'dob'      => $this->input->post('dob',true),
        //     'address'      => $this->input->post('address',true),
        //     'gender'      => $this->input->post('gender',true),
        // ]; 

    //         if ($this->student_model->update($postData)) {
    //             //set success message
    //             $this->session->set_flashdata('editprofilemsg','Updated Successfully');
    //         } else {
    //             //set exception message
    //             $this->session->set_flashdata('exception', 'Please Try Again');
    //         }

    // //        print_r($postData);
    //         $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['email']));
        
        redirect('editprofile');
    }

}

