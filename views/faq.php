<!DOCTYPE html>
<html>
<head>
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

	<div style="margin-right:3%;margin-left:3%">
		<ul>
		<?php if($faqs) {?>
		        <?php foreach($faqs as $faq) { ?>

		            <li>
									<!-- <button type="button" class="btn collapsible">Open Collapsible</button>
									<div class="content">
									  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div> -->
									<div class="question-frame">
										<div class="row">
											<div class="col-sm-8" style="margin-bottom:5px;">
												<h5><?php echo $faq['questions']; ?></h5>
											</div>
											<div class="col-sm-2 question-btn" style="float:right; margin-bottom:5px;">
												<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo $faq['id']; ?>">
													<i class="fa fa-arrow-down fa-lg" aria-hidden="true"></i>
												</button>
												<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo $faq['id']; ?>" style="display:none;">
													<i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i>
												</button>
											</div>
										</div>
										<div id="<?php echo $faq['id']; ?>" class="collapse" style="font-size:1.6rem;padding:1rem;">
											<?php echo $faq['answers']; ?>
										</div>
									</div>
		              
		            </li>

		      	<?php } ?>
		<?php } ?>
	</ul>
</div>
	</div>
</body>
</html>
