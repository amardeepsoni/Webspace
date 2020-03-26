<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examPortal/dist/styles.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <style>
    table {
        width: 100%;
        border: none;
    }

    td {
        text-align: left;
        /* font-size: 15px;
        font-size: 800; */
        border: none;
    }

    /* tr:nth-child(even) {
        background-color: #f2f2f2;
    } */
    p{
        margin-bottom:0 !important;
    }
    </style>
</head>

<body id="exam-dashboard">
   
<!-- <div style="height:100%"> -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Quiz Summary</h1>      
    <table>
        <tr>
            <th>Score</th>
            <th><?php echo $userHistory->score?></th>
        </tr>
        <tr>
            <th>Total Questions</th>
            <th><?php echo $quizDetails->total?></th>
        </tr>
        <tr>
            <th>Correct</th>
            <th><?php echo $userHistory->correct?></th>
        </tr>
        <tr>
            <th>Wrong</th>
            <th><?php echo $userHistory->wrong?></th>
        </tr>
        <tr>
            <th>Unattempted</th>
            <th><?php echo $quizDetails->total - $userHistory->correct - $userHistory->wrong ?></th>
        </tr>
    </table>
  </div>
</div>
<section>
    <div class="container-fluid">
        <div class="row">
        <table cellspacing="10">
            <col width="5%">
            <col width="50%">
            <col width="15%">
            <col width="30%">
            <tr>
                <th>S.No</th>
                <th style="padding-right: 3%">Question</th>
                <th>Response</th>
                <th>Answer</th>
            </tr>
            <!-- <?php print_r($questionDetails) ?> -->
            <?php $count = 1 ?>
            <?php foreach ($questionDetails as $ques) { ?>
                <?php if(isset($ques->correctAns->option_label)){?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td style="padding-right: 3%"><?php echo $ques->qnstext?></td>
                        <td >
                            <?php if($ques->userResponse) { ?>
                                <?php if($ques->userResponse->user_response == $ques->correctAns->option_label) { ?>
                                    <p style="color:green;"><?php echo $ques->userResponse->user_response.': '.$ques->userResponse->text?></p>
                                <?php } else {?>
                                    <p style="color:red;"><?php echo $ques->userResponse->user_response.': '.$ques->userResponse->text?></p>
                                <?php } ?>
                            <?php } else {?>
                                    <p style="color:red;"><?php echo 'Not Attempted'?></p>
                            <?php } ?>
                        </td>
                        <td>
                            <?php echo $ques->correctAns->option_label.': '.$ques->correctAns->text ?>
                        </td>
                    </tr>
                <?php }else{ ?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td style="padding-right: 3%"><?php echo $ques->qnstext?></td>
                        <td >
                            <?php if($ques->userResponse) { ?>
                                <?php if($ques->userResponse->user_response == $ques->correctAns->answer) { ?>
                                    <p style="color:green;"><?php echo $ques->userResponse->user_response?></p>
                                <?php } else {?>
                                    <p style="color:red;"><?php echo $ques->userResponse->user_response?></p>
                                <?php } ?>
                            <?php } else {?>
                                <p style="color:red;"><?php echo 'Not Attempted'?></p>
                            <?php } ?>
                        </td>
                        <td>
                            <?php echo $ques->correctAns->answer ?>
                        </td>
                    </tr>
                <?php } ?>

                
            <?php } ?>
        </table>
        <div style="margin:4%">
            <?php if($userHistory->score < ($quizDetails->correct*$quizDetails->total)/2){?>
                <a type="button" href="<?php echo  base_url().'/WeeklyQuiz/Quiz/'.$quizDetails->quizid ?>" class="btn btn-primary">Reattempt Quiz</a>
            <?php }?>
            <a type="button" href="<?php echo  base_url().'/WeeklyQuiz/Quizlist/'.$quizDetails->skill_id ?>" class="btn btn-primary">Quiz List</a>
        </div>
       
        </div>
    </div>
</section>
<!-- </div> -->
</body>

</html>