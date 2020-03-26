<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;"> <a href="<?php echo base_url("admin"); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a> </div>
    <div class="clearfix"></div>
    
    <!-- sidebar menu -->
    
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
        

          <?php if($this->session->userdata['logged_in']['usertype']=='admin'){?>
            <li><a type="button" data-toggle="modal" data-target="#olympiad" href="">
                      <i class="fa fa-edit"></i>
                      Olympiad </a> </li>
              <li ><a type="button" data-toggle="modal" data-target="#school" href="">
                      <i class="fa fa-edit"></i>
                      School </a> </li>
              <li><a type="button" data-toggle="modal" data-target="#student" href="">
                      <i class="fa fa-edit"></i>
                      Student </a> </li>
              <li><a type="button" data-toggle="modal" data-target="#result" href="">
                      <i class="fa fa-edit"></i>
                      Result </a> </li>
              <!-- <li><a  href="<?php echo base_url(adminpath.'/studyMaterial/');?>">
                      <i class="fa fa-edit"></i>
                      Study Material </a> </li> -->
              <li><a type="button" data-toggle="modal" data-target="#exam" href="">
                      <i class="fa fa-edit"></i>
                      Exam </a> </li>
          <?php } ?>
          <?php if($this->session->userdata['logged_in']['usertype']=='content'){?>
            
              <li><a  href="<?php echo base_url(adminpath.'/studyMaterial/');?>">
                      <i class="fa fa-edit"></i>
                      Study Material </a> </li>
              <li><a type="button" data-toggle="modal" data-target="#exam" href="">
                      <i class="fa fa-edit"></i>
                      Exam </a> </li>
          <?php } ?>
          <?php if($this->session->userdata['logged_in']['usertype']=='olympiad'){?>
            <li><a type="button" data-toggle="modal" data-target="#olympiad" href="">
                      <i class="fa fa-edit"></i>
                      Olympiad </a> </li>
              <li ><a type="button" data-toggle="modal" data-target="#school" href="">
                      <i class="fa fa-edit"></i>
                      School </a> </li>
              <li><a type="button" data-toggle="modal" data-target="#student" href="">
                      <i class="fa fa-edit"></i>
                      Student </a> </li>
              <li><a type="button" data-toggle="modal" data-target="#result" href="">
                      <i class="fa fa-edit"></i>
                      Result </a> </li>
              <!-- <li><a  href="<?php echo base_url(adminpath.'/studyMaterial/');?>">
                      <i class="fa fa-edit"></i>
                      Study Material </a> </li> -->
              
          <?php } ?>
          
        </ul>
      </div>
    </div>
    
    <!-- /sidebar menu --> 
    
  </div>
</div>
<!-- ======================= -->
<!-- Olympiad Modal -->
<div class="modal" id="olympiad">
      <div class="modal-dialog">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">Olympiad</h4>
                  <button type="button" class="close"
                          data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <ul class="row">
                  <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/ApproveRegistration/');?>">
                      <i class="fa fa-edit"></i>
                      Approve Registration </a> </li>
                  <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/RegistrationStats/');?>">
                      <i class="fa fa-edit"></i>
                      Registration Stats </a> </li>
                  <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/manageSkills/');?>">
                      <i class="fa fa-edit"></i>
                      Manage Skills </a> </li>
                </ul>
              </div>
          </div>
      </div>
</div>
  <!-- ======================= -->
<!-- School Modal -->
<div class="modal" id="school">
      <div class="modal-dialog">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">School</h4>
                  <button type="button" class="close"
                          data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <ul class="row">
                <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/SchoolQueries/');?>">
                      <i class="fa fa-edit"></i>
                      School Queries </a> </li>
                <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/editSchoolDetails/');?>">
                      <i class="fa fa-edit"></i>
                      Edit Password </a> </li>
                <li class="col-sm-4 col-lg-3 col-xs-12"><a href="<?php echo base_url(adminpath.'/addSchool/');?>">
                      <i class="fa fa-edit"></i>
                      Add School </a> </li>
                </ul>
              </div>
          </div>
      </div>
  </div>
<!-- Student Modal -->
<div class="modal" id="student">
      <div class="modal-dialog">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">Student</h4>
                  <button type="button" class="close"
                          data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <ul class="row">
                <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/StudentRegistration/');?>">
                      <i class="fa fa-edit"></i>
                      Student Registration </a> </li>
             
              <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/DeleteStudent/');?>">
                      <i class="fa fa-edit"></i>
                      Delete Student </a> </li>
              <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/editStudentDetails/');?>">
                      <i class="fa fa-edit"></i>
                      Edit Password </a> </li>
                </ul>
              </div>
          </div>
      </div>
  </div>
<!-- Result Modal -->
<div class="modal" id="result">
      <div class="modal-dialog">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">Result</h4>
                  <button type="button" class="close"
                          data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <ul class="row">
                <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/UploadController/');?>">
                      <i class="fa fa-edit"></i>
                      Generate Round-1 Results </a> </li>
                <!-- <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/GenerateResults/Round1');?>">
                      <i class="fa fa-edit"></i>
                      Generate Round-1 Results </a> </li> -->
              <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/GenerateResults/Round2');?>">
                      <i class="fa fa-edit"></i>
                      Generate Round-2 Results </a> </li>
              <li class="col-sm-12 col-lg-12 col-xs-12"><a type="button" data-dismiss="modal" data-toggle="modal" data-target="#cut_off_values" href="">
                      <i class="fa fa-edit"></i>
                      Generate Round-3 Results </a> </li>
              
                </ul>
              </div>
          </div>
      </div>
  </div>
<!-- Exam Modal -->
<div class="modal" id="exam">
      <div class="modal-dialog">
          <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                  <h4 class="modal-title">Exam</h4>
                  <button type="button" class="close"
                          data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <ul class="row">
                  <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Questionbank'); ?>">
                      <i class="fa fa-edit"></i>
                      Question Bank </a> </li>
                <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/addExam');?>">
                      <i class="fa fa-edit"></i>
                     Add Exam </a> </li>
                <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath.'/allExams');?>">
                      <i class="fa fa-edit"></i>
                      All Exam </a> </li>
                </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="modal" id="cut_off_values">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Cut-off values</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form name="Updateform" class="defaultform row "  method="post" action="<?php echo base_url(adminpath.'/GenerateResults/Round3');?>" id="updateform">
                    <div class="form-group col-lg-12">
                      <label>Government</label>
                      <input name="govt" required type="number" id="x" class="form-control">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Private</label>
                      <input name="private" required type="number" id="y" class="form-control">
                    </div>
                    <div style="align=center">
                      <button type="submit" name="update" id="update" class="btn btn-info">Submit</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>










<!-- top navigation -->

<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
      <h2  class="pull-left" style="margin:17px 0 0">Intellify. </h2>
      <ul class="nav navbar-nav navbar-right">
        <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo ucfirst($this->session->userdata['logged_in']['usertype']); ?> <span class=" fa fa-angle-down"></span> </span> </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Profile</a></li>
            <li><a href="<?php echo base_url(adminpath.'/login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
