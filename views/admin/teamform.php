
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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/team'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                  <!--<div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Home </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="home" name="home" class="form-control">
                        <?php
			if($home) {?>
                        <option value="1" selected="selected">Yes</option>
                        <option value="0">No</option>
                        <?php } else { ?>
                        <option value="1">Yes</option>
                        <option value="0" selected="selected">No</option>
                        <?php }?>
                      </select>
                    </div>
                  </div>-->
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select category</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="teamcat_id" name="teamcat_id" class="form-control">
                        <?php if($allimages) {
                         
                          foreach ($allimages as $value) {
                           
                          ?>
                        <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$teamcat_id) {?> selected="selected" <?php } ?>><?php echo $value['name']; ?></option>
                        <?php    }}                        ?>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Designation <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="designation" class="form-control col-md-7 col-xs-12" name="designation"  type="text" value="<?php echo $designation; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='image' id="image" size='20' />
                      <?php echo $image; ?> </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Short Description</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="shortdescription" required="required" name="shortdescription" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $shortdescription; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video URL </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="description" required="required" name="description" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $description; ?></textarea>
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
