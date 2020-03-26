<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/result/css/school_result.css">

<div id="page-content-wrapper"> <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
  <div>
    <div class="page-title section nobg">
      <div class="container-fluid">
        <div class="clearfix">
          <div class="title-area pull-left">
            <h2><strong>Welcome  </strong><?php echo $schoolinfo->name; ?>. </h2>
          </div>
          <div class="pull-right hidden-xs">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>schoolaccount">Home</a></li>
                <li class="active">School account</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



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
              <p id="rank_title">Learder Board</p>
                <div style="width:100%"> 
                  <button class="skill_button" id="skill_button_1">Level 0</button>
                  <button class="skill_button" id="skill_button_2">Level 1</button>
                  <button class="skill_button" id="skill_button_3">Level 2</button>
                  <button class="skill_button" id="skill_button_4">Level 3</button>
            </div>
        <div class="row rank " id="overall_rank">
              <table id="table" style="width:100%">
                <tr>
                  <th>Student Name</th>
                  <th>Overall Score</th>
                  <th>School Rank</th>
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
    <div class="col-sm-6 line_graph" id='lineGraph'></div>
  </div>
  <div class="skill_header">Skill wise performance</div>
  <div class="row myskill">
 
      <div class="col-md-5 col-lg-2 skill" id="analytical_skills">
        <p>Analytical Reasoning</p>
        <div class="row">
          <div class="col-sm skill_score" id="skill_1"> Average Score</div>
        </div>
        <div class="row remarks">Remarks<br>-----</div> 
      </div>
      
      <div class="col-md-5 col-lg-2 skill" id="quantitative_amplitude">
        <p> Quantitative Amplitude</p>
        <div class="row">
        <div class="col-sm skill_score" id="skill_2"> Average Score</div>
        </div>
        <div class="row remarks">Remarks<br>-----</div> 
      </div>
      
      <div class="col-md-5  col-lg-2 skill" id="memory_speed_index">
        <p>Memory Speed Index</p>
        <div class="row">
        <div class="col-sm skill_score" id="skill_3"> Average Score</div>
        </div>
        <div class="row remarks">Remarks<br>-----</div>
      </div>
     
      <div class="col-md-5  col-lg-2 skill" id="visual_spatial_skills">
        <p> Visual Spatial Skills</p>
        <div class="row">
          <div class="col-sm skill_score" id="skill_4"> Average Score</div>
        </div>
        <div class="row remarks"> Remarks<br>-----</div>
      </div>
        
      <div class="col-md-5  col-lg-2 skill" id="verbal_comprehension"> 
        <p>Verbal Comprehension</p>
        <div class="row">
          <div class="col-sm skill_score" id="skill_5">Average Score</div>
        </div>
        <div class="col-sm bell_graph">
        <div class="row remarks">Remarks<br>-----</div>
      </div>
  </div>
</div>

</div>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    
    let id = <?php echo $_SESSION['schoollogged_in']['id'] ?>;
$.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetSchoolRank/'+id,
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
  
    
  success: function(jsonObject, status) {
      var data = jsonObject.overall_rank;
      $('#overall_score').html('Overall Rank <br>' + data);
      
  }
});

$.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetSchoolAverageSkillScore/'+id,
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
    
  success: function(jsonObject, status) {
      var data = jsonObject;
      
      $('#skill_1').html('Average Score <br>' + Math.round(data.average_skill_1_score));
      $('#skill_2').html('Average Score <br>' + Math.round(data.average_skill_2_score));
      $('#skill_3').html('Average Score <br>' + Math.round(data.average_skill_3_score));
      $('#skill_4').html('Average Score <br>' + Math.round(data.average_skill_4_score));
      $('#skill_5').html('Average Score <br>' + Math.round(data.average_skill_5_score));
      
  }
});


$.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetParticipants/'+id,
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
    
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
        y: json_data.qualified_3,
        name: "Qualified for Round 3",
        type: 'bar'
      };

      var data = [trace1, trace2];
      console.log(json_data.participants);
      var layout = {
        title:'PARTICIPATION GRAPH',
        barmode: 'group',
        yaxis: {
          title: 'Number of Student',
          range: [0, json_data.participants.max()+5]
        },
        xaxis: {
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

      Plotly.newPlot(barGraph, data, layout);
    }
    BarGraph(barGraph,data);
  }
});



