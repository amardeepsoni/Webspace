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
                                <h3>Edit Exam</h3>
                                <div class="card-body">
                                    <h3><?php echo $quizDetails->title ?></h3>
                                    <input class="my-button" style="width:10em; height:3em;" type="button" name="answer" value="Add New Question" onclick="toggleDiv()" />
                                    <div id="getNoOfQuestions"  style="display:none;" >
                                        <form action="<?php echo base_url().adminpath.'/UpdateExam/addQuestion/' ?>" method="post" style="padding:2%; width:50%;">
                                            <input type="hidden" name="quizid" value="<?php echo $quizDetails->quizid ?>">
                                            <div class="form-group"><label for="mcq2">MCQ-2 Type Questions</label><input class="form-control" type="number" value=0 name="mcq2" placeholder="Enter number of MCQ (2 option) type questions" id="mcq2" /></div>
                                            <div class="form-group"><label for="mcq4">MCQ-4 Type Questions</label><input class="form-control" type="number" value=0 name="mcq4" placeholder="Enter number of MCQ (4 option) type questions" id="mcq4" /></div>
                                            <div class="form-group"><label for="integer">Integer Type Questions</label><input class="form-control" type="number" value=0 name="integer" placeholder="Enter number of integer type questions" id="integer" /></div>
                                            <button class="my-button" type="submit" style="width:6em; height:3em;">Submit</button>
                                        </form>
                                    </div>
                                    <br>
                                    <!-- <?php print_r($quizDetails) ?><br>
                                    <?php print_r($questionDetails) ?><br> -->

                                    <div style = "display:block; width = 100%;">
                                    <form action = "<?php echo base_url().adminpath.'/UpdateExam/inst'?>" method = "post">
                                    <label for = "instructions " style="display:block">Instructions</label>
                                    <input type = "text" name = "quizid" value="<?php echo $quizDetails->quizid?>" style = "display:none" />
                                    <textarea style="display:block; width=100% ;" rows = 5 name = "instructions"> <?php echo $quizDetails->instructions?></textarea>
                                    <button class = "btn btn-info" type = "submit"> Update </button>
                                    </form>    
                                </div>

                                    <form  enctype="multipart/form-data" id="sabka baap" method ="post" action="<?php echo base_url().adminpath.'/UpdateExam/updatequestions/' ?>" >
                                       <label>quiz id </label> <input id="quizid" name="quizid" style = "display:none" type="number" value="<?php echo $quizDetails->quizid?>"  />
                                    <?php
                                    $i = 0;
                                    foreach ($questionDetails as $ques) {
                                        echo  '<br><div class="media" style="padding:5%; width: 90%; word-wrap: break-word;">'.
                                              '<h4>Question Number. '.++$i.'</h4><br/><br/>'.
                                              '<label> Question :</label> <br><br>'.
                                              '<input name="qMCQ['.$i.'][qnstext]" type = "text" value = "'.$ques->qnstext.'"/>'.
                                              '<input style = "display:none" name="qMCQ['.$i.'][id]" type = "text" value = "'.$ques->quesid.'"/>'.
                                              '<a class = "btn btn-danger" style ="float:right" href = '.base_url().adminpath.'/UpdateExam/deleteQuestion/'.$quizDetails->quizid.'/'.$ques->quesid.'>Delete</a>';
                                              if($ques->options) {
                                                    echo '<br/><h5>Options</h5>';
                                                    $j=0;
                                                    foreach ($ques->options as $option) {
                                                        echo ' <label>Option'.$option->option_label.'</label>
                                                        <input style = "display:none" name="qMCQ['.$i.'][option]['.$j.'][id]" type = number value = "'.$option->optionid.'"/>
                                                        <br>
                                                        <input name="qMCQ['.$i.'][option]['.$j.'][text]" type = "text" value = "'.$option->text.'"/><br>';
                                                        ++$j;
                                                    }
                                                }
                                                echo '<br><label>Correct Option</label><br>';
                                                if(!is_numeric($ques->ayesha))
                                                { echo '<select name="qMCQ['.$i.'][correct]" id="corr_ans">';
                                                foreach($ques->options as $opt){
                                                    echo '<option ';
                                                    if(strcmp($ques->ayesha, $opt->option_label)==0){
                                                        echo ' selected ';
                                                    }
                                                    echo 'value="'.$opt->option_label.'">' .$opt->option_label.'</option>';
                                                }
                                                echo '</select><br></div><br/><hr/>';
                                            }
                                            else 
                                                echo '<input name="qMCQ['.$i.'][correct]" type = "number" value= "' .$ques->ayesha. '"/>';
                                    }
                                   ?>
                                   <br>
                                   <br>
                                   <br>

                                    <input class = "btn btn-info " type = "submit"  value  = "Save "/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" >
    function toggleDiv() {
        if(document.getElementById('getNoOfQuestions').style.display ==="none")
            document.getElementById('getNoOfQuestions').style.display = "block";
        else
            document.getElementById('getNoOfQuestions').style.display = "none";
    }
</script>