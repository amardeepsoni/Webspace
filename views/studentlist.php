<link href="<?php echo base_url(); ?>schoolassest/css/studentlist.css" rel="stylesheet">
<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>

    <div class="page-title section nobg">
        <div class="container-fluid">
            <div class="clearfix">
                <div class="title-area pull-left">
                    <h2><?php echo $heading; ?> <small></small></h2>
                </div>
                <!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <?php

if (isset($breadcrumbs)) {

	$bi = 0;

	foreach ($breadcrumbs as $rw) {

		if ($bi > 0) {

			echo "";
		}

		echo "<li><a href='" . $rw['href'] . "'>" . $rw['text'] . "</a></li>";

		$bi++;
	}
}

?>
                        </ol>
                    </div>
                    <!-- end bread -->
                </div>
                <!-- /.pull-right -->
            </div>
            <!-- end clearfix -->
        </div>
    </div>
</div>
<!-- end page-title -->
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-title countsert">
                    <h3>Student
                        <?php if ($allstudents) {
	$abhy = 1;
	foreach ($allstudents as $value) {
		if ($value['category_id'] == $schoolinfo->category_id) {
			?>
                        <span>(<?php echo $abhy; ?>)</span>
                        <?php
$abhy++;
		}
	}
}
?>
                    </h3>
                    <hr>
                </div>
                <!-- <div id="datatable-checkbox_filter" class="dataTables_filter"><label>Name:</label><input type="text" id="name" onkeyup="myFunction()"  title="Type in a name" aria-controls="datatable-checkbox"></div> -->
                <!-- <div id="datatable-checkbox_filter" class="dataTables_filter"><label>Class:</label><input type="text" id="class" onkeyup="myFunction()"  title="Type in a name" aria-controls="datatable-checkbox"></div> -->

                <!-- THE HTML SEARCH UI -->
                <div id="searchtools">
                    <h3>Search Box</h3>
                    <table width="100%" border="0" align="center">
                        <tr>
                            <td style="width: 24%;" align="right">Name</td>
                            <td style="width: 76%;"><input type="text" id="name" class="input-textbox"
                                    placeholder="All"></td>
                        </tr>

                        <tr>
                            <td align="right">Class </td>
                            <td><input type="text" id="class" class="input-textbox" placeholder="All"></td>
                        </tr>
                        <!-- <tr><td>Approved</td><td style="padding-left: 20px;">
              Yes: <input type="radio" value="true" name="searchvalhasphone" class="inputradio"  checked> &nbsp; &nbsp;
              No: <input type="radio" value="false" name="searchvalhasphone" class="inputradio">
              </td></tr> -->

                    </table>
                </div>






                <div class="datatablecon">
                    <div>
                        <a class="btn btn-danger"
                            href="<?php echo base_url('studentlist/deleteall/' . $category_id); ?>"
                            class="del_btn">DeleteAll</a>
                        <a class="btn btn-info" href="<?php echo base_url('studentlist/export_csv'); ?>">Export Student
                            Details</a><br><br>
                    </div>


                    <!-- <input type="search" class="" placeholder="" aria-controls="datatable-checkbox"> -->
                    <!-- <div id="datatable-checkbox_filter" class="dataTables_filter"><label>Class:</label><input type="text" id="class" onkeyup="myFunction()"  title="Type in a name" aria-controls="datatable-checkbox"></div> -->
                    <!-- <label>Class:</label><input type="text" id="class" onkeyup="myFunction()"  title="Type in a name" aria-controls="datatable-checkbox">
        <label>Name:</label><input type="text" id="name" onkeyup="myFunction()"  title="Type in a name" aria-controls="datatable-checkbox"> -->
                    <table id="myTable" class="dataTable">
                        <thead>
                            <!-- <tr style="display:none">
              <th ></th>
              <th ></th>
            </tr> -->
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>R No</th>
                                <th>Class</th>
                                <th>Status</th>
                                 <th>Reg. On</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($allstudents) {
	?>
                            <?php foreach ($allstudents as $value) {
		?>
                            <?php if ($value['category_id'] == $schoolinfo->category_id) {
			?>
                            <tr>
                                <td> <?php echo $value['firstname']; ?></td>
                                <td> <?php echo $value['lastname']; ?></td>
                                <td> <?php echo $value['email']; ?></td>
                                <td><?php echo $value['mobile']; ?></td>
                                <td><?php if ($value['status'] == -1) {
				echo "-";
			} else {
				echo $value['registrationno'];
			}
			?></td>
                                <td><?php echo $value['class']; ?></td>
                                <td> <?php if ($value['status'] == -1) {
				echo "Waiting for approval";
			} else {
				echo "Approved";
			}
			?></td>
                                <td> <?php echo $value['date_added']; ?></td>
                                <!-- <td> <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="<?php echo "#myModal" . $value['registrationno']; ?>">Edit</button></td> -->
                                <td> <a type="button" class="btn btn-info" data-toggle="modal" data-target="<?php echo "#myModal" . $value['registrationno']; ?>" href="">
                                        <i class="fa fa-edit"></i>
                                       </a> </td>
                                <td> <a class="btn btn-danger"
                                        href="<?php echo base_url("studentlist/delete_row/" . $value['registrationno']); ?>"
                                        class=""><i class="fa fa-trash"></i></a></td>
                                <div class="modal" id="<?php echo "myModal" . $value['registrationno']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit details.</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form name="Updateform" class="defaultform row " method="post"
                                                    action="<?php echo base_url("studentlist/update/" . $value['registrationno']); ?>"
                                                    id="updateform">

                                                    <div class="form-group col-lg-6">
                                                        <label>First Name</label>
                                                        <input name="firstname"
                                                            value="<?php echo $value['firstname']; ?>" type="text"
                                                            id="firstname" class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Last Name</label>
                                                        <input name="lastname" value="<?php echo $value['lastname']; ?>"
                                                            type="text" id="lastname" class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Email</label>
                                                        <input name="email" value="<?php echo $value['email']; ?>"
                                                            type="email" id="email" class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label>Mobile</label>
                                                        <input name="mobile" value="<?php echo $value['mobile']; ?>"
                                                            type="text" id="mobile" pattern="[789][0-9]{9}"
                                                            class="form-control">
                                                    </div>
                                                    <!--                                        <div class="form-group col-lg-12">-->
                                                    <!--                                          <label>Select level</label>-->
                                                    <!--                                          <select class="form-control" id="level" name="level">-->
                                                    <!--                                            --><?php //if($allschoollavels){
			//                                              foreach($allschoollavels as $allschoollavel){
			?>
                                                    <!--                                                <option value="--><?php //echo $allschoollavel['id'];
			?>
                                                    <!--">--><?php //echo $allschoollavel['name'];
			?>
                                                    <!--</option>-->
                                                    <!--                                              --><?php //} }
			?>
                                                    <!--                                          </select> -->
                                                    <!---->
                                                    <!--                                        </div> -->
                                                    <div class="form-group col-lg-12">
                                                        <label>Select Class</label>
                                                        <select class="form-control" id="class" name="class">
                                                            <?php if ($allschoolclasss) {
				foreach ($allschoolclasss as $allschoolclass) {
					?>
                                                            <?php if ($allschoolclass['name'] == $value['class']) {
						echo '<option selected value="' . $allschoolclass["name"] . '">' . $allschoolclass["name"] . '</option>';
					} else {
						echo '<option value="' . $allschoolclass["name"] . '">' . $allschoolclass["name"] . '</option>';
					}

					?>
                                                            <?php }
			}?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Password</label>
                                                        <input name="password" type="password" id="password" class="form-control">
                                                    </div>




                                                    <div style="align=center">
                                                        <button type="submit" name="update" id="update"
                                                            class="btn btn-info">Update</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php }?>
                            <?php }?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // TRIGGERS FOR THE SEARCH FUNCTION AFTER USER UPDATES SEARCH VALUES
    $('#name, #class').keyup(function() {
        checkAll();
    });
    $('.isnputradio').change(function() {
        checkAll();
    })



    // PROCESS ALL OF THE ROWS OF THE TABLE (EXCEPT THE HEADER ROW) AND CHECK FOR CORRESPONDING VALUES BASED ON THE USERS INPUTS
    function checkAll() {

        $('#myTable tbody tr').each(function(i, item) {
            if (
                // 1.) check for text match...
                $(this).find('td:eq(0)').text().toLowerCase().indexOf($('#name').val().toLowerCase()) >=
                0 &&
                // 2.) check for text match...
                $(this).find('td:eq(5)').text().toLowerCase().indexOf($('#class').val()
                    .toLowerCase()) >= 0 &&
                // 3.) check for presence of a value in cell
                !$(this).find('td:eq(5)').text().toLowerCase().indexOf('approved') >= 0
            ) {
                console.log($(this))
                $(this).show();
            } else {
                $(this).hide();
            };
        });

        //REMOVE AND ADD AGAIN...
        $('.counted').remove();
        countRows();
    };




    checkAll();

});
</script>