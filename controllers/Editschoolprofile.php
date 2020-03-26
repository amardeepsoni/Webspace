<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editschoolprofile extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model(array('school_model'));  
    } 
    //all post details without slider
    public function index($id = null){
        // Redirect if a user not logged in
        if(!$this->session->userdata('schoollogged_in')['id']){ 
            redirect('schoollogin');
        }
        // Intialize data empty array
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
        'href' => base_url('editschoolprofile')
        );
        // Schoolinfo array contains the info the schools
        $data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
        //Setting the action variable
        $data['action'] = base_url('editschoolprofile/update');
        //Loading the views
        $this->load->view('accountheader',$data);
        $this->load->view('editschoolprofile',$data);
        $this->load->view('accountfooter');
    } 
    public function update(){
        #-------------------------------#
        // testimonial array contains the updated data
        $data['testimonial'] = (object)$postData = [
            'category_id'      => $this->input->post('id',true),
            'name'    =>   $this->input->post('name',true),
            'mobile'    => $this->input->post('mobile',true),
//            'email'    => $this->input->post('email',true),
            'address'      => $this->input->post('address',true),
        ];
        //update the data in database
        if ($this->school_model->update($postData)) {
            //set success message
            $this->session->set_flashdata('editschoolprofilemsg','Updated Successfully');
        } 
        else{
            #set exception message
            $this->session->set_flashdata('exception', 'Please Try Again');
        }
        
        $data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
        
        redirect('editschoolprofile');
    }

}

