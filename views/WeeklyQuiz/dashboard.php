<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Quiz | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examPortal/dist/styles.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar card navbar-light navigation-clean">
    <p class="navbar-brand card-header" style="">Weekly Quiz</p>
</nav>
<div class="skill-boxed">
    <div class="cnt">
        <!-- <div class="logo-cont"><img src="https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/logo.png" class="intellify-logo"/></div> -->
        <div class="intro">
            <!-- <h2 class="text-center">International Science &amp; Creativity Olympiad</h2>
            <p class="text-center">Welcome to the Weekly Quiz of International Science and Creativity Olympiad.
            </p> -->
        </div>
        <div class="row myrow">
        <?php
foreach ($skills as $skill) {
	echo
	'<div class=" card col-md-6 col-lg-2 item">
                            <div class="card-body box" style="height:90%">
                            <a style="color:black;" href="' . base_url() . 'WeeklyQuiz/Quizlist/' . $skill->skill_id . '">
                            <img class="" style="width:100px;height:100px" src="' . $skill->image . '" />
                            <p class="name" style="font-size:20px">' . $skill->skill_name .
		'<p>
                            <p class="description"> </p>
                            <div class="social"></div>
                            </a>
                            </div>
                        </div>';
}
?>
        </div>
    </div>
</div>
</body>

</html>