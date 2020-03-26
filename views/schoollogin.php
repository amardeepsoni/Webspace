<!-- Navigation bar-->
<div id="page-content-wrapper">
<a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
<!-- <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url(); ?>schoolassest/upload/demo_02.jpg');"> -->
  <div class="page-title section nobg" style="background-color:27ae60">
    <div class="container-fluid">
      <div class="clearfix">
        <div class="title-area pull-left">
          <h2>School Login <small></small></h2>
        </div>
        <!-- /.pull-right -->
        <div class="pull-right hidden-xs">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li class="active">School Login</li>
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
<!-- end Navigation bar -->

<div class="section">
  <div class="container-fluid">
    <!-- Notify User for Invalid credentials -->
    <?php if ($this->session->flashdata('schoolloginnotify')) {?>
    <div class="alert alert-danger">
      <?=$this->session->flashdata('schoolloginnotify')?>
    </div>
    <?php }?>
    <!-- Login Form -->
    <div class="container">
    <form name="loginform" class="defaultform row "  method="post" action="<?php echo $action; ?>" id="loginform">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
          <div class="register-widget clearfix">
            <div class="widget-title">
              <h3>Login</h3>
              <hr>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>Email</label>
                  <input name="email" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];}?>" type="text" id="email" class="form-control" required>
                </div>
                <div class="form-group col-lg-12">
                  <label>Password</label>
                  <input name="password" required=""  value="" type="password" id="password" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary">Login</button>
                  <!-- <input name="password" required=""  value="" type="password" id="password" class="form-control"> -->
                </div>
                <div class="col-sm-12" id="forgot_password"> <a href="#">Forgot your password?</a> </div>
                <!-- <div class="col-sm-12" id="forgot_password"> Forgot your password?</div> -->

                <!-- <button type="submit" class="btn btn-primary">Login</button> -->
              </div>
            </div>
          </div>
          <!-- end clearfix -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </form>
    </div>
    <!-- end Login Form -->
  </div>
  <!-- end container -->
</div>
<!-- end section -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
<script>
$("#forgot_password").click(function(){
  swal("Please share your schools contact person details at avinash@intellify.in");
});
</script>