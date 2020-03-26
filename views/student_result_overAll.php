<!-- <?php print_r($remarks) ?> -->
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

    <!-- <?php print_r($_SESSION) ?>  -->
<section id="page-title" class="nobg nopadding" style="margin-left: 25%;" >
    <div class="container clearfix center">
        <ul class="pagination ">
            <li class="active page-item">
                <a class="page-link" href="<?php echo base_url().'StudentResult/round1'; ?>" style="
                        font-size: calc(2px + 2vw); color:black;background-color: #ecf0f1 !important;">Round 1 </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'StudentResult/round2'; ?>" style="
                        font-size: calc(2px + 2vw); color:black;">Round 2</a>
            </li>
            <li class="page-item">
                <a class="page-link " id="overall" href="<?php echo base_url().'StudentResult/overall'; ?>" style="
                            font-size: calc(2px + 2vw); background-color: #FF7F27 !important; border-color: #FF7F27 !important;color:white !important">
                    Overall <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </div>
</section>


    <div class="container main1">
        <div class="row " id="myrow">
            <div class="col-sm col-xm-12 score_rank student_detail">
                <p>Name of the Student:
                    <span><?php echo $_SESSION['studentlogged_in']['firstname']. ' ' . $_SESSION['studentlogged_in']['lastname'] ?></span></p>
            </div>
            <div class="col-sm col-xm-12 student_detail score_rank">
                <p>Student ID: <span><?php echo $_SESSION['studentlogged_in']['registrationno'] ?></span></p>
            </div>
        </div>
        <div class="row" style="width: 100%; height: 100%;">
            <div class="col-sm-5 col-xm-12 score_rank">
                <div class="row overall_score" id="overall_score">Overall Score</div>
                <div class="row rank" id="overall_rank"> Rank </div>

            </div>
            <div class="col-md-6 col-sm-6 col-12 " id='lineGraph'>
                <div class="line_graph" id="lineGraph"></div>
            </div>
        </div>
        <!-- <div class="skill_header">Skill Wise Performance</div> -->
        <span class="skill_header">Skill wise performance</span>
        <div class="row myskill" id="skill_blocks" >
            <!-- <div class="col-sm-2 skill" id="analytical_skills">
                <p>Analytical Reasoning</p>
                <div class="row">
                    <div class="col-sm skill_score" id="skill_1"> Score</div>
                    <div class="col-sm skill_rank" id="rank_1">Rank</div>
                </div>
                <div class="col-sm bell_graph">
                    <div id="bell_1"></div>
                    
                </div>
                <div class="row remarks">Remarks<br>-----</div>
            </div> -->

        </div>
    </div>

</div>

<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.google.com/jsapi?ext.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script>
let id = <?php echo $_SESSION['studentlogged_in']['registrationno'] ?> ;
let level = <?php echo $_SESSION['studentlogged_in']['level'] ?> ;
let remarks = <?php echo json_encode($remarks)?>;
//skills
$.ajax({
    url: 'https://api.intellify.in/api/GetSkills/all',
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
        var count = 0;
        for(var key in data){
            count++;
            var skill = data[key];
            console.log(skill.replace(/ /g,''));
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
                '<div class="row remarks" id="remarks_'+skill.replace(/ /g,'')+'" >Remarks<br>----</div>'+
            '</div> ';
            $('#skill_blocks').append(div);
        }
        // console.log("this");
        // console.log($("#bell_VisualSpatialskills"));
        
    }
});

$.ajax({
    url: 'https://api.intellify.in/api/GetOverallSkillScores/' + id+'/'+level,
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
        for(var key in data){
            var id = '#skill_' + key;
            id = id.replace(/ /g,'');
            $(id).html('Percentage <br>' + Math.round(parseFloat(data[key])*100));
            // console.log(key,Math.round(parseFloat(data[key])*100))
            var id2 =  '#remarks_' + key;
            id = id2.replace(/ /g,'');
            var i = (Math.round(parseFloat(data[key])*100))/10;
            if(i == 10) i--;
            var ele = 'Remarks <br>'+remarks[i].remarks;
            $(id).html(ele);
        }
        

    }
});

$.ajax({
    url: 'https://api.intellify.in/api/GetOverAllSkillRanks/' + id+'/'+level,
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
        var skill_wise_rank = data.rank;
        for(var key in skill_wise_rank){
            var id = '#rank_' + key;
            id = id.replace(/ /g,'');
            $(id).html('Rank <br>' + skill_wise_rank[key]);
        }
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
        //Bell Curve for all skills
        var percentile = data.percentile;
        for(var key in percentile){
            var id = 'bell_' + key;
            id = id.replace(/ /g,'');
            var bell = document.getElementById(id);
            // console.log(bell,id);
            per = 100 * percentile[key];
            // console.log(per)
            draw_bell_graph(bell,per);
        }

        
        
    }
});
//OverallScore
$.ajax({
    url: 'https://api.intellify.in/api/GetOverallScore/' + id,
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
        $('#overall_score').html('Overall Score <br>' + jsonObject.overall_average_score);

    }
});
//OverAll Rank
$.ajax({
    url: 'https://api.intellify.in/api/GetOverAllRank/' + id+'/'+level,
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

    }
});
//All Result
$.ajax({
    url: 'https://api.intellify.in/api/GetAllResult/' + id,
    crossDomain: true,
    cors: true,
    async: true,
    dataType: 'json',
    type: "GET",
    success: function(jsonObject, status) {
        var data = jsonObject;
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
//GetPerformanceChart
$.ajax({
    url: 'https://api.intellify.in/api/GetPerformanceChart/' + id,
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
      
        function LineGraph(lineGraph, x1, y1) {
            var trace1 = {
                x: x1,
                y: y1,
                type: 'scatter'
            };

            var data = [trace1];
            var layout = {
                yaxis: {
                    title: 'Percentage',
                    range: [0, 100]
                },
                xaxis: {
                    title: 'Exam Name'
                },
                autosize: true,
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
                responsive: true,
                displayModeBar: false
            });
        };
        LineGraph(lineGraph, x, y);
    }
});



</script>