<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/result/css/school_result.css">
<div class = "main">
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

              if(isset($breadcrumbs)) {

                $bi=0;

                foreach($breadcrumbs as $rw) {

                  if($bi>0) {

                    echo "";

                  }

                  echo "<li><a href='".$rw['href']."'>".$rw['text']."</a></li>";

                $bi++;}

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
  
<section id="page-title" class="nobg nopadding" style="margin-left: 24%;" >
    <div class="container clearfix center">
        <ul class="pagination ">
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'Result/round1'; ?>" style="
                        font-size: calc(2px + 2vw); color:black;">Round 1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'Result/round2'; ?>" style="
                        font-size: calc(2px + 2vw); color:black;">Round 2</a>
            </li>
            <li class="active  page-item">
                <a class="page-link" href="<?php echo base_url().'Result/overall'; ?>" style="
                            font-size: calc(2px + 2vw);background-color: #FF7F27 !important; border-color: #FF7F27 !important;">
                    Overall <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </div>
</section>


            


<div class="container">
  <div class="row" id="myrow">
    <div class="col-sm col-xm-12 student_detail">
    <p>Name of the School: <span><?php echo $_SESSION['schoollogged_in']['name'] ?></span></p>
      </div>
      <div class="col-sm col-xm-12 student_detail">
      <p>School ID: <span><?php echo $_SESSION['schoollogged_in']['id'] ?></span></p>
      </div>
  </div>
  <div class="row" >
    <div class="col-lg-5 col-md-12 ">
        <div class="row overall_score" id="overall_score">Average Overall Score</div>
              <p id="rank_title">Leader Board</p>
              <!-- <label class="radio-inline"><input type="radio" name="optradio" checked> Level 1</label>
              <label class="radio-inline"><input type="radio" name="optradio">Level 2</label>
              <label class="radio-inline"><input type="radio" name="optradio">Level 3</label>
              <label class="radio-inline"><input type="radio" name="optradio" checked>Level 4</label>
              <label class="radio-inline"><input type="radio" name="optradio">Level 5</label> -->
              <!-- <div class="row"> -->
                <div style="width:100%"> 
                  <button class="skill_button" id="skill_button_1">Level 0</button>
                  <button class="skill_button" id="skill_button_2">Level 1</button>
                  <button class="skill_button" id="skill_button_3">Level 2</button>
                  <button class="skill_button" id="skill_button_4">Level 3</button>
                <!-- </div> -->
            </div>
        <div class="row rank " id="overall_rank">
              <table id="table" style="width:100%">
                <tr>
                  <th>Student Name</th>
                  <th>Percentile</th>
                  <th>Overall Rank</th>
                </tr>
                <tr>
                  <td id="1_name">--</td>
                  <td id="1_score">--</td>
                  <td id="1_rank">--</td>
                </tr>
                <tr>
                  <td id="2_name">--</td>
                  <td id="2_score">--</td>
                  <td id="2_rank">--</td>
                </tr>
                <tr>
                  <td id="3_name">--</td>
                  <td id="3_score">--</td>
                  <td id="3_rank">--</td>
                </tr>
                <tr>
                  <td id="4_name">--</td>
                  <td id="4_score">--</td>
                  <td id="4_rank">--</td>
                </tr>
                <tr>
                  <td id="5_name">--</td>
                  <td id="5_score">--</td>
                  <td id="5_rank">--</td>
                </tr>
              </table>
        </div>
      
    </div>
    <div class="col-sm-6 " id='lineGraph'>
      <div class="line_graph" id='lineGraph'></div>
    </div>
  </div>
  <div class="skill_header">Skill Wise Average Score</div>
  <div class="row myskill" id="skill_blocks">
 
      <!-- <div class="col-md-5 col-lg-2 skill" id="analytical_skills">
        <p>Analytical Reasoning</p>
        <div class="row">
          <div class="col-sm skill_score" id="skill_1"> Average Score</div>
        </div>
        <div class="row remarks">Remarks<br>-----</div> 
      </div> -->
      
      
  </div>
</div>

<!-- ================================================================= -->
<!-- Histogram -->
<div class="container">
<div class="performance_chart">Performance Charts</div>
    <div class="row">
      <div class="col-md-6"> 
        <div style="width:100%"> 
          <button class="skill_button" id="level_button_1">Level 0</button>
          <button class="skill_button" id="level_button_2">Level 1</button>
          <button class="skill_button" id="level_button_3">Level 2</button>
          <button class="skill_button" id="level_button_4">Level 3</button>
        </div>
        <div  style="width:100%" id="histogram"></div>
      </div>
      <div class="col-md-6">
        <div style="width:100%">
              <select name="level" id="level">
                <option value="0">Level 0</option>
                <option value="1">Level 1</option>
                <option value="2">Level 2</option>
                <option value="3">Level 3</option>
              </select>
              <select name="Skill" id="skill">
              <option value="" selected disabled hidden>Choose Skills</option>
              </select>
        </div>
        <div  style="width:100%" id="skill_wise_graph"></div> 
      </div> 
    </div>
</div>
<!-- ================================================================= -->

</div>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

//Skill Id for skill_wise graph
let id = <?php echo $_SESSION['schoollogged_in']['id'] ?>;
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
            var div = 
            ' <div class="col-md-5 col-lg-2 skill" id="skills">'+
              '  <p style="font-size:16px">'+ skill +'</p>'+
               ' <div class="row">'+
                '    <div class="col-sm skill_score" id="skill_'+skill.replace(/ /g,'')+'"></div>'+
               ' </div>'+
                '<div class="row remarks">Remarks<br>-----</div>'+
            '</div> ';
          
              var div1 = '<div class="col-md-5 col-lg-2 skill flip-card" id="skills">'+
                          '<div class="flip-card-inner">'+
                            '<div class="flip-card-front">'+
                            '<p style="font-size:16px; color:black; margin-top: 29%; margin-bottom: 19%;">'+ skill +'</p>'+
                            '<div class="col-sm " id="skill_'+skill.replace(/ /g,'')+'"></div>'+
                            '</div>'+
                            '<div class="flip-card-back">'+
                              '<h3 style="color:white">Remarks</h3> '+
                              '<p>-------------</p> '+
                            '</div>'+
                          '</div>'+
                        '</div>';

           
            $('#skill_blocks').append(div1);
        }


    }
});
// SkillWise Score
$.ajax({
    url: 'https://api.intellify.in/api/GetSchoolAverageSkillScore/'+id,
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
            $(id).html(data[key]);
        }
        

    }
});


