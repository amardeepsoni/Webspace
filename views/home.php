<div class="banner-outer">
  <div class="banner-slider">

    <div class="slide1">
      <div class="container">
        <div class="content animated fadeInRight">
          <div class="fl-right">

          </div>
        </div>
      </div>
    </div>
    <div class="slide2">
      <div class="container">
        <div class="content">
        </div>
      </div>
    </div>



    <?php

    // $con = mysqli_connect('sql12.freemysqlhosting.net', 'sql12328541', '4bqVfZGvZx', 'sql12328541');

    // if (!$con) {
    //   die('Could not connect: ' . mysqli_error($con));
    // }

    // $sql = "SELECT* FROM RecentNews;";
    // $result = mysqli_query($con, $sql);
    // while ($row = mysqli_fetch_array($result)) {

      if ($row['enabled'] == 1) {
        if ($row['videoURL'] == '') {
    ?>

          <div class="slidedb" style=" background: url('<?php echo $row['imageURL'] ?>') no-repeat center top / cover;">

            <!--<div class="transbox">-->
            <!--<h1 class="animated fadeInUp"><?php echo $row['heading'] ?> </h1>-->
            <!--<p class="animated fadeInUp"><?php echo $row['text'] ?></p>-->
            <!--</div>-->

          </div>
          <!--
        <?php
        // } else {
        ?>

            <div class="VideoSlide" style="">

                <video muted id="myVideo"  >
                <source src="<?php echo $row['videoURL'] ?>" type="video/mp4">
                </video>
                <i class='fas fa-play-circle' style='font-size:45px;position:absolute;index:12; left:50%;top:50%; transform: translate(-50%,-50%);' onclick="playVid()"></i>
                <div class="transbox">
                      <h1 class="animated fadeInUp"><?php echo $row['heading'] ?> </h1>
                      <p class="animated fadeInUp"><?php echo $row['text'] ?></p>
                </div>

	          </div>
            -->
    <?php
    //     }
    //   }
    // } ?>


  </div>
</div>
<!-- End Banner Carousel -->
<?php
// $sql = "SELECT* FROM RecentNews;";
// $result = mysqli_query($con, $sql);
// while ($row = mysqli_fetch_array($result)) {

//   if ($row['enabled'] == 1) {
//     if ($row['imageURL'] == '') {
?>
      <br>

      <h2 style=" text-align: center; padding-bottom: 10px; margin-top: 50px; margin-bottom: 20px;"><?php echo $row['heading'] ?> </h2>

      <video controls muted id="myVideo" preload="metadata">
        <source src="<?php echo $row['videoURL'] ?>" type="video/mp4">
      </video>
      <p style="font-size: 24px;text-align: center; color:#2D314F; padding: 10px; line-height: 1.5; margin-bottom: 50px;"><?php echo $row['text'] ?></p>

<?php
//     }
//   }
// }
?>


<!-- <?php if ($homeprojects) { ?>


        <?php foreach ($homeprojects as $homeproject) { ?>

            <li class="col-sm-4 apply-online clearfix equal-hight">
              <div class="icon"><img  src="<?php echo $homeproject['icon']; ?>" class="img-responsive" alt=""></div>
              <div class="detail">
              <h3><?php echo $homeproject['name']; ?></h3>


              <?php echo $homeproject['shortdescription']; ?>
              <a href="<?php echo base_url(); ?>projects#project<?php echo $homeproject['id']; ?>" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a> </div>


            </li>

      <?php } ?>


<?php } ?>     -->
</ul>
</div>
</div>



<!-- <ul class="course-list owl-carousel">




     <li>
        <div class="inner">
          <figure><img  src="<?php echo base_url(); ?>images/course-img1.jpg" alt=""></figure>
          <h3>Sed perspiciatis<span>omnis iste</span></h3>
          <p>A comprehensive study of modern business...</p>
          <div class="bottom-txt clearfix">
            <div class="duration">
              <h4>90 Year</h4>
              <span> Courses</span> </div>
            <a href="#"><span class="icon-more-icon"></span></a> </div>
        </div>

      </li> -->
<!-- <li>
        <div class="inner">
          <figure><img  src="<?php echo base_url(); ?>images/course-img2.jpg" alt=""></figure>
          <h3>Sed perspiciatis<span>omnis iste</span></h3>
          <p>A comprehensive study of modern business...</p>
          <div class="bottom-txt clearfix">
            <div class="duration">
              <h4>1 Year</h4>
              <span> Courses</span> </div>
            <a href="#"><span class="icon-more-icon"></span></a> </div>
        </div>
      </li>
      <li>
        <div class="inner">
          <figure><img  src="<?php echo base_url(); ?>images/course-img3.jpg" alt=""></figure>
          <h3>Sed perspiciatis<span>omnis iste</span></h3>
          <p>A comprehensive study of modern business...</p>
          <div class="bottom-txt clearfix">
            <div class="duration">
              <h4>3 Year</h4>
              <span> Courses</span> </div>
            <a href="#"><span class="icon-more-icon"></span></a> </div>
        </div>
      </li>
      <li>
        <div class="inner">
          <figure><img  src="<?php echo base_url(); ?>images/course-img4.jpg" alt=""></figure>
          <h3>Sed perspiciatis<span>omnis iste</span></h3>
          <p>A comprehensive study of modern business...</p>
          <div class="bottom-txt clearfix">
            <div class="duration">
              <h4>2 Year</h4>
              <span> Courses</span> </div>
            <a href="#"><span class="icon-more-icon"></span></a> </div>
        </div>
      </li> -->
<!-- </ul> -->
<!-- </div>
</section> -->

<!-- End Projects Section -->


<!-- Start About Section -->
<div style="display : flex; justify-content : center; margin:auto ; ">
  <h2 style='border-bottom: solid; margin-top: 3%'>Projects</h2>
</div><br><br>
<section class="about">


  <div class="container" style="margin-top:3%">
    <ul class="row our-links">
      <li class="col-sm-4 apply-online clearfix equal-hight right-margin" style="height: auto; width:275px;">
        <div class="icon">
          <img src="http://www.intellify.in/uploads/image/7500icon-1.png" class="img-responsive" alt="">
        </div>
        <div class="detail">
          <h3>NSCP</h3>
          <p>National Science Creativity Program (NSCP) is a unique methodology to gauge the general intellectual functioning of a student.</p>
        </div>
      </li>
      <li class="col-sm-4 apply-online clearfix equal-hight right-margin " style="height: auto; width:275px;">
        <div class="icon">
          <img src="http://www.intellify.in/uploads/image/90icon-2.png" class="img-responsive" alt="">
        </div>
        <div class="detail">
          <h3>BOOTCAMPS &amp; WORKSHOPS</h3>
          <p>We conduct bootcamps and workshops for school students with a focus on skills like problem-solving, critical thinking and to introduce them to modern technology.</p>
        </div>
      </li>
      <li class="col-sm-4 apply-online clearfix equal-hight right-margin" style="height: auto; width:275px;">
        <div class="icon">
          <img src="http://www.intellify.in/uploads/image/7799icon-3.png" class="img-responsive" alt="">
        </div>
        <div class="detail">
          <h3>SOLVE PLATFORM</h3>
          <p>Solve is an online learning platform where students assess and improve their skills through personalized content. Students' learning is aided by free doubt solving.</p>
        </div>
      </li>
      <li class="col-sm-4 apply-online clearfix equal-hight right-margin" style="height: auto; width:275px; background-color: #2c97ea;  margin-right: 0%;">
        <div class="icon">
          <img src="http://www.intellify.in/uploads/image/7500icon-1.png" class="img-responsive" alt="" class="img-responsive" alt="">
        </div>
        <div class="detail">
          <h3>COMPETENCY-BASED CURRICULUM</h3>
          <p>With support from CBSE and MHRD we are developing a critical thinking based NCERT mapped content for school students.</p>
        </div>
      </li>
    </ul><br><br>
  </div>
  <div class="container">
    <h2 style="text-align:center!important;padding:15px;">IMPACT CREATED</h2>
    <div class="row" style="padding:20px">
      <div class="col-md-4" style="text-align:center">
        <img src="<?php echo base_url(); ?>assets/ISCO_assets/intellify-img/student coloured.png">
        <div class="caption">
          <br>
          <p style="color: #886c60;font-size:30px;">50K+</p>
          <h5 style="color: #886c60;">Students Participated</h5><br>
        </div>
      </div>
      <div class="col-md-4" style="text-align:center">
        <img src="<?php echo base_url(); ?>assets/ISCO_assets/intellify-img/school-building.png" style="border-radius:50%;height:225px;width:auto">
        <div class="caption">
          <br>
          <p style="color: #886c60;font-size:30px;">1500+</p>
          <h5 style="color: #886c60;">Schools</h5><br>
        </div>
      </div>
      <div class="col-md-4" style="text-align:center">
        <img src="<?php echo base_url(); ?>assets/ISCO_assets/intellify-img/cityc.png" style="border-radius:50%;">
        <div class="caption">
          <br>
          <p style="color: #886c60;font-size:30px;">100+</p>
          <h5 style="color: #886c60;">Cities</h5><br>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End About Section -->