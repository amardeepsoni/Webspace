<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel </title>

    <!-- Bootstrap -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>animate.css/animate.min.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="<?php echo HTTP_ASSET_PATH; ?>build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
      	
   <?php if ($this->session->flashdata('loginnotify')) {?>
    <div id="notifications1" class="formmsg"><?php echo $this->session->flashdata('loginnotify');?></div>
	<?php }?>
        <div class="animate form login_form">
          <section class="login_content">
             <form id="loginform" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="<?php echo $action; ?>" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" id="username" name="username" class="form-control" required="required" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" id="password" name="password" class="form-control" required="required" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default">Log in</button>
               <!-- <a href="#signup" class="to_register">Lost your password?</a> -->
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>moment/min/moment.min.js"></script>
    <script src="<?php echo HTTP_ASSET_PATH; ?>bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo HTTP_ASSET_PATH; ?>jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo HTTP_ASSET_PATH; ?>google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo HTTP_ASSET_PATH; ?>build/js/custom.min.js"></script>
  
  </body>
</html>
