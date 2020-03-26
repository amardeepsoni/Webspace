
<!DOCTYPE html>
<html>
<head>


	<title>Discussion Forum</title>
	  <meta name="viewport" content="width, initial scale =1.0"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script type="text/javascript">

	</script>
	<style>
		.upbtn{
			background: none;
			border: none;
			outline: none!important;
			outline-color: white!important;
			color:#888!important;
		}


		.container header{
background:#234a66;
border:1px solid #fff;
padding: 1em;
width: 100%;
color: #fff;
display: inline-flex;
}
.profile{
width: 100px;
height: 100px;
border-radius: 50%;
background: #fff;
border: 1px solid gray;
overflow: hidden;
}
.profile img {
	width: inherit;
	height: inherit;
}
.profile1{
width: 70px;
height: 70px;
border-radius: 50%;
background: #fff;
border: 1px solid gray;
overflow: hidden;
}
.profile1 img{
	width: inherit;
	height: inherit;
}
.container header span{
margin-left: 1em;
}
.container header h4{
font-size: 25px;
margin-left: .5em;
line-height: 1.5em;
}
main{
border: 2px solid gainsboro;
margin-top: 1.5em;
width: 100%;
padding: 1em;
}


a{
color: #fff;
background: ;
border-radius: 3px;
text-decoration: none;
padding: .5em;
}
a:hover{
color: #fff;
text-decoration: none;
}

.stooltip {
  position: relative;
  display: inline-block;
  outline: none!important;
  border:none!important;
}

