<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from psdconverthtml.com/live/edupress/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Oct 2018 18:29:46 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <title><?php echo $page_title; ?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <link href="<?php echo base_url(); ?>images/logo12.jpg">
  <link href="<?php echo base_url(); ?>css/reset.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ISCO_assets/css/responsive.css" type="text/css" />
  <!-- Custom Fonts -->
  <link href="<?php echo base_url(); ?>css/fonts.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

  <!-- Select2 -->
  <link href="<?php echo base_url(); ?>assets/select2/css/select2.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="<?php echo base_url(); ?>assets/magnific-popup/css/magnific-popup.css" rel="stylesheet">
  <!-- Iconmoon -->
  <link href="<?php echo base_url(); ?>assets/iconmoon/css/iconmoon.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="<?php echo base_url(); ?>assets/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
  <!-- Animate -->
  <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
  <!-- Custom Style -->
  <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Public+Sans&display=swap" rel="stylesheet"> <!-- about us font style-->
  <link href="https://fonts.googleapis.com/css?family=Public+Sans|Raleway&display=swap" rel="stylesheet"><!-- about us font style-->
  <link href="https://fonts.googleapis.com/css?family=Nunito|Public+Sans|Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <style>
.our-links .right-margin{
  margin-right: 1%;


  }
  @media screen and (max-width : 481px) {
    .logo {
      display: flex;
      width: 100%;
      justify-content: center;
    }

    #logo-img {
      width: 200px;
    }

    .header-btn {
      width: 100%;
      padding: 0 !important;
    }

    #upper-btn {
      display: flex !important;
      width: 100%;
      justify-content: space-between;
      padding: inherit;
    }
   .our-links .right-margin{
  margin-right: 0%;
  margin-top:1.5%;
  margin-left: 6%;

  }

  }


</style>
  <script type="text/javascript">
