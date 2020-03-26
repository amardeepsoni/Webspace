<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $page_title; ?></title>
<meta name="description" content="">
<meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>schoolassest/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/result/css/school_result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body class="leftmenu memberprofile">

<div class="cssload-container">
    <div class="cssload-loader"></div>
</div>


<div id="wrapper">
<!-- Sidebar -->
    <div id="sidebar-wrapper"> <a class="navbar-brand with-text" title="Intellify" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/schoolliginlogo.png" width="1000" height="599"></a>

    <div class="clearfix"></div><div class="row"></div>
    <ul class="sidebar-nav">
      <!-- <li ><a  href="<?php echo base_url(''); ?>">Home <span><i class="fa fa-home"></i></span></a></li> -->
      <?php
if ($this->session->userdata('schoollogged_in')['id']) {?>
                 <li  id="schooldashboard"><a  href="<?php echo base_url('schooldashboard'); ?>"> My School Dashboard <span><i class="fa fa-trophy"></i></span></a></li>
                 <li id="schoolaccount"><a href="<?php echo base_url('schoolaccount'); ?>">Profile<span><i class="fa fa-trophy"></i></span></a></li>
                 <!-- <li><a href="<?php echo base_url(); ?>editschoolpassword">Edit School Password <span><i class="fa fa-edit"></i></span></a></li> -->
                 <li id="studentlist"><a href="<?php echo base_url(); ?>studentlist">Student List <span><i class="fa fa-briefcase"></i></span></a></li>
                 <li id="addstudent"><a href="<?php echo base_url(); ?>addstudent">Add Student <span><i class="fa fa-briefcase"></i></span></a></li>
                 <li id="teacherlist"><a href="<?php echo base_url(); ?>teacherlist">Teacher List <span><i class="fa fa-briefcase"></i></span></a></li>
                 <li id="addteacher"><a href="<?php echo base_url(); ?>addteacher">Add Teacher <span><i class="fa fa-briefcase"></i></span></a></li>
                 <!-- <li class="dropdown"> <a data-toggle="dropdown" href="<?php echo base_url() . 'Result/round1'; ?>">Results <span><i class="fa fa-angle-down"></i></span></a></li> -->
                 <!-- <li><a href="https://imjo.in/WQnx4s">Payment For ISCO 2019 <span><i class="fa fa-edit"></i></span></a></li> -->
<!--                <li><a href="--><?php //echo base_url();?><!--editschoolprofile">Edit Profile <span><i class="fa fa-edit"></i></span></a></li>-->
                <li><a href="<?php echo base_url(); ?>StudyMaterial/school">Study Material <span><i class="fa fa-edit"></i></span></a></li>
                <li><a href="<?php echo base_url(); ?>schoolQueries">Queries <span><i class="fa fa-edit"></i></span></a></li>
                <!-- <li><a href="<?php echo base_url(); ?>result/round1">Round 1 Results <span><i class="fa fa-edit"></i></span></a></li> -->
                <!-- <li><a href="<?php echo base_url(); ?>round2slot">Select Round 2 Slot <span><i class="fa fa-edit"></i></span></a></li> -->
                <li><a href="<?php echo base_url('/Discussionforum'); ?>">Discussion Forum<span><i class="fa fa-edit"></i></span></a></li>
                 <li id = "login"><a  href="<?php echo base_url('schoollogin/schoollogout'); ?>">Logout <span><i class="fa fa-trophy"></i></span></a></li>
             <?php } else {?>
                 <li id="logout"><a  href="<?php echo base_url('schoollogin'); ?>">Login <span><i class="fa fa-trophy"></i></span></a></li>

             <?php }?>

      <!-- <li><a href="member-achievements.html">My Achievements <span><i class="fa fa-trophy"></i></span></a></li>
                  <li><a href="member-messages.html">My Messages <span><i class="fa fa-comment-o"></i></span></a></li>
                  <li><a href="member-friends.html">My Friends <span><i class="fa fa-share-alt"></i></span></a></li>
                  <li><a href="member-profile-edit.html">Edit Profile <span><i class="fa fa-edit"></i></span></a></li>
                  <li class="active"><a href="member-login.html">Login Account <span><i class="fa fa-key"></i></span></a></li>
                  <li><a href="member-register.html">Register New Account <span><i class="fa fa-lock"></i></span></a></li>
                  <li><a href="forum.html">Visit Forum Topics <span><i class="fa fa-comments-o"></i></span></a></li>
                  <li><a href="index.html">Back to EduPress</a></li>-->
  </ul>
</div>
    <!-- /#sidebar-wrapper -->
<script>
// $("#schooldashboard").click(function(){
//     $("#schooldashboard").css("background-color", "red");
// });
// $("#schoolaccount").click(function(){
//     $("#schoolaccount").css("background-color", "red");
// });
// $("#studentlist").click(function(){
//     $("#studentlist").css("background-color", "red");
// });
// $("#addstudent").click(function(){
//     $("#addstudent").css("background-color", "red");
// });
// $("#result").click(function(){
//     $("#result").css("background-color", "red");
// });
// $("#login").click(function(){
//     $("#login").css("background-color", "red");
// });
// $("#logout").click(function(){
//     $("#logout").css("background-color", "red");
// });
</script>
<?php
//if (isset($message))
//    echo '<script type="text/javascript"> setTimeout(swal({ icon: "success" , text:"You have been successfully registered." }),5000); </script>';
//?>
