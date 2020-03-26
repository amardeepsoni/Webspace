
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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/loginperson/add'); ?>" class="btn btn-primary btn-xs"> Add </a> <a onclick=" $('#loginpersonform').attr('action', '<?php echo $deleteaction; ?>'); $('#loginpersonform').submit();  " class="btn btn-danger btn-xs"> Delete</a> <a onclick=" $('#loginpersonform').attr('action', '<?php echo $activeaction; ?>'); $('#loginpersonform').submit();  " class="btn btn-warning btn-xs"> Active</a> <a onclick=" $('#loginpersonform').attr('action', '<?php echo $inactiveaction; ?>'); $('#loginpersonform').submit();  " class="btn btn-info btn-xs">Inactive</a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form id="loginpersonform" name="loginpersonform" method="post">
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($allimages) {
                          $i=0;
                          foreach ($allimages as $value) {
                            $i++;
                          ?>
                      <tr>
                        <td width="5%"><?php echo $i; ?></td>
                        <th width="5%"><input type="checkbox" class="flat" name="table_records[]" id="imageid" value="<?php echo $value['id']; ?>"></th>
                        <td width="10%"><?php echo $value['firstname']; ?> <?php echo $value['lastname']; ?></td>
                        <td width="50%"><?php echo $value['email']; ?></td>
                        <td width="20%"><?php echo $value['mobile']; ?></td>
                        <td width="10%"><a class="btn btn-app"  href="<?php echo $value['href']; ?>"><i class="fa fa-edit"></i> Edit </a></td>
                      </tr>
                      <?php 
                          }

                        }
                        ?>
                    </tbody>
                  </table>
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
