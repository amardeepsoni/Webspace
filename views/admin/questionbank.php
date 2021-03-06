
      <div class="container body">
        <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar')?>
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
if (isset($breadcrumbs)) {
	foreach ($breadcrumbs as $rw) {
		echo "<li><a href='" . $rw['href'] . "'>" . $rw['text'] . "</a></li>";
	}
}

?>
                      </ul>

                        </small></h2>
                      <div class="pull-right">
                        <a href="<?php echo base_url(adminpath . '/questionbank/generateQuiz'); ?>" class="btn btn-primary btn-xs"> Generate Quiz </a>
                        <a href="<?php echo base_url(adminpath . '/questionbank/add'); ?>" class="btn btn-primary btn-xs"> Add </a>
                        <a onclick=" $('#imageform').attr('action', '<?php echo $deleteaction; ?>'); $('#imageform').submit();  " class="btn btn-danger btn-xs"> Delete</a>

                        <a onclick=" $('#imageform').attr('action', '<?php echo $activeaction; ?>'); $('#imageform').submit();  " class="btn btn-warning btn-xs"> Active</a>

                        <a onclick=" $('#imageform').attr('action', '<?php echo $inactiveaction; ?>'); $('#imageform').submit();  " class="btn btn-info btn-xs">Inactive</a>

                      </div>
                      <div class="clearfix"></div>
                    </div>
                     <?php if ($this->session->flashdata('questionbanknotify')) {?>
                      <div class="alert alert-danger"> <?=$this->session->flashdata('questionbanknotify')?> </div>
                  <?php }?>
                  <?php if ($this->session->flashdata('questionbankmsg')) {?>
                      <div class="alert alert-success"> <?=$this->session->flashdata('questionbankmsg')?> </div>
                  <?php }?>
                    <div class="x_content">

                      <div class="row">
                        <div class="col-md-4">
                          <select id="schoollavel_id" name="schoollavel_id" required="required" class="form-control col-md-7 col-xs-12">

                          <option value="">Select Level</option>

                          <?php if ($allschoollavels) {

	foreach ($allschoollavels as $allschoollavel) {?>

                          <?php if ($allschoollavel['id'] == $schoollavel_id) {?>

                              <option value="<?php echo $allschoollavel['id']; ?>" selected><?php echo $allschoollavel['name']; ?></option>

                            <?php } else {?>

                              <option value="<?php echo $allschoollavel['id']; ?>"><?php echo $allschoollavel['name']; ?></option>

                            <?php }}}?>

                        </select>
                      </div>
                      <div class="col-md-4">
                       <select id="subject_id" name="subject_id" required="required"  class="form-control col-md-7 col-xs-12 subjectid">
                          <option value="">Select Subject</option>
                          <?php if ($allsubjects) {
	foreach ($allsubjects as $allsubject) {?>
                          <?php if ($allsubject['id'] == $subject_id) {?>
                              <option value="<?php echo $allsubject['id']; ?>" selected><?php echo $allsubject['name']; ?></option>
                            <?php } else {?>
                              <option value="<?php echo $allsubject['id']; ?>"><?php echo $allsubject['name']; ?></option>
                            <?php }}}?>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <button onclick="filter();" class="btn btn-primary"> Search </button>
                      </div>

                      </div>
                      <br>
                      <br>
                      <form id="imageform" name="imageform" method="post">
                      <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php if ($allquestionbanks) {
	$i = 0;
	foreach ($allquestionbanks as $value) {
		$i++;
		?>
                          <tr>
                            <td width="5%"><?php echo $i; ?></td>
                            <th width="5%"><input type="checkbox" class="flat" name="table_records[]" id="imageid" value="<?php echo $value['id']; ?>"></th>
                            <td width="50%"><?php echo $value['name']; ?></td>
                            <td width="20%"><?php if ($value['status']) {?>Publish<?php } else {?>Unpublish <?php }?></td>
                            <td width="10%">
                            <a class="btn btn-app"  href="<?php echo $value['href']; ?>"><i class="fa fa-edit"></i> Edit </a>
                          </td>
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

  <script type="text/javascript">

    function filter() {


      url = '<?php echo base_url() . adminpath; ?>/questionbank?';

      url1 ="";

      var schoollavel_id = $('select[name="schoollavel_id"]').val();
      var subject_id = $('select[name="subject_id"]').val();


      if (schoollavel_id) {

        url1 += 'schoollavel_id=' + encodeURIComponent(schoollavel_id);

      }
      if (subject_id) {

        if(url1=='')
          {
            url1 += 'subject_id=' + subject_id;
          }
        else
          {
            url1 += '&subject_id=' + subject_id;
          }
      }
      location = url+url1;

    }


  </script>