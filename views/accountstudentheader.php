<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $page_title; ?></title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/colors.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/result/css/result.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body class="leftmenu memberprofile">
<div class="cssload-container fixed" style="position:fixed; z-index: 99999;">
  <div class="cssload-loader"></div>
</div>
<div id="wrapper" style="height:0px!important;">
<!-- Sidebar -->
<div id="sidebar-wrapper" > <a class="navbar-brand with-text" title="Intellify" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/schoolliginlogo.png" width="1000" height="599"></a>
  <div class="clearfix"></div>
  <div class="row"></div>
  <?php if ($this->session->userdata('studentlogged_in')['id']) {
	?>
  <div class="studentdetails">
    <!-- <div class="imgthumb"><a  href="<?php echo base_url('myaccount'); ?>"><img src="school-login/images/Krishna.Pradeep.jpg" width="72" height="72"></a></div> -->
    <p class="name"><?php echo $_SESSION['studentlogged_in']['firstname']; ?> <?php echo $_SESSION['studentlogged_in']['lastname']; ?> </p>
    <?php if ($_SESSION['studentlogged_in']['email']) {?>
    <p><strong>Reg. Id:</strong> <?php echo $_SESSION['studentlogged_in']['registrationno']; ?></p>
    <?php }?>
    <!-- <p><strong>M:</strong> <?php echo $_SESSION['studentlogged_in']['mobile']; ?></p> -->
  </div>
  <?php }?>
  <ul class="sidebar-nav">
    <!-- <li ><a  href="<?php echo base_url(''); ?>">Home <span><i class="fa fa-home"></i></span></a></li> -->
    <?php if ($this->session->userdata('studentlogged_in')['id']) {
	?>
    <li><a href="<?php echo base_url('myaccount'); ?>">Profile<span><i class="fa fa-user"></i></span></a></li>
    <!-- <li><a href="<?php echo base_url('editprofile'); ?>">Edit Profile <span><i class="fa fa-edit"></i></span></a></li> -->
    <!-- <li><a href="<?php echo base_url('editpassword'); ?>">Edit Password<span><i class="fa fa-comments-o"></i></span></a></li> -->
    <!-- <li><a href="<?php echo base_url('StudentResult'); ?>">Result <span><i class="fa fa-user"></i></span></a></li> -->
     <li><a href="<?php echo base_url('StudyMaterial/studentDashboard'); ?>">Study Section <span><i class="fa fa-user"></i></span></a></li>
    <li style = "display:none"><a href="<?php echo base_url('myletspractice'); ?>">Let's Practice <span><i class="fa fa-user"></i></span></a></li>
    <li><a href="<?php echo base_url('WeeklyQuiz/dashboard'); ?>">Weekly Quiz <span><i class="fa fa-user"></i></span></a></li>
    <!-- <li><a href="<?php echo base_url('StudentResult/round1'); ?>">Round 1 Result<span><i class="fa fa-user"></i></span></a></li> -->
    <li><a href="<?php echo base_url('/discussionforum'); ?>">Discussion Forum <span><i class="fa fa-user"></i></span></a></li>
    <li><a href="<?php echo base_url('login/logout'); ?>">Logout<span><i class="fa fa-lock"></i></span></a></li>
    <?php } else {?>
    <li><a href="<?php echo base_url('login'); ?>">Login Account <span><i class="fa fa-key"></i></span></a></li>
    <!-- <li class="active"><a href="<?php echo base_url('register'); ?>">Register New Account <span><i class="fa fa-lock"></i></span></a></li>-->
    <?php }?>
  </ul>
</div>
