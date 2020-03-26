<div class="container body">
  <div class="main_container">
    <?php $this->load->view(adminpath.'/sidebar') ?>
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><?php echo $heading; ?><small>
                  <ul class="nav navbar-right panel_toolbox">
                    <?php 
                      if(isset($breadcrumbs)) {
                      foreach($breadcrumbs as $rw) {
                          echo "<li><a href='".$rw['href']."'>".$rw['text']."</a></li>";
                        }
                      }

                      ?>
                  </ul>
                  </small></h2>
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/subject'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="row"> <a href="<?php echo base_url('categoryexcel.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank Category Excel</button>
                </a> <a href="<?php echo base_url('subjectexcel.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank Subject Excel</button>
                </a> <a href="<?php echo base_url('chapterexcel.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank Chapter Excel</button>
                </a> <a href="<?php echo base_url('topicexcel.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank Topic Excel</button>
                </a> <a href="<?php echo base_url('questionbank.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank Question Excel</button>
                </a> <a href="<?php echo base_url('schoolbank.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank School Excel</button>
                </a> 
                
                
                <a href="<?php echo base_url('studentbank.xlsx'); ?>">
                <button class="col-md-2 col-sm-2 col-xs-12 alert alert-success ">Blank Student Excel</button>
                </a> 
                
                
                
                
                </div>
              <?php if ($this->session->flashdata('exceluploadmsg')) { ?>
              <div class="alert alert-success">
                <?= $this->session->flashdata('exceluploadmsg') ?>
              </div>
              <?php } ?>
              <div class="x_content">
                <form class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" novalidate>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Type <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="type" name="type" class="form-control" required="required">
                        <option value="">Select </option>
                        <option value="category">Category</option>
                        <option value="subject">Subject</option>
                        <option value="chapter">Chapter</option>
                        <option value="topic">Topic</option>
                        <option value="question">Question</option>
                        <option value="school">School</option>
                        <option value="student">Student</option>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Upload File <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='filename' id="filename" size='20' />
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-12 text-center">
                      <button id="send" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
  </div>
</div>