$('#skill_button_1').click((data) => {
  $.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetLeaderBoard/'+id+'/0',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
    
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
        $('#1_score').html(jsonObject[0].score);
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(jsonObject[1].score);
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(jsonObject[2].score);
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(jsonObject[3].score);
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(jsonObject[4].score);
        $('#5_rank').html(jsonObject[4].rank);
      }
  }
  });
});
$('#skill_button_2').click((data) => {
  $.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetLeaderBoard/'+id+'/1',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
    
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
        $('#1_score').html(jsonObject[0].score);
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(jsonObject[1].score);
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(jsonObject[2].score);
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(jsonObject[3].score);
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(jsonObject[4].score);
        $('#5_rank').html(jsonObject[4].rank);
      }

      
  }
  });
  
});
$('#skill_button_3').click((data) => {
  $.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetLeaderBoard/'+id+'/2',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
    
  success: function(jsonObject, status) {
      var data = jsonObject;
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
        $('#1_score').html(jsonObject[0].score);
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(jsonObject[1].score);
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(jsonObject[2].score);
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(jsonObject[3].score);
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(jsonObject[4].score);
        $('#5_rank').html(jsonObject[4].rank);
      }
      
  }
  });
  
});
$('#skill_button_4').click((data) => {
  $.ajax({
  url: 'http://intellifyflask-api.ap-south-1.elasticbeanstalk.com/api/GetLeaderBoard/'+id+'/3',
  crossDomain: true,
  cors: true,
  dataType: 'json',
  type: "GET",
    
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
        $('#1_score').html(jsonObject[0].score);
        $('#1_rank').html(jsonObject[0].rank);

        $('#2_name').html(jsonObject[1].username);
        $('#2_score').html(jsonObject[1].score);
        $('#2_rank').html(jsonObject[1].rank);


        $('#3_name').html(jsonObject[2].username);
        $('#3_score').html(jsonObject[2].score);
        $('#3_rank').html(jsonObject[2].rank);

        $('#4_name').html(jsonObject[3].username);
        $('#4_score').html(jsonObject[3].score);
        $('#4_rank').html(jsonObject[3].rank);

        $('#5_name').html(jsonObject[4].username);
        $('#5_score').html(jsonObject[4].score);
        $('#5_rank').html(jsonObject[4].rank);
      }


  }
  });
  
});


</script>
<script>
jQuery(function(){
   jQuery('#skill_button_1').click();
});
</script> -->




<style>
table{
    /* border-collapse: collapse; */
    width: 100%;
    border: none;
}
td{
    text-align: left;
    /* background: pink;
    color: white !important; */
    font-size: 20px;
    font-size: 800;
    border: 1px solid #ddd;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
.botton{
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.btn{
    margin:5%;
    width: 80%;
}
.key{
  /* font-weight : bold !important; */
  background : #f2f2f2 !important
}


.table-row{
  background : #fff !important;
}

@media screen and (max-width : 481px){
  .section.nobg{
    display:none;
  }
}

</style>
<!-- <?php print_r($schoolinfo)?> -->
<div id="page-content-wrapper">
<a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
<!-- <div class=" parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>schoolassest/upload/Intellify_collage.jpg');"> -->
<div>
  <div class="page-title section nobg">
    <div class="container-fluid">
      <div class="clearfix">
        <div class="title-area pull-left">
          <h2>School account <small></small></h2>
        </div>
        <!-- /.pull-right -->
        <div class="pull-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li class="active">School account</li>
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
</div>
<div class="section" >
  <div class="container-fluid">

<!--      <img src="--><?php //echo base_url().'/uploads/image/Student Report PNG.png'?><!--" width="100%" height="700px">-->
    <?php if ($this->session->flashdata('loginnotify')) { ?>
    <div class="alert alert-danger">
      <?= $this->session->flashdata('loginnotify') ?>
    </div>
    <?php } ?>
    <h3>Welcome  <?php echo $schoolinfo->name; ?></h3>
    <div class="cnt-block">
    <div class="row">
      <div class="col-lg-10 table">
      <table>
      
        <?php if($schoolinfo->email){?>
          <tr class="table-row">
              <td class="key">Email</td>
              <td><?php echo $schoolinfo->email; ?></td>
          </tr>
          <?php }?>
          <?php if($schoolinfo->mobile){?>
          <tr class="table-row">
            <td class="key">Mobile</td>
            <td> <?php echo $schoolinfo->mobile; ?> </td>
          </tr>
          <?php }?>
          <?php if($schoolinfo->category_id){?>
          <tr class="table-row">
            <td class="key">Registration No</td>
            <td>  <?php echo $schoolinfo->category_id; ?> </td>
          </tr>
          <?php }?>
         

       
        <?php if($schoolinfo->address){?>
          <tr class="table-row">
            <td class="key">Address</td>
            <td>  <?php echo $schoolinfo->address; ?> </td>
          </tr>
          <?php }?>
        </table>
      </div>
    </div> 
        </div>
     <div class="row" >
       <div class="col-lg-2"></div>
       <div class="col-lg-4 botton">
      <a href="<?php echo base_url('editschoolprofile');?>" class="btn btn-secondary">Edit Profile</a>
          </div>
     </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
<!-- end section --> 

