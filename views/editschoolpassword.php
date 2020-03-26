<style>
.pass{
  display:flex;
  flex-direction:column;
  align-content: center;
}
.form-group{
  /* width:30%; */
  /* margin-left:10%; */
}
</style>
<div id="page-content-wrapper">
  <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <!-- <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url('schoolassest/upload/demo_02.jpg'); ?>');"> -->
    <div>
      <div class="page-title section nobg">
        <div class="container-fluid">
          <div class="clearfix">
            <div class="title-area pull-left">
              <h2>Edit Password </h2>
            </div>
            <!-- /.pull-right -->
            <div class="pull-right hidden-xs">
              <div class="bread">
                <ol class="breadcrumb">
                  <li><a href="<?php echo base_url();?>schoolaccount/">Home</a></li>
                  <li class="active">Edit Password</li>
                </ol>
              </div><!-- end bread --> 
            </div><!-- /.pull-right --> 
          </div><!-- end clearfix --> 
        </div><!--end container -->
      </div><!-- end page-title --> 
    </div><!-- end parallax section -->
</div><!-- end page-content -->
<div class="section">
  <div class="container-fluid">
    <!-- Notify User about the update -->
      <?php
      if ($this->session->flashdata('editschoolpassword'))
          echo '<div class="alert alert-success">'. $this->session->flashdata('editschoolpassword') .' </div>';
      else if ( $this->session->flashdata('exception'))
          echo '<div class="alert alert-danger">'. $this->session->flashdata('exception') .' </div>';
      ?>
    <!-- Edit password form -->
    <div class="conatiner">
    <form name="editpasswordform" class="defaultform row "  method="post" action="<?php echo $action; ?>" id="editpasswordform">
      <div class="col-md-6">
        <div class="register-widget clearfix">
          <div class="widget-title">
            <h3>Edit Password</h3>
            <hr>
          </div>
          <!-- end title -->
          <!-- <div class="conatiner"> -->
          <div class="row">
          <div class="form-group col-lg-12">
              <label>Old Password</label>
              <input name="old_password" required="" value="" type="password" id="password" class="form-control">
            </div>
            <div class="form-group col-lg-12">
              <label>Password</label>
              <input name="password" required="" value="" type="password" id="password" class="form-control">
            </div>
            <div class="form-group col-lg-12">
              <label>Confirm password</label>
              <input name="confirm_password" required="" value="" type="password" id="confirmpassword" class="form-control">
            </div>
            <div class="col-sm-12 ">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div><!-- end row -->
          </div>
        </div><!-- end clearfix -->
      </div><!-- end col -->
      <input type="hidden" id="id" name="id" value="<?php echo $schoolinfo->category_id; ?>">
    </form><!-- end form -->
  </div>
  <!-- end container --> 
</div>
<!-- end section --> 
