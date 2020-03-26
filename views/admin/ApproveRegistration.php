<style>

.x_panel{
    overflow:scroll;
}
</style>
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar')?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="container">
                <!-- <div class="clearfix"></div> -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $heading; ?>
									<a style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#modelId"> Manage Hidden Content</a>
<<<<<<< HEAD
									<a style="float:right" onclick="$('#imageform').attr('action', '<?php echo base_url(); ?>admin/ApproveRegistration/hide'); $('#imageform').submit();  " class="btn btn-primary"> Hide Content</a>
								</h2>
                                <div class="container col-12 col-sm-6 col-md-6 site-form" style="height:70vh">
=======
									<a style="float:right" onclick="$('#imageform').attr('action', '<?php echo base_url();?>admin/ApproveRegistration/hide'); $('#imageform').submit();  " class="btn btn-primary"> Hide Content</a>
								</h2>
                                <div class="container col-12 col-sm-6 col-md-6 site-form" >
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
								<form id="imageform" name="imageform" method="post">
                                    <table class="table table-dark" id="myTable">

                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">S.N.</th>
                                            <th scope="col">Category ID</th>
                                            <th scope="col">Registration Date/time</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact Person Name</th>
                                            <th scope="col">Contact Person Designation</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Alternate Mobile</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Registration Count</th>
                                            <th scope="col">Intern</th>
                                            <th scope="col">School Type</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                    <?php
$i = 1;
foreach ($schools as $school) {
	if ($school->disapprovedStudents) {
		echo
		'<tbody>' .
		'<tr>' .
<<<<<<< HEAD
		'<td><input type="checkbox" class="flat" name="table_records[]" id="' . $school->category_id . '" value="' . $school->category_id . '"></td>' .
=======
		'<td><input type="checkbox" class="flat" name="table_records[]" id="'. $school->category_id .'" value="'. $school->category_id .'"></td>' .
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
		'<td>' . $i . '</td>' .
		'<td>' . $school->category_id . '</td>' .
		'<td>' . $school->date_registered . '</td>' .
		'<td>' . $school->name . '</td>' .
		'<td>' . $school->email . '</td>' .
		'<td>' . $school->contact_person_name . '</td>' .
		'<td>' . $school->contact_person_designation . '</td>' .
		'<td>' . $school->mobile . '</td>' .
		'<td>' . $school->mobile1 . '</td>' .
		'<td>' . $school->address . " " . $school->State . " " . $school->City . " " . $school->Pincode . '</td>' .
		'<td>' . $school->regcount . '</td>' .
		'<td>' . $school->intern . '</td>' .
		'<td>' . $school->school_type . '</td>' .
		'<td><a class="btn btn-info" type="button" href="' .
		base_url() . adminpath . '/ApproveRegistration/approveAll/' . $school->category_id .
			'">Approve All Students</a></td>' .
			'</tr>' .
			'</tbody>';
	} else {
		echo
		'<tbody>' .
		'<tr>' .
<<<<<<< HEAD
		'<td><input type="checkbox" class="flat" name="table_records[]" id="' . $school->category_id . '" value="' . $school->category_id . '"></td>' .
=======
		'<td><input type="checkbox" class="flat" name="table_records[]" id="'. $school->category_id .'" value="'. $school->category_id .'"></td>' .
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
		'<td>' . $i . '</td>' .
		'<td>' . $school->category_id . '</td>' .
		'<td>' . $school->date_registered . '</td>' .
		'<td>' . $school->name . '</td>' .
		'<td>' . $school->email . '</td>' .
		'<td>' . $school->contact_person_name . '</td>' .
		'<td>' . $school->contact_person_designation . '</td>' .
		'<td>' . $school->mobile . '</td>' .
		'<td>' . $school->mobile1 . '</td>' .
		'<td>' . $school->address . " " . $school->State . " " . $school->City . " " . $school->Pincode . '</td>' .
		'<td>' . $school->regcount . '</td>' .
		'<td>' . $school->intern . '</td>' .
		'<td>' . $school->school_type . '</td>' .
			'<td style="color: green">Approved</td>' .
			'</tr>' .
			'</tbody>';
	}
	$i++;
}
?></table></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog container" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2><?php echo $heading; ?>
					<button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">Close</span>
					</button>
