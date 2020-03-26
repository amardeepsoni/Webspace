
<style>
.addinner{
  margin:10px;
  /* border-radius:100px; */
  
}
.addstudent:after{
  border:none !important;
  /* background-color:#31334D; */
}
.addstudent{
  /* background-color:#31334D; */
}
.col-sm-12{
  /* height:100px; */
  /* width:20%; */
  /* background:#31334D; */
  /* color:#31334D; */
  margin:2%;
}
.col-sm-12 a{
  color:#31334D;
  font-size:20px;
  font-weight:600;
}
.fa{
  margin-right:2%;
}
@media screen and (max-width:500px){
  .col-sm-12 a{
    font-size:15px;
  }
  .row{
    margin-top:20%;
  }
}

</style>
<div id="page-content-wrapper">
  <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <!-- <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>schoolassest/upload/demo_02.jpg');"> -->
      <div class="page-title section nobg">
        <div class="container-fluid">
        <div class="clearfix">
          <div class="title-area pull-left">
            <!-- schoolinfo array has all the school details -->
            <h2><?php echo $schoolinfo->name; ?> <?php echo $heading; ?> </h2>
          </div>
        <!-- Section for Home/Dashboard link -->
        <div class="pull-right hidden-xs">
          <div class="bread">
            <ol class="breadcrumb">
              <?php if(isset($breadcrumbs)) {
                  $bi=0;
                  foreach($breadcrumbs as $rw) {
                  if($bi>0) {
                    echo "";
                  }
                  echo "<li><a href='".$rw['href']."'>".$rw['text']."</a></li>";
                $bi++;
              }
            }?>
            </ol>
          </div>
        </div>
        <!-- end Home/Dashboard link --> 
      </div>
    </div>
    <!-- end Menu -->
  </div>
  <!-- end-->
</div>
<!-- Section for main Content -->
<!-- <i class="fas fa-cogs"></i> -->
<div class="section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-12">
      <i class="fa fa-plus fa-2x topiyu"></i>  <a href="<?php echo base_url();?>addstudent"> Add Students! </a>
      </div>
      <div class="col-sm-12 col-md-12">
      <i class="fa fa-list fa-2x topiyu"></i>
          <?php if($allstudents) {
            $abhy=1;  foreach ($allstudents as $value) {
            if($value['category_id']==$schoolinfo->category_id){?>
          <!-- <span>(<?php echo $abhy;?>)</span> -->
          <?php $abhy++;}}}?> 
          </b> <a href="<?php echo base_url();?>studentlist"></i> View Added Students </a>
      </div>
      <div class="col-sm-12 col-md-12">
      <i class="fa fa-cogs fa-2x topiyu"></i>  <a href="<?php echo base_url();?>GenerateAttendanceSheet/round_1"> Generate Attendance Sheet for Round-1</a>
      </div>
      <div class="col-sm-12 col-md-12">
      <i class="fa fa-cogs fa-2x topiyu"></i>  <a href="<?php echo base_url();?>GenerateAttendanceSheet/round_2"> Generate Attendance Sheet for Round-2 </a>
      </div>
    </div>

  </div>
</div>




<!-- <div class="section">
  <div class="container-fluid">
    <div class="row row_">
     
      <div class="col-sm-6 col-md-6">
        <div class="addstudent bbm-1">
          <div class="addinner" style="background-color:#31334D;"><i class="fa fa-plus topiyu"></i> <b> Add Students!</b> <a href="<?php echo base_url();?>addstudent"><i class="fa fa-angle-double-right pull-right"></i>Add </a> </div>
        </div>
      </div>
    
      <div class="col-sm-6 col-md-6">
        <div class="addstudent bbm-2">
          <div class="addinner countsert" style="background-color:#31334D;"><i class="fa fa-list topiyu"></i> <b> View Added Students
          <?php if($allstudents) {
            $abhy=1;  foreach ($allstudents as $value) {
            if($value['category_id']==$schoolinfo->category_id){?>
          <span>(<?php echo $abhy;?>)</span>
          <?php $abhy++;}}}?> 
          </b> <a href="<?php echo base_url();?>studentlist"><i class="fa fa-angle-double-right pull-right"></i>View </a> </div>
        </div>
      </div>
        <div class="col-sm-6 col-md-6">
            <div class="addstudent bbm-2">
                <div class="addinner" style="background-color:#31334D;"><i class="fa fa-list topiyu"></i> <b> Generate Attendance Sheet for Round-1 </b> <a href="<?php echo base_url();?>GenerateAttendanceSheet/round_1"> <i class="fa fa-angle-double-right pull-right"></i>Generate</a> </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="addstudent bbm-2">
                <div class="addinner" style="background-color:#31334D;"><i class="fa fa-list topiyu"></i> <b> Generate Attendance Sheet for Round-2 </b> <a href="<?php echo base_url();?>GenerateAttendanceSheet/round_2"> <i class="fa fa-angle-double-right pull-right"></i>Generate</a> </div>
            </div>
        </div>
    </div> -->
    <!-- end row-->
  <!-- </div> -->
  <!-- end container -->
<!-- </div> -->
<!-- end section -->
