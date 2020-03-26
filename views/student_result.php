<div class="main">
    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <!-- <h2><?php echo $heading; ?> <small></small></h2> -->
                    </div>
                    <!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <?php

                                if (isset($breadcrumbs)) {

                                    $bi = 0;

                                    foreach ($breadcrumbs as $rw) {

                                        if ($bi > 0) {

                                            echo "";
                                        }

                                        echo "<li><a href='" . $rw['href'] . "'>" . $rw['text'] . "</a></li>";

                                        $bi++;
                                    }
                                }

                                ?>
                            </ol>
                        </div>
                        <!-- end bread -->
                    </div>
                    <!-- /.pull-right -->
                </div>
                <!-- end clearfix -->
            </div>
        </div>
        <!-- end page-title -->
    </div>





    <div class="container">
        <div class="row" id="myrow">
            <div class="col-sm col-xm-12 student_detail">
                <p>Name of the Student:
                    <span><?php echo $studentinfo->firstname . ' ' . $studentinfo->lastname ?></span></p>
            </div>
            <div class="col-sm col-xm-12 student_detail">
                <p>Student ID: <span><?php echo $studentinfo->registrationno ?></span></p>
            </div>
        </div>
        <div class="row" style="width: 100%; height: 100%;">
            <div class="col-sm-5 col-xm-12">
                <div class="row overall_score" id="overall_score">Overall Score</div>
                <div class="row rank" id="overall_rank"> Rank </div>

            </div>
            <div class="col-sm-6 line_graph" id='lineGraph'></div>
        </div>
        <span class="skill_header">Skill wise performance</span>
        <div class="row myskill">
            <div class="col-sm-2 skill" id="analytical_skills">
                <p>Analytical Reasoning</p>
                <div class="row">
                    <div class="col-sm skill_score" id="skill_1"> Score</div>
                    <div class="col-sm skill_rank" id="rank_1">Rank</div>
                </div>
                <div class="col-sm bell_graph">
                    <div id="bell_1"></div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="row remarks">Remarks<br>-----</div>
            </div>

            <div class="col-sm-2 skill" id="quantitative_amplitude">
                <p> Quantitative Amplitude</p>
                <div class="row">
                    <div class="col-sm skill_score" id="skill_2"> Score</div>
                    <div class="col-sm skill_rank" id="rank_2">Rank</div>
                </div>
                <div class="col-sm bell_graph">
                    <div id="bell_2"></div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="row remarks">Remarks<br>-----</div>
            </div>

            <div class="col-sm-2 skill" id="memory_speed_index">
                <p>Memory Speed Index</p>
                <div class="row">
                    <div class="col-sm skill_score" id="skill_3"> Score</div>
                    <div class="col-sm skill_rank" id="rank_3">Rank</div>
                </div>
                <div class="col-sm bell_graph">
                    <div id="bell_3"></div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="row remarks">Remarks<br>-----</div>
            </div>

            <div class="col-sm-2 skill" id="visual_spatial_skills">
                <p> Visual Spatial Skills</p>
                <div class="row">
                    <div class="col-sm skill_score" id="skill_4"> Score</div>
                    <div class="col-sm skill_rank" id="rank_4">Rank</div>
                </div>
                <!-- <div class="row "> -->
                <div class="col-sm bell_graph">
                    <div id="bell_4"></div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="row remarks"> Remarks<br>-----</div>
            </div>

            <div class="col-sm-2 skill" id="verbal_comprehension">
                <p>Verbal Comprehension</p>
                <div class="row">
                    <div class="col-sm skill_score" id="skill_5"> Score</div>
                    <div class="col-sm skill_rank" id="rank_5">Rank</div>
                </div>
                <div class="col-sm bell_graph">
                    <div id="bell_5"></div>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="row remarks">Remarks<br>-----</div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.google.com/jsapi?ext.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
let id = <?php echo $studentinfo->registrationno; ?> ;
$.ajax({
    url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetOverallScore/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    //data: {
    //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
    //},

    success: function(jsonObject, status) {
        var data = jsonObject;
        $('#overall_score').html('Overall Score <br>' + jsonObject.overall_average_score[0]);
        //console.log(jsonObject);

    }
});

$.ajax({
    url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetOverAllRank/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    //data: {
    //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
    //},

    success: function(jsonObject, status) {
        var data = jsonObject;
        $('#overall_rank').html('Overall Rank <br>' + jsonObject.overall_rank);
        //console.log(jsonObject);

    }
});

