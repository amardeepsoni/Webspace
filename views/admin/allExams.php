
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
                                <h3><?php echo $heading; ?></h3>
                                <!-- <?php print_r($skills) ?> -->

                                    <table>
                                        <thead>
                                            <tr style="height:46px;">
                                                <th style="width:15%">Title</th>
                                                <th style="width:5%">Status</th>
                                                <th style="width:5%">Time Limit</th>
                                                <th style="width:5%">Skill</th>
                                                <th style="width:5%">Level</th>
                                                <th style="width:5%">Total Questions</th>
                                                <th style="width:5%">Belongs To</th>
                                                <th style="width:5%">Date Added</th>
                                                <th style="width:5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            if($allExams){
                                                foreach ($allExams as $exam) {

                                                    switch ($exam->belongs_to) {
                                                        case 0: $exam->belongs_to = 'Round 1';
                                                                break;
                                                        case 1: $exam->belongs_to = 'Round 2';
                                                                break;
                                                        case 2: $exam->belongs_to = 'Weekly Quiz';
                                                                break;
                                                        default: $exam->belongs_to = null;
                                                    }

                                                    if($exam->status) {
                                                       echo '<tr style="height:46px; border-top: 1px solid #cacaca;">'.
                                                            '<td style="width:15%">'.$exam->title.'</td>'.
                                                            '<td style="width:5%">'.'Enabled'.'</td>'.
                                                            '<td style="width:5%">'.$exam->time.' min'.'</td>'.
                                                            '<td style="width:5%">'.$exam->skill_name.'</td>'.
                                                            '<td style="width:5%">'.$exam->level.'</td>'.
                                                            '<td style="width:5%">'.$exam->total.'</td>'.
                                                            '<td style="width:5%">'.$exam->belongs_to.'</td>'.
                                                            '<td style="width:5%">'.$exam->date.'</td>'.
                                                            '<td style="width:10%">'.
                                                                '<a type="button" class="btn btn-info" href='.base_url().adminpath.'/EditExam/'.$exam->quizid.'><abbr title="Edit"><i class="fa fa-pencil"></i></abbr></a>'.
                                                                '<a type="button" class="btn btn-warning" href='.base_url().adminpath.'/UpdateExam/disable/'.$exam->quizid.'><abbr title="Disable"><i class="fa fa-eye-slash"></i></abbr></a>'.
                                                                '<a type="button" class="btn btn-primary" href = "'. base_url().adminpath.'/UpdateExam/clone/'.$exam->quizid.'" ><abbr title="Clone"><i class="fa fa-clone"></i></abbr></a>'.
                                                                '<a type="button" class="btn btn-danger" href='.base_url().adminpath.'/UpdateExam/remove/'.$exam->quizid.'><abbr title="Remove"><i class="fa fa-trash"></i></abbr></a>'.
                                                                // '<a href='.base_url().adminpath.'/UpdateExam/clone/'.$exam->quizid.'> Clone </a>'.
                                                                //'<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal'. $exam->quizid.'">clone</button>'.                                                                
                                                            '</tr>';
                                                    }
                                                    else {
                                                        echo '<tr style="height:46px; border-top: 1px solid #cacaca;">'.
                                                        '<td style="width:15%">'.$exam->title.'</td>'.
                                                        '<td style="width:5%">'.'Disabled'.'</td>'.
                                                        '<td style="width:5%">'.$exam->time.' min'.'</td>'.
                                                        '<td style="width:5%">'.$exam->skill_name.'</td>'.
                                                        '<td style="width:5%">'.$exam->level.'</td>'.
                                                        '<td style="width:5%">'.$exam->total.'</td>'.
                                                        '<td style="width:5%">'.$exam->belongs_to.'</td>'.
                                                        '<td style="width:5%">'.$exam->date.'</td>'.
                                                        '<td style="width:10%">'.
                                                            '<a type="button" class="btn btn-info" href='.base_url().adminpath.'/EditExam/'.$exam->quizid.'><abbr title="Edit"><i class="fa fa-pencil"></i></abbr></a>'.
                                                            '<a type="button" class="btn btn-success" href='.base_url().adminpath.'/UpdateExam/enable/'.$exam->quizid.'><abbr title="Enable"><i class="fa fa-eye"></i></abbr></a>'.
                                                            '<a type="button" class="btn btn-primary" href = "'. base_url().adminpath.'/UpdateExam/clone/'.$exam->quizid.'" ><abbr title="Clone"><i class="fa fa-clone"></i></abbr></a>'.
                                                            '<a type="button" class="btn btn-danger" href='.base_url().adminpath.'/UpdateExam/remove/'.$exam->quizid.'><abbr title="Remove"><i class="fa fa-trash"></i></abbr></a>'.
                                                            '</tr>';
                                                    }
                                                 }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script>
    let skills = <?php echo json_encode($skills) ?>;
    console.log(skills);
    function myFunction() {
       var v = document.getElementsByName("belongsto");
       for(var i = 0; i < v.length;i++){
           console.log("this ");
           if(v[i].value!=-1)
                {console.log(v[i].value);
                x = v[i].value;
                break;
                }
        }
       console.log("helllllllllllloooooooooooo");
       console.log(x);
       var elems = document.getElementsByName('skill_name');
                    console.log('all');
                    console.log(elems);

        if(x == 1){
            // $("#diff").html('<input name="difficulty_index" type="hidden" value="3" required id="difficulty_index" class="form-control">');
            // document.getElementsByName("skill_name").options.length = 0;
            for(var key in skills){
                if(skills[key].round == 2){
                    var opt = document.createElement('option');
                    opt.value = skills[key].skill_id;
                    opt.innerHTML = skills[key].skill_name;
                    for(var i=0;i<elems.length;i++){
                        var select = elems[i];
                        select.appendChild(opt);
                    }
                }
            }
        }
        else if(x == 2){
            // var newElement = '<label>Difficulty Index</label><input name="difficulty_index" required id="difficulty_index" class="form-control">';
            // $("#diff").html( $(newElement) );
            // document.getElementsByName("skill_name").options.length = 0;
            for(var key in skills){
                if(skills[key].round == 3 || skills[key].round == 2 || skills[key].round == 1 ){
                    select = document.getElementsByName('skill_name');
                    var opt = document.createElement('option');
                    opt.value = skills[key].skill_id;
                    opt.innerHTML = skills[key].skill_name;
                    select.appendChild(opt);
                }
            }
        }
    }
</script>