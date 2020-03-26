
        <section class="upper-pan">
        <div class="container">
        <div class="row">
        
        <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="test-ist"><h2><?php echo $testname; ?></h2></div>
        </div>
        
         <div class="col-md-4 col-sm-12 col-xs-12">
         <div class="time-left-ns">TIME START <span id="timerstart"></span></div>
         </div>
         
          <div class="col-md-3 col-sm-12 col-xs-12">
          <div class="lang-sel">
          <select class="form-control ng">
          <option>English</option>
          <option>Hindi</option>
          </select>
          </div>
          </div>
        
        </div>
        </div>
        </section>
        

        
        <section class="bottom-main-pan">
        <div class="container">
        <div class="row">
    sds
    <input type="hidden" name="testname" id="testname" value="<?php echo $testname; ?>">
    <input type="hidden" name="testpanel_id" id="testpanel_id" value="<?php echo $testid; ?>">
    <input type="hidden" name="student_id" id="student_id" value="<?php echo $this->session->userdata('studentlogged_in')['id']; ?>">
    <input type="hidden" name="studentname" id="studentname" value="<?php echo $this->session->userdata('studentlogged_in')['firstname']; ?>">
    <input type="hidden" name="studentemail" id="studentemail" value="<?php echo $this->session->userdata('studentlogged_in')['email']; ?>">
    dsd
    
    
        
 <div class="col-md-8 col-sm-12 col-xs-12">
        

<?php
if($allquestionbanks) {
    ?>
<div class="tab-content">
<?php  
  foreach($allquestionbanks as $row){
    ?>

    <input type="hidden" name="questionidpage<?php echo $row['pageid']; ?>" id="questionid" value="<?php echo $row['id']; ?>">
<div class="con-paper-main tab-pane fade <?php if($row['pageid']==1){?> active in <?php } ?>" id="page<?php echo $row['pageid']; ?>">
<div id="London" class="tabcontent rnvs">
<div class="highlig-test"><h2>Question <?php echo $row['pageid']; ?>:</h2></div>
<div class="highlig-test-im">
  <h2><?php echo $row['name']; ?></h2>
  <?php if(!empty($row['image'])){?>
  <img src="<?php echo UPLOADFILE.$row['image']; ?>" class="img-responsive">
<?php } ?>

</div>

<div class="highlig-test-rd">
<table class="table">
<tr>
  <?php if($row['answers']){
    foreach($row['answers'] as $answer){?>
<td>
<input type="radio" value="<?php echo $answer['answer']; ?>" name="radiospage<?php echo $row['pageid']; ?>" <?php if($answer['answer']==$row['rightanswer']){?> checked <?php } ?>id="rOption1_1"> <?php echo $answer['answer']; ?>
</td>
<?php } } ?>
</tr>
</table>
</div>
</div>
</div>

<?php } ?>

</div>
<?php } ?>

<div class="bot-button-ns-sec">
<button class="av-1 btn-save-answer">SAVE & NEXT</button>
<button class="av-2 btn-save-mark-answer">SAVE & NEXT MARK FOR REVIEW</button>
<button class="av-3 btn-reset-answer">CLEAR RESPONSE</button>
<button class="av-4 btn-mark-answer">MARK FOR REVIEW & NEXT</button>

</div>

<div class="bot-button-bs-sec">
<button class="rsd-bt btnPrevious">BACK</button>
<button class="rsd-bt btnNext">NEXT</button>
<button class="av-5 submittest">SUBMIT</button>


</div>



        
       
        
        </div>
        
        
        <div class="row">
         <div class="col-md-4 col-sm-12 col-xs-12">
         
         <div class="roll-button-ns">
         <div class="photo"><img src="images/photo.png"></div>
         <div class="photo-2">
         <p>Roll No</p>
          <h3 style="margin-top:-3px;">154368-512</h3>
          
          <p style="margin-top:20px;">Candidate Name</p>
          <h3 style="margin-top:-3px;"><?php echo $studentinfo->firstname.' '.$studentinfo->lastname; ?> </h3>
          
          
         </div>
         </div>
         
         
         <div class="clearfix"></div>
         
         
         <div class="butto-new-ns">
         <ul class="nav nav-tabs but-new-sec-bt test-questions">
         <?php 
          if($allquestionbanks) {
            foreach($allquestionbanks as $row){

                if($row['save']){
                  $class="que-save";
                }
                else if($row['savemark']){
                  $class="que-save-mark";
                }
                else{
                   $class="que-not-attempted";
                }
              ?>
      <li class="<?php if($row['pageid']==1){?> active <?php } ?>" data-seq="<?php echo $row['pageid']; ?>">
        <a class="test-ques <?php echo $class ?>" data-href="page<?php echo $row['pageid']; ?>" data-toggle="tab" href="#page<?php echo $row['pageid']; ?>"><?php echo $row['pageid']; ?></a>
      </li>
      <?php }} ?>
         </ul>
         
        
         </div>
         
         
         
      <div class="clearfix"></div>   
    


<div class="bottom-diff-butt">
<div class="totalquizsection">
<div class="differ-butt">
<button class="ns-1 lblNotVisited"></button>
<p>Not Visited</p>
</div>

<div class="differ-butt-1">
<button class="ns-2 lblNotAttempted"></button>
<p>Not Answered</p>
</div>

<div class="differ-butt-2">
<button class="ns-3 lblTotalSaved"></button>
<p>Answered</p>
</div>


<div class="differ-butt-s">
<button class="ns-5 lblTotalMarkForReview"></button>
<p>Marked for Review</p>
</div>

<div class="differ-butt-s">
<button class="ns-5 lblTotalSaveMarkForReview">0</button>
<p>Answered & Marked</p>
</div>
</div>



</div>

          </div>
         </div>
        
        
        </div>        </div>
        </section> 
   
 <script>
 $(document).ready(function() {
  $('.btnNext').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
  });

  $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
  });


  });
</script>
<script>
  $(function(){
    $('#timerstart').countdowntimer({
      <?php if($hour>00){?>
        hours :<?php echo $hour; ?>,
      <?php } ?>
      <?php if($minutes>00){?>
        minutes :<?php echo $minutes; ?>,
      <?php } ?>
      size : "lg"
    });
  });
</script>