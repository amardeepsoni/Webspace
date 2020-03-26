
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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/school'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">School Name <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text" value="<?php echo $name; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact Person <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="conperson" class="form-control col-md-7 col-xs-12" name="conperson" required="required" type="text" value="<?php echo $conperson; ?>">
                    </div>
                  </div>
                  
                        
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="email" class="form-control col-md-7 col-xs-12" name="email" required="required" type="text" value="<?php echo $email; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mobile <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mobile" class="form-control col-md-7 col-xs-12" name="mobile" required="required" type="text" value="<?php echo $mobile; ?>">
                    </div>
                  </div>
                  
                  
                     <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mobile1 <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mobile1" class="form-control col-md-7 col-xs-12" name="mobile1" required="required" type="text" value="<?php echo $mobile1; ?>">
                    </div>
                  </div>
                  
                  
                  
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Logo </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='image' id="image" size='20' />
                      <?php echo $image; ?> </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="address" required="required" name="address" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $address; ?></textarea>
                    </div>
                  </div>
                  
                  
                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">know </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="know" class="form-control col-md-7 col-xs-12" name="know" type="text" value="<?php echo $know; ?>">
                    </div>
                  </div>
                  
                         <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">who </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="who" class="form-control col-md-7 col-xs-12" name="who"  type="text" value="<?php echo $who; ?>">
                    </div>
                  </div>
                  
                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">intern </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="intern" class="form-control col-md-7 col-xs-12" name="intern"  type="text" value="<?php echo $intern; ?>">
                    </div>
                  </div>
                  
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">password <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="password" class="form-control col-md-7 col-xs-12" name="password" required="required" type="text" value="<?php echo $password; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">mpassword <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="mpassword" class="form-control col-md-7 col-xs-12" name="mpassword" required="required" type="text" value="<?php echo $mpassword; ?>">
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
