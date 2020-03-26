<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
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

                                <div class="container col-12 col-sm-6 col-md-6 site-form" id="admin-add-exam">
                                    <form id="my-form" action="<?php echo $action ?>" method="post">
                                        <div class="form-group"><label for="quiztitle">Quiz Title</label><input class="form-control" type="text" name="title" placeholder="Enter Quiz Title" autofocus id="title" /></div>
                                        <div class="form-group"><label for="mcq2">MCQ-2 Type Questions</label><input class="form-control" type="number" value=0 name="mcq2" placeholder="Enter number of MCQ (2 option) type questions" id="mcq2" /></div>
                                        <div class="form-group"><label for="mcq4">MCQ-4 Type Questions</label><input class="form-control" type="number" value=0 name="mcq4" placeholder="Enter number of MCQ (4 option) type questions" id="mcq4" /></div>
                                        <div class="form-group"><label for="integer">Integer Type Questions</label><input class="form-control" type="number" value=0 name="integer" placeholder="Enter number of integer type questions" id="integer" /></div>

                                        <div class="form-group"><label for="correct_marks">Marks for correct answer</label><input class="form-control" type="number" name="correct" required placeholder="Enter marks to be alloted for correct answer" id="correct" /></div>
                                        <div class="form-group"><label for="incorrect_marks">Marks for incorrect answer</label><input class="form-control" type="number" name="wrong" required placeholder="Enter marks to be alloted for incorrect answer" id="wrong" /></div>

                                        <div class="form-group"><label for="duration">Time Duration (Minutes)</label><input class="form-control" type="number" name="time" required placeholder="Enter time duration for the exam" id="time" /></div>
                                        <div class="form-group">
                                            <label for="instructions">Instructions</label>
                                            <textarea class="form-control" name="instructions" rows="10" cols="50" required id="instructions">
                    </textarea>
                                        </div>
                                        <div class="form-group"><label for="examlevel">Quiz Level</label><input class="form-control" type="number" name="level" required placeholder="Enter exam level" id="level" /></div>

                                        <div class="form-group"><label for="belongsto">Quiz belongs to</label>
                                            <select class="form-control" name="belongs_to" required id="belongsto" onchange="myFunction()">
                                                <option value="" selected disabled hidden>Choose</option>
                                                <option value=1>Round 2</option>
                                                <option value=2>Weekly Quiz</option>
                                            </select>
                                        </div>
                                        <div class="form-group"><label for="skillname">Skill Name</label>
                                            <select class="form-control" name="skill_id" required id="skill_name">
                                                <!-- <?php
                                                        foreach ($skills as $skill) {
                                                            echo "<option value=" . $skill->skill_id . " >" . $skill->skill_name . "</option>";
                                                        }
                                                        ?> -->
                                            </select>
                                        </div>
                                        <div class="form-group" id="diff">
                                            <input name="difficulty_index" type="hidden" value="3" required id="difficulty_index" class="form-control">
                                        </div>
                                        <button class="my-button" type="submit"><b>Submit</b></button>
                                    </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let skills = <?php echo json_encode($skills) ?>;
    console.log(skills);

    function myFunction() {
        var x = document.getElementById("belongsto").value;
        if (x == 1) {
            $("#diff").html('<input name="difficulty_index" type="hidden" value="3" required id="difficulty_index" class="form-control">');
            document.getElementById("skill_name").options.length = 0;
            for (var key in skills) {
                if (skills[key].round == 2) {
                    select = document.getElementById('skill_name');
                    var opt = document.createElement('option');
                    opt.value = skills[key].skill_id;
                    opt.innerHTML = skills[key].skill_name;
                    select.appendChild(opt);
                }
            }
        } else if (x == 2) {
            var newElement = '<label>Difficulty Index</label><input name="difficulty_index" required id="difficulty_index" class="form-control">';
            $("#diff").html($(newElement));
            document.getElementById("skill_name").options.length = 0;
            for (var key in skills) {
                if (skills[key].round == 3 || skills[key].round == 2 || skills[key].round == 1) {
                    select = document.getElementById('skill_name');
                    var opt = document.createElement('option');
                    opt.value = skills[key].skill_id;
                    opt.innerHTML = skills[key].skill_name;
                    select.appendChild(opt);
                }
            }

        }
    }
</script>