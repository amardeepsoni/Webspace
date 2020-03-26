
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
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="address" name="address" class="form-control col-md-7 col-xs-12"><?php echo $address; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone No. </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="phone" name="phone" class="form-control col-md-7 col-xs-12"><?php echo $phone; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Emails </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="email" name="email" class="form-control col-md-7 col-xs-12"><?php echo $email; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fax">Fax No. </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="fax" name="fax" class="form-control col-md-7 col-xs-12"><?php echo $fax; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-xs-12" for="textarea">Google Map </label>
                    <div class="col-xs-12">
                      <textarea id="googlemap"  name="googlemap" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $googlemap; ?></textarea>
                    </div>
                  </div><div class="item form-group">
                    <label class="col-xs-12" for="textarea">Contact Us Text </label>
                    <div class="col-xs-12">
                      <textarea id="context"  name="context" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $context; ?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">LIndin </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="socialsites" class="form-control col-md-7 col-xs-12" name="socialsites" type="text" value="<?php echo $socialsites; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">feed </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="feed" class="form-control col-md-7 col-xs-12" name="feed"  type="text" value="<?php echo $feed; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">follow </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="follow" class="form-control col-md-7 col-xs-12" name="follow"  type="text" value="<?php echo $follow; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">facebook </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="facebook" class="form-control col-md-7 col-xs-12" name="facebook"  type="text" value="<?php echo $facebook; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">gplus </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="gplus" class="form-control col-md-7 col-xs-12" name="gplus"  type="text" value="<?php echo $gplus; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Twitter </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="twitter" class="form-control col-md-7 col-xs-12" name="twitter"  type="text" value="<?php echo $twitter; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">COmpany Profile 1 </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="aboutpro1" class="form-control col-md-7 col-xs-12" name="aboutpro1"  type="text" value="<?php echo $aboutpro1; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">COmpany Profile 2 </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="aboutpro2" class="form-control col-md-7 col-xs-12" name="aboutpro2"  type="text" value="<?php echo $aboutpro2; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">COmpany Profile 3 </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="aboutpro3" class="form-control col-md-7 col-xs-12" name="aboutpro3"  type="text" value="<?php echo $aboutpro3; ?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">COmpany Profile 4 </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="aboutpro4" class="form-control col-md-7 col-xs-12" name="aboutpro4"  type="text" value="<?php echo $aboutpro4; ?>">
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
