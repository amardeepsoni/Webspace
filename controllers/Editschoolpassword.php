<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editschoolpassword extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model(array('school_model'));  
    } 
    public function index($id = null){ 
        // Redirect user if not logged in 
        if(!$this->session->userdata('schoollogged_in')['id']){ 
            redirect('schoollogin');
        }
        $data=array();
        $data['page_title'] = 'Edit Password';
        $data['meta_keyword'] = 'Edit Password';
        $data['meta_description'] = 'Edit Password';
        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        );
        // schoolinfo array contains all the details of the school
        $data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
        //action when a update button is pressed
        $data['action'] = base_url('editschoolpassword/update');
        //Loading the views
        $this->load->view('accountheader',$data);
        $this->load->view('editschoolpassword',$data);
        $this->load->view('accountfooter');
    } 
    public function update(){
        //Updated password
        $data['testimonial'] = (object)$postData = [
            'category_id'      => $this->input->post('id',true),
            'old_password'    => $this->input->post('old_password',true),
            'confirm_password'    => $this->input->post('confirm_password',true),
            'password'    => $this->input->post('password',true)
      ];
        if($this->school_model->getpassword($_SESSION['schoollogged_in']['id'])->password != md5($data['testimonial']->old_password))
            $this->session->set_flashdata('exception','Wrong Password');
        else if ($data['testimonial']->password != $data['testimonial']->confirm_password)
            $this->session->set_flashdata('exception','Password did not match');
        else {
            //Update password success
            if ($this->school_model->passwordupdate(array(
                'category_id' => $postData['category_id'],
                'password' => md5($postData['password'])
            ))) {
                #set success message
                $this->session->set_flashdata('editschoolpassword','Changed Successfully');
            }
            else {
                #set exception message
                $this->session->set_flashdata('exception', 'Please Try Again');
            }
        }
        // schoolinfo array contains all the updated details of the school
        $data['schoolinfo'] = $this->school_model->schoolinfo(($this->session->userdata('schoollogged_in')['email']));
        redirect('editschoolpassword');

 }


}

