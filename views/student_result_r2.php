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
<section id="page-title" class="nobg nopadding" style="margin-left: 25%" >
    <div class="container clearfix center">
        <ul class="pagination ">
            <li class="active page-item">
                <a class="page-link" href="<?php echo base_url().'StudentResult/round1'; ?>" style="
                        font-size: calc(2px + 2vw);color:black; color:black;background-color: #ecf0f1 !important;">Round 1 <span class="sr-only">(current)</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'StudentResult/round2'; ?>" style="
                        font-size: calc(2px + 2vw); background-color: #FF7F27 !important; border-color: #FF7F27 !important;">Round 2</a>
            </li>
            <li class="page-item">
                <a class="page-link" id="overall" href="<?php echo base_url().'StudentResult/overall'; ?>" style="
                            font-size: calc(2px + 2vw); color:black;">
                    Overall </span>
                </a>
            </li>
        </ul>
    </div>
</section>





    <div class="container main1">
        <div class="row" id="myrow">
            <div class="col-sm col-xm-12 student_detail score_ranks">
                <p>Name of the Student:
               
                    <span><?php echo $_SESSION['studentlogged_in']['firstname'] . ' ' . $_SESSION['studentlogged_in']['lastname'] ?></span></p>
            </div>
            <div class="col-sm col-xm-12 student_detail score_ranks">
                <p>Student ID: <span> <?php echo $_SESSION['studentlogged_in']['registrationno'] ?></span></p>
            </div>
        </div>
        <div class="row" style="width: 100%; height: 100%;">
            <div class="col-md-5 col-sm-6 col-12 score_ranks">
                <div class="row overall_score" id="overall_score">Overall Score</div>
                <div class="row rank" id="overall_rank"> Rank </div>

            </div>
            <div class="col-md-6 col-sm-6 col-12 " id='lineGraph'>
                <div class="line_graph" id="lineGraph"></div>
            </div>
        </div>
        <span class="skill_header">Skill wise performance</span>
        <div class="row myskill" id="skill_blocks">
            <!-- <div class="col-sm-2 skill" id="analytical_skills">
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
            </div> -->

        </div>
    </div>

</div>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.google.com/jsapi?ext.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
let id = <?php echo $_SESSION['studentlogged_in']['registrationno'] ?> 
let level = <?php echo $_SESSION['studentlogged_in']['level'] ?> ;

$.ajax({
    url: 'https://api.intellify.in/api/GetRound2Result/' + id+'/'+level,
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
        var skills = data.rank;
        var count = 0;
        for(var key in skills){
            count++;
            var skill = key;
            console.log(skill);
            var div = 
            '<div class="col-sm-2 skill" id="skills">'+
              '  <p>'+ skill +'</p>'+
               ' <div class="row">'+
                '    <div class="col-sm skill_score" id="skill_'+skill.replace(/ /g,'')+'"> Score</div>'+
                 '   <div class="col-sm skill_rank" id="rank_'+skill.replace(/ /g,'')+'">Rank</div>'+
               ' </div>'+
                '<div class="col-sm ">'+
                    '<div class="bell_graph" id="bell_'+skill.replace(/ /g,'')+'"></div>'+
                    
                '</div>'+
                '<div class="row remarks" id="remarks_'+skill.replace(/ /g,'')+'">Remarks<br>-----</div>'+
            '</div> ';
            $('#skill_blocks').append(div);
        }


        for(var key in data.score){
            var id = '#skill_' + key;
            id = id.replace(/ /g,'');
            $(id).html('Score <br>' + data.score[key]);
        }
        for(var key in data.rank){
            var id = '#rank_' + key;
            id = id.replace(/ /g,'');
            $(id).html('Rank <br>' + data.rank[key]);
        }

        $('#overall_score').html('Overall Score <br>' + data.overall_score);
        $('#overall_rank').html('Overall Rank <br>' + data.overall_rank);

        //Bell Curve function
        var draw_bell_graph = (bell,percentile) => {
            var data;
            var options;
            let chart;
            var stndDev = 1;
            var mean = 0;
            let xMin = -4.1;
            let xMax = 4.1;
            let xLeft = -2;
            let xRight = 2;
            var limit = ((8*percentile)/100) - 4;

            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(prepareChart);

            function prepareChart() {
            data = new google.visualization.DataTable();
            setChartOptions();
            addColumns();
            addData();
            drawChart();
            }
            function setChartOptions() {
            options = { legend: "none" };
            options.hAxis = {};
            options.hAxis.minorGridlines = {};
            options.hAxis.minorGridlines.count = 5;
            
            options.title = "PERCENTILE IS " + percentile;
            return options;
            }
            function addColumns() {
            data.addColumn("number", "X Value");
            data.addColumn("number", "Y Value");
            data.addColumn({ type: "boolean", role: "scope" });
            data.addColumn({ type: "string", role: "style" });
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
                if(i <= limit){
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
        for(var key in percentile){
            var id = 'bell_' + key;
            id = id.replace(/ /g,'');
            var bell = document.getElementById(id);
            per = 100 * percentile[key];
            console.log(per,percentile[key]);
            // console.log(per)
            draw_bell_graph(bell,percentile[key]);
        }

        var overall_bell = document.getElementById("lineGraph");
        draw_bell_graph(overall_bell,data.score_percentile);

    }
});



</script>