
<div class="container body">
  <div class="main_container">
    <?php $this->load->view(adminpath.'/sidebar') ?>
    <!-- schoollavel content -->
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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/schoollavel'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                  <div class="item form-group" style="display:none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Top </label>
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
                  </div>
                  <div class="item form-group" style="display:none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Parent <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="pid" name="pid" class="form-control">
                        <option value="0" >Select Parent</option>
                        <?php 
                            if($allcategorys) {
                              foreach ($allcategorys as $value) {
                                ?>
                        <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$pid) {?> selected="selected" <?php } ?>><?php echo $value['name']; ?></option>
                        <?php foreach ($value['child'] as $value) { ?>
                        <option value="<?php echo $value['id']; ?>"<?php if($value['id']==$pid) {?> selected="selected" <?php } ?>><?php echo "->".$value['name']; ?></option>
                        <?php foreach ($value['child'] as $value) { ?>
                        <option value="<?php echo $value['id']; ?>"<?php if($value['id']==$pid) {?> selected="selected" <?php } ?>><?php echo "-->".$value['name']; ?></option>
                        <?php }}}} ?>
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text" value="<?php echo $name; ?>">
                    </div>
                  </div>
                  <div class="item form-group" style="display:none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkname">Linkname <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="linkname" class="form-control col-md-7 col-xs-12" name="linkname"  type="text" value="<?php echo $linkname; ?>">required="required"
                    </div>
                  </div>
                  <div class="item form-group" style="display:none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="schoollavel_title">Page Title</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="page_title" name="page_title" class="form-control col-md-7 col-xs-12"><?php echo $page_title; ?></textarea>
                    </div>
                  </div>
                  
                  
                  
                  
                  
                  
                  <div class="item form-group" style="display:none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyword">Meta Keywords </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="meta_keyword" name="meta_keyword" class="form-control col-md-7 col-xs-12"><?php echo $meta_keyword; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group" style="display:none">  
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Meta Description </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="meta_description" name="meta_description" class="form-control col-md-7 col-xs-12"><?php echo $meta_description; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group" style="display:none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='image' id="image" size='20' />
                      <?php echo $image; ?> </div>
                  </div>
                  
                  
                  
                  <div class="item form-group" style="display:none">
                    <label class="col-xs-12" for="textarea">Description </label>
                    <div class="col-xs-12">
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
