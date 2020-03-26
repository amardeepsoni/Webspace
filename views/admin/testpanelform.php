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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/testpanel'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                   
                  
                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Parent Test <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     
                      <select id="pid" name="pid"  class="form-control col-md-7 col-xs-12 questiontypeid">
                        <option value="">Select Parent Test</option>
                        <?php echo getadmintestpaneloption(0,$pid,0);?>
                      </select>
                    </div>
                  </div>


                    <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Test Option <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="testoption" name="testoption" required="required"  class="form-control col-md-7 col-xs-12 questiontypeid">
                        <option value="">Select Test Option</option>
                      <?php echo testoption($testoption); ?>
                      </select>
                    </div>
                  </div>

                 
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Level <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     
                      <select id="schoollavel_id" name="schoollavel_id" required="required"  class="form-control col-md-7 col-xs-12">
                        <option value="">Select Level</option>
                        <?php if($allschoollavels){
                          foreach($allschoollavels as $allschoollavel){?>
                        <?php if($allschoollavel['id']==$schoollavel_id){?>
                            <option value="<?php echo $allschoollavel['id']; ?>" selected><?php echo $allschoollavel['name']; ?></option>
                          <?php } else {?>
                            <option value="<?php echo $allschoollavel['id']; ?>"><?php echo $allschoollavel['name']; ?></option>
                          <?php }}} ?>
                      </select>
                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Test name <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <input id="name" required="required" name="name" class="form-control col-md-7 col-xs-12" value="<?php echo $name; ?>" />


                    </div>
                  </div>
                  

                    <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Test Time <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                     <select id="hour" required="required" name="hour" class="form-control selectpicker" data-live-search="true" style="width: 150px">
                        <option value="">Select Hour</option>
                        <?php echo gethourlist($hour); ?>
                      </select>
                    </div><div class="col-md-4 col-sm-4 col-xs-12">

                       <select id="minutes" required="required" name="minutes"  class="form-control selectpicker"data-live-search="true" style="width: 150px">
                        <option value="">Select Minutes</option>
                        <?php echo getminuteslist($minutes); ?>
                      </select>
                    </div></div>

                    </div>
                  </div>



                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                     <select id="status" name="status" class="form-control col-md-7 col-xs-12">
                      <?php if($status){?>
                      <option value="1" selected="selected"> Active</option>
                      <option value="0"> Inactive</option>
                    <?php } else {?>
                      <option value="1"> Active</option>
                      <option value="0" selected="selected"> Inactive</option>
                    <?php } ?>
                     </select>


                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='image' id="image" size='20' />
                      <?php echo $image; ?> </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-xs-12" for="textarea">Description </label>
                    <div class="col-xs-12">
                      <textarea id="description" required="required" name="description" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $description; ?></textarea>
                    </div>
                  </div>
                  


                 <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                    <tr>
                      <td width="45%">Select Level</td>
                      <td width="45%">Select Subject</td>
                      <td width="10%">Action</td>
                    </tr>
                    <tr>
                      <td>
                        <select id="searchlevel" name="searchlevel" class="form-control col-md-7 col-xs-12">
                          <option value=""> Select Level</option>
                          <?php if($allschoollavels){?>
                            <?php foreach($allschoollavels as $allschoollavel){?>
                            <option value="<?php echo $allschoollavel['id']; ?>"><?php echo $allschoollavel['name']; ?></option>
                          <?php } } ?>
                        </select>
                      </td>
                      <td>
                       <select id="searchsubject" name="searchsubject" class="form-control col-md-7 col-xs-12">
                          <option value=""> Select Subejct</option>
                          <?php if($allsubjects){?>
                            <?php foreach($allsubjects as $allsubject){?>
                            <option value="<?php echo $allsubject['id']; ?>"><?php echo $allsubject['name']; ?></option>
                          <?php } } ?>
                        </select></td>
                      <td><a id="questionsearch" name="questionsearch" class="btn btn-info" onclick="searchquestion();">Search</a></td>
                    </tr>
                  </table>

                  <table id="questionpanel" class="table table-striped table-bordered bulk_action">
                    <tr>
                      <td width="85%">Question Name</td>
                      <td width="15%" align="center">Action</td>
                    </tr>
                  </table>
                  <br>
                  <div class="allquestion">
                   <table id="questionpanel" class="table table-striped table-bordered bulk_action">
                    <tr>
                      <td align="center" colspan="2"><b>Total Questions <span class="ttlquestion"><?php echo $ttlquestion; ?></span></b></td>
                    </tr>

                    <?php  $i=2;
                    if($alltestpanelquestions){
                      foreach($alltestpanelquestions as $row){?>
                        <tr id="pro<?php echo $i; ?>"> 
                          <td width="90%"><input type='hidden' id='questionid' name='questionid[]' value='<?php echo $row['id']; ?>'/><?php echo $row['name']; ?></td>

                        <td width="10%"> <a class='remove' onclick='removeprolist(<?php echo $i; ?>)'><button class="btn btn-success">Delete</button></a></td>
                        </tr>
                    <?php  $i++;} } ?>
                   
                  </table>
                </div>
               
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-12 text-center">
                      <input type="hidden" id="ttlquestion" name="ttlquestion" value="<?php echo $ttlquestion; ?>">
                      <input type="hidden" id="random" name="random" value="<?php echo $randomno; ?>">
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

<script type="text/javascript">
  function searchquestion(){

    url1 ="";
  
    var schoollavel_id = $("#searchlevel").val();
    var subject_id = $("#searchsubject").val();


    if (schoollavel_id) {
  
      url1 += 'schoollavel_id=' + encodeURIComponent(schoollavel_id);
  
    }
    else{
      alert("Select Level");
      return false;
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
    else{
      alert("Select subject");
      return false;
    }
    var ajaxurl="<?php echo base_url('admin/ajaxpost/getquestions?')?>"+url1;

    $.ajax({
        url: ajaxurl,
        dataType: 'json',
           
        success: function(json) {
            $("#questionpanel").find("tr:gt(0)").remove();
            $('#questionpanel tr:last').after(json.sucess);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    

    
  }

function addquestion(questionid){
    var random = $("#random").val();
    var ttlquestion= $("#ttlquestion").val();
    var testpanelid= '<?php echo $id; ?>';
    var ajaxurl="<?php echo base_url('admin/ajaxpost/addtestquestion?random=')?>"+random+"&questionid="+questionid+"&ttlquestion="+ttlquestion+"&testpanelid="+testpanelid;
    $.ajax({
        url: ajaxurl,
        dataType: 'json',
        success: function(json) {
          if(json.error){
            alert(json.error);
          }else{
            $('.ttlquestion').html(json.ttlquestion);
            $('#ttlquestion').val(json.ttlquestion);
            $('.allquestion tr:last').after(json.sucess);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function removeprolist(lin)

  {

    $('#pro'+lin).remove();
    var ttlquestion= $("#ttlquestion").val();
    var ttlquestion=ttlquestion-1;
    $('.ttlquestion').html(ttlquestion);
    $('#ttlquestion').val(ttlquestion);
    

  }

</script>