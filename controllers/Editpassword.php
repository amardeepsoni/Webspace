<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editpassword extends CI_Controller {

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


        $data['page_title'] = 'Edit Password';
        $data['meta_keyword'] = 'Edit Password';
        $data['meta_description'] = 'Edit Password';

        $data['breadcrumbs'][] = array(
        'text' => 'Home',
        'href' => base_url()
        );
                
        $data['breadcrumbs'][] = array(
        'text' => 'Edit Password',
        'href' => base_url('editpassword')
        );
		   
        $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['username']));


        $data['action'] = base_url('editpassword/update');
        $this->load->view('accountstudentheader',$data);
        $this->load->view('editpassword',$data);
        $this->load->view('accountfooter');
    } 


    public function update()
    {


        $data['testimonial'] = (object)$postData = [
            'registrationno'      => $this->input->post('id',true),
            'password'    => $this->input->post('password',true),
            'old_password'    => $this->input->post('old_password',true),
            'confirm_password'    => $this->input->post('confirm_password',true)
        ];
//        print_r($this->student_model->getpassword($_SESSION['studentlogged_in']['registrationno']));

        if($this->student_model->getpassword($_SESSION['studentlogged_in']['registrationno'])->password!= md5($data['testimonial']->old_password))
            $this->session->set_flashdata('passwordmsg','Wrong Password');
        else if ($data['testimonial']->password != $data['testimonial']->confirm_password)
            $this->session->set_flashdata('passwordmsg','Password did not match');
        else {
            //Update password success
            if ($this->student_model->passwordupdate(array(
                'registrationno' => $postData['registrationno'],
                'password' => md5($postData['password'])
            ))) {
                #set success message
                $this->session->set_flashdata('passwordmsg','Change Successfully');
            }
            else {
                #set exception message
                $this->session->set_flashdata('passwordmsg', 'please_try_again');
            }
        }


        $data['studentinfo'] = $this->student_model->studentinfo(($this->session->userdata('studentlogged_in')['email']));
        
        redirect('editpassword');
    }



}

