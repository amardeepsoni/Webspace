
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
                    <div class="pull-right">
                      <a href="<?php echo base_url(adminpath.'/news'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text" value="<?php echo $name; ?>">
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sub Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="subhead" class="form-control col-md-7 col-xs-12" name="subhead"  type="text" value="<?php echo $subhead; ?>">
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkname">Linkname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="linkname" class="form-control col-md-7 col-xs-12" name="linkname" required="required" type="text" value="<?php echo $linkname; ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="startdate">Start Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date datepicker'>
                            <input type='text' class="form-control" id="startdate" name="startdate" value="<?php echo $startdate; ?>"  />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="enddate">End Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date datepicker'>
                            <input type='text' class="form-control" id="enddate" name="enddate" value="<?php echo $enddate; ?>"  />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_title">Page Title</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <textarea id="page_title" name="page_title" class="form-control col-md-7 col-xs-12"><?php echo $page_title; ?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyword">Meta Keywords </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <textarea id="meta_keyword" name="meta_keyword" class="form-control col-md-7 col-xs-12"><?php echo $meta_keyword; ?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Meta Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <textarea id="meta_description" name="meta_description" class="form-control col-md-7 col-xs-12"><?php echo $meta_description; ?></textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type='file' name='image' id="image" size='20' />
                        <?php echo $image; ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-xs-12" for="textarea">Short Description </label>
                        <div class="col-xs-12">
                          <textarea id="shortdescription" required="required" name="shortdescription" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $shortdescription; ?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-xs-12" for="textarea">Description
                        </label>
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