<<<<<<< HEAD
					<a style="float:right" onclick="$('#imageform1').attr('action', '<?php echo base_url(); ?>admin/ApproveRegistration/show'); $('#imageform1').submit();  " class="btn btn-primary"> Revert</a>
				</h2>
			</div>
			<div class="modal-body" style="overflow:auto; height: 80vh;">
=======
					<a style="float:right" onclick="$('#imageform1').attr('action', '<?php echo base_url();?>admin/ApproveRegistration/show'); $('#imageform1').submit();  " class="btn btn-primary"> Revert</a>
				</h2>
			</div>
			<div class="modal-body" style="overflow:auto">
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
			<form id="imageform1" name="imageform" method="post">
                                    <table class="table table-dark" id="myTable">

                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">S.N.</th>
                                            <th scope="col">Category ID</th>
                                            <th scope="col">Registration Date/time</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact Person Name</th>
                                            <th scope="col">Contact Person Designation</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Alternate Mobile</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Registration Count</th>
                                            <th scope="col">Intern</th>
                                            <th scope="col">School Type</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                    <?php
$i = 1;
foreach ($hiddenSchools as $hSchool) {
<<<<<<< HEAD

	echo
	'<tbody>' .
	'<tr>' .
	'<td><input type="checkbox" class="flat" name="table_records[]" id="h' . $hSchool->category_id . '" value="' . $hSchool->category_id . '"></td>' .
	'<td>' . $i . '</td>' .
	'<td>' . $hSchool->category_id . '</td>' .
	'<td>' . $hSchool->date_registered . '</td>' .
	'<td>' . $hSchool->name . '</td>' .
	'<td>' . $hSchool->email . '</td>' .
	'<td>' . $hSchool->contact_person_name . '</td>' .
	'<td>' . $hSchool->contact_person_designation . '</td>' .
	'<td>' . $hSchool->mobile . '</td>' .
	'<td>' . $hSchool->mobile1 . '</td>' .
	'<td>' . $hSchool->address . '</td>' .
	'<td>' . $hSchool->regcount . '</td>' .
	'<td>' . $hSchool->intern . '</td>' .
	'<td>' . $hSchool->school_type . '</td>' .
	'<td><a class="btn btn-info" type="button" href="' .
	base_url() . adminpath . '/ApproveRegistration/approveAll/' . $hSchool->category_id .
		'">Approve All Students</a></td>' .
		'</tr>' .
		'</tbody>';

=======
	
		echo
		'<tbody>' .
		'<tr>' .
		'<td><input type="checkbox" class="flat" name="table_records[]" id="h'. $hSchool->category_id .'" value="'. $hSchool->category_id .'"></td>' .
		'<td>' . $i . '</td>' .
		'<td>' . $hSchool->category_id . '</td>' .
		'<td>' . $hSchool->date_registered . '</td>' .
		'<td>' . $hSchool->name . '</td>' .
		'<td>' . $hSchool->email . '</td>' .
		'<td>' . $hSchool->contact_person_name . '</td>' .
		'<td>' . $hSchool->contact_person_designation . '</td>' .
		'<td>' . $hSchool->mobile . '</td>' .
		'<td>' . $hSchool->mobile1 . '</td>' .
		'<td>' . $hSchool->address . '</td>' .
		'<td>' . $hSchool->regcount . '</td>' .
		'<td>' . $hSchool->intern . '</td>' .
		'<td>' . $hSchool->school_type . '</td>' .
		'<td><a class="btn btn-info" type="button" href="' .
		base_url() . adminpath . '/ApproveRegistration/approveAll/' . $hSchool->category_id .
			'">Approve All Students</a></td>' .
			'</tr>' .
			'</tbody>';
	
>>>>>>> 2756f9c603d7b2e23668de60f0e9df5b1a957a64
	$i++;
}
?></table></form>
			</div>
		</div>
	</div>
</div>