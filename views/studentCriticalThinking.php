

<style>
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
    position: fixed;
    width: 60%; height: 50%;
    z-index: 9999;
    display: none;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    box-shadow: 3px 3px 100px #888;
    background: white;

}
.mymodelshow
{
    display: block;
}
.mymodel iframe
{
    width: 100%;
    height: 100%;

}
@media screen and (max-width:500px) {
    .modal-content {
        width: 350px;
    }
}
</style>
<div class="mymodel">
    <i id="videoheading"></i> <i id="closemodel" class="btn btn-danger float-right">x</i>
    <iframe id="player" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>


</div>
<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <div class=''>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2>Critical Thinking</h2>
                    </div>
                    <!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>schooldashboard/">Home</a></li>
                                <li class="active">Critical Thinking</li>
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

$sql = "SELECT DISTINCT subject FROM studentSubjects;";
$result = mysqli_query($con, $sql);
$allSubjects = array();
while ($row = mysqli_fetch_array($result)) {
	$allSubjects[] = $row['subject'];
}

?>

<div class="section" style="min-height:100vh;background: transparent;">
<div class="container-fluid" style="height:100%">

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
	$sql = "SELECT DISTINCT chapter FROM studentSubjects WHERE subject='" . $allSubjects[$i - 1] . "';";
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

		$sql = "SELECT id, topic, url FROM studentSubjects where subject='" . $allSubjects[$i - 1] . "' and chapter='" . $ch['chapter'] . "';";
		$result = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($result)) {

			?>



                            <div class="col-md-3" style="margin-top: 10px;"><button id="topic<?php echo $row['id']; ?>" class="card w-100 h-100" style="text-align:center; text-transform: capitalize;display: flex;justify-content: center;align-items: center;margin-top: 10px; background: #000;" value="<?php echo $row['url']; ?>"><div class="" style="color:white;font-weight: bold;text-align: center;"><?php echo $row['topic']; ?></div><div class="card-body"><i class="far fa-play-circle" style="color:white;font-size: 75px;"></i></div></button></div>

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#topic<?php echo $row['id']; ?>').click(function(){

                                             var url = $("#topic<?php echo $row['id']; ?>").val();



                                             $('.mymodel').addClass('mymodelshow');
                                             $('#player').attr("src",(url+"?control=0&modestbranding=1&feature=0&loop=1&autoplay=1&rel=0"));
                                             $('#videoheading').text('<?php echo $row['topic']; ?>');



                                        });
                                       $('#closemodel').click(function(){
                                            $('.mymodel').removeClass('mymodelshow');
                                       });
                                    });
                                </script>





                            <?php }?>
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