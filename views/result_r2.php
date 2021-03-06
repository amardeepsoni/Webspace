<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
table{
    width: 95%;
    border: none;
}
td{
    text-align: left;
    font-size: 15px;
    font-size: 800;
    border: none;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
.dataTables_filter{
    margin:2%;
}

</style>
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
<!-- <section id="page-title" class="nobg nopadding" style="margin-left: 25%;" >
    <div class="container clearfix center">
        <ul class="pagination ">
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'Result/round1'; ?>" style="
                        font-size: calc(10px + 2vw); color:black;">Round 1</a>
            </li>
            <li class="active page-item">
                <a class="page-link" href="<?php echo base_url().'Result/round2'; ?>" style="
                        font-size: calc(10px + 2vw); background-color: #FF7F27 !important; border-color: #FF7F27 !important;">Round 2 <span class="sr-only">(current)</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'Result/overall'; ?>" style="
                            font-size: calc(10px + 2vw); color:black;">
                    Overall </span>
                </a>
            </li>
        </ul>
    </div>
</section> -->
<section id="page-title" class="nobg nopadding" style="margin-left: 25%;" >
    <div class="container clearfix center">
        <ul class="pagination ">
            <li class="active page-item">
                <a class="page-link" href="<?php echo base_url().'Result/round1'; ?>" style="
                        font-size: calc(2px + 2vw); color:black; background-color:#ecf0f1 ;">Round 1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'Result/round2'; ?>" style="
                        font-size: calc(2px + 2vw); background-color: #FF7F27 !important; border-color: #FF7F27 !important;color:white">Round 2 <span class="sr-only">(current)</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?php echo base_url().'Result/overall'; ?>" style="
                            font-size: calc(2px + 2vw); color:black;">
                    Overall </span>
                </a>
            </li>
        </ul>
    </div>
</section>

<div class="container clearfix center">
    <div class="container search_table" style="padding-bottom:3%;">
        <div id="searchtools">
            <table>
                <tr><td style="width: 24%;" align="right">Name</td><td style="width: 76%;"><input type="text" id="name" class="input-textbox" placeholder="All"></td></tr>
                <tr><td align="right">Class </td><td><input type="text" id="class" class="input-textbox" placeholder="All"></td></tr>
            </table>
        </div>
        <table id="myTable">
            <tr id="head">
                <th>Name</th>
                <th>Class</th>
                <th>Score</th>
                <!-- <th>SKill_1</th>
                <th>SKill_2</th>
                <th>SKill_3</th>
                <th>SKill_4</th>
                <th>SKill_5</th>
                <th>Qualified</th> -->
            </tr>
        </table>

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
      <!-- <div class="col-md-6">
        <div style="width:100%">
              <select name="level" id="level">
                <option value="0">Level 1</option>
                <option value="1">Level 2</option>
                <option value="2">Level 3</option>
                <option value="3">Level 4</option>
              </select>
              <select name="Skill" id="skill">
              <option value="" selected disabled hidden>Choose Skills</option>
              </select>
        </div>
        <div  style="width:100%" id="skill_wise_graph"></div> 
      </div>  -->
    </div>
</div>
<!-- ================================================================= -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
let id = <?php echo $_SESSION['schoollogged_in']['id'] ?>;
 $.ajax({
        url: 'https://api.intellify.in/api/GetSkills/2',
        crossDomain: true,
        cors: true,
        dataType: 'json',
        type: "GET",
        //data: {
        //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
        //},
            
        success: function(jsonObject, status) {
            for(var key in jsonObject){
                var dict = jsonObject[key];
                $('#myTable tr').append("<th class='skillName'>"+ dict+"</th>")
            }
            $('#myTable tr').append('<th>Qualification Status</th>')
        }   
    });

    $.ajax({
        url: 'https://api.intellify.in/api/round2_result_detail/53',
        crossDomain: true,
        cors: true,
        dataType: 'json',
        type: "GET",
        //data: {
        //  apikey: '2cfda229805f24612a4e957db23f54eb488f33ca07200781a0b5c466d2466c32'
        //},
            
        success: function(jsonObject, status) {
            var a = $('.skillName').toArray();

            // for(var i = 0; i < a.length; i++){
            //     console.log(a[i].textContent);
            // }
            for(var key in jsonObject){
                var dict = jsonObject[key];
                let content = "<tr> <td>"+ dict['name']+"</td> "+"<td>"+ dict['class']+"</td>"+ "<td>"+ dict['score']+"</td>"; 
                for(var i = 0; i < a.length; i++){
                     var key2 = a[i].textContent;
                    content += "<td>"+ dict[key2]+"</td>";
                }
                content += "<td>"+ dict['qualification_status']+"</td></tr>";
                $("#myTable").append(content);
            }
        }
    });
    $(document).ready(function() {
  	// TRIGGERS FOR THE SEARCH FUNCTION AFTER USER UPDATES SEARCH VALUES
    $('#name, #class').keyup(function() {
        checkAll();
    });

  // PROCESS ALL OF THE ROWS OF THE TABLE (EXCEPT THE HEADER ROW) AND CHECK FOR CORRESPONDING VALUES BASED ON THE USERS INPUTS 
    function checkAll() {
      
        $('#myTable tr').each(function(i, item) {
            if (
                $(this).find('td:eq(0)').text().toLowerCase().indexOf($('#name').val().toLowerCase()) >= 0 &&
                $(this).find('td:eq(1)').text().toLowerCase().indexOf($('#class').val().toLowerCase()) >= 0 
                
            ) {
                $(this).show();
                $('#head').show();
            } else {
                $(this).hide();
            };
        });
      
      	// REMOVE AND ADD AGAIN...
      	// $('.counted').remove();
      	// countRows();
    };
  
  
  
    
	checkAll();
  
});


// =======================================
// graph 
$.ajax({
  url: 'https://api.intellify.in/api/GetSkills/r2',
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
            title: 'Number of Student',
            range: [0, json_data.y.max()+5]
          },
          // xaxis: {
          //   title: 'Exam Name'
          // },
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
//Histogram
function histogram(level){
  Array.prototype.max = function(){
  return Math.max.apply(null,this);
  }
  $.ajax({
    url: 'https://api.intellify.in/api/Histogram/'+id+'/'+level+'/R2',
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

        Plotly.newPlot(barGraph, data, layout,{ responsive: true, displayModeBar: false});
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
</script>
<script>
jQuery(function(){
   jQuery('#level_button_1').click();
});
</script>