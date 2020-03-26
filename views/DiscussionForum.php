
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Intellify | Discussion</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/bootstrap/css/discussion/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/styles.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<style type="text/css">
    .tag{
        background:#13B6EC;
        border-radius: 5px; padding: 2px;
    }
</style>
</head>

<body id="page-top" style="">
    <div class="jumbotron row bg-white" style="padding: 20px;">
        <div class="col-sm-4">
            <img src="<?php echo base_url(); ?>images/logo-new.png">
        </div>
        <div class="col-sm-8">

              <?php if ($this->session->userdata('studentlogged_in')['username']) {

	?>
               <a href="<?php echo base_url('/login/logout'); ?>"> <div class="border-warning md:border-white btn btn-outline-warning float-right" style="margin-right: 10px; padding: 10px;">
               Log Out
            </div></a>

           <a href="<?php echo base_url('/login'); ?>"> <div class="border-info md:border-white btn btn-outline-info float-right" style="margin-right: 10px;">
               <img class="rounded-circle img-thumbnail border-info" style="width: 30px; height: 30px;" src="<?php echo base_url(); ?>/icos.png"> My Account
            </div></a>


                    <?php } else if ($this->session->userdata('schoollogged_in')['id']) {
	?>

                      <a href="<?php echo base_url('/schoollogin/schoollogout'); ?>"> <div class="border-warning md:border-white btn btn-outline-warning float-right" style="margin-right: 10px; padding: 10px;">
               Log Out
            </div></a>

           <a href="<?php echo base_url('/schoollogin'); ?>"> <div class="border-info md:border-white btn btn-outline-info float-right" style="margin-right: 10px;">
               <img class="rounded-circle img-thumbnail border-info" style="width: 30px; height: 30px;" src="<?php echo base_url(); ?>/icos.png"> My Account
            </div></a>

            <?php } else {?>
             <a href="<?php echo base_url('/registration'); ?>"> <div class="border-info md:border-white btn btn-outline-info float-right" style="margin-right: 10px;padding: 10px;">
                Sign Up
            </div></a>
            <?php }?>

           <a href="<?php echo base_url(''); ?>"> <div class="border-info md:border-white btn btn-outline-info float-right" style="margin-right: 10px;padding: 10px;">
                Home
            </div></a>
        </div>
    </div>
<div class="container-fluid row">
    <div class="col-sm-12">
        <nav class="navbar navbar-expand-sm" style="background: #234a66">
  <div class="form-inline">
    <input class="form-control mr-sm-2" id="myInput" type="text" placeholder="Search">
 </div>
  <?php if ($this->session->userdata('studentlogged_in')['username'] || $this->session->userdata('schoollogged_in')['id']) {?>
 <a class="btn btn-outline-primary bg-light" style="padding: 10px 30px 10px 30px;position: absolute;right: 20px;" data-toggle="modal" href="#postModal" id="postmodal">
    Post
    <!-- <div class="card shadow border-left-success py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>POST NEW question</span></div>
                    <div class="text-dark font-weight-bold h5 mb-0"><span>GOT A QUERY?</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-pen fa-2x text-gray-300"></i></div>
            </div>
        </div>
    </div> -->
</a>


<?php } else {?>


   <!--  <div class="card shadow border-left-success py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col mr-2">
                   <div class="text-dark font-weight-bold h5 mb-0"><span>Login : <a href="<?php echo base_url('login'); ?>" class="login">Student</a> / <a href="<?php echo base_url('schoollogin'); ?>" class="login"> School</a></span></div>
                </div>
                <div class="col-auto"><i class='fas fa-sign-in-alt' style='font-size:36px'></i></div>
            </div>
        </div>
    </div> -->

  <div class="dropdown" style="position: absolute;right: 20px;">
    <a type="button" class="btn dropdown-toggle" style="background: #04B0E8; color: white;" data-toggle="dropdown">
      Log In
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="<?php echo base_url('login'); ?>">Student</a>
      <a class="dropdown-item" href="<?php echo base_url('schoollogin'); ?>">School</a>

    </div>
  </div>


<?php }?>
</nav>
    </div>
     <div class="col-sm-3">
        <div class="card" style="margin-top: 10px; width: 100%;height: auto;background: #eee;">
            <div class="card-body" style="">
                Tags : <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">physics</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">physics</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">math</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">english</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">critical thinking</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">physics</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">physics</a>
                <a class="btn btn-outline-warning rounded-b px-1 py-1" style="font-size: 0.9em;margin-top: 5px;">physics</a>
            </div>
        </div>
     </div>
     <div class="col-sm-8">