$.ajax({
  url: 'https://api.intellify.in/api/GetSkills/all',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
      var data = jsonObject;
      for (var key in data) {
        var x = document.getElementById("skill");
        var option = document.createElement("option");
        option.text = data[key];
        option.value = key;
        x.add(option);
      }
      
  }
});
function skill_graph(skill,level){
  console.log(skill,level)
  Array.prototype.max = function(){
  return Math.max.apply(null,this);
  }
  console.log("this: ",skill);
  $.ajax({
  url: 'https://api.intellify.in/api/SchoolSkillPerformanceChart/'+id+'/'+level+'/'+skill,
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
    success: function(jsonObject, status) {
      var data = jsonObject;
      for(var i = 0; i < jsonObject.y.length; i++){
        jsonObject.y[i] = jsonObject.y[i] * 100;
      }
      var barGraph = document.getElementById("skill_wise_graph");
      function BarGraph(barGraph,json_data){
        var trace1 = {
          x: json_data.x,
          y: json_data.y,
          name: "Skill Wise Chart",
          type: 'scatter'
        };

        var data = [trace1];
        var layout = {
          title:'SKILL WISE CHART',
          barmode: 'group',
          yaxis: {
            title: 'Percentage',
            range: [0, json_data.y.max()+5]
          },
          xaxis: {
            title: 'Quiz Name'
          },
          autosize: false,
          width: 500,
          height: 400,
          margin: {
            l: 50,
            r: 30,
            b: 50,
            t: 30,
            pad: 0
          },
        };

        Plotly.newPlot(barGraph, data, layout,{ responsive: true, displayModeBar: false});
      }
      BarGraph(barGraph,data);
    }
  });
}
$('#level').change( () => {
  var skill = $('#skill').val();
  var level = $('#level').val();
  skill_graph(skill,level);
});
$('#skill').change( () => {
  var skill = $('#skill').val();
  var level = $('#level').val();
  skill_graph(skill,level);
});
//OverallRank
$.ajax({
  url: 'https://api.intellify.in/api/GetSchoolRank/'+id,
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
      var data = jsonObject.overall_rank;
    //   data = Math.round(data);
      $('#overall_score').html('Overall Rank <br>' + data);
      //console.log(jsonObject);
      
  }
});