$(document).ready(function(){


// Set the date we're counting down to2015-03-25T12:00:00
  var countDownDates = new Date("2020-01-17T12:04:48").getTime();
  // Update the count down every 1 second
  var countdownfunctions = setInterval(function() {

  // Get todays date and time
  var nows = new Date().getTime();

  // Find the distance between now an the count down date
  var distances = countDownDates - nows;
    if( distances > 0 )
{
  // Time calculations for days, hours, minutes and seconds
  var dayss = Math.floor(distances / (1000 * 60 * 60 * 24));
  var hourss = Math.floor((distances % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutess = Math.floor((distances % (1000 * 60 * 60)) / (1000 * 60));
  var secondss = Math.floor((distances % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  $("#sdemos").text(dayss + "d " + hourss + "h " + minutess + "m " + secondss + "s ") ;
      $("#Roundsss").hide();
      $("#Roundss").attr("disabled", true);
      $("#mytextset").text("coming soon round 1") ;
}

  // If the count down is over, write some text
  if (distances <= 0) {
    clearInterval(countdownfunctions);
      $("#Roundss").attr("disabled", false);
      $("#mytextset").text("Registration Open") ;



    // second counter

        var countDownDates2 = new Date("2020-04-25T11:06:48").getTime(); //registration closs timer
        // Update the count down every 1 second
        var countdownfunctions2 = setInterval(function() {

        // Get todays date and time
        var nows2 = new Date().getTime();

        // Find the distance between now an the count down date
        var distances2 = countDownDates2 - nows2;
      if( distances2 > 0 )
      {
        // Time calculations for days, hours, minutes and seconds
        var dayss2 = Math.floor(distances2 / (1000 * 60 * 60 * 24));
        var hourss2 = Math.floor((distances2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutess2 = Math.floor((distances2 % (1000 * 60 * 60)) / (1000 * 60));
        var secondss2 = Math.floor((distances2 % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        $("#sdemos").text(dayss2 + "d " + hourss2 + "h "
        + minutess2 + "m " + secondss2 + "s ") ;
          $("#Roundsss").attr("disabled", true);

      }

        // If the count down is over, write some text
        if (distances2 < 0) {
          clearInterval(countdownfunctions2);
            $("#Roundss").attr("disabled", true);
            $("#mytextset").text("Registration Closed") ;
            $("#sdemos").hide()
             $("#Roundsss").attr("disabled", true);
             $("#Roundsss").hide();
        }
      }, 500);

    // second counter end

  }
}, 1000);


  });
  </script>

</head>


<body>


  <!-- Start Preloader -->
  <div id="loading">
    <div class="element">
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>
  </div>
  <!-- End Preloader -->

  <!-- Start Header -->
  <header>
    <!-- Start Header top Bar -->
    <!-- <div class="header-top">
    <div class="container clearfix">
      <ul class="follow-us hidden-xs">
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
      <div class="right-block clearfix">
        <ul class="top-nav hidden-xs">
          <li><a href="<?php echo base_url() . 'Registration' ?>">Register</a></li>
          <li><a href="#">Apply Online</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">FAQs</a></li>
        </ul>
        <div class="lang-wrapper">
          <div class="select-lang">
            <select id="currency_select">
              <option value="usd">USD</option>
              <option value="aud">AUD</option>
              <option value="gbp">GBP</option>
            </select>
          </div>
          <div class="select-lang2">
            <select class="custom_select">
              <option value="en">English</option>
              <option value="fr">French</option>
              <option value="de">German</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div> -->
    <!-- End Header top Bar -->
    <!-- Start Header Middle -->
    <div class="container header-middle">
      <div class="row"> <span class="col-xs-6 col-sm-3 logo"><a href="<?php echo base_url(''); ?>"><img id="logo-img" src="<?php echo base_url(); ?>images/logo-new.png" class="img-responsive" alt=""></a></span><div id="d"></div>

        <div class="col-xs-12 col-sm-9 header-btn">
          <div class="contact clearfix" id="upper-btn">
            <ul class="hidden-xs">
              <li> <span>Email</span> <a href="mailto:info@intellify.in">info@intellify.in</a> </li>
              <!-- <li> <span>Call Us</span> +91 9891193363 </li> -->
            </ul>
            <?php
if ($this->session->userdata('schoollogged_in')['id']) {?>
              <a href="<?php echo base_url('schoolaccount'); ?>" class="login"> My Account <span><i class="fa fa-trophy"></i></span></a> <a href="<?php echo base_url('schoollogin/schoollogout'); ?>" class="login"> Logout <span><i class="fa fa-trophy"></i></span></a>
            <?php } else {?>
              <a href="<?php echo base_url('schoollogin'); ?>" class="login"> School Login <span class="icon-more-icon"></span></a>
            <?php }?>
            <?php
if ($this->session->userdata('studentlogged_in')['id']) {?>
              <a href="<?php echo base_url('myaccount'); ?>" class="login"> My Account <span><i class="fa fa-trophy"></i></span></a> <a href="<?php echo base_url('login/logout'); ?>" class="login">Logout <span><i class="fa fa-trophy"></i></span></a>
            <?php } else {?>
              <a href="<?php echo base_url('login'); ?>" class="login"> Student Login <span class="icon-more-icon"></span></a>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Navigation -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <!-- <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> -->
          <button data-target="#navbar" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <!-- <form class="navbar-form navbar-right">
          <input type="text" placeholder="Search Now" class="form-control">
          <button class="search-btn"><span class="icon-search-icon"></span></button>
        </form> -->
          <ul class="nav navbar-nav">
            <li> <a href="<?php echo base_url(''); ?>">Home</a></li>
            <li> <a href="<?php echo base_url() . 'about' ?>">About Us</a></li>
            <li class="dropdown"> <a data-toggle="dropdown" href="#"> NSCP <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url() ?>NSCP/Year/2020"> NSCP 2020</a></li>
                <li><a href="<?php echo base_url() ?>NSCP/Year/2018"> Archive</a></li>
              </ul>
            </li>
            <li> <a href="<?php echo base_url() . 'Registration' ?>", target="_blank"> Register for NSCP 2020 </a></li>
            <!--<li> <a href="https://www.intellify.in/NSCP/Round2/login"> Round 2 Exam </a></li>            -->
            <li><a href="<?php echo base_url() ?>blog"> Blogs </a></li>
            <li><a href="<?php echo base_url() ?>faq"> FAQ'<font style="text-transform:lowercase">s</font> </a></li>

          </ul>
        </div>
      </div>
    </nav>
  </header>


  <!---

<div id="wrapper">




<header class="header normal-header  <?php if ($this->uri->segment(1)) {
	echo "default-header";
}?>" data-spy="affix" data-offset-top="197">
  <div class="container">
    <nav class="navbar navbar-default yamm">
      <div class="container-full">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand with-text"  href="<?php echo base_url(); ?>">UTSAAH</a> </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown yamm-fw"><a href="<?php echo base_url(); ?>" >Home </a> </li>
            <li><a title="" href="<?php echo base_url('about-us'); ?>">About</a></li>
            <li class="dropdown normal-menu has-submenu"> <a href="#">Courses <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu">
                <?php echo categorytopmenu(0); ?>
              </ul>
            </li>
            <li><a title="" href="#">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown cartmenu searchmenu hasmenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
              <ul class="dropdown-menu start-right">
                <li>
                  <div id="custom-search-input">
                    <div class="input-group">
                      <input type="text" class="form-control input-lg" placeholder="Search here..." />
                      <span class="input-group-btn">
                      <button class="btn btn-primary btn-lg" type="button"> <i class="fa fa-search"></i> </button>
                      </span> </div>
                  </div>
                </li>
              </ul>
            </li>

          </ul>--->
