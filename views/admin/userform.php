
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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/user'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Usertype</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <select id="usertype_id" class="form-control col-md-7 col-xs-12" name="usertype_id">
                      <option value=""> Select User Type </option>
                      <?php echo usertype($usertype_id); ?>
                     </select>
                    </div>
                  </div>
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="firstname" class="form-control col-md-7 col-xs-12" name="firstname"  type="text" required="required"  value="<?php echo $firstname; ?>">
                    </div>
                  </div>
                  
                  
                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="lastname" class="form-control col-md-7 col-xs-12" name="lastname" required="required" type="text" value="<?php echo $lastname; ?>">
                    </div>
                  </div>
                
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="user_email" class="form-control col-md-7 col-xs-12" name="user_email"  type="text" required="required"  value="<?php echo $user_email; ?>">
                    </div>
                  </div>
                    
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mobile  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="phone" class="form-control col-md-7 col-xs-12" name="phone"  type="text" required="required"  value="<?php echo $phone; ?>">
                    </div>
                  </div>    
   
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="user_name" class="form-control col-md-7 col-xs-12" name="user_name" required="required"  type="text" value="<?php echo $user_name; ?>">
                    </div>
                  </div>
                  
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="password" class="form-control col-md-7 col-xs-12" name="password"  type="text" value="">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Menus  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <ul style="list-style: none;">
                      <?php
                      foreach($allmenus as $menu){?>
                      <li><label for="menu<?php echo $menu['id']; ?>"><input id="menu<?php echo $menu['id']; ?>" name="menu[]"  type="checkbox" value="<?php echo $menu['id']; ?>" <?php echo $menu['checked']; ?>> <?php echo $menu['name']; ?></label>
                    </li>
                    <?php } ?>
                  </ul>
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
