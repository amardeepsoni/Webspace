<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examPortal/dist/styles.css">
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
   
    .card-body{
        font-size: 15px !important;
    }
    .numberCircle {
    border-radius: 50%;
    width: 50px !important;
    height: 50px !important;
    padding: 8px;
    background: #fff;
    border: 2px solid #666;
    color: #666;
    font: 25px Arial, sans-serif !important;
    display: inline-block;
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
    .card-body label{
        font-size:18px !important;
    }
    input[type=checkbox]+label {
        word-wrap: break-word; 
        width:300%;
    }

</style>
<body>
<div>
<!-- <?php print_r(quiz)?> -->
    <div class="header">
        <div class="navbar navbar-expand-md">
            <div class="collapse navbar-collapse" id="navcol-1">
                <div style="min-width:85%; display:flex; flex-direction:row">
                    <img src="<?php echo base_url();?>images/logo (1).png" style="width:150px;height:90px" >
                    <div style="display:flex; flex-direction:column; margin-top: 1%;">
                    <p style="padding-right:20px; font-size:15px; margin:0; padding:0" class="navbar-brand" >Name: <?php echo $_SESSION['round2_login']['firstname'].' ' .$_SESSION['round2_login']['lastname'] ?></p>
                    <p style="padding-right:20px; font-size:15px; margin:0; padding:0" class="navbar-brand" >Registration ID: <?php echo $_SESSION['round2_login']['username'] ?></p>
                    <p style="padding-right:20px; font-size:15px; margin:0; padding:0" class="navbar-brand" >Skill Name: <?php
                        echo $skill_name->skill_name;
                        ?></p>
                    </div>
                   <div style="padding-left: 18%;font-size: 30px;padding-top: 2%;">
                       ISCO 2019
                   </div>
                    <div style="    font-size: 20px; padding-left: 20%; padding-top: 3%;">
                        Timer: <p style="display:inline" id="demo"></p>
                    </div>
                </div>
                <button class="btn btn-warning button1" data-toggle="modal" data-target="#exampleModal">SUBMIT EXAM</button>
                <!-- <button type="button" style= "display:" id="modal" >Modal</button> -->
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
    padding-left: 40%;">
    <div style="text-align:center; padding-top:3%" id="sendButton">
        <button class="btn btn-primary" id="saveAndNext" type="submit">Save & Next</button>
    </div>
    <div style="text-align:center; padding-top:3%" id="skipButton">
        <button class="btn btn-danger" id="skipAndNext" type="submit">Skip & Next</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        // let shuffle = (a) => a.sort(() => Math.random() - 0.5);
        // let quesData = shuffle(<?php echo json_encode($questionDetails) ?>);
        let quesData = <?php echo json_encode($questionDetails) ?>;
        console.log(quesData);
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
                                '<input type="checkbox" id="op1" name="ans" value="A">'+
                                '<label for="op1">'+quesData[count].options[0].text+'</label>';
                if(quesData[count].options[0].image)
                    options +=  '<img class="img-thumbnail"  id="myImg" src="'+quesData[count].options[0].image+'" alt="question">';
                options +=  '<input type="checkbox" id="op2" name="ans" value="B">'+
                            '<label for="op2">'+quesData[count].options[1].text+'</label>';
                if(quesData[count].options[1].image)
                    options +=  '<img class="img-thumbnail" id="myImg" src="'+quesData[count].options[1].image+'" alt="question">';
                options += '<input type="checkbox" id="op3" name="ans" value="C">'+
                            '<label for="op3">'+quesData[count].options[2].text+'</label>';
                if(quesData[count].options[2].image)
                    options +=  '<img class="img-thumbnail" id="myImg" src="'+quesData[count].options[2].image+'" alt="question">';
                options +=      '<input type="checkbox" id="op4" name="ans" value="D">'+
                                '<label for="op4">'+quesData[count].options[3].text+'</label>';
                if(quesData[count].options[3].image)
                    options +=  '<img class="img-thumbnail" id="myImg" src="'+quesData[count].options[3].image+'"alt="question">'; 
                options +=  '</form>';             
                $('#options').html(options);
            }
            else if(quesData[count].options.length === 2) {
                var options =  '<form class="card-body">'+
                                '<input type="checkbox" id="op1" name="ans" value="A">'+
                                '<label for="op1">'+quesData[count].options[0].text+'</label>';
                if(quesData[count].options[0].image)
                    options +=  '<img id="myImg" src="'+quesData[count].options[0].image+'" alt="question">'; 
                options +=  '<input type="checkbox" id="op2" name="ans" value="B">'+
                             '<label for="op2">'+quesData[count].options[1].text+'</label>';
                if(quesData[count].options[1].image)
                    options +=  '<img class="img-thumbnail" id="myImg" src="'+quesData[count].options[1].image+'" alt="question">'; 
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
        for(let i = 1; i<=quesData.length;i++)
        $('#myPanel').append('<div id="qpanel'+i+'" class="numberCircle">'+i+'</div>');
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
                url: "<?php echo base_url().round2path.'/Quiz/handleUserResponse' ?>",
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
            count++;
            if(count == quesData.length-1) {
                console.log("hi there");
                $('#skipButton').html('<button class="btn btn-primary submitQuiz" type="submit">Submit</button>');
            }
            updateDOM();
            console.log(userResponse);
        };
        
        let skipQues = () => {
            count++;
            if(count == quesData.length-1) {
                console.log("hi there");
                $('#skipButton').html('<button class="btn btn-primary submitQuiz"  type="submit">Submit</button>');
            }
                updateDOM();
        };
        let submitQuizResponse = () => {
            window.onbeforeunload = null;
            location.reload();
        }
     

        //console.log(count);
        $(document).on('click','#saveAndNext',saveQues);
        $(document).on('click','#skipAndNext',skipQues);
        $(document).on('click','.submitQuiz', submitQuizResponse);

        $(document).on('click', 'input:checkbox' ,function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
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
        quizTime.setMinutes( quizTime.getMinutes() + <?php echo $quizDetails->time?> );
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
        //     console.log(distance);
        //    console.log(now);
        //    console.log(quizTime);
            if (distance < 0) {
                submitQuizResponse();
                clearInterval(x);
            }
        }, 1000);

           
window.onbeforeunload = function () {
        const quizTime = new Date();
        quizTime.setMinutes(quizTime.getMinutes() + <?php echo $quizDetails->time?>);
        var now = new Date().getTime();
        var distance = quizTime - now;   
    if (distance < 0)
        return true;
    else
        return "Do you really want to close?";
};

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


    // ======================================================
    // Full Screen
    $(function openFullscreen() {
        var elem = document.documentElement;
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
    });
    
    $('.submitQuiz').click( function () {
        var elem = document.documentElement;
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) { /* Firefox */
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE/Edge */
            document.msExitFullscreen();
        }
    });
    function fullScreen(element) {
        if(element.requestFullScreen) {
            element.requestFullScreen();
        } else if(element.webkitRequestFullScreen ) {
            element.webkitRequestFullScreen();
        } else if(element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        }
    }
    var html = document.documentElement;
    fullScreen(html);
        

    // ==============================================================
    // Right Click
    $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    });
    // document.attachEvent("onkeydown", win_onkeydown_handler);

    $(document).keydown(function(e){
        var key = e.charCode || e.keyCode;
        if (key == 17) { 
            e.preventDefault();
        }	
    });
    $(document).keydown(function(e){
        var key = e.charCode || e.keyCode;
        if (key == 27) { 
            e.preventDefault();
        }	
    });

</script>
</body>

</html>
