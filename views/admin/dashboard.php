<style>
  .row li {
    font-size: 15px;
  }
</style>
<div class="container body">
  <div class="main_container">
    <?php $this->load->view(adminpath . '/sidebar')?>
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Dashboard <small>Welcome <?php echo ucfirst($this->session->userdata['logged_in']['usertype']); ?> </small></h3>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <?php
if ($this->session->flashdata('resultSuccess')) {
	echo '<div class="alert alert-success">' . $this->session->flashdata('resultSuccess') . ' </div>';
} else if ($this->session->flashdata('resultFail')) {
	echo '<div class="alert alert-danger">' . $this->session->flashdata('resultFail') . ' </div>';
}

?>
        <div class="maindashboard">

          <?php if ($usertype == "olympiad") {
	?>
            <ul class="row">
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#olympiad" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Olympiad
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#school" href="">
                  <p><i class="fa fa-edit"></i></p>
                  School
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#student" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Student
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#result" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Result
                </a> </li>
            </ul>
          <?php } else if ($usertype == "content") {?>
            <ul class="row">
              <li class="col-sm-4 col-lg-3 col-xs-12"><a href="<?php echo base_url(adminpath . '/studyMaterial/'); ?>">
                  <p><i class="fa fa-edit"></i></p>
                  Study Material
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#exam" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Exam
                </a> </li>
            </ul>
          <?php } else {?>
            <ul class="row">
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#olympiad" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Olympiad
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#school" href="">
                  <p><i class="fa fa-edit"></i></p>
                  School
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#student" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Student
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#result" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Result
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a href="<?php echo base_url(adminpath . '/studyMaterial/'); ?>">
                  <p><i class="fa fa-edit"></i></p>
                  Study Material
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#exam1" href="#">
                  <p><i class="fa fa-edit"></i></p>
                  Exam
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a href="<?php echo base_url(adminpath . '/remarks/'); ?>">
                  <p><i class="fa fa-edit"></i></p>
                  Add Remarks
                </a> </li>
              <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#Popup" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Recent News
                </a> </li>
                <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button"  href="<?php echo base_url() . adminpath; ?>/Viewresults">
                  <p><i class="fa fa-edit"></i></p>
                  View Results
                </a> </li>
                <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#R2Slots" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Round 2 Slots
                </a> </li>
                <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#Faq" href="">
                  <p><i class="fa fa-edit"></i></p>
                  FAQ's
                </a> </li>
                <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#forum" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Discussion forum
                </a> </li>
                <li class="col-sm-4 col-lg-3 col-xs-12"><a type="button" data-toggle="modal" data-target="#data" href="">
                  <p><i class="fa fa-edit"></i></p>
                  Extract Data
                </a> </li>
            </ul>
          <?php }?>
          <!-- ================================================================================================         -->

          <!-- ================= -->
          <div class="modal" id="cut_off_values">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Cut-off values</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form name="Updateform" class="defaultform row " method="post" action="<?php echo base_url(adminpath . '/GenerateResults/Round3'); ?>" id="updateform">
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
          <!-- ================ -->
        </div>
      </div>
    </div>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/ApproveRegistration/'); ?>">
              <i class="fa fa-edit"></i>
              Approve Registration </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/RegistrationStats/'); ?>">
              <i class="fa fa-edit"></i>
              Registration Stats </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/manageSkills/'); ?>">
              <i class="fa fa-edit"></i>
              Manage Skills </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- ======================= -->
<!-- Popup-->
<div class="modal" id="Popup">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Recent News</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Addpopup/'); ?>">
              <i class="fa fa-edit"></i>
              Add News </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Managepopup/'); ?>">
              <i class="fa fa-edit"></i>
              Manage </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- FAQ's -->
<!-- Popup-->
<div class="modal" id="Faq">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">FAQ's</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Addfaq/'); ?>">
              <i class="fa fa-edit"></i>
              Add FAQ </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Managefaq/'); ?>">
              <i class="fa fa-edit"></i>
              Manage </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Discussion Forum -->
<!-- Popup-->
<div class="modal" id="forum">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Discussion Forum</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Posts/'); ?>">
              <i class="fa fa-edit"></i>
               View/Manage Post </a> </li>

        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Extract Data -->
<!-- Popup-->
<div class="modal" id="data">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Extract Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/ExtractData/'); ?>">
              <i class="fa fa-edit"></i>
               Extract Data </a> </li>

        </ul>
      </div>
    </div>
  </div>
</div>


<!-- ======================= -->

<!-- r2slot -->
<!-- Popup-->
<div class="modal" id="R2Slots">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Round 2 slots</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Round2Slot/'); ?>">
              <i class="fa fa-edit"></i>
              Manage Slots </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Viewslots/'); ?>">
              <i class="fa fa-edit"></i>
              Show Selected Slots </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- School Modal -->
<div class="modal" id="school">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">School</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/SchoolQueries/'); ?>">
              <i class="fa fa-edit"></i>
              School Queries </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/editSchoolDetails/'); ?>">
              <i class="fa fa-edit"></i>
              Edit Password </a> </li>
          <li class="col-sm-4 col-lg-3 col-xs-12"><a href="<?php echo base_url(adminpath . '/addSchool/'); ?>">
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/StudentRegistration/'); ?>">
              <i class="fa fa-edit"></i>
              Student Registration </a> </li>

          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/DeleteStudent/'); ?>">
              <i class="fa fa-edit"></i>
              Delete Student </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/editStudentDetails/'); ?>">
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/UploadController/'); ?>">
              <i class="fa fa-edit"></i>
              Generate Round-1 Results </a> </li>
          <!-- <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/GenerateResults/Round1'); ?>">
                      <i class="fa fa-edit"></i>
                      Generate Round-1 Results </a> </li> -->
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/GenerateResults/Round2'); ?>">
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
<div class="modal" id="exam1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="row">
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/Questionbank'); ?>">
              <i class="fa fa-edit"></i>
              Question Bank </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/addExam'); ?>">
              <i class="fa fa-edit"></i>
              Add Exam </a> </li>
          <li class="col-sm-12 col-lg-12 col-xs-12"><a href="<?php echo base_url(adminpath . '/allExams'); ?>">
              <i class="fa fa-edit"></i>
              All Exam </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>