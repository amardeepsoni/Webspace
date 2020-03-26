<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excelupload extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
            redirect(adminpath.'/login');
        }

        $data=array();
        $data['breadcrumbs'][] = array(
		'text' => 'Home',
		'href' => '#'
		);
				
		$data['breadcrumbs'][] = array(
		'text' => 'Excel Manager',
		'href' => base_url().adminpath.'/excelupload'
		);

		$data['action'] = base_url().adminpath.'/excelupload/upload';

		$data['heading']="Excel Manager";
		$this->load->view(adminpath.'/header');
		$this->load->view(adminpath.'/excelupload',$data);
		$this->load->view(adminpath.'/footer');

    }
    public function upload(){
    	require_once ROOTDIR."simplexlsx.class.php";
		$file=$_FILES['filename'];
		$type=$_POST['type'];
		if($type=='category'){
			if($file['name'] <>'') {
				$xlsx = new SimpleXLSX( $file['tmp_name'] );	
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row

				if(!empty($r[0])) { $pid=$r[0];} else { $pid="";}
				if(!empty($r[1])) { $title=$r[1];} else { $title="";}
				if(!empty($r[2])) { $linkname=$r[2]; } else { $linkname="";}
				if(!empty($r[3])) { $pagetitle=$r[3]; } else { $pagetitle="";}
				if(!empty($r[4])) { $metakeywords=$r[4]; } else { $metakeywords="";}
				if(!empty($r[5])) { $metadescription=$r[5]; } else { $metadescription="";}
				if(!empty($r[6])) { $homeshortdescription=$r[6]; } else { $homeshortdescription="";}
				if(!empty($r[7])) { $shortdescription=$r[7]; } else { $shortdescription="";}
				if(!empty($r[8])) { $description=$r[8]; } else { $description="";}
				if(!empty($r[9])) { $ordernumber=$r[9]; } else { $ordernumber="";}
				$this->load->model(adminpath.'/model_category');

				if(!empty($title) && !empty($linkname)){
					$postdata['pid'] = $pid;
					$postdata['name'] = $title;
					$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
					$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
					$postdata['linkname'] = $linkname;
					$postdata['page_title'] = $pagetitle;
					$postdata['meta_keyword'] = $metakeywords;
					$postdata['meta_description'] = $metadescription;
					$postdata['homecontent'] = $homeshortdescription;
					$postdata['shortdescription'] = $shortdescription;
					$postdata['description'] = $description;
					$postdata['ordernum'] = $ordernumber;
					$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
					$postdata['date_added'] = date('Y-m-d H:i:s');
					$postdata['status'] = '1';

					$checkname=$this->model_category->checkcategoryalready($title, $this->session->userdata['logged_in']['id']);

						if(!$checkname){
							$this->model_category->add($postdata);
						}

				}

				}
				$this->session->set_flashdata('exceluploadmsg', 'Category Added Successfully.');
				redirect(adminpath.'/excelupload');
			}
		}
		
		else if($type=='school'){
			
			if($file['name'] <>'') {
				
				$xlsx = new SimpleXLSX( $file['tmp_name'] );

				
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row

				if(!empty($r[0])) { $id=$r[0];} else { $id="";}
				if(!empty($r[1])) { $name=$r[1];} else { $name="";}	
				if(!empty($r[2])) { $category_id=$r[2];} else { $category_id="";}	
				if(!empty($r[3])) { $email=$r[3];} else { $email="";}	
				if(!empty($r[4])) { $conperson=$r[4];} else { $conperson="";}
				if(!empty($r[5])) { $mobile=$r[5];} else { $mobile="";}	
				if(!empty($r[6])) { $mobile1=$r[6];} else { $mobile1="";}	
				if(!empty($r[7])) { $address=$r[7];} else { $address="";}
				if(!empty($r[8])) { $who=$r[8];} else { $who="";}	
				if(!empty($r[9])) { $know=$r[9];} else { $know="";}					
				if(!empty($r[10])) { $password=$r[10];} else { $password="";}	
				if(!empty($r[11])) { $mpassword=$r[11];} else { $mpassword="";}									
				if(!empty($r[12])) { $ordernum=$r[12]; } else { $ordernum="";}
				$this->load->model(adminpath.'/model_school');

				if(!empty($name))
				{
					
					
					$postdata['name'] = $name;		
					$postdata['category_id'] = $category_id;		
					$postdata['email'] = $email;		
					$postdata['conperson'] = $conperson;	
					$postdata['mobile'] = $mobile;	
					$postdata['mobile1'] = $mobile1;	
					$postdata['address'] = $address;
					$postdata['who'] = $who;			
					$postdata['know'] = $know;						
					$postdata['password'] = md5($password);	
					$postdata['mpassword'] = $mpassword;										
					$postdata['ordernum'] = $ordernum;
					$postdata['date_added'] = date('Y-m-d H:i:s');
					$postdata['status'] = '1';

					$checkname=$this->model_school->checkschoolalready($name, $this->session->userdata['logged_in']['id']);

						if(!$checkname){
						
							$this->model_school->add($postdata);
						}

				}
				

				}
				$this->session->set_flashdata('exceluploadmsg', 'school Added Successfully.');
				redirect(adminpath.'/excelupload');
			}
		}
		
		
		
		else if($type=='student'){
			
			
			
			
			if($file['name'] <>'') {
				
				$xlsx = new SimpleXLSX( $file['tmp_name'] );

				
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				
				
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row
					
					

				if(!empty($r[0])) { $id=$r[0];} else { $id="";}
				if(!empty($r[1])) { $category_id=$r[1];} else { $category_id="";}	
				if(!empty($r[2])) { $firstname=$r[2];} else { $firstname="";}	
				if(!empty($r[3])) { $lastname=$r[3];} else { $lastname="";}	
				if(!empty($r[4])) { $level=$r[4];} else { $level="";}	
				if(!empty($r[5])) { $registrationno=$r[5];} else { $registrationno="";}					
				if(!empty($r[6])) { $email=$r[6];} else { $email="";}
				if(!empty($r[7])) { $mobile=$r[7];} else { $mobile="";}	
				if(!empty($r[8])) { $mobile1=$r[8];} else { $mobile1="";}				
				if(!empty($r[9])) { $address=$r[9];} else { $address="";}
				if(!empty($r[10])) { $username=$r[10];} else { $username="";}					
				if(!empty($r[11])) { $password=$r[11];} else { $password="";}	
				if(!empty($r[12])) { $mpassword=$r[12];} else { $mpassword="";}									
				if(!empty($r[13])) { $ordernum=$r[13]; } else { $ordernum="";}
				$this->load->model(adminpath.'/model_loginperson');

				if(!empty($firstname))
				{
					
					
						
					$postdata['category_id'] = $category_id;		
					$postdata['firstname'] = $firstname;		
					$postdata['lastname'] = $lastname;	
					$postdata['level'] = $level;		
					$postdata['registrationno'] = $registrationno;		
					$postdata['email'] = $email;		
					$postdata['mobile'] = $mobile;	
					$postdata['mobile1'] = $mobile1;	
					$postdata['address'] = $address;
					$postdata['username'] = $username;						
					$postdata['password'] = md5($password);	
					$postdata['mpassword'] = $mpassword;										
					$postdata['ordernum'] = $ordernum;
					$postdata['date_added'] = date('Y-m-d H:i:s');
					$postdata['status'] = '1';

					$checkname=$this->model_loginperson->checkstudentalready($firstname, $this->session->userdata['logged_in']['id']);

						if(!$checkname){
						
							$this->model_loginperson->add($postdata);
						}

				}
				

				}
				$this->session->set_flashdata('exceluploadmsg', 'Student Added Successfully.');
				redirect(adminpath.'/excelupload');
			}
		}
		
		
		
		
		
		
		else if($type=='subject'){

			if($file['name'] <>'') {
				$xlsx = new SimpleXLSX( $file['tmp_name'] );	
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row

				if(!empty($r[0])) { $title=$r[0];} else { $title="";}
				if(!empty($r[1])) { $ordernumber=$r[1]; } else { $ordernumber="";}
				$this->load->model(adminpath.'/model_subject');

				if(!empty($title)){
					$postdata['name'] = $title;
					$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
					$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
					$postdata['ordernum'] = $ordernumber;
					$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
					$postdata['date_added'] = date('Y-m-d H:i:s');
					$postdata['status'] = '1';

					$checkname=$this->model_subject->checksubjectalready($title, $this->session->userdata['logged_in']['id']);

						if(!$checkname){
							$this->model_subject->add($postdata);
						}

				}

				}
				$this->session->set_flashdata('exceluploadmsg', 'Subject Added Successfully.');
				redirect(adminpath.'/excelupload');
			}
		
		}

		else if($type=='chapter'){

			if($file['name'] <>'') {
				$xlsx = new SimpleXLSX( $file['tmp_name'] );	
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row

				if(!empty($r[0])) { $subject=$r[0];} else { $subject="";}
				if(!empty($r[1])) { $title=$r[1];} else { $title="";}
				if(!empty($r[2])) { $ordernumber=$r[2]; } else { $ordernumber="";}
				$this->load->model(adminpath.'/model_chapter');
				$this->load->model(adminpath.'/model_subject');

				if(!empty($title) && !empty($subject)){
					$subject_info = $this->model_subject->getsubject($subject);
					$postdata['name'] = $title;
					$postdata['subject_id'] = $subject;
					$postdata['subject'] = $subject_info->name;
					$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
					$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
					$postdata['ordernum'] = $ordernumber;
					$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
					$postdata['date_added'] = date('Y-m-d H:i:s');
					$postdata['status'] = '1';

					$checkname=$this->model_chapter->checkchapteralready($title, $this->session->userdata['logged_in']['id']);

						if(!$checkname){
							$this->model_chapter->add($postdata);
						}

				}

				}
				$this->session->set_flashdata('exceluploadmsg', 'Chapter Added Successfully.');
				redirect(adminpath.'/excelupload');
			}
		
		}
		else  if($type=='topic'){

			if($file['name'] <>'') {
				$xlsx = new SimpleXLSX( $file['tmp_name'] );	
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row

				if(!empty($r[0])) { $subject=$r[0];} else { $subject="";}
				if(!empty($r[1])) { $chapter=$r[1];} else { $chapter="";}
				if(!empty($r[2])) { $title=$r[2];} else { $title="";}
				if(!empty($r[3])) { $ordernumber=$r[3]; } else { $ordernumber="";}
				$this->load->model(adminpath.'/model_chapter');
				$this->load->model(adminpath.'/model_subject');
				$this->load->model(adminpath.'/model_topic');

				if(!empty($title) && !empty($subject) && !empty($chapter)){
					$subject_info = $this->model_subject->getsubject($subject);
					$chapter_info = $this->model_chapter->getchapter($chapter);
					$postdata['name'] = $title;
					$postdata['subject_id'] = $subject;
					$postdata['subject'] = $subject_info->name;
					$postdata['chapter_id'] = $chapter;
					$postdata['chapter'] = $chapter_info->name;
					$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
					$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
					$postdata['ordernum'] = $ordernumber;
					$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
					$postdata['date_added'] = date('Y-m-d H:i:s');
					$postdata['status'] = '1';

					$checkname=$this->model_topic->checktopicalready($title, $this->session->userdata['logged_in']['id']);

						if(!$checkname){
							$this->model_topic->add($postdata);
						}

				}

				}
				$this->session->set_flashdata('exceluploadmsg', 'Topic Added Successfully.');
				redirect(adminpath.'/excelupload');
			}
		
		}
		else  if($type=='question'){

			$this->load->model(adminpath.'/model_questionbank');
			$this->load->model(adminpath.'/model_schoollavel');
			$this->load->model(adminpath.'/model_subject');
			$postdata = array();
			if($file['name'] <>'') {
				$xlsx = new SimpleXLSX($file['tmp_name']);
				list($cols,) = $xlsx->dimension(1);	
				$rowcount = count($xlsx->rows(1));
				$ecrow=1;
				foreach($xlsx->rows(1) as $k => $r) {
					if ($k == 0) continue; // skip first row
					if(!empty($r[0])) { $id=$r[0];} else { $id="";}
					if(!empty($r[1])) { $level=$r[1];} else { $level="";}
					if(!empty($r[2])) { $subject=$r[2];} else { $subject="";}
					if(!empty($r[3])) { $question=$r[3]; } else { $question="";}
					if(!empty($r[4])) { $image=$r[4]; } else { $image="";}
					if(!empty($r[5])) { $rightanswer=$r[5]; } else { $rightanswer="";}
					if(!empty($r[6])) { $explain=$r[6]; } else { $explain="";}
					if(!empty($r[7])) { $explainattachment=$r[7]; } else { $explainattachment="";}
					if(!empty($r[8])) { $videolink=$r[8]; } else { $videolink="";}
					if(!empty($r[9])) { $perquestionmark=$r[9]; } else { $perquestionmark="";}
					if(!empty($r[10])) { $negativemark=$r[10]; } else { $negativemark="";}

					if($question){
						$level_info = $this->model_schoollavel->getschoollavel($level);
						$subject_info = $this->model_subject->getsubject($subject);
						$postdata['schoollavel_id'] ="";
						$postdata['schoollavel'] ="";
						$postdata['name'] = $question;
						if($level_info){
							$postdata['schoollavel_id'] = $level_info->id;
							$postdata['schoollavel'] = $level_info->name;
						}
						if($subject){
							$postdata['subject_id'] = $subject_info->id;
							$postdata['subject'] = $subject_info->name;
						}
						$postdata['rightanswer'] = $rightanswer;
						$postdata['perquestionmark'] = $perquestionmark;
						$postdata['negativemark'] = $negativemark;
						$postdata['explain'] = $explain;
						$postdata['videolink'] = $videolink;
						$postdata['image'] = $image;
						$postdata['explainattachment'] = $explainattachment;
						$postdata['user_id'] =  $this->session->userdata['logged_in']['id'];
						$postdata['ip'] =$_SERVER['REMOTE_ADDR'];
						$postdata['user_agent'] =$_SERVER ['HTTP_USER_AGENT'];
						$postdata['date_added'] = date('Y-m-d H:i:s');
						$postdata['status'] = '1';
						$answers=array();

						foreach($xlsx->rows(2) as $ka => $ra) {
							if ($ka == 0) continue; // skip first row
							if($id==$ra[0]){
								$answers[] = array(
									'answer' => $ra[1]
								);
							}
						}
						 
						$postdata['answeroption'] = $this->arrayflatten($answers);

					}

					$checkname=$this->model_questionbank->checkquestionbankalready($postdata['name'],$this->session->userdata['logged_in']['id']);
					if(!$checkname){
						$this->model_questionbank->add($postdata);
					}

					
				}

			}
		}
		$this->session->set_flashdata('exceluploadmsg', 'Question Added Successfully.');
		redirect(adminpath.'/excelupload');
		
    }

   public function arrayflatten($arr) { 
   	$new_arr=array();
	  foreach($arr as $key){
        if(is_array($key)){
            $arr1=$this->arrayflatten($key);
            foreach($arr1 as $k){
                $new_arr[]=$k;
            }
        }
        else{
            $new_arr[]=$key;
        }
    }
    return $new_arr;
	} 
}