.stooltip .stooltiptext {
  visibility: hidden;
  width: auto;
  background-color: #234a66;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
    border:none!important;
    outline: none!important;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.stooltip:hover .stooltiptext {
  visibility: visible;
    border:none!important;
    outline: none!important;
}

@media screen and (min-device-width: 200px) and (max-device-width: 450px){
  .container{
        max-width: 100%;
        padding-left:1em;
        padding-right:1em;
        font-size:2.5em;
    }

}
@media screen and (min-device-width: 450px) and (max-device-width: 900px){
  .container{
        max-width: 100%;
        padding-left:1em;
        padding-right:1em;
        font-size:2em;
    }


}
	</style>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<body>
<!--
<div class="container" style="display: none;">



	<form class="form" action="<?php echo base_url() ?>/Discussionforum/addPost" method="post">
		<input type="text" name="student_id" value="<?php echo $this->session->userdata('studentlogged_in')['id'] ?>" hidden>
		<input type="text" name="student_email" value="<?php echo $this->session->userdata('studentlogged_in')['email'] ?>" hidden>
		<input type="text" name="student_name" value="<?php echo $this->session->userdata('studentlogged_in')['firstname'] . " " . $this->session->userdata('studentlogged_in')['lastname']; ?>" hidden>
		<div class="form-group">
		<label for="Topic"><strong>Topic :</strong></label>
			<input type="text" name="topic">
		</div>
		<div class="form-group">
		<label for="Question"><strong>Question :</strong></label>
			<input type="text" name="post_detail">
		</div>

		<div class="form-group"><button>Send</button></div>



	</form>
</div>-->

<div class="container pt-5">

	<?php if ($post) {?>
		<header>
			<div class="profile"><img src="<?php echo base_url(); ?>assets/img/User_anser_auth.png" alt=""></div>
			<div>
				<span style="text-transform: capitalize!important;"><?php echo $post[0]['student_name']; ?></span>
				<h4><?php echo '<strong>Question : </strong>' . $post[0]['post_text']; ?></h4>
			</div>
		</header>
	<?php if ($post_ans) {?>
		        <?php foreach ($post_ans as $ans) {?>

		<main class="section">
			<div class="row pb-2">
			<div class="col-1"><div class="profile1"><img src="<?php echo base_url(); ?>assets/img/User_anser_auth.png" alt=""></div></div>
			<div class="col-11 pt-3"> <span class="pl-1" style="text-transform: capitalize!important;"><?php echo $ans['ans_owner']; ?></span></div>
			</div>
<<<<<<< HEAD


			<div class="card-body" style="background: #eee">
=======
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64

				<p><b>Ans:</b> <?php echo $ans['ans']; ?></p>

			<div class="card-body" style="background: #eee">

<<<<<<< HEAD
=======
				<p><b>Ans:</b> <?php echo $ans['ans']; ?></p>


>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
				<?php if ($this->session->userdata('studentlogged_in')['username'] || $this->session->userdata('schoollogged_in')['id']) {?>
				<button class="upbtn" id="downvote<?php echo $ans['ans_id']; ?>" value="<?php echo $ans['ans_id']; ?>">
													<i id="downvotesvalue">
														<i class="fa fa-arrow-down" style="color: #888;"></i>
														<i id="downvotep<?php echo $ans['ans_id']; ?>">
															<?php echo $ans['downvotes']; ?>
														</i>

														</i>

				</button>
			<button class="upbtn" id="upvote<?php echo $ans['ans_id']; ?>" value="<?php echo $ans['ans_id']; ?>">
													<i class="fa fa-arrow-up" style="color: #888;"></i>
													<i id="upvotep<?php echo $ans['ans_id']; ?>">
														<?php echo $ans['upvotes']; ?>

														</i>

				</button>
				<?php } else {?>
				<button class="stooltip" value="<?php echo $ans['ans_id']; ?>">
													<i id="downvotesvalue">
														<i class="fa fa-arrow-down" style="color: #888;"></i>
														<i id="downvotep<?php echo $ans['ans_id']; ?>">
															<?php echo $ans['downvotes']; ?>
														</i>

														</i>
						 <span class="stooltiptext">Log In <a href="#">Student</a>&nbsp;/&nbsp;<a href="#">School</a></span>

				</button>

			<button class="stooltip" value="<?php echo $ans['ans_id']; ?>">
													<i class="fa fa-arrow-up" style="color: #888;"></i>
													<i id="upvotep<?php echo $ans['ans_id']; ?>">
														<?php echo $ans['upvotes']; ?>

														</i>
							 <span class="stooltiptext">Log In <a href="#">Student</a>&nbsp;/&nbsp;<a href="#">School</a></span>


				</button>
				<?php }?>

				 &nbsp;&nbsp;
				 <li class="fas fa-clock" style="color:#888;"></li> &nbsp;<abbr style="color:#888;" class="timeago m-0" title="<?php echo $ans['created_at']; ?>"></abbr>
				<?php if ($this->session->userdata('studentlogged_in')['username'] || $this->session->userdata('schoollogged_in')['id']) {?>


				 &nbsp;&nbsp; <button style="background: none;border: none;outline: none;" id="edit<?php echo $ans['ans_id']; ?>"><li class="fas fa-edit" style="color:#888;"></li></button>
				<?php }?>

			</div>
			<script type="text/javascript">

											$(document).ready(function(){
												$("#upvote<?php echo $ans['ans_id']; ?>").click(function(){
													var upvote = $("#upvote<?php echo $ans['ans_id']; ?>").val();
<<<<<<< HEAD
													var ownernames = "<?php echo $ans['ans_owner']; ?>";
													var ownerids = "<?php if ($this->session->userdata('studentlogged_in')['username']) {echo $this->session->userdata('studentlogged_in')['username'];} else {echo $this->session->userdata('schoollogged_in')['id'];}?>";
													var votegiven = "1";
													$.ajax({
															type 	: 'POST',
															dataType : "JSON",
															data 	: {
																		upvote:upvote,
																		ownernames:ownernames,
																		ownerids:ownerids,
																		votegiven:votegiven
															},
=======
													var ownername = '<?php echo $ans['ans_owner']; ?>';
													$.ajax({
															type 	: 'POST',
															dataType : "JSON",
															data 	: {upvote:upvote,owername:owername},
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
															url 	: '<?php echo base_url(); ?>Answer/upVote',
															success : function(upinfo){

																		if(upinfo)
																			{

																					var txt  = upinfo[0] ;
																					var obj = JSON.stringify(txt);
																					var obj2 = JSON.parse(obj);
																						$("#downvotep<?php echo $ans['ans_id']; ?>").text(obj2.downvotes);
																				$("#upvotep<?php echo $ans['ans_id']; ?>").text(obj2.upvotes);

																			}
															}

														});

												});



												$("#downvote<?php echo $ans['ans_id']; ?>").click(function(){
													var downvote = $("#downvote<?php echo $ans['ans_id']; ?>").val();
													var ownername = '<?php echo $ans['ans_owner']; ?>';
<<<<<<< HEAD
													var ownernames = "<?php echo $ans['ans_owner']; ?>";
													var ownerids = "<?php if ($this->session->userdata('studentlogged_in')['username']) {echo $this->session->userdata('studentlogged_in')['username'];} else {echo $this->session->userdata('schoollogged_in')['id'];}?>";
													var d_votegiven = "1";
													$.ajax({
															type 	: 'POST',
															dataType : "JSON",
															data 	: {
																downvote:downvote,
																ownernames:ownernames,
																ownerids:ownerids,
																d_votegiven:d_votegiven
															},
=======
													$.ajax({
															type 	: 'POST',
															dataType : "JSON",
															data 	: {downvote:downvote,ownername:ownername},
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
															url 	: '<?php echo base_url(); ?>Answer/downVote',
															success : function(downinfo){

																		if(downinfo)
																			{

																					var txt  = downinfo[0] ;
																					var obj = JSON.stringify(txt);
																					var obj2 = JSON.parse(obj);


																					$("#downvotep<?php echo $ans['ans_id']; ?>").text(obj2.downvotes);
																				$("#upvotep<?php echo $ans['ans_id']; ?>").text(obj2.upvotes);

																			}
															}

														});

												});


											});



										</script>

		</main>

		<?php }?>
						<?php } else {?>


									<main class="section">
													<h4>Be the first one to answer this quetion !</h4>
									</main>



						<?php	}?>
						<br>

		<a class="btn btn-warning" href="#" onclick="window.history.back();">Go back</a>
			<?php } else {redirect('/Discussionforum');}?>
	</div>

<script>


                (function timeAgo(selector) {

    var templates = {
        prefix: "",
        suffix: " ago",
        seconds: "less than a minute",
        minute: "about a minute",
        minutes: "%d minutes",
        hour: "about an hour",
        hours: "about %d hours",
        day: "a day",
        days: "%d days",
        month: "about a month",
        months: "%d months",
        year: "about a year",
        years: "%d years"
    };
    var template = function(t, n) {
        return templates[t] && templates[t].replace(/%d/i, Math.abs(Math.round(n)));
    };

    var timer = function(time) {
        if (!time)
            return;
        time = time.replace(/\.\d+/, ""); // remove milliseconds
        time = time.replace(/-/, "/").replace(/-/, "/");
        time = time.replace(/T/, " ").replace(/Z/, " UTC");
        time = time.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // -04:00 -> -0400
        time = new Date(time * 1000 || time);

        var now = new Date();
        var seconds = ((now.getTime() - time) * .001) >> 0;
        var minutes = seconds / 60;
        var hours = minutes / 60;
        var days = hours / 24;
        var years = days / 365;

        return templates.prefix + (
                seconds < 45 && template('seconds', seconds) ||
                seconds < 90 && template('minute', 1) ||
                minutes < 45 && template('minutes', minutes) ||
                minutes < 90 && template('hour', 1) ||
                hours < 24 && template('hours', hours) ||
                hours < 42 && template('day', 1) ||
                days < 30 && template('days', days) ||
                days < 45 && template('month', 1) ||
                days < 365 && template('months', days / 30) ||
                years < 1.5 && template('year', 1) ||
                template('years', years)
                ) + templates.suffix;
    };

    var elements = document.getElementsByClassName('timeago');
    for (var i in elements) {
        var $this = elements[i];
        if (typeof $this === 'object') {
            $this.innerHTML = timer($this.getAttribute('title') || $this.getAttribute('datetime'));
        }
    }
    // update time every minute
    setTimeout(timeAgo, 60000);

})();

             </script>



</body>
</html>
