<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Schools extends REST_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('School_model');
    }

    //School Login
    public function login_post() {
        $email = $this->post('email');
        $password = $this->post('password');
        if(!$email || !$password) {
            $this->response('Authentication Failed', 401);
            return;
        }
        //Fetch school details
        $schooldetails = $this->School_model->read_by_email($email);
        //If email does not exist
        if(!$schooldetails)
            $this->response('Invalid email or password',400);
        $id = $schooldetails->category_id;

        //If email exists in database then check for password
        if(md5($password) != $this->School_model->getpassword($id)[0]->password)
            $this->response('Invalid email or password',400);

        $session_data = array(
            'category_id' => $schooldetails->category_id,
            'name' => $schooldetails->name,
            'email' => $schooldetails->email,
        );
        // Add school data in session
        $this->session->set_userdata('school_login',$session_data);
        $this->response(array(
            'category_id' => $schooldetails->category_id,
            'name' => $schooldetails->name
        ),200);
    }
    //Validate user
    public function validate($category_id) {
        if($this->session->userdata('school_login')){
            if($category_id == $this->session->userdata('school_login')['category_id'])
            return;
        }
        $this->response("Authentication Failed",401);
    }
    //List  schools
    public function Index_get($id = null , $logout = null) {
        //Get all schools
       if(!$id && !$logout) {
           $result = $this->School_model->read();
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
           //Get a particular school

           //Validate user
           $this->validate($id);

           //If logout is requested
           if($logout == 'logout'){
               //Destroy user session
               $this->session->unset_userdata('school_login');
               $this->response('Logged out successfully',200);
           }

           //Show particular school data
           $result = $this->School_model->read_by_id($id);
           $result->manager_details = $this->School_model->read_manager($id);
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

    //Create new school
    public function Index_post($id = null , $help = null){
        if(!$id && !$help) {
            //Store details of new school to database
            $data = array(
                'contact_person_name' => $this->post('contact_person_name'),
                'contact_person_designation' => $this->post('contact_person_designation'),
                'email' => $this->post('email'),
                'password' => md5($this->post('password')),
                'name' => $this->post('name'),
                'mobile' => $this->post('mobile'),
                'mobile1' => $this->post('mobile1'),
                'address' => $this->post('address'),
                'school_type' => $this->post('school_type')
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
            } else {
                if ($this->School_model->read_by_email($data['email'])) {
                    $this->response('Email already exists', 400);
                    return;
                } else {
                    $data['intern'] = $this->post('intern');
                    $result = $this->School_model->create($data);
                    //manager details
                    $data_manager = array(
                        'name' => $this->post('manager_name'),
                        'email' => $this->post('manager_email'),
                        'contact_no' => $this->post('manager_contactno')
                    );
                    //Store manager details
                    if($data_manager['name'] || $data_manager['email'] || $data_manager['contact_no'])
                    {
                        $data_manager['category_id'] = $this->School_model->read_by_email($data['email'])->category_id;
                        $this->School_model->create_manager($data_manager);
                    }

                    if ($result) {
                        $this->response('Success', 200);
                        redirect('api/schools');
                    } else {
                        $this->response('Failed', 400);
                        return;
                    }
                }
            }
        }
        else if($id && $help=='help'){

            //Validate user
            $this->validate($id);

            //store new school query to database
            $query = $this->post('query');
            if(!$query) {
                $this->response('All fields not specified',400);
                return;
            }
            $data = array(
              'category_id' => $id,
              'query' => $query,
            );

            $result = $this->School_model->addQuery($data);
            if($result)
                $this->response('Success',200);
            else
                $this->response('Failed',400);
        }
        else
            show_404();
    }

    //Update school data
    public function Index_put($id, $changepass = null) {
        //Validate user
        $this->validate($id);

        if(!$changepass) {
              $data = array(
                'category_id' => $id,
                'name' => $this->put('name'),
                'address' => $this->put('address'),
                'email' => $this->put('email'),
                'mobile' => $this->put('mobile'),
                'mobile1' => $this->put('mobile1')
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
              else {
                  if ($data['email'] != $this->School_model->read_by_id($id)->email) {
                      // If user changes email then check whether updated email already exists
                      if ($this->School_model->read_by_email($data['email'])) {
                          $this->response('Email already exists', 400);
                          return;
                      }
                  }
                  $result = $this->School_model->update($data);
                  if ($result) {
                      $this->response('Success', 200);
                      redirect('api/schools/' . $id);
                  }
                  else {
                      $this->response('Failed', 400);
                      return;
                  }
              }

      }
      else {
          if($changepass=='changepass') {
            $currpass = $this->put('currpass');
            $newpass = $this->put('newpass');

            if(!$currpass || !$newpass) {
                $this->response('All fields are not specified', 400);
                return;
            }
            else {

                if(md5($currpass) != $this->School_model->getpassword($id)[0]->password) {
                    $this->response('Incorrect Password', 400);
                    return;
                }
                else {
                    $data = array(
                        'category_id' => $id,
                        'mpassword' => $newpass,
                        'password' => md5($newpass)
                    );
                    $result = $this->School_model->passwordupdate($data);
                    if ($result) {
                        $this->response('Success', 200);
                        redirect('api/schools/' . $id);
                    } else {
                        $this->response('Failed', 400);
                        return;
                    }
                }
            }
          }
          else {
              show_404();
              return;
          }
      }
    }

}

