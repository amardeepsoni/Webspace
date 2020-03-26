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
<style>
    .box {
        position: relative;
        width: 100%;
        box-sizing: content-box;
        padding-left: 0;
        max-width: 700px;
        border-style: solid;
        border-width: 3px;
        border-color: #313437;
        background-color: lightgray;
        height: 100%;

    }

    .circle {
        height: 60px;
        border-radius: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .overlay {
        position: absolute;
        margin-left: -10px;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5);
        /* Black see-through */
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity: 0;
        color: white;
        font-size: 20px;
        padding-bottom: 0px;
        text-align: center;
    }
    div.row div
    {
        padding: 10px;
    }

    .box:hover .overlay {
        opacity: 1;
    }

    .dd1{
    font-size:15px;
}

@media screen and (max-width: 425px) {
.dd{
    font-size:14px;
}
.dd1{
    font-size:13px;
}
.dd2{
    font-size:12px;
}
.btn{
    font-size:12px;
}
}
</style>

<body id="exam-dashboard">
    <div style="height:100%;background:#E6E6E6">
        <nav class="navbar navbar-light navigation-clean">
            <p class="navbar-brand"><b>Choose your quiz</b></p>
        </nav>
                <!--        <div class="logo-cont"><img src="https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/logo.png" class="intellify-logo"/></div>-->
                <div class="intro">
                    <!-- <h2 class="text-center">Choose a Quiz</h2> -->
                    <!-- <p class="text-center">Welcome to the Weekly Quiz of International Science and Creativity Olympiad. -->
                    <!-- </p> -->
                </div>
                <div class="p-4" style="width: 100%;height: auto;">
                <div class="row myrow" style="overflow:hidden;background: #ddd;">

                    <div class="col-2 dd2 " style="background: #27293d; color: white;">SI NO.</div>
                    <div class="col-3 dd" style="background: #27293d; color: white;">Quizes</div>
                    <div class="col-4 dd" style="background: #27293d; color: white;">Active Quiz</div>
                    <div class="col-3 dd2" style="background: #27293d; color: white;">Achivements</div>


                    <?php
if ($quizzes) {
	# code...
	$count = 1;
// print_r($quizzes[1]);
	foreach ($quizzes as $quiz) {

		if (isset($quiz->flag)) {?>
                        <div class="card" id="model<?php echo $quiz->quizid ?>" style="position: fixed;z-index: 999999;background:#eee; width: 50%; height: 50%; left: 50%;top: 50%;transform: translate(-50%,-50%);box-shadow: 5px 5px 500px #888;">
                            <div class="card-header">
                                    Achivements <spen class="btn btn-danger float-right" id="closeachiv<?php echo $quiz->quizid ?>">x</spen>
                            </div>
                              <div class="card-body">

                            </div>
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function(){
                                            $('#model<?php echo $quiz->quizid ?>').hide();
                                $('#<?php echo $quiz->quizid ?>').click(function(){
                                            $('#model<?php echo $quiz->quizid ?>').show();
                                });
                                $('#closeachiv<?php echo $quiz->quizid ?>').click(function(){
                                            $('#model<?php echo $quiz->quizid ?>').hide();
                                });


                            });
                        </script>
                        <div class="col-2 dd bg-light"><?php echo $count; ?>  </div>

                          <div class="col-3 dd1 bg-light" style="text-transform: uppercase;"><?php echo $quiz->title; ?></div>
                             <div class="col-4  bg-light"><a class="btn btn-success" href="<?php echo base_url() . 'WeeklyQuiz/Quiz/' . $quiz->quizid ?>">Attempt</a></div>
                             <div class="col-3  bg-light"><img id="<?php echo $quiz->quizid ?>" src="<?php echo base_url(); ?>/images/Achievement@2x.png"></div>

     <?php } else {
			?>


                        <div class="col-2 dd"><?php echo $count; ?>  </div>

                          <div class="col-3 dd1" style="text-transform: uppercase;"><?php echo $quiz->title; ?></div>
                             <div class="col-4 "><a href="<?php echo base_url() . 'WeeklyQuiz/Quiz/' . $quiz->quizid ?>" class="btn btn-secondary disabled" aria-disabled="true">Attempt</a></div>
                             <div class="col-3"><img src="<?php echo base_url(); ?>/images/Achievement@2x.png"></div>


                      <?php }
		$count++;}
}?>
                </div>
            </div>


</body>

</html>








<!--
    echo
                                '<div class="col-md-6 col-lg-3 item">
                            <div class="box" style = "height: 200px">
                            <h3 class="name">' . $quiz->title .
                                    '</h3>



                                    </a>


                            <p class="description"> </p>
                            <a style="color:white; cursor:pointer;">
                            <div class="circle" style="background-image: linear-gradient(359deg, rgb(134, 120, 255), rgb(77, 56, 255))">
                            <a style="color:white;" href="' . base_url() . 'WeeklyQuiz/Quiz/' . $quiz->quizid . '">
                            <h3 class = "description">ATTEMPT QUIZ</h3>
                            </div><br></a>
                            <a style="color:white; cursor:pointer">

                            </a>
                            </div>
                        </div>';
                        } else {
                            echo
                                '<div class="col-md-6 col-lg-3 item ">
                            <div class="box "style = "height: 200px">
                                <h3 class="name">' . $quiz->title . '</h3>

                                  <div class="overlay">
                                    <i class="fa fa-lock"></i>
                                  </div>
                                  <a style="color:white; cursor:pointer">
                                  <div class="circle" style="background-image: linear-gradient(359deg, rgb(134, 120, 255), rgb(77, 56, 255))">
                                  <a style="color:white;" href="' . base_url() . 'WeeklyQuiz/Quiz/' . $quiz->quizid . '">
                                  <h3 class = "description">ATTEMPT QUIZ</h3>
                                  </div><br></a>
                                  <a style="color:white; cursor:pointer">

                                  </a>
                            </div>
                        </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->