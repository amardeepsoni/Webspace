<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <div class="right_col" role="main">
            <div class="section">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="register-widget clearfix">
                            <div class="widget-title">
                                <h3>Cloning</h3>

                                <br>

                                <div class="form-group">
                                    <form method="post" action="<?php echo base_url().adminpath.'/UpdateExam/funclone/'.$exam->quizid ?>">
                                        <label style="display:">id</label>
                                        <input type="number" disabled value="'. $exam->quizid.'" style="display:" />
                                        <br>
                                        <label>Title</label>
                                        <input type="text" name="title" value="<?php echo $exam->title ?>" />
                                        <br>
                                        <label>level</label>
                                        <select name="level">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <label>Belongs to</label>
                                        <select name="belongsto" id = "belongsto" onchange="myFunction()">
                                            <option value=-1 selected hidden disabled>Choose</option>
                                            <option value=2>Weekly quiz</option>
                                            <option value=1>Round 2</option>
                                        </select>
                                        <label>Skill</label>
                                        <select name="skill_name" id="skill_name">
                                        </select>
                                        
                                        <input type="submit" value="Clone" />
                                    </form>
                                </div>

                                <!-- =========================================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let skills = <?php echo json_encode($skills) ?>;
    console.log(skills);

    function myFunction() {
        var x = document.getElementById("belongsto").value;
        if (x == 1) {
            // $("#diff").html('<input name="difficulty_index" type="hidden" value="3" required id="difficulty_index" class="form-control">');
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
            // var newElement = '<label>Difficulty Index</label><input name="difficulty_index" required id="difficulty_index" class="form-control">';
            // $("#diff").html($(newElement));
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