$.ajax({
    url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetAllResult/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    success: function(jsonObject, status) {
        var data = jsonObject;
        //console.log(data.key);
        if (Object.keys(data).length === 1) {

            var div = document.getElementById('overall_rank');
            div.style.backgroundColor = 'black';

        } else {
            var latest_score = jsonObject[Object.keys(data)[Object.keys(data).length - 1]].total_score;
            var sec_last_key = jsonObject[Object.keys(data)[Object.keys(data).length - 2]].total_score;

            if (latest_score >= sec_last_key) {
                var div = document.getElementById('overall_rank');
                div.style.backgroundColor = 'green';
            } else {
                var div = document.getElementById('overall_rank');
                div.style.backgroundColor = 'red';
            }
        }
    }
});

$.ajax({
    url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetPerformanceChart/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    //data: {
    //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
    //},

    success: function(jsonObject, status) {

        var lineGraph = document.getElementById('lineGraph');
        var data = jsonObject;
        var x = jsonObject.x;
        var y = jsonObject.y;
        // for(let i = 0; i < Object.keys(data).length; i++){
        //   x.push(Object.keys(data)[i]);
        //   y.push(jsonObject[Object.keys(data)[i]]);
        // }

        console.log(x);

        console.log(y);

        // function for line graph
        function LineGraph(lineGraph, x1, y1) {
            var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter'
            };
            // console.log(json_data.x);

            var data = [trace1];
            var layout = {
                yaxis: {
                    title: 'Overall Score',
                    range: [0, 200]
                },
                xaxis: {
                    title: 'Exam Name'
                },
                autosize: false,
                width: 500,
                height: 300,
                margin: {
                    l: 50,
                    r: 30,
                    b: 50,
                    t: 30,
                    pad: 0
                },
                paper_bgcolor: '#ffffff',
                plot_bgcolor: '#ffffff',
                title: 'Overall Performance Chart'
            };
            Plotly.newPlot(lineGraph, data, layout, {
                responsive: true
            });
        };
        LineGraph(lineGraph, x, y);
    }
});

$.ajax({
    url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetOverallSKillScores/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    //data: {
    //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
    //},

    success: function(jsonObject, status) {
        var data = jsonObject;
        $('#skill_1').html('Score <br>' + jsonObject.skill_1_score);
        $('#skill_2').html('Score <br>' + jsonObject.skill_2_score);
        $('#skill_3').html('Score <br>' + jsonObject.skill_3_score);
        $('#skill_4').html('Score <br>' + jsonObject.skill_4_score);
        $('#skill_5').html('Score <br>' + jsonObject.skill_5_score);

        //console.log(jsonObject);

    }
});

$.ajax({
    url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetOverAllSkillRanks/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    //data: {
    //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
    //},

    success: function(jsonObject, status) {
        var data = jsonObject;
        var skill_1_pro = (1 - jsonObject.overall_skill_1_proficiency) * 100;
        var skill_2_pro = (1 - jsonObject.overall_skill_2_proficiency) * 100;
        var skill_3_pro = (1 - jsonObject.overall_skill_3_proficiency) * 100;
        var skill_4_pro = (1 - jsonObject.overall_skill_4_proficiency) * 100;
        var skill_5_pro = (1 - jsonObject.overall_skill_5_proficiency) * 100;

        $('#rank_1').html('Rank <br>' + jsonObject.overall_skill_1_rank);
        $('#rank_2').html('Rank <br>' + jsonObject.overall_skill_2_rank);
        $('#rank_3').html('Rank <br>' + jsonObject.overall_skill_3_rank);
        $('#rank_4').html('Rank <br>' + jsonObject.overall_skill_4_rank);
        $('#rank_5').html('Rank <br>' + jsonObject.overall_skill_5_rank);
        $('#bell_1').html('Percentile <br>' + Math.round(skill_1_pro));
        $('#bell_2').html('Percentile <br>' + Math.round(skill_2_pro));
        $('#bell_3').html('Percentile <br>' + Math.round(skill_3_pro));
        $('#bell_4').html('Percentile <br>' + Math.round(skill_4_pro));
        $('#bell_5').html('Percentile <br>' + Math.round(skill_5_pro));

        //console.log(jsonObject);
        var pro_array = [skill_1_pro, skill_2_pro, skill_3_pro, skill_4_pro, skill_5_pro];
        var id_array = ['analytical_skills', 'quantitative_amplitude', 'memory_speed_index',
            'visual_spatial_skills', 'verbal_comprehension'
        ];


        for (var j = 0; j < pro_array.length; j++) {

            var y = Math.ceil(pro_array[j] / 20);
            var query = '#' + id_array[j] + ' .bell_graph .fa-star';

            var st = document.querySelectorAll(query);

            for (let i = 0; i < y; i++) {
                st[i].className = "fa fa-star checked_" + (y).toString();
                console.log(st[i].className);
            }
        }
    }
});
</script>