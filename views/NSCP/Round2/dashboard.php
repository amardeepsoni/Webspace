<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round 2 | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examPortal/dist/styles.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ecb4e5bc3f.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</head>

<body id="exam-dashboard" style="background: white; ">
<nav class="navbar navbar-light navigation-clean nav-flex nav-border">
<img src="https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/logo.png" class="intellify-logo intellify-logo-nav" />
<h2 class="" style="text-align:center; font-size:20px; color: blue; font-weight: bold;">International Science &amp; Creativity Olympiad - Round 2</h2>
<div class="nav-exam-div" style="margin-right: 2%">
    <div><p class="navbar-brand navbarText" style="font-weight:bold; font-size:15px"><?php echo 'Student name: '.$firstname?><?php echo ' '.$lastname?></p></div>
    <div><p class="navbar-brand navbarText" style="font-weight:bold; font-size:15px"><?php echo 'Reg. ID: '.$username?></p></div>
    <div><p class="navbar-brand navbarText" style="font-weight:bold; font-size:15px;"><a href="https://www.intellify.in/ISCO/Round2/login/logout">Logout</a></p></div>
</div>
</nav>
<div class="skill-boxed nav-flex" >
    <div class="gen-instruct nav-border" style="heighT:100%; margin-bottom:2em; width:130%; border: solid grey 2px; border-radius: 5px; background: white">
        <p class="gen-instruct-head">General Instructions</p>
        <p>1. Do not press refresh or reload button. It will submit your exam. Once submitted, exam can not be reattempted.</p>
<p>2. The students cannot switch between screens during the time of the test.</p>
<p>3. In case of any malpractice, that particular exam will be locked for concerned learner. </p>
<p>4. Answer once saved, can’t be changed. Question once skipped, it can’t be reattempted.</p>
<p>5. Do not resize (minimize) the browser during the test.</p>
<p>6. Never click the “Back” button on the browser. This will take you out of the test and prevent blackboard from tracking your selected answers.</p>
<p>7. Save your test using the “Save” button periodically during the exam.</p>
<p>8. Click the ‘’submit’’ button to submit your exam. Do not press ‘’Enter’’ on the keyboard to submit the exam.</p>
<p>9. A timer for exam is displayed at the top right corner of the page that shows remaining time for your exam.</p>
<p>10. After the expiry of the time limit, the examination will be automatically terminated.</p>
<p>11. In case of any malpractice, the student would be disqualified.</p>

    </div>
    <div class="test-list" style="margin-right: 50px">
            <div style="height: 50px; border: solid black 2px; border-radius: 5px; width: 400px">
                <p style="text-align:center; color: black; font-size: 25px; font-weight: bold">Skill Tests</p>
            </div>
            <?php
            foreach ($skills as $skill) {
                if($attempted[$skill->skill_id]){
                    echo    
                        '<div class="tests">
                                <div class="box box1" style="background:#42b883; height:50px; margin-left:15px;width:370px; margin-top:5px; border: solid black 1px; border-radius: 5px">
                                <a style="color:black;" >
                                <img class="rounded-circle" style="width:10%;height:80%; margin: 5px; margin-left:20px; margin-right:30px;" src="'.$skill->image.'" />
                                <p class="name" style="color:white; font-size:20px; display: inline; margin-right:40px">' . $skill->skill_name . '</p>
                                <p class="description"> </p>
                                <div class="social"></div>
                                </a>
                                </div>
                            </div>';
             
                } else {
                echo
                    '<div class="tests">
                            <div class="box box1" style="background:#e5e5e5 ;height:50px; margin-left:15px;width:370px; margin-top:5px; border: solid black 1px; border-radius: 5px">
                            <a style="color:black;" href="'.base_url().round2path.'/Instructions/skill/'.$skill->skill_id.'">
                            <img class="rounded-circle" style="width:10%;height:80%; margin: 5px; margin-left:20px; margin-right:30px;" src="'.$skill->image.'" />
                            <p class="name" style="color:black; font-size:20px; display: inline; margin-right:40px">' . $skill->skill_name . //$a[$skill->skill_id]['attempted']==1?"Attempted":"not";  
                            '</p>
                            <i class="fas fa-chevron-circle-right" style="margin-right:20px; margin-top:8px; color: black; font-size: 30px; float: right; top:-50px"></i>
                            <p class="description"> </p>
                            <div class="social"></div>
                            </a>
                            </div>
                        </div>';
            }
        }
            ?>

            <!-- <?php print_r("lol");?>
            <br>
            
            <?php print_r($attempted[0]);?> -->

    </div>
</div>
</body>

</html>
