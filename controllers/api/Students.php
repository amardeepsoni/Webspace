<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Students extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('School_model');
        $this->load->model('Student_model');
         if($this->uri->segment(2) == 'students')
           show_404();
    }

    //Student Login
    public function login_post() {
        $reg_no = $this->post('reg_no');
        $password = $this->post('password');
        if(!$reg_no || !$password) {
            $this->response('Authentication Failed', 401);
            return;
        }
        //Fetch student details
        $studentdetails = $this->Student_model->read_by_reg_no($reg_no);
        //If reg_no does not exist
        if(!$studentdetails)
            $this->response('Invalid registration no. or password',400);

        //If registration no. exists in database then check for password
        if(md5($password) != $this->Student_model->getpassword($reg_no)[0]->password)
            $this->response('Invalid registration no. or password',400);

        $session_data = array(
            'category_id' => $studentdetails->category_id,
            'firstname' => $studentdetails->firstname,
            'lastname' => $studentdetails->lastname,
            'reg_no' => $studentdetails->registrationno
        );
        // Add student data in session
        $this->session->set_userdata('student_login',$session_data);
        $this->response(array(
            'category_id' => $studentdetails->category_id,
            'reg_no' => $studentdetails->registrationno,
            'name' => $studentdetails->firstname." ".$studentdetails->lastname
        ),200);

    }

    //Validate user
    public function validate($category_id,$reg_no) {
        //Check if student is logged in
        if($this->session->userdata('student_login')){
            if($reg_no == $this->session->userdata('student_login')['reg_no'])
                return;
        }
        //Check if school is logged in
        else if($this->session->userdata('school_login')){
            if($category_id == $this->session->userdata('school_login')['category_id'])
                return;
        }
        $this->response("Authentication Failed",401);
    }

    public function Index_get($reg_no = null) {
        $id = $this->uri->segment(3);
        //Show all students
        if(!$reg_no) {
            //Validate school
            $this->validate($id,$reg_no);

            $result = $this->Student_model->read_by_id($id);
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
            //Validate user
            $this->validate($id,$reg_no);

            $result = $this->Student_model->read_by_reg_no($reg_no);
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

    public function Index_post($reg_no = null , $help = null) {
        $id = $this->uri->segment(3);
        //Validate user
        $this->validate($id,$reg_no);

        if(!$reg_no && !$help) {
            //Store new student details in database
         if (strlen((string)$id) == 1) $category_id = '00' . $id;
         else if (strlen((string)$id) == 2) $category_id = '0' . $id;
         else $category_id = $id;

         $regcount = $this->School_model->read_by_id($id)->regcount + 1;
         if (strlen((string)$regcount) == 1) $regcount = '00' . $regcount;
         else if (strlen((string)$regcount) == 2) $regcount = '0' . $regcount;

         $reg_no = '6' . $category_id . $regcount;
         $data = array(
             'category_id' => $id,
             'firstname' => $this->post('firstname'),
             'registrationno' => $reg_no,
             'username' => $reg_no,
             'password' => md5($reg_no),
             'mpassword' => $reg_no,
             'level' => $this->post('level'),
             'gender' => $this->post('gender'),
             'class' => $this->post('class')
         );
         $flag = 0;
         foreach ($data as $keyword) {
             if (!$keyword) {
                 $flag = 1;
                 break;
             }
         }
         if($data['class']<5 || $data['class']>12) $flag=1;

         if ($flag) {
             $this->response('All fields are not specified', 400);
             return;
         } else {
              $data['lastname'] = $this->post('lastname');
              $data['email'] = $this->post('email');
              $data['mobile'] = $this->post('mobile');

              if($data['email'])
             if ($this->Student_model->read_by_email($data['email'])) {
                 $this->response('Email already exists', 400);
                 return;
             }

                 $result = $this->Student_model->create($data);
                 if ($result) {
                     $this->School_model->update(array("category_id" => $id, "regcount" => $regcount));
                     $this->response('Success', 200);
                     redirect('api/schools/' . $id . '/students');

                 } else {
                     $this->response('Failed', 400);
                     return;
                 }

         }
     }
     else if ($reg_no && $help=='help') {
         //store new student query to database
         $query = $this->post('query');
         if(!$query) {
             $this->response('All fields not specified',400);
             return;
         }
         $data = array(
             'reg_no' => $reg_no,
             'query' => $query,
         );

         $result = $this->Student_model->addQuery($data);
         if($result)
             $this->response('Success',200);
         else
             $this->response('Failed',400);

     }

    }

    public function Index_put($reg_no, $changepass = null)
    {
        $id = $this->uri->segment(3);
        //Validate user
        $this->validate($id,$reg_no);

        if(!$changepass) {
            $data = array(
             'category_id' => $id,
             'registrationno' => $reg_no,
             'firstname' => $this->put('firstname'),
             'level' => $this->put('level'),
             'gender' => $this->put('gender'),
             'class' => $this->put('class')
            );

            $flag = 0;
            foreach ($data as $keyword) {
                if (!$keyword) {
                    $flag = 1;
                    break;
                }
            }

             $data['lastname'] = $this->put('lastname');
             $data['mobile'] = $this->put('mobile');
             $data['dob'] = $this->put('dob');
             $data['email'] = $this->put('email');

            if($data['class']<5 || $data['class']>12) $flag=1;

            if ($flag) {
                $this->response('All fields are not specified', 400);
                return;
            } else {
                    if($data['email'])
                    if ($data['email'] != $this->Student_model->read_by_reg_no($reg_no)->email) {
                        // If user changes email then check whether updated email already exists
                        if ($this->Student_model->read_by_email($data['email'])) {
                            $this->response('Email already exists', 400);
                            return;
                        }
                    }


             $result = $this->Student_model->update($data);
             if ($result) {
                 $this->response('Success', 200);
                 redirect('api/schools/' . $id . '/students/');
             } else {
                 $this->response('Failed', 400);
                 return;
             }
         }
      }
      else if($changepass == "changepass"){

          $currpass = $this->put('currpass');
          $newpass = $this->put('newpass');

          if(!$currpass || !$newpass) {
              $this->response('All fields are not specified', 400);
              return;
          }
          else {

              if(md5($currpass) != $this->Student_model->getpassword($reg_no)[0]->password) {
                  $this->response('Incorrect Password', 400);
                  return;
              }
              else {
                  $data = array(
                      'registrationno' => $reg_no,
                      'mpassword' => $newpass,
                      'password' => md5($newpass)
                  );
                  $result = $this->Student_model->passwordupdate($data);
                  if ($result) {
                      $this->response('Success', 200);
                      redirect('api/schools/' . $id . '/students');
                  } else {
                      $this->response('Failed', 400);
                      return;
                  }
              }
          }
      }
      else
          show_404();

    }


    public function Index_delete($reg_no = null) {
        $id = $this->uri->segment(3);
        //Validate user
        $this->validate($id,$reg_no);

        if($reg_no) {
            //Delete a particular student
            $result = $this->Student_model->delete_by_reg_no($reg_no);
            if($result) {
                $this->response('Success',200);
                redirect('api/schools/'.$id.'students');
            }
            else {
                $this->response('Failed',400);
                return;
            }
        }
        else {
            $result = $this->Student_model->delete($id);
            if($result) {
                $this->School_model->update(array( "category_id" => $id , "regcount" => 0));
                $this->response('Success',200);
                redirect('api/schools/'.$id.'students');
            }
            else {
                $this->response('Failed',400);
                return;
            }
        }
    }


}
