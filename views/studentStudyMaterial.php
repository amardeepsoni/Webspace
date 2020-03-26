
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
body{
    background: #ddd;
}
table {
    width: 100%;
    border: none;
}

td {
    text-align: left;
    /*color: white !important; *!*/
    font-size: 15px;
    font-size: 800;
    border: none;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
.dataTables_filter {
    margin: 2%;
}
img {
    height: 20px;
    width: 20px;
}
.mymodel
{
        font-family: 'Montserrat', sans-serif;
    width: 87%; height: 350px;
    z-index: 9999;
    display: none;
    margin-left: 74px;
    position: relative;
    background: #212529;
    padding: 15px;



}
.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}


.mymodelshow
{
    display: flex;
}
.rightbar
{
    width:30%;
    height: inherit;

    height: 100%;
}
.rightbar-content{
    width: auto;
    padding:2px 3px 2px 11px;
    text-transform: capitalize;
    font-size: 1.2em;
    background: #333;
    border-radius: 30px;
    margin-left: 20px;
    margin-top: 5px;
    color: white;


}

.mymodelscroll
{
    position: fixed;
    top: 0px;
    width: 80%;
}
.mymodel iframe
{
    width: 70%;
    height: 100%;

}
.btn-cust{
    margin-left:100px;margin-top: 5px; color: white;margin-right: 10px;
}
@media screen and (max-width:700px) {
    .modal-content {
        width: 350px;
    }
    .mymodelshow
    {
        display: block;
        height: auto;
        width: 100%;
        margin-left: 0;

    }
    .mymodel iframe
    {
    width: 100%;
    height: 286px;

        }
.rightbar-content
{
    width: auto;
    float: left;
}
.rightbar {
    width: 100%
}
.btn-cust{
     color: white;
}
}

</style>
<script type="text/javascript">
   $(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
        $(".mymodel").addClass("mymodelscroll");
    } else {
      $(".mymodel").removeClass("mymodelscroll");
    }
  });
});
</script>
<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <div class=''>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2>Study Material</h2>

                    </div>
                    <!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>schooldashboard/">Home</a></li>
                                <li class="active">Study Material</li>
                            </ol>
                        </div><!-- end bread -->
                    </div><!-- /.pull-right -->
                </div><!-- end clearfix -->
            </div><!-- end container -->
        </div><!-- end page-title -->
    </div><!-- end parallax -->
    <!-- </div>end page -->
</div>
<?php

$con = mysqli_connect('intellifydb.cgurwbqxioqu.ap-south-1.rds.amazonaws.com', 'intellifyiitd16', 'dbsolve6june', 'intellify');

if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}
$classes = strval($_SESSION['studentlogged_in']['class']);
$sql = "SELECT DISTINCT subject FROM studentSubjects WHERE class = $classes";
$result = mysqli_query($con, $sql);
$allSubjects = array();

while ($row = mysqli_fetch_array($result)) {
	$allSubjects[] = $row['subject'];
}

?>

<div class="section" style="min-height:100vh;background: transparent;">
<div class="mymodel row">
    <iframe id="player" frameborder="0" class="col-sm-8" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
    <div class="rightbar bg-dark col-sm-4">
        <div>
        <div id="videoheading" class="rightbar-content"></div>
        <div id="videoclass" class="rightbar-content"></div>
        <div id="videosub" class="rightbar-content"></div>
        <div id="videorate" class="rightbar-content">
            <span class="heading">User Rating</span>
                 <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star checked"></span>
                 <span class="fa fa-star"></span>

        </div>
        <?php if ($lang == 1) {?>


        <div class="rightbar-content">Language : English</div>

           <?php } else {?>


        <div class="rightbar-content">Language : Hindi</div>

           <?php }?>
           </div>

<div style="width: 100%;position: relative;"> <button id="closevideo" class="btn btn-danger btn-outline-danger btn-cust" style="">Close</button></div>

    </div>


</div>
<br>

<div class="container-fluid" style="height:100%; margin-top:30px;">

        <ul class="nav nav-pills" style="text-transform: capitalize;border-bottom: 0px solid white;background: #eee;border-radius: 10px; color: white;">
            <?php
$cnt = 0;
foreach ($allSubjects as $sub) {
	//make first subject active
	if ($cnt == 0) {
		?>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#subject<?php echo $cnt + 1 ?>"  style="font-size:2rem"><?php echo $sub ?></a>
                    </li>
                    <?php
} else {
		?>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="pill" href="#subject<?php echo $cnt + 1 ?>"  style="font-size:2rem"><?php echo $sub ?></a>
                    </li>
                    <?php
}
	$cnt++;
}

?>
        </ul>

<!-- Tab panes -->
<div class="tab-content mt-3">
    <?php $i = 1;
while ($i <= count($allSubjects)) {
	?>

            <div class="tab-pane <?php if ($i == 1) {
		echo "active";
	}
	?>" id="subject<?php echo $i; ?>">

 <div class="accordion" id="accordionExample">
            <?php
//i=subject number, j=chapter num
	$j = 1;
	$sql = "SELECT DISTINCT chapter FROM studentSubjects WHERE subject='" . $allSubjects[$i - 1] . "' AND class = $classes";
	$res = mysqli_query($con, $sql);
	while ($ch = mysqli_fetch_array($res)) {
		?>
            <div class="card">
             <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#Chapter<?php echo $i ?><?php echo $j ?>" aria-expanded="false" aria-controls="collapseOne">
                        Chapter <?php echo $j; ?>-<?php echo $ch['chapter']; ?>
                        </button>
                    </h5>
                    </div>
                     <div id="Chapter<?php echo $i ?><?php echo $j ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">

                    <div class="card-body">

                        <div class="row">
                             <?php

		$sql = "SELECT id, topic, url FROM studentSubjects where lang='" . $lang . "' and subject='" . $allSubjects[$i - 1] . "' and chapter='" . $ch['chapter'] . "';";
		$result = mysqli_query($con, $sql);
		$s = 0;
		while ($row = mysqli_fetch_array($result)) {

			?>



                            <div class="col-md-3" style="margin-top: 10px;"><button id="topic<?php echo $row['id']; ?>" class="card w-100 h-100" style="text-align:center; text-transform: capitalize;display: flex;justify-content: center;align-items: center;margin-top: 10px; background: #000;" value="<?php echo $row['url']; ?>"><div class="" style="color:white;font-weight: bold;text-align: center;"><?php echo $row['topic']; ?></div><div class="card-body"><i class="far fa-play-circle" style="color:white;font-size: 75px;"></i></div></button></div>

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#topic<?php echo $row['id']; ?>').click(function(){

                                             var url = $("#topic<?php echo $row['id']; ?>").val();

                                             var ret = url.replace('watch?v=','embed/');

                                             $('.mymodel').addClass('mymodelshow');

                                             $('#player').attr("src",(ret));
                                             $('#videoheading').text('<?php echo "Topic : " . $row['topic']; ?>');
                                             $('#videoclass').text('<?php echo "Class : " . $classes ?>');
                                             $('#videosub').text('<?php echo "Subject : " . $allSubjects[$s] ?>');



                                        });
                                       $('#closevideo').click(function(){
                                            $('.mymodel').removeClass('mymodelshow');
                                       });
                                    });
                                </script>





                            <?php }
		$s++?>
                        </div>
                    </div>
                    </div>
            </div>

            <?php
$j++;
	}
	?>

            </div>
            </div>
                <?php
$i++;
}
?>


</div>
<!-- -->
</div>


</div>
<?php mysqli_close($con);?>