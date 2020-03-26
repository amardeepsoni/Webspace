<!--
    'help' table entry for logged in user available $skillWiseScores array
    rank from 'tab1' available as $rank
    marks distribution from 'tab3' available as $distribution 
    'tab3' available as $skillsData 
-->
<style>
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #f2a6a6;
    }

    .table-striped>tbody>tr:nth-child(even)>td,
    .table-striped>tbody>tr:nth-child(even)>th {
        background-color: #badfdb;
    }

    #page-content-wrapper {
        position: absolute;
        top: 0;
    }

    @media screen and (max-width : 481px) {
        .section.nobg {
            display: none;
        }

        #popupimg {
            width: 88vw;
        }

        #myrow {
            padding-top: 5em;
        }
    }
</style>

<div class="main" style="justify-content:center">
    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2><?php echo $heading; ?> <small></small></h2>
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
    <section id="page-title" class="nobg nopadding" style="margin-left: 25%;">
        <div class="container clearfix center">
            <!-- <ul class="pagination ">
                <li class="active page-item">
                    <a class="page-link" href="<?php echo base_url() . 'StudentResult/round1'; ?>" style="
                        font-size: calc(2px + 2vw); background-color: #FF7F27 !important; border-color: #FF7F27 !important;">Round 1 <span class="sr-only">(current)</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?php echo base_url() . 'StudentResult/round2'; ?>" style="
                        font-size: calc(2px + 2vw); color:black;">Round 2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" id="overall" href="<?php echo base_url() . 'StudentResult/overall'; ?>" style="
                            font-size: calc(2px + 2vw); color:black;">
                        Overall </span>
                    </a>
                </li>
            </ul> -->
        </div>
    </section>

    <div class="container main1">
        <div class="row" id="myrow">
            <div class="col-sm col-xm-12 student_detail score_ranks">
                <p>Name of the Student:
                    <span><?php echo $firstname?> <?php echo $lastname?></span></p>
            </div>
            <div class="col-sm col-xm-12 student_detail score_rank">
                <p>Student ID: <span> <?php echo $studentid?> </span></p>

            </div>
        </div>
        <div class="row" style="justify-content:center">
            <div class="col-sm-6 col-xm-6 score_rank">
                <div class="row overall_score" id="overall_score" style="width:100%">Overall Score</div>
                <div class="row rank text-center" id="overall_rank" style="width:100%"> School Rank <br> <?php echo $schoolRank ?> </div>
            </div>
            <div class="col-md-6 col-sm-6" id='skillTable'>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <h2 class="text-center">Distribution of Students<h2>
                        <div style="max-width:100%; max-height:90%">
                            <div id="columnchart_div"></div>
                        </div>
            </div><br>
            <div class="col-sm-6 col-md-6" id="lineGraph">
                <h2 class="text-center">Remarks</h2>
                <div style="margin-top:30%">
                    <?php foreach ($remarks as $remark) {    ?>
                        <h4 style="text-align:center; display:none" id="<?php echo $remark['upper_bound'] ?>">
                            <?php echo $remark['remarks']   ?>
                        </h4>
                    <?php } ?>
                    <br>
                    <?php if($qualified){ ?>
                       <h4 style="text-align:center">Congratulations! You've qualified for the next round</h4>
                    <?php } else { ?>
                        <h4 style="text-align:center">You couldn't qualify for the next round. Keep practicing and improving!</h4>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="skill_blocks" style="padding-top:10em;flex-wrap:wrap">

</div>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.google.com/jsapi?ext.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="percentile" data=""></div>
<script>
    let id = <?php echo $studentid ?>;
    let level = <?php echo $studentlevel ?>;
    $.ajax({
        url: 'https://api.intellify.in/api/GetRound1Result/' + id + '/' + level,
        crossDomain: true,
        cors: true,
        async: false,
        dataType: 'json',
        type: "GET",

        success: function(jsonObject, status) {
            var data = jsonObject;
            var skills = data.rank;
            var count = 0;
            document.getElementById("percentile").setAttribute("data", data.score_percentile)
            var percentile = document.getElementById("percentile").getAttribute("data");
            for (i = 0; i < 100; i += 10) {
                if (data.score_percentile > i && data.score_percentile < (i + 10)) {
                    document.getElementById(i+10).style.display = 'block';
                }
            }
            for (var key in skills) {
                count++;
                var skill = key;
                var div = `<hr>
                        <h2>${skill}</h2>
                        <div class="row">
                            <div class="col-sm-3 col-md-3" style="font-size:1.2em">
                                <br>
                                <div class="col-sm col-md skill_score" style="height:30%">
                                    <div class="text-center" style="width:100%; height:50%;">Score</div>
                                    <div class="text-center" style="width:100%; height:50%" id="skill_${skill.replace(/ /g, '')}"></div>
                                </div>
                                <!-- <div class="col-sm col-md skill_rank" style="height:30%">
                                    <div class="text-center" style="width:100%; height:50%">Rank</div>
                                    <div class="text-center" style="width:100%; height:50%" id="rank_${skill.replace(/ /g, '')}"}"></div>
                                </div>  -->
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div id="skillchart_div${count}" style="height:100%"></div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <br>
                                <div class="bell_graph text-center" style="justify-content:center" id="bell_${skill.replace(/ /g, '')}"></div>
                            </div>
                            
                        </div>
                        `
                $('#skill_blocks').append(div);
            }
            for (var key in data.score) {
                var id = '#skill_' + key;
                id = id.replace(/ /g, '');
                $(id).html(data.score[key]);
            }
            // for (var key in data.rank) {
            //     var id = '#rank_' + key;
            //     id = id.replace(/ /g, '');
            //     $(id).html(data.rank[key]);
            // }

            $('#overall_score').html('Overall Score <br>' + data.overall_score);
            // $('#overall_rank').html('Overall Rank <br>' + data.score_rank);

            //Bell Curve function
            var draw_bell_graph = (bell, percentile) => {
                var data;
                var options;
                let chart;
                var stndDev = 1;
                var mean = 0;
                let xMin = -4.1;
                let xMax = 4.1;
                let xLeft = -2;
                let xRight = 2;
                var limit = ((8 * percentile) / 100) - 4;

                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(prepareChart);

                function prepareChart() {
                    data = new google.visualization.DataTable();
                    setChartOptions();
                    addColumns();
                    addData();
                    drawChart();
                }

                function setChartOptions() {
                    options = {
                        legend: "none"
                    };
                    options.hAxis = {};
                    options.width = 350;
                    options.height = 300;
                    options.hAxis.minorGridlines = {};
                    options.hAxis.minorGridlines.count = 5;
                    options.title = "PERCENTILE IS " + percentile.toFixed(2);
                    return options;
                }

                function addColumns() {
                    data.addColumn("number", "X Value");
                    data.addColumn("number", "Y Value");
                    data.addColumn({
                        type: "boolean",
                        role: "scope"
                    });
                    data.addColumn({
                        type: "string",
                        role: "style"
                    });
                }

                function addData() {
                    data.addRows(createArray(xMin, xMax, xLeft, xRight, mean, stndDev));
                }

                function createArray(xMin, xMax, xLeft, xRight, mean, stndDev) {
                    let chartData = new Array([]);
                    let index = 0;
                    for (var i = xMin; i <= xMax; i += 0.1) {
                        chartData[index] = new Array(4);
                        chartData[index][0] = i;
                        chartData[index][1] = NormalDensityZx(i, mean, stndDev);
                        if (i < xLeft || i > xRight) {
                            chartData[index][2] = false;
                        }
                        if (i <= limit) {
                            chartData[index][3] =
                                "opacity: 1; + color: #8064A2; + stroke-color: black; ";
                        }


                        index++;
                    }
                    return chartData;
                }

                function drawChart() {
                    chart = new google.visualization.AreaChart(bell);
                    chart.draw(data, options);
                }

                function NormalDensityZx(x, Mean, StdDev) {
                    var a = x - Mean;
                    return Math.exp(-(a * a) / (2 * StdDev * StdDev)) / (Math.sqrt(2 * Math.PI) * StdDev);
                }
            }
            var percentile = data.percentile;
            for (var key in percentile) {
                var id = 'bell_' + key;
                id = id.replace(/ /g, '');
                var bell = document.getElementById(id);
                per = 100 * percentile[key];
                draw_bell_graph(bell, percentile[key]);
            }

            // var overall_bell = document.getElementById("lineGraph");
            // draw_bell_graph(overall_bell, data.score_percentile);

            var total = {
                "Analytical Reasoning": 40,
                "Verbal Reasoning": 40,
                "Lateral Thinking": 20,
                "Quantitative Reasoning": 40,
                "Visual Spatial Skills": 40
            };

            function drawTable() {
                let containerDiv = document.getElementById('skillTable')
                let html = `
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Skill</th>
                                    <th>Performance Index</th>
                                </tr>
                            `
                for (skill in skills) {
                    console.log(data.score[skill]+"t"+total[skill])
                    html += `
                            <tr>
                                <td>${skill}</td>
                                <td>${data.score[skill]/total[skill]}</td>
                            </tr>
                            `
                }
                html += '<table>'
                containerDiv.innerHTML = html;
            }
            drawTable();
        }
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });

    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        /**************************************** PIE CHART - Skill Distribution ************************************/
        var skill_1 = <?php echo $skillWiseScores['skill_3_score'] ?>;
        var skill_2 = <?php echo $skillWiseScores['skill_4_score'] ?>;
        var skill_3 = <?php echo $skillWiseScores['skill_2_score'] ?>;
        var skill_4 = <?php echo $skillWiseScores['skill_1_score'] ?>;
        var skill_5 = <?php echo $skillWiseScores['skill_5_score'] ?>;

        var data = new google.visualization.DataTable()
        data.addColumn('string', 'Skills');
        data.addColumn('number', 'Score');
        data.addRows([
            ['Skill_1', skill_1],
            ['Skill_2', skill_2],
            ['Skill_3', skill_3],
            ['Skill_4', skill_4],
            ['Skill_5', skill_5]
        ]);

        var options = {
            'title': 'Your Score',
            'width': 400,
            'height': 300
        };

        // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        // chart.draw(data, options);

        /*********************************************************************************************************/
        /*************************COLUMN CHART - Student Distribution ********************************************/

        var intervals = [],
            i = 0;
        <?php foreach ($distribution as $interval) { ?>
            intervals[i++] = <?php echo $interval['percentage'] ?>;
        <?php } ?>
        var arr = [];

        var flag = true;
        for (i = 0; i < 10; i++) {
            if (percentile < (i + 1) * 10 && flag) {
                arr.push([(i + 1) * 10 + '', intervals[i], "green"])
                flag = false;
            } else {
                arr.push([(i + 1) * 10 + '', intervals[i], "blue"])
            }
        }
        var data = google.visualization.arrayToDataTable([
            ["Interval", "Percentage marks", {
                role: "style"
            }], ...arr
        ]);
        var options = {
            title: "",
            width: 400,
            height: 300,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_div'));
        chart.draw(data, options);
        /******************************************************************************************************/
        var skill_correct = [];
        var skill_incorrect = [];
        skill_correct[0] = <?php echo $skillsData['skill_3_correct'] ?>;
        skill_incorrect[0] = <?php echo $skillsData['skill_3_incorrect'] ?>;

        skill_correct[1] = <?php echo $skillsData['skill_4_correct'] ?>;
        skill_incorrect[1] = <?php echo $skillsData['skill_4_incorrect'] ?>;

        skill_correct[2] = <?php echo $skillsData['skill_2_correct'] ?>;
        skill_incorrect[2] = <?php echo $skillsData['skill_2_incorrect'] ?>;

        skill_correct[3] = <?php echo $skillsData['skill_1_correct'] ?>;
        skill_incorrect[3] = <?php echo $skillsData['skill_1_incorrect'] ?>;

        skill_correct[4] = <?php echo $skillsData['skill_5_correct'] ?>;
        skill_incorrect[4] = <?php echo $skillsData['skill_5_incorrect'] ?>;


        for (i = 1; i <= skill_correct.length; i++) {
            var data = new google.visualization.DataTable()
            data.addColumn('string', 'Skills');
            data.addColumn('number', 'Correct');
            data.addRows([
                ['Correct', skill_correct[i - 1]],
                ['Incorrect', skill_incorrect[i - 1]]
            ]);

            var options = {
                'title': '',
                'width': 400,
                'height': 300
            };
            var chart = new google.visualization.PieChart(document.getElementById('skillchart_div' + i));
            chart.draw(data, options);
        }

        var data = new google.visualization.DataTable()
        data.addColumn('string', 'Skills');
        data.addColumn('number', 'Score');
        data.addRows([
            ['Skill_1', skill_1],
            ['Skill_2', skill_2],
            ['Skill_3', skill_3],
            ['Skill_4', skill_4],
            ['Skill_5', skill_5]
        ]);

        var options = {
            'title': 'Your Score',
            'width': 400,
            'height': 300
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>