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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/chapter'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Subject <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     
                      <select id="subject_id" name="subject_id" required="required"  class="form-control col-md-7 col-xs-12 subjectid">
                        <option value="">Select Subject</option>
                        <?php if($allsubjects){
                          foreach($allsubjects as $allsubject){?>
                        <?php if($allsubject['id']==$subject_id){?>
                            <option value="<?php echo $allsubject['id']; ?>" selected><?php echo $allsubject['name']; ?></option>
                          <?php } else {?>
                            <option value="<?php echo $allsubject['id']; ?>"><?php echo $allsubject['name']; ?></option>
                          <?php }}} ?>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text" value="<?php echo $name; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Order Number </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="ordernum" class="form-control col-md-7 col-xs-12" name="ordernum"  type="text" value="<?php echo $ordernum; ?>">
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
