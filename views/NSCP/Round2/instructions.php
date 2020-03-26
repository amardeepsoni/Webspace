<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examPortal/dist/styles.min.css">
</head>

<body>
<div class="card"><div class="card-body" style="text-align:center;">
        <h2 class="card-title">International Science and Creativity Olympiad</h2>
        <h3>Round 2</h3>
        <h4 class="text-muted card-subtitle mb-5">General Skill Instructions</h4>
        <p class="card-text" style="text-align:left;"></p>

        <div class="container" style="text-align:left;">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $quizDetails->instructions ?>
                </div>

                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Duration of Skill Exam</td>
                                <td><?php echo $quizDetails->time ?> Minutes</td>
                            </tr>

                            <tr>
                                <td>Total number of questions</td>
                                <td><?php echo $quizDetails->total ?></td>
                            </tr>

                            <tr>
                                <td>Marks for every correct answer</td>
                                <td>+<?php echo $quizDetails->correct ?></td>
                            </tr>

                            <tr>
                                <td>Marks for every incorrect answer<br/></td>
                                <td><?php echo $quizDetails->wrong ?></td>
                            </tr>

                            <tr>
                                <td>Marks for every unattempted question (at the end of exam)</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Maximum Marks</td>
                                <td><?php echo $quizDetails->total*$quizDetails->correct ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="link">Quiz will start soon</div>
    </div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    jQuery.support.cors = true;
    $(document).bind("contextmenu",function (e) {
        e.preventDefault();
    });
    let checkStatus = () => {
        $.getJSON("<?php echo base_url().round2path.'/Instructions/checkQuizStatus/'.$quizDetails->quizid ?>?callback=?",function(json){
            // console.log(json + ' hiiii');
            if(Number(json)) {
                $('#link').html('<a href="<?php echo base_url().round2path.'/Quiz/'.$quizDetails->quizid ?>"><button class="my-button" type="button"><b>Start Exam</b></button></a>');
                clearInterval(myVar);
            }
        });
    };
    let myVar = setInterval(checkStatus, 5000);
</script>
</body>
</html>
