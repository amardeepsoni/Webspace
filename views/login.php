
<div id="page-content-wrapper">
<a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
<!-- <div class="parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url(); ?>schoolassest/upload/demo_02.jpg');"> -->
  <div class="page-title section nobg">
    <div class="container-fluid">
      <div class="clearfix">
        <div class="title-area pull-left">
          <h2>Student Login <small></small></h2>
        </div>
        <!-- /.pull-right -->
        <div class="pull-right hidden-xs">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>schooldashboard/">Home</a>/</li>
              <li class="active">Student Login</li>
            </ol>
          </div>
          <!-- end bread -->
        </div>
        <!-- /.pull-right -->
      </div>
      <!-- end clearfix -->
    </div>
  </div>
  <!-- end page-title -->
</div>
<div class="section"  style="height: 100vh;">
  <div class="container-fluid">
    <?php if ($this->session->flashdata('loginnotify')) {?>
    <div class="alert alert-danger">
      <?=$this->session->flashdata('loginnotify')?>
    </div>
    <?php }?>
    <div class="container">
      <form name="loginform" class="defaultform row "  method="post" action="<?php echo htmlspecialchars($action); ?>" id="loginform">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 ">
            <div class="register-widget clearfix">
              <div class="widget-title">
                <h3>Login</h3>
                <hr>
                <div class="row">
                  <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input name="username" required="" value="<?php if (isset($_POST['username'])) {echo $_POST['username'];}?>" type="text" id="username" class="form-control">
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Password</label>
                    <input name="password" required=""  value="" type="password" id="password" class="form-control">
                  </div>
                  <!-- <div class="col-sm-12"> <a href="<?php base_url();?>">Forgot your password?</a> </div> -->
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- end container -->
</div>
<!-- end section -->

