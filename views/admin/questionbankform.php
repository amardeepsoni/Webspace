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
                <div class="pull-right"> <a href="<?php echo base_url(adminpath.'/questionbank'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back </a> </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
                   
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Question Marks <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <input id="perquestionmark" required="required" name="perquestionmark" class="form-control col-md-7 col-xs-12 date" value="<?php echo $perquestionmark; ?>" />


                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Negative Marks  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <input id="negativemark" name="negativemark" class="form-control col-md-7 col-xs-12 date" value="<?php echo $negativemark; ?>" />


                    </div>
                  </div>



                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Question <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">

                      <textarea id="name" required="required" name="name" class="form-control col-md-7 col-xs-12 ckeditor"><?php echo $name; ?></textarea>



                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Image </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='image' id="image" size='20' />
                      <?php echo $image; ?> </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Answers </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <table cellpadding="0" cellspacing="10" width="100%" id="mproductsection">
                        
<a onClick="addanswer();" class="btn btn-primary btn-xs" id="addproductbtn">Add Item</a>
                        <?php foreach($answeroptions as $answeroption){?>
                        <tr>
                          <td><input type="text" id="answeroption"  class="form-control col-md-7 col-xs-6" name="answeroption[]"placeholder="Answer Option No. <?php echo $answeroption['orderno']; ?>" value="<?php echo $answeroption['value']; ?>"></td>
                        </tr>
                      <?php } ?>
                      </table>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rightanswer">Right Answer <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="rightanswer" required="required"  name="rightanswer"  class="form-control col-md-7 col-xs-6">
                        <option value="">Select Right Answer</option>
                        <?php foreach($answeroptions as $answeroption){?>
                        <?php if($answeroption['orderno'] == $rightanswer){?>
                          <option value="<?php echo $answeroption['orderno']; ?>" selected><?php echo $answeroption['orderno']; ?></option>
                        <?php } else{?>
                          <option value="<?php echo $answeroption['orderno']; ?>"><?php echo $answeroption['orderno']; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>

                      <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="explain">Explain  </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="explain" class="form-control col-md-7 col-xs-12" name="explain" type="text"  ><?php echo $explaintext; ?> </textarea>
                    </div>
                  </div>


                   <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="explainattachment">Explain Attachment </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type='file' name='explainattachment' id="explainattachment" size='20' />
                      <?php echo $explainattachment; ?> </div>
                  </div>


                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="videolink">Video Link </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="videolink" class="form-control col-md-7 col-xs-12" name="videolink"><?php echo $videolink; ?></textarea>
                     
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
