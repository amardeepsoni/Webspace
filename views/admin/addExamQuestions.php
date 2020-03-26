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
                                <?php
                                if ($this->session->flashdata('uploadSuccess'))
                                    echo '<div class="alert alert-success">'. $this->session->flashdata('uploadSuccess') .' </div>';
                                else if ( $this->session->flashdata('uploadFail'))
                                    echo '<div class="alert alert-danger">'. $this->session->flashdata('uploadFail') .' </div>';
                                ?>
                                <br>
                                <h2>Upload Questions Image</h2>
                                <div class="clearfix">
                                    <form method="post" action="<?php echo base_url().adminpath.'/UploadController/uploadQuesImages'?>" enctype="multipart/form-data">
                                        Upload Images
                                        <input multiple="true" required type="file" name="ques_images[]" accept=".jpg,.jpeg,.png" />
                                        <input type="hidden" name='quizid' value="<?php echo $quizid ?>" />
                                        <button class='btn btn-primary fileupload-btn' type='submit'>Submit</button>
                                    </form>
                                </div>
                                <hr />
                                <br>
                                <h2>Upload Options Image</h2>
                                <div class="clearfix">
                                    <form method="post" action="<?php echo base_url().adminpath.'/UploadController/uploadOptionsImages'?>" enctype="multipart/form-data">
                                        Upload Images
                                        <input multiple="true" required type="file" name="options_images[]" accept=".jpg,.jpeg,.png" />
                                        <input type="hidden" name='quizid' value="<?php echo $quizid ?>" />
                                        <button class='btn btn-primary fileupload-btn' type='submit'>Submit</button>
                                    </form>
                                </div>
                                <hr />
                                <h2>Add Questions</h2>
                                <div class="clearfix">

                                    <?php echo  'Total no. of Questions in quiz: '.$total; ?>
                                    <br>
<!--                                    Upload CSV-->
                                    <?php echo form_open_multipart(base_url().adminpath.'/UploadController/uploadQuesData');
                                    echo "<select required class='dropdown' name='qtype'> Choose Question type:
                                            <div class='dropdown-content'>
                                            <option value='mcq2'>MCQ2 type</option>
                                            <option value='mcq4'>MCQ4 type</option>
                                            <option value='int'>Integer type</option>
                                            </div> 
                                          </select>".
                                     "<input required class='custom-file-input' type='file' name='user_file'  />"
                                      ."<input type='hidden' name='quizid' value=".$quizid.">"
                                     ."<button class='btn btn-primary fileupload-btn' type='submit'>Submit</button>"
                                      ."</form>"
                                    ?>
<!--                                    Add Questions Manually-->
                                    <?php if($mcq2 || $mcq4 || $integer) {
                                     echo  "<form action=". $action ." method='post'>";
                                      echo  '<input type="hidden" name="quizid" value="'. $quizid.'">';

                                        //MCQ2 type questions
                                        if($mcq2) {
                                           echo "<div><br /><h2>MCQ2 type questions</h2></div><hr />";
                                            for($i=0;$i<$mcq2;$i++) {
                                                echo
                                                "<h3>Qno. ".($i+1)."</h3>
                                            <label for='qdataMCQ[$i][qnstext]'>Enter Question</label>
                                            <input type='text' name='qdataMCQ[$i][qnstext]' id='qdataMCQ[$i][qnstext]' required>
                                            <label for='qdataMCQ[$i][option][0]'>Option 1</label>
                                            <input type='text' name='qdataMCQ[$i][option][0]' id='qdataMCQ[$i][option][0]' required>
                                            <label for='qdataMCQ[$i][option][1]'>Option 2</label>
                                            <input type='text' name='qdataMCQ[$i][option][1]' id='qdataMCQ[$i][option][1]' required>
                                            <label for='qdataMCQ[$i][correct]'>Correct Option</label>
                                            <select id='qdataMCQ[$i][correct]'  name='qdataMCQ[$i][correct]' >
                                                <option selected value=0>Option1</option>
                                                <option value=1>Option2</option>
                                            </select>
                                            ";
                                            }
                                        }

                                        //MCQ4 type questions
                                        if($mcq4) {
                                            echo "<div><br /><h2>MCQ4 type questions</h2></div><hr />";
                                            for ($i=$mcq2; $i <($mcq2+$mcq4); $i++) {
                                                echo
                                                "<h3>Qno. ".($i+1)."  </h3>
                                            <label for='qdataMCQ[$i][qnstext]'>Enter Question</label>
                                            <input type='text' name='qdataMCQ[$i][qnstext]' id='qdataMCQ[$i][qnstext]' required>
                                            <label for='qdataMCQ[$i][option][0]'>Option 1</label>
                                            <input type='text' name='qdataMCQ[$i][option][0]' id='qdataMCQ[$i][option][0]' required>
                                            <label for='qdataMCQ[$i][option][1]'>Option 2</label>
                                            <input type='text' name='qdataMCQ[$i][option][1]' id='qdataMCQ[$i][option][1]' required>
                                            <label for='qdataMCQ[$i][option][2]'>Option 3</label>
                                            <input type='text' name='qdataMCQ[$i][option][2]' id='qdataMCQ[$i][option][2]' required>
                                            <label for='qdataMCQ[$i][option][3]'>Option 4</label>
                                            <input type='text' name='qdataMCQ[$i][option][3]' id='qdataMCQ[$i][option][3]' required>
                                            <label for='qdataMCQ[$i][correct]'>Correct Option</label>
                                            <select id='qdataMCQ[$i][correct]' name=qdataMCQ[$i][correct]' >
                                                <option selected value=0>Option1</option>
                                                <option value=1>Option2</option>
                                                <option value=2>Option3</option>
                                                <option value=3>Option4</option>
                                            </select>
                                            ";
                                            }
                                        }
                                        //Integer type questions
                                        if($integer) {
                                            echo "<div><br /><h2>Integer type questions</h2></div><hr />";
                                            for ($i=0; $i <($integer); $i++) {
                                                echo
                                                "<h3>Qno. ".($i+$mcq2 + $mcq4 +1)."   </h3>
                                            <label for='qdataINT[$i][qnstext]'>Enter Question</label>
                                            <input type='text' name='qdataINT[$i][qnstext]' id='qdataINT[$i][qnstext]' required>
                                            <label for='qdata[$i]INT[correct]'>Correct Answer</label>
                                            <input type='number' name='qdataINT[$i][correct]' id='qdataINT[$i][correct]' required>
                                            ";
                                            }
                                        }
                                       echo '<input type="submit"></form>';
                                   } ?>
                                    <h5><a href="<?php echo base_url().adminpath.'/EditExam/'.$quizid ?>">View Quiz</a> </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
</div>