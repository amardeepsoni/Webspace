
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
                      <a href="<?php echo base_url(adminpath.'/subject/add'); ?>" class="btn btn-primary btn-xs"> Add </a>
                      <a onclick=" $('#subjectform').attr('action', '<?php echo $deleteaction; ?>'); $('#subjectform').submit();  " class="btn btn-danger btn-xs"> Delete</a>

                      <a onclick=" $('#subjectform').attr('action', '<?php echo $activeaction; ?>'); $('#subjectform').submit();  " class="btn btn-warning btn-xs"> Active</a>

                      <a onclick=" $('#subjectform').attr('action', '<?php echo $inactiveaction; ?>'); $('#subjectform').submit();  " class="btn btn-info btn-xs">Inactive</a>

                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <?php if ($this->session->flashdata('subjectnotify')) { ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata('subjectnotify') ?> </div>
                <?php } ?>
                <?php if ($this->session->flashdata('subjectmsg')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('subjectmsg') ?> </div>
                <?php } ?>

                  <div class="x_content">
                    <form id="subjectform" name="subjectform" method="post">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php if($allsubjects) {
                          $i=0;
                          foreach ($allsubjects as $value) {
                            $i++;
                          ?>
                        <tr>
                          <td width="5%"><?php echo $i; ?></td>
                          <th width="5%"><input type="checkbox" class="flat" name="table_records[]" id="subjectid" value="<?php echo $value['id']; ?>"></th>
                          <th width="5%"><?php echo $value['id']; ?></th>
                          <td width="60%"><?php echo $value['name']; ?></td>
                          <td width="20%"><?php if($value['status']){ ?>Publish<?php } else { ?>Unpublish <?php } ?></td>
                          <td width="10%"><a href="<?php echo $value['href']; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a></td>
                        </tr>
                        <?php } } ?>
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