<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examPortal/dist/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</head>


<style>
    /* basic positioning */
    .legend { list-style: none; }
    .legend li { float: left; margin-right: 10px; }
    .legend span { border: 1px solid #ccc; float: left; width: 20px; height: 20px; margin: 2px; }
    /* your colors */
    .legend .superawesome { background-color: green; }
    .legend .awesome { background-color: white; }
    /* .legend .kindaawesome { background-color: #0000ff; }
    .legend .notawesome { background-color: #000000; } */
   .card-text {
    font-size: 20px !important;
    }
    .card-body{
        font-size: 15px !important;
    }
    .numberCircle {
    border-radius: 50%;
    width: 40px !important;
    height: 40px !important;
    padding: 5px;
    background: #fff;
    border: 2px solid #666;
    color: #666;
    font: 20px Arial, sans-serif !important;
    display: inline-block;
    cursor:pointer;
    margin: 4%;
    }
    .ques_attempted {
    background-color: green;
    color: white;
    }
    .ques_skip {
    background-color: yellow;
    color: white;
    }
    input[type=checkbox]+label {
        word-wrap: break-word;
        width:350%;
        font-size:18px;
    }
</style>
<body>

<div style="height:100%">
<div>
    <div class="header">
        <div class="navbar navbar-expand-md">
            <div class="collapse navbar-collapse" id="navcol-1">
                <div style="min-width:85%; display:flex; flex-direction:row">
                    <!-- <img src="<?php echo base_url(); ?>images/logo (1).png" style="width:150px;height:90px" > -->
                    <div style="display:flex; flex-direction:column; margin-top: 1%;">
                    <p style="padding-right:20px; font-size:15px; margin:0; padding:0" class="navbar-brand" >Name: <?php echo $_SESSION['studentlogged_in']['firstname'] . ' ' . $_SESSION['studentlogged_in']['lastname'] ?></p>
                    <p style="padding-right:20px; font-size:15px; margin:0; padding:0" class="navbar-brand" >Registration ID: <?php echo $_SESSION['studentlogged_in']['username'] ?></p>
                    <!-- <p style="padding-right:20px; font-size:15px; margin:0; padding:0" class="navbar-brand" >Skill Name: <?php
if ($quizDetails->skill_id == 1) {
	echo 'Analytical Reasoning';
} else if ($quizDetails->skill_id == 2) {
	echo 'Quantitative Aptitude';
} else if ($quizDetails->skill_id == 3) {
	echo 'Memory Speed Index';
} else if ($quizDetails->skill_id == 4) {
	echo 'Visual and Spatial Skills';
} else if ($quizDetails->skill_id == 5) {
	echo 'Verbal Comprehension';
}

?></p> -->
                    </div>
                   <div style="padding-left: 20%;font-size: 30px;padding-top: 2%; margin-bottom:3%">
                      Practice Quiz
                   </div>
                    <div style="    font-size: 20px; padding-left: 20%; padding-top: 2%;">
                        Timer: <p style="display:inline" id="demo"></p>
                    </div>
                </div>
                <button class="btn btn-warning button1 submitQuiz">SUBMIT EXAM</button>
            </div>
        </div>
    </div>
</div>
<div class="card-group">
    <div class="card-question" style="background:#E6E6E6">
        <div id="ques" class="card-body">
<!--            <h4 class="card-title">Question 9</h4>-->
<!--            <p class="card-text" style="padding-top:5%;">The table below has question-wise data on the performance of students in an examination. The marks for each question are also listed. There is no negative or partial marking in the examination. What is the average of the marks obtained by the class in the examination</p>-->
<!---->
<!--            <img id="myImg" src="assets/img/question_image.png" alt="question">-->
<!---->
<!--            <div id="myModal" class="modal">-->
<!--                <span class="close">&times;</span>-->
<!--                <img class="modal-content" id="img01">-->
<!--                <div id="caption"></div>-->
<!--            </div>-->
        </div>
    </div>
    <div class="card" style="background:#E6E6E6">
        <div id="options" class="card-body card-body-options">
<!--            <h4 class="card-title">Options</h4>-->
<!--            <form class="card-body">-->
<!--                <input type="checkbox" id="op1" name="op-1" value="A">-->
<!--                <label for="op1">1.34</label>-->
<!--                <input type="checkbox" id="op2" name="op-1" value="B">-->
<!--                <label for="op2">1.74</label>-->
<!--                <input type="checkbox" id="op3" name="op-1" value="C">-->
<!--                <label for="op3">3.02</label>-->
<!--                <input type="checkbox" id="op4" name="op-1" value="D">-->
<!--                <label for="op4">3.91</label>-->
<!--            </form>-->
        </div>
    </div>
    <div class="card" style="background:#E6E6E6">
        <div class="card-body card-body-panel">
            <h4 class="card-title">Question Panel</h4>
            <div id="myPanel"></div>
            <div>
                <ul class="legend">
                    <li><span class="superawesome"></span> Answered</li>
                    <li><span class="awesome"></span> Not Answered</li>
                    <!-- <li><span class="kindaawesome"></span>Answered</li>
                    <li><span class="notawesome"></span> Marked For View</li> -->
                </ul>
            </div>


        </div>
    </div>
</div>
<div style="text-align: center;display: flex;flex-direction: row; justify-content: space-around;align-items: center;
    padding-left: 40%;  margin-bottom: 2%;">
    <div style="text-align:center; padding-top:3% " id="sendButton">
        <button class="btn btn-primary" id="saveAndNext" type="submit">Save&Next</button>
    </div>
    <div style="text-align:center; padding-top:3%" id="skipButton">
        <!-- <button class="btn btn-danger" id="skipAndNext" type="submit">Next</button> -->
    </div>
</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

        // let shuffle = (a) => a.sort(() => Math.random() - 0.5);
        // let quesData = shuffle(<?php echo json_encode($questionDetails) ?>);
        let quesData = <?php echo json_encode($questionDetails) ?> ;
        // console.log(quesData);
        let count = 0;
        let userResponse = [];
        let updateDOM = () => {
            var question = '<h4 class="card-title">Question '+(count+1)+'</h4>' +
                            '<p class="card-text" style="padding-top:5%;">'+quesData[count].qnstext+'</p>'
            if(quesData[count].questions_img){
                question += '<img class="img-thumbnail" id="myImg" src="'+quesData[count].questions_img+'" alt="question">'; }
            question += '<div id="myModal" class="modal">'+
                        '<span class="close">&times;</span>'+
                        '<img class="modal-content" id="img01">'+
                        '<div id="caption"></div>'+
                        '</div>';
            $('#ques').html(question);
            if(quesData[count].options.length === 4) {
                var options =   '<h4 class="card-title">Options</h4>'+
                                '<form class="card-body">'+
                                '<input type="checkbox" id="op1" name="ans"  value="A">'+
                                '<label style="word-wrap: break-word" for="op1" style="width:100%">'+quesData[count].options[0].text+'</label>';
                if(quesData[count].options[0].image)
                    options +=  '<img class="img-thumbnail" id="myImg" src="'+quesData[count].options[0].image+'" alt="question">';
                options +=  '<input type="checkbox" id="op2" name="ans"  value="B">'+
                            '<label style="word-wrap: break-word" for="op2">'+quesData[count].options[1].text+'</label>';
                if(quesData[count].options[1].image)
                    options +=  '<img class="img-thumbnail"  id="myImg" src="'+quesData[count].options[1].image+'" alt="question">';
                options += '<input type="checkbox" id="op3" name="ans" value="C">'+
                            '<label style="word-wrap: break-word" for="op3">'+quesData[count].options[2].text+'</label>';
                if(quesData[count].options[2].image)
                    options +=  '<img  class="img-thumbnail" id="myImg" src="'+quesData[count].options[2].image+'" alt="question">';
                options +=      '<input type="checkbox" id="op4" name="ans" value="D">'+
                                '<label style="word-wrap: break-word" for="op4">'+quesData[count].options[3].text+'</label>';
                if(quesData[count].options[3].image)
                    options +=  '<img  class="img-thumbnail" id="myImg" src="'+quesData[count].options[3].image+'" alt="question">';
                options +=  '</form>';
                $('#options').html(options);
            }
            else if(quesData[count].options.length === 2) {
                var options =  '<form class="card-body">'+
                                '<input type="checkbox" id="op1" name="ans" value="A">'+
                                '<label style="word-wrap: break-word" for="op1">'+quesData[count].options[0].text+'</label>';
                if(quesData[count].options[0].image)
                    options +=  '<img  class="img-thumbnail" id="myImg" src="'+quesData[count].options[0].image+'" alt="question">';
                options +=  '<input type="checkbox" id="op2" name="ans" value="B">'+
                             '<label style="word-wrap: break-word" for="op2">'+quesData[count].options[1].text+'</label>';
                if(quesData[count].options[1].image)
                    options +=  '<img  class="img-thumbnail" id="myImg" src="'+quesData[count].options[1].image+'" alt="question">';
                options +=  '</form>';
                $('#options').html(options);
            }
            else if(quesData[count].options.length === 0) {
                $('#options').html(
                    '<form class="card-body">'+
                    '<input type="number" id="op1" name="ans">'+
                    '</form>'
                );
            }


        };

        updateDOM();
        // Question pannel
        for(let i = 1; i<=quesData.length;i++)
        $('#myPanel').append('<div id="qpanel'+i+'" class="numberCircle">'+i+'</div>');
        // Navigation
        for(let i = 1; i<=quesData.length;i++){
            $('#qpanel'+i).click(function(){
                // console.log(this.innerHTML);
                count = this.innerHTML;
                count--;

                if(userResponse[count]){
                    console.log(userResponse[count].userAnswer);
                    $('#ques').html(
                '<h4 class="card-title">Question '+(count+1)+'</h4>' +
                '<p class="card-text" style="padding-top:5%;">'+quesData[count].qnstext+'</p>' +
                '<img id="myImg"  class="" src="'+quesData[count].questions_img+'" alt="question">'+
                '<div id="myModal" class="modal">'+
                '<span class="close">&times;</span>'+
                '<img class="modal-content" id="img01">'+
                '<div id="caption"></div>'+
                '</div>'
            );
            if(quesData[count].options.length === 4) {
                $('#options').html(
                    '<h4 class="card-title">Options</h4>'+
                    '<form class="card-body">'+
                    '<input type="checkbox" id="op1" name="ans" value="A">'+
                    '<label for="op1">'+quesData[count].options[0].text+'</label>'+
                    '<input type="checkbox" id="op2" name="ans" value="B">'+
                    '<label for="op2">'+quesData[count].options[1].text+'</label>'+
                    '<input type="checkbox" id="op3" name="ans" value="C">'+
                    '<label for="op3">'+quesData[count].options[2].text+'</label>'+
                    '<input type="checkbox" id="op4" name="ans" value="D">'+
                    '<label for="op4">'+quesData[count].options[3].text+'</label>'+
                    '</form>'
                );
                if(userResponse[count].userAnswer === 'A'){
                    $('#op1').prop('checked', true);

                }
                if(userResponse[count].userAnswer === 'B'){
                    $('#op2').prop('checked', true);
                }
                if(userResponse[count].userAnswer === 'C'){
                    $('#op3').prop('checked', true);
                }
                if(userResponse[count].userAnswer === 'D'){
                    $('#op4').prop('checked', true);
                }
            }
            else if(quesData[count].options.length === 2) {
                $('#options').html(
                    '<form class="card-body">'+
                    '<input type="checkbox" id="op1" name="ans" value="A">'+
                    '<label for="op1">'+quesData[count].options[0].text+'</label>'+
                    '<input type="checkbox" id="op2" name="ans" value="B">'+
                    '<label for="op2">'+quesData[count].options[1].text+'</label>'+
                    '</form>'
                );
                if(userResponse[count].userAnswer === 'A'){
                    $('#op1').prop('checked', true);
                }
                if(userResponse[count].userAnswer === 'B'){
                    $('#op2').prop('checked', true);
                }
            }
            else if(quesData[count].options.length === 0) {
                $('#options').html(
                    '<form class="card-body">'+
                    '<input type="number" id="op1" name="ans">'+
                    '</form>'
                );
                $('#op1').val(userResponse[count].userAnswer);
            }

                }
                else{
                    updateDOM();
                }
            });
        };
        // if( $("input[name='ans']:checked")){
        //     saveQues();
        // }
        //Save and next
        let saveQues = () => {
            if(quesData[count].options.length) {
                userResponse[count] = {
                    'quesid': quesData[count].quesid,
                    'userAnswer': $("input[name='ans']:checked").val()
                };
            }
            else {
                userResponse[count] = {
                    'quesid': quesData[count].quesid,
                    'userAnswer': $("input[name='ans']").val()
                };
            }
            console.log(userResponse[count]);
            if(userResponse[count].userAnswer){
                $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'WeeklyQuiz/Quiz/handleUserResponse' ?>",
                data: userResponse[count],
                cors: true,
                xhrFields: {
                    withCredentials: true
                },
                async: true,
                crossDomain: true,
                dataType: 'json'
                });
                $('#qpanel'+(count+1)).addClass('ques_attempted');
                $('#qpanel'+(count+1)).removeClass('ques_skip');
            }
            else{
                $('#qpanel'+(count+1)).removeClass('ques_attempted');
            }

            skipQues();
        };

        let skipQues = () => {

                count++;
            if(count === quesData.length-1) {
                console.log(count);
                $('#skipButton').html('<button class="btn btn-primary submitQuiz" type="submit">Submit</button>');
                $('#sendButton').html(' <button class="btn btn-primary" id="saveAndNext" type="submit">Save</button>');

            }
                updateDOM();
        };
        let submitQuizResponse = () => {
            // saveQues();
            window.location.href = "<?php echo base_url() . 'WeeklyQuiz/Quiz/submit/' . $quizDetails->quizid ?>" ;
        };

        //console.log(count);
        $(document).on('click','#saveAndNext',saveQues);
        $(document).on('click','#skipAndNext',skipQues);
        $(document).on('click','.submitQuiz', submitQuizResponse);

        $(document).on('click', 'input:checkbox' ,function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            console.log($box.attr("name"));
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
        const quizTime = new Date();
        quizTime.setMinutes( quizTime.getMinutes() + <?php echo $quizDetails->time ?> );
        var x = setInterval(function() {
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = quizTime - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = hours + "h "
                + minutes + "m " + seconds + "s ";
            // If the count down is over, write some text
            if (distance < 0) {
                submitQuizResponse();
                clearInterval(x);
            }
        }, 1000);

        var modal = document.getElementById("myModal");
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        };
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        };
    });
</script>
</body>

</html>



