
<div id="page-content-wrapper">
<a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
<!-- <div class=" parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>schoolassest/upload/demo_02.jpg');"> -->
 <div> 
  <div class="page-title section nobg">
    <div class="container-fluid">
      <div class="clearfix">
        <div class="title-area pull-left">
          <h2><?php echo $heading; ?><small></small></h2>
        </div>
        <!-- /.pull-right -->
        <div class="pull-right hidden-xs">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>schoolassest">Home</a>/</li>
              <li class="active"><?php echo $heading; ?></li>
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
</div>
<div class="section">
  <div class="container-fluid">
    <?php if ($this->session->flashdata('loginnotify')) { ?>
    <div class="alert alert-danger">
      <?= $this->session->flashdata('loginnotify') ?>
    </div>
    <?php } ?>
    <div class="cnt-block">
      <div class="row">
        

      </div>
     <h4> Coming Soon </h4>
    </div>
    <br />
    
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
<!-- end section --> 

