<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath.'/sidebar') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="x_panel x_panel_file_upload"> -->
                            <!-- <div class="x_title"> -->
                               <div class="xyz" >
                                   <?php
                                   if ($this->session->flashdata('uploadSuccess'))
                                       echo '<div class="alert alert-success">'. $this->session->flashdata('uploadSuccess') .' </div>';
                                   else if ( $this->session->flashdata('uploadFail'))
                                       echo '<div class="alert alert-danger">'. $this->session->flashdata('uploadFail') .' </div>';
                                   ?>
                                    <form class="defaultform row" action="<?php echo base_url().adminpath.'/UploadController/uploadData' ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <label for="total">Total no. of Questions: </label>
                                        <input required id="total" type="number" name="total" />
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <label for="skill1_1">Skill-1 range: </label>
                                        <input required id="skill1_1" type="number"  name="skill1_1" /> to <input required id="skill1_2" type="number" name="skill1_2" />
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <label for="skill2_1">Skill-2 range: </label>
                                        <input  required id="skill2_1" type="number" name="skill2_1" /> to <input  required id="skill2_2" type="number" name="skill2_2" />                        
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <label for="skill3_1">Skill-3 range: </label>
                                        <input  required   id="skill3_1" type="number" name="skill3_1" /> to <input    required id="skill3_2" type="number" name="skill3_2" />
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <label for="skill4_1">Skill-4 range: </label>
                                        <input    required id="skill4_1" type="number" name="skill4_1" /> to <input    required id="skill4_2" type="number" name="skill4_2" />
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <label for="skill5_1">Skill-5 range: </label>
                                        <input    required id="skill5_1" type="number" name="skill5_1" /> to <input    required id="skill5_2" type="number" name="skill5_2" />
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <input class='custom-file-input' type='file' required  name='user_file'  accept="text/csv" />              
                                        </div>
                                        <div class="form-group col-lg-12 col-sm-12">
                                        <input name="Submit" type="submit"  value="Upload">                      
                                        </div>
                                        <!-- <div class='fileupload-btn'>
                                            
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                            <div class="x_content">
                            </div>
                        <!-- </div> -->
                    </div>
                <!-- </div> -->
            </div>
        </div>
        <!-- /page content -->

    </div>
</div>