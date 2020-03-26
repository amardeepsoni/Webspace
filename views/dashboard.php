
<div id="page-content-wrapper">
<a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
<div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>schoolassest/upload/demo_02.jpg');">
  <div class="page-title section nobg">
    <div class="container-fluid">
    
    
     <?php if ($this->session->flashdata('loginnotify')) { ?>
  <div class="alert alert-danger">
    <?= $this->session->flashdata('loginnotify') ?>
  </div>
  <?php } ?>
    
    
    
      <div class="clearfix">
        <div class="title-area pull-left">
          <h2> <?php echo $heading; ?> <small>Please sign in to use our sites.</small></h2>
        </div>
        <div class="pull-right hidden-xs">
          <div class="bread">
            <ol class="breadcrumb">
              <?php 

              if(isset($breadcrumbs)) {

                $bi=0;

                foreach($breadcrumbs as $rw) {

                  if($bi>0) {

                    echo "";

                  }

                  echo "<li><a href='".$rw['href']."'>".$rw['text']."</a></li>";

                $bi++;}

              }

            ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section">
  <div class="container-fluid">
    
  </div>
</div>