//Histogram
function histogram(level){
  $.ajax({
    url: 'https://api.intellify.in/api/Histogram/'+id+'/'+level+'/Overall',
    crossDomain: true,
    cors: true,
    dataType: 'json',
    type: "GET",
    //data: {
    //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
    //},
      
    success: function(jsonObject, status) {
      var data = jsonObject;
      var barGraph = document.getElementById("histogram");
      function BarGraph(barGraph,json_data){
        var trace1 = {
          x: ['0-10','10-20','20-30','30-40','40-50','50-60','60-70','70-80','80-90','90-100'],
          y: json_data[1],
          name: "Participants",
          type: 'bar'
        };

        var data = [trace1];
        var layout = {
          title:'PERFORMANCE GRAPH',
          barmode: 'group',
          yaxis: {
            title: 'Number of Student',
            range: [0, json_data[1].max()+5]
          },
          xaxis: {
            title: 'Percentage'
          },
          autosize: false,
          width: 500,
          height: 400,
          margin: {
            l: 50,
            r: 30,
            b: 50,
            t: 30,
            pad: 0
          },
        };

        Plotly.newPlot(barGraph, data, layout, { responsive: true, displayModeBar: false});
      }
      BarGraph(barGraph,data);
    }
  });

}
$('#level_button_1').click(() => {
  var button1 = document.getElementById('level_button_2');
  var button2 = document.getElementById('level_button_3');
  var button3 = document.getElementById('level_button_4');
  var button0 = document.getElementById('level_button_1');
  button1.style.backgroundColor = "#279993"
  button2.style.backgroundColor = "#279993"
  button3.style.backgroundColor = "#279993"
  button0.style.backgroundColor = "orange"
  histogram(0);
});
$('#level_button_2').click(() => {
  var button1 = document.getElementById('level_button_2');
  var button2 = document.getElementById('level_button_3');
  var button3 = document.getElementById('level_button_4');
  var button0 = document.getElementById('level_button_1');
  button1.style.backgroundColor = "orange";
  button2.style.backgroundColor = "#279993";
  button3.style.backgroundColor = "#279993";
  button0.style.backgroundColor = "#279993";

  histogram(1);
});
$('#level_button_3').click(() => {
  var button1 = document.getElementById('level_button_2');
  var button2 = document.getElementById('level_button_3');
  var button3 = document.getElementById('level_button_4');
  var button0 = document.getElementById('level_button_1');
  button1.style.backgroundColor = "#279993";
  button2.style.backgroundColor = "orange";
  button3.style.backgroundColor = "#279993";
  button0.style.backgroundColor = "#279993";

  histogram(2);
});
$('#level_button_4').click(() => {
  var button1 = document.getElementById('level_button_2');
  var button2 = document.getElementById('level_button_3');
  var button3 = document.getElementById('level_button_4');
  var button0 = document.getElementById('level_button_1');
  button1.style.backgroundColor = "#279993";
  button2.style.backgroundColor = "#279993";
  button3.style.backgroundColor = "orange";
  button0.style.backgroundColor = "#279993";

  histogram(3);
});

//Participants Graph
$.ajax({
  url: 'https://api.intellify.in/api/GetParticipants/'+id,
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
    var data = jsonObject;
    var barGraph = document.getElementById("lineGraph");
    function BarGraph(barGraph,json_data){
      Array.prototype.max = function(){
        return Math.max.apply(null,this);
      }
      var trace2 = {
        x: json_data.level_labels,
        y: json_data.qualified,
        name: "Qualified for Round 2",
        type: 'bar'
      };

      var trace1 = {
        x: json_data.level_labels,
        y: json_data.participants,
        name: "Participants",
        type: 'bar'
      };
      var trace3 = {
        x: json_data.level_labels,
        y: json_data.qualified_for_round_3,
        name: "Qualified for Round 3",
        type: 'bar'
      };

      var data = [trace1, trace2, trace3];
      // console.log(json_data.participants);
      var layout = {
        title:'PARTICIPATION GRAPH',
        barmode: 'group',
        yaxis: {
          title: 'Number of Student',
          range: [0, json_data.participants.max()+5]
        },
        xaxis: {
          // title: 'Exam Name'
        },
        autosize: false,
        width: 500,
        height: 400,
        margin: {
          l: 50,
          r: 30,
          b: 50,
          t: 30,
          pad: 0
        },
      };

      Plotly.newPlot(barGraph, data, layout, { responsive: true, displayModeBar: false});
    }
    BarGraph(barGraph,data);
  }
});


//Table update