<div class="skill-boxed">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>

                    <div class="row">

                        <div class="col-md-6 col-xl-3 mb-4">

    <div role="dialog" tabindex="-1" class="modal fade" id="postModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Post Your Answer</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() ?>/Discussionforum/addPost" method="post">
                    	<?php if ($this->session->userdata('schoollogged_in')['id']) {?>
							<input type="text" name="student_id" value="<?php echo $this->session->userdata('schoollogged_in')['id']; ?>" hidden>
						<input type="text" name="student_email" value="<?php echo $this->session->userdata('schoollogged_in')['email']; ?>" hidden>
						<input type="text" name="student_name" value="<?php echo $this->session->userdata('schoollogged_in')['name']; ?>" hidden>
							<?php } else {?>

                    	<input type="text" name="student_id" value="<?php echo $this->session->userdata('studentlogged_in')['id']; ?>" hidden>
						<input type="text" name="student_email" value="<?php echo $this->session->userdata('studentlogged_in')['email']; ?>" hidden>
						<input type="text" name="student_name" value="<?php echo $this->session->userdata('studentlogged_in')['firstname'] . " " . $this->session->userdata('studentlogged_in')['lastname']; ?>" hidden>
						<?php }?>
                      <div class="form-group">
                        <label for="tag">Question Tag</label>


                        <input  name="topic" type="text" data-role="tagsinput" style="width: 90%!important;" />

                      </div>
                      <div class="form-group">
                        <label for="question">Your Question:</label>
                          <textarea type="text" class="form-control" id="question" name="post_detail" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
 <?php if ($posts) {
	foreach ($posts as $post) {?>
  <div class="row"><div style="min-width:100%;">
    <div class="container-fluid card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center row">
            <div class="col-md-6">
                <h6 class="text-primary m-0" style="color: #000;">
                    <?php echo $post['student_name']; ?>
                    <a href="mailto:<?php echo $post['student_email']; ?>" style="color:#777;">(<?php echo $post['student_email']; ?>)</a>
                </h6>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <!--<button class="btn btn-link btn-sm" type="button">
                    <i class="far fa-thumbs-up text-gray-600" style="font-size: 30px;"></i>
                    <br/>22k
                </button>
                <button class="btn btn-link btn-sm" type="button">
                    <i class="far fa-thumbs-down text-gray-600" style="transform: rotateY(180deg); font-size: 30px;"></i>
                    <br/>22k
                </button> -->
            </div>
        </div>
        <div class="card-body">
            <p style="font-weight: 400; color: #000; font-size:1.5em;"><?php echo $post['post_text']; ?></p>
            <hr />
            <div class="row" style="min-width:100%;">
                <div class="col-md-6">
                    Last Updated
                   <!-- <h6 class="text-primary font-weight-bold m-0"><?php echo $post['created_at']; ?></h6> -->
                    <abbr class="timeago text-primary font-weight-bold m-0" title="<?php echo $post['created_at']; ?>">2 years ago</abbr>
                </div>

                <div class="col-md-6" style="text-align:right;">

                    <a class="btn btn-info" data-toggle="modal" href="#answerModal<?php echo $post['post_id']; ?>" id="answermodal" style="margin-bottom:5px; margin-top:5px;">
                        <div>
                            <span>
                                Give Answer
                                <i class="fa fa-pen"></i>
                            </span>
                        </div>
                    </a>
                    <a href="<?php echo base_url() ?>Answer/<?php echo $post['post_id']; ?>" class="btn btn-info">
                        <span>
                            View Answers
                            <i class="fa fa-arrow-right"></i>
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->userdata('studentlogged_in')['username'] || $this->session->userdata('schoollogged_in')['id']) {?>
<div role="dialog" tabindex="-1" class="modal fade" id="answerModal<?php echo $post['post_id']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Give Answer :</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form action="<?php echo base_url() ?>Answer/addAns/<?php echo $post['post_id']; ?>" method="post">

                    	<?php if ($this->session->userdata('schoollogged_in')['id']) {?>

						<input type="text" name="student_name" value="<?php echo $this->session->userdata('schoollogged_in')['name']; ?>" hidden>
							<?php } else {?>

						<input type="text" name="student_name" value="<?php echo $this->session->userdata('studentlogged_in')['firstname'] . " " . $this->session->userdata('studentlogged_in')['lastname']; ?>" hidden>
						<?php }?>
                      <div class="form-group">
                        <label for="answer">Your Answer:</label>
                          <textarea type="text" class="form-control" name="answer" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } else {?>

<div role="dialog" tabindex="-1" class="modal fade" id="answerModal<?php echo $post['post_id']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Log In</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <a class="btn btn-lg btn-primary btn-block text-uppercase w-100" href="<?php echo base_url('login'); ?>" style="margin-bottom:5px; margin-top:5px;">
                        <div>
                            <span>
                                Student
                           </span>
                        </div>
                    </a>
                    <hr>
                    <a href="<?php echo base_url('schoollogin'); ?>" class="btn btn-lg btn-primary btn-block text-uppercase w-100">
                        <span>
                            School
                        </span>
                    </a>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>


<?php }?>

</div>




<?php }?>
<?php } else {?>
<div class="card">
 <div class="card-body">
            <p style="font-weight: 400; color: #000; font-size:30px;">No Post Show!</p>


        </div>
 </div>

<?php }?>
      </div>
 </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Intellify 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top" style="position: fixed;z-index: 999; bottom: 30px; right: 10px;"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/theme.js"></script>
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

 $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".container-fluid.card.shadow.mb-4").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
             </script>

