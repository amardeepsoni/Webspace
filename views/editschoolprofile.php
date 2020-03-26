<style>
label{
    font-size:20px;
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
              <h2>Edit Profile </h2>
            </div>
            <!-- /.pull-right -->
            <div class="pull-right hidden-xs">
              <div class="bread">
                <ol class="breadcrumb">
                  <li><a href="<?php echo base_url();?>schoolaccount/">Home</a></li>
                  <li class="active">Edit Profile</li>
                </ol>
              </div>
              <!-- end bread --> 
            </div>
            <!-- /.pull-right --> 
          </div>
          <!-- end clearfix --> 
        </div>
        <!-- end container -->
      </div>
      <!-- end page-title --> 
    </div>
    <!-- end parallax section -->
</div>
<!-- end page-content -->
<div class="section">
  <div class="container-fluid">
    <!-- Notify user about the update -->
      <?php
      if ($this->session->flashdata('editschoolprofilemsg'))
          echo '<div class="alert alert-success">'. $this->session->flashdata('editschoolprofilemsg') .' </div>';
      else if ( $this->session->flashdata('exception'))
          echo '<div class="alert alert-danger">'. $this->session->flashdata('exception') .' </div>';
      ?>
    <!-- Edit form -->
    <form name="editprofileform" class="defaultform row "  method="post" action="<?php echo $action; ?>" id="editprofileform">
      <div class="col-md-12">
        <div class="register-widget clearfix">
          <div class="widget-title">
            <h3>Edit Profile</h3>
            <hr>
          </div>
          <!-- end title -->
          <div class="row">
            <div class="form-group col-lg-6">
              <label>Name</label>
              <!-- School Name -->
              <input name="name" required="yes" value="<?php echo $schoolinfo->name; ?>" type="text" id="firstname" class="form-control">
            </div>
<!--            <div class="form-group col-lg-6">-->
<!--              <label>Email</label>-->
<!--              School Email -->
<!--              <input name="email" required="yes" value="--><?php //echo $schoolinfo->email; ?><!--" type="email" id="email" class="form-control">-->
<!--            </div>-->
            <div class="form-group col-lg-6">
              <label>Mobile</label>
              <!-- School Mobile-->
              <input name="mobile" required="yes" value="<?php echo $schoolinfo->mobile; ?>" type="text"  pattern="[6789][0-9]{9}" id="mobile" class="form-control">
            </div>
            <div class="form-group col-lg-12">
              <label>Address</label>
              <!-- School Address -->
              <textarea class="form-control address" style="height:100px" name="address" required><?php echo $schoolinfo->address; ?></textarea>
            </div>
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary" style="width:150px;  border-radius:2px !important;">Update</button>
            </div>
            <div  class="col-sm-6">
              <a href="<?php echo base_url();?>editschoolpassword"  class="btn btn-secondary" style="width:150px; margin-top:3%">Edit Password </a>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end clearfix --> 
      </div>
      <!-- end col-->
      <input type="hidden" id="id" name="id" value="<?php echo $schoolinfo->category_id; ?>">
      <!-- end form -->
    </form>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
<!-- end section --> 

<script>

</script>