$('#skill_button_1').click((data) => {
  $.ajax({
  url: 'https://api.intellify.in/api/GetLeaderBoard/'+id+'/0',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
      var data = jsonObject;
      if(jsonObject.length === 0){
       alert('No participation from level 0');
      }
      else{
        var button1 = document.getElementById('skill_button_2');
        var button2 = document.getElementById('skill_button_3');
        var button3 = document.getElementById('skill_button_4');
        var button0 = document.getElementById('skill_button_1');
        button1.style.backgroundColor = "#279993"
        button2.style.backgroundColor = "#279993"
        button3.style.backgroundColor = "#279993"
        button0.style.backgroundColor = "orange"
        
        $('#skill_button_1').set_sty
        $('#1_name').html(jsonObject[0].username);
        $('#1_score').html(100-Math.round(parseFloat(jsonObject[0].percentile)*100));
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(100-Math.round(parseFloat(jsonObject[1].percentile)*100));
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(100-Math.round(parseFloat(jsonObject[2].percentile)*100));
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(100-Math.round(parseFloat(jsonObject[3].percentile)*100));
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(100-Math.round(parseFloat(jsonObject[4].percentile)*100));
        $('#5_rank').html(jsonObject[4].rank);
      }
  }
  });
});
$('#skill_button_2').click((data) => {
  $.ajax({
  url: 'https://api.intellify.in/api/GetLeaderBoard/'+id+'/1',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
      var data = jsonObject;
      if(jsonObject.length === 0){
       alert('No participation from level 1');
      }
      else{
        var button1 = document.getElementById('skill_button_2');
        var button2 = document.getElementById('skill_button_3');
        var button3 = document.getElementById('skill_button_4');
        var button0 = document.getElementById('skill_button_1');
        button1.style.backgroundColor = "orange"
        button2.style.backgroundColor = "#279993"
        button3.style.backgroundColor = "#279993"
        button0.style.backgroundColor = "#279993"
        
        $('#1_name').html(jsonObject[0].username);
        $('#1_score').html(100-Math.round(parseFloat(jsonObject[0].percentile)*100));
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(100-Math.round(parseFloat(jsonObject[1].percentile)*100));
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(100-Math.round(parseFloat(jsonObject[2].percentile)*100));
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(100-Math.round(parseFloat(jsonObject[3].percentile)*100));
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(100-Math.round(parseFloat(jsonObject[4].percentile)*100));
        $('#5_rank').html(jsonObject[4].rank);
      }

      
  }
  });
  
});
$('#skill_button_3').click((data) => {
  $.ajax({
  url: 'https://api.intellify.in/api/GetLeaderBoard/'+id+'/2',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
      var data = jsonObject;
      // console.log(data);
      if(jsonObject.length === 0){
       alert('No participation from level 2');
      }
      else{
        var button1 = document.getElementById('skill_button_2');
        var button2 = document.getElementById('skill_button_3');
        var button3 = document.getElementById('skill_button_4');
        var button0 = document.getElementById('skill_button_1');
        button1.style.backgroundColor = "#279993"
        button2.style.backgroundColor = "orange"
        button3.style.backgroundColor = "#279993"
        button0.style.backgroundColor = "#279993"
        
        $('#1_name').html(jsonObject[0].username);
        $('#1_score').html(100-Math.round(parseFloat(jsonObject[0].percentile)*100));
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(100-Math.round(parseFloat(jsonObject[1].percentile)*100));
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(100-Math.round(parseFloat(jsonObject[2].percentile)*100));
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(100-Math.round(parseFloat(jsonObject[3].percentile)*100));
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(100-Math.round(parseFloat(jsonObject[4].percentile)*100));
        $('#5_rank').html(jsonObject[4].rank);
      }
      
  }
  });
  
});
$('#skill_button_4').click((data) => {
  $.ajax({
  url: 'https://api.intellify.in/api/GetLeaderBoard/'+id+'/3',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  //data: {
  //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
  //},
    
  success: function(jsonObject, status) {
      var data = jsonObject;
      if(jsonObject.length === 0){
       alert('No participation from level 3');
      }
      else{
        var button1 = document.getElementById('skill_button_2');
        var button2 = document.getElementById('skill_button_3');
        var button3 = document.getElementById('skill_button_4');
        var button0 = document.getElementById('skill_button_1');
        button1.style.backgroundColor = "#279993"
        button2.style.backgroundColor = "#279993"
        button3.style.backgroundColor = "orange"
        button0.style.backgroundColor = "#279993"
        
        $('#1_name').html(jsonObject[0].username);
        $('#1_score').html(100-Math.round(parseFloat(jsonObject[0].percentile)*100));
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(100-Math.round(parseFloat(jsonObject[1].percentile)*100));
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(100-Math.round(parseFloat(jsonObject[2].percentile)*100));
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(100-Math.round(parseFloat(jsonObject[3].percentile)*100));
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(100-Math.round(parseFloat(jsonObject[4].percentile)*100));
        $('#5_rank').html(jsonObject[4].rank);
      }


  }
  });
  
});


</script>
<script>
jQuery(function(){
  //  jQuery('#skill_button_1').click();
   jQuery('#level_button_1').click();
});
</script>