</div>
</div>
</div>

</body>

</html>





<!-- <!DOCTYPE html>
<html>
<head>

<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>FAQ's</title>
	<style>
	.question-frame {
	box-shadow: 0px 1px 3px;
	border-radius: 15px;
	padding: 30px;
	margin-top: 10px;
	background: white;
	margin-right: 0px !important;
	margin-left: 0px !important;
}
	</style>
</head>
<body>

<div class="container">



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
</div>




	<div style="margin-right:3%;margin-left:3%">
		<ul style="list-style: none;">
		<?php if ($posts) {?>
		        <?php foreach ($posts as $post) {?>

		            <li>
									<! <button type="button" class="btn collapsible">Open Collapsible</button>
									<div class="content">
									  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div> -->
								<!--	<a href="<?php echo base_url() ?>Answer/<?php echo $post['post_id'] ?>">
										<div class="question-frame">
											<div class="row">
												<div class="col-sm-8" style="margin-bottom:5px;">
													<h5><?php echo $post['post_text']; ?></h5>
												</div>
												<div class="col-sm-2" style="float:right; margin-bottom:5px;background: #DDD;">

												</div>
											</div>
										</div>
									</a>

		            </li>

		      	<?php }?>
		<?php } else {?>

		<li>
								<div class="question-frame">
											<div class="row">
												<div class="col-sm-8" style="margin-bottom:5px; text-align: center;">
													<h4>No Post to show!</h4>
												</div>
											</div>
										</div>
		</li>
<?php	}?>
	</ul>
</div>
	</div>
</body>
</html>
-->