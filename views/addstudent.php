<style>
li {
    font-size: 13px;
    font-weight: 600;
}

a {
    color: blue;
}
</style>

<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <!-- <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url(); ?>schoolassest/upload/Intellify_collage.jpg');"> -->
    <div class=''>
        <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2>Add Student</h2>
                    </div>
                    <!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>schooldashboard/">Home</a></li>
                                <li class="active">Add Student</li>
                            </ol>
                        </div><!-- end bread -->
                    </div><!-- /.pull-right -->
                </div><!-- end clearfix -->
            </div><!-- end container -->
        </div><!-- end page-title -->
    </div><!-- end parallax -->
    <!-- </div>end page -->
</div>
<div class="section">
    <div class="container-fluid">

        <div class="col-md-12">
            <div class="register-widget clearfix">
                <div class="widget-title">
                    <h3>Add Student</h3>
                    <hr>
                    <div class="row" style="border:1px solid #d9d9d9; padding-top:20px">
                        <div class="col-lg-6">
                            <h3>Instructions for Uploading Sheet</h3><br>
                            <ol>
                                <li>DOWNLOAD
                                    <a href="<?php echo base_url() ?>schoolassest/Template.csv">Template.csv FILE</a>
                                    .</li>
                                <li> ADD DETAILS
                                    <ul>
                                        <!-- <li> Download EXCEL file, fill in the student details in the given format, save the
                                            file in CSV format then upload it </li> -->
                                        <li> Note if you have already added some students and want to add more, please
                                            upload a fresh CSV with details of new students only. </li>
                                        <li> You can also use “ADD INDIVIDUAL STUDENT” button in case the number of students
                                            to be added are only a few.</li>
                                        <li> Note if you want to edit details of any participant, please use edit button in
                                            STUDENTS LIST page.</li>
                                        <li> You can use RESET DATA button to delete data of all participants from the
                                            sheet. </li>
                                        <li> Class , student should be in class between 5 to 12 </li>
                                    </ul>
                                </li>
                                <li>Upload CSV</li>
                                <!-- <a type="button" class="btn btn-default" href="<?php echo base_url() ?>schoolassest/StudentRegistration.xlsx" download>Registration sheet</a> -->
                                <br><br>
                            </ol>
                            <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="border-radius:3px !important; margin-top:3%;">ADD INDIVIDUAL STUDENT</button> -->
                        </div>
                        <div class="col-lg-6">
                            <div style=" position: absolute;right: 0;top: -10px;">
                                <div class="thumbnail">
                                    <a href="<?php echo base_url(); ?>images/rightway.PNG" target="_blank"><i class='fas fa-check' style='position: absolute; font-size:36px;color: green;'></i><img class="img-thumbnail" src="<?php echo base_url(); ?>images/rightway.PNG" alt="Right" style="width: 100px;height: 100px;"></a>

                                    <a href="<?php echo base_url(); ?>images/WRONG.PNG" target="_blank"><i class="fa fa-close" style="font-size:36px;color: red;position: absolute;"></i><img class="img-thumbnail" src="<?php echo base_url(); ?>images/WRONG.PNG" alt="imgwrong" style=" width: 100px;height: 100px;"></a>
                                </div>
                            </div>
                            <form role="form" method="post" action="<?php echo base_url() . 'Addstudent/uploadFile' ?>"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>File input</label><br>
                                    <a href="<?php echo base_url() ?>schoolassest/Template.csv">Template.csv FILE<b style="color: red;">*</b></a><br>
                                    .</li>
                                    <input type="file" name="file" id="fileToUpload" onclick="alertAdd();" accept=".csv" required>
                                    <script type="text/javascript">
                                            function alertAdd(){
                                                alert("Please attach valid information as templete.")
                                            }
                                    </script>
                                    <p class="help-block">Please upload CSV File containing the<br> details of Students in given format. <strong> <a href="#" data-toggle="modal" data-target="#myModal"  style="text-decoration: underline;">Learn csv</a></strong><br>
                                        <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title">Excel CSV</h4>
          </div>
          <div class="modal-body">
            <p>To save an Excel file as a comma-delimited file:<br>
From the menu bar, File → Save As.<br>
Next to “Format:”, <br>
click the drop-down menu and select “Comma Separated Values (CSV)”
<br>
Click “Save”<br>
<strong><b>Excel will say something like,<b></strong> “This workbook contains features that will not work…”. Ignore that and click “<kbd>Continue</kbd>”.
Quit Excel.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
                                        <font color="red">MAX SIZE OF FILE = 30MB</font>
                                    </p>
                                </div>
                                <hr />
                                <button type="submit" name="submit1" class="btn btn-default" onclick="showImg()"
                                    style="border-radius:3px !important;">Submit</button>
                                <button type="reset" class="btn btn-default" style="border-radius:3px !important;">Reset
                                    Data</button>
                                <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="border-radius:3px !important;">ADD INDIVIDUAL STUDENT</button> -->
                            </form>
                        </div>
                    </div>
                    <p style="text-align:center;font-size:25px">OR</p>
                    <div class="row" style="border:1px solid #d9d9d9">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"
                                style="border-radius:3px !important; margin-top:5%;margin-bottom:5%; margin-left:40%;">ADD INDIVIDUAL
                                STUDENT</button>
                        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Register Student</button> -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Student</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="Updateform" class="defaultform row " method="post"
                                            action="<?php echo base_url() . 'Addstudent/addSingleStudent' ?>"
                                            id="updateform">
                                            <!-- <div class="form-group col-lg-6">

                              </div> -->
                                            <input type="hidden" name="school_id"
                                                value="<?php echo $_SESSION['schoollogged_in']['id'] ?>" id="schoolId"
                                                class="form-control">
                                            <div class="form-group col-lg-6">
                                                <label>First Name</label>
                                                <input name="firstname" required type="text" id="firstname"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label> Last Name</label>
                                                <input name="lastname" required type="text" id="lastName"
                                                    class="form-control">
                                            </div>
                                            <!-- <div class="form-group col-lg-6">
                                  <label>Level</label>
                                  <input name="level" required="yes" type="text" id="level" class="form-control">
                              </div> -->
                                            <div class="form-group col-lg-6">
                                                <label>Class</label>
                                                <!-- <input name="stud_class" required="yes" type="text" id="class" class="form-control"> -->
                                                <select name="class" required id="class" class="form-control">
                                                    <option disabled selected value> -- select an option -- </option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Email</label>
                                                <input name="email" required type="email" id="email"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label>Contact</label>
                                                <input name="contact" required type="text" pattern="[789][0-9]{9}"
                                                    id="number" class="form-control">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // AddMore function
    $("#add").on('click', function() {
        for ($x = 0; $x < 15; $x++) {
            var html_code = '<tr>';
            html_code += '<td></td>';
            html_code += '<td></td>';
            html_code +=
                '<td><div class="form-group"><input class="form-control first_name" name="firstname" value="<?php if (isset($_POST["firstname"])) {
	echo $_POST["firstname"];
}?>" type="text" id="firstname" placeholder="Enter First Name" required></div></td>'
            html_code +=
                '<td><div class="form-group"><input class="form-control last_name" value="<?php if (isset($_POST["lastname"])) {
	echo $_POST["lastname"];
}?>" type="text" name="lastname" placeholder="Enter Last Name" required></div></td>'
            html_code +=
                '<td><div class="form-group"><input class="form-control email" type="email" name="email" placeholder="Enter Email Address" value="<?php if (isset($_POST["email"])) {
	echo $_POST["email"];
}?>" required></div></td>'
            html_code +=
                '<td><div class="form-group"><input class="form-control mobile" type="number" name="mobile" placeholder="Enter Contact no." value="<?php if (isset($_POST["mobile"])) {
	echo $_POST["mobile"];
}?>" required></div></td>'
            html_code +=
                '<td><div class="form-group"><select class="form-control level" id="level" name="level"><?php if ($allschoollavels) {
	foreach ($allschoollavels as $allschoollavel) {?><option value="<?php echo $allschoollavel["id"]; ?>"><?php echo $allschoollavel["name"]; ?></option><?php }
}?></select></div></td>'
            html_code +=
                '<td><div class="form-group"><select class="form-control class" id="class" name="class"><?php if ($allschoolclasss) {
	foreach ($allschoolclasss as $allschoolclass) {?><option value="<?php echo $allschoolclass["name"]; ?>"><?php echo $allschoolclass["name"]; ?></option><?php }
}?></select></div></td>'
            html_code += '</tr>'
            $('#myTable').append(html_code);
        }
    });
    //SaveAll function
    $('#SaveAll').on('click', function() {
        //Intialize empty array for all the inputs feilds
        var firstname = [];
        var lastname = [];
        var email = [];
        var mobile = [];
        var level = [];
        var classs = [];
        // get the first_name class and push the value to firstname array
        $('.first_name').each(function() {
            firstname.push($(this).val());
        });
        // get the last_name class and push the value to lastname array
        $('.last_name').each(function() {
            lastname.push($(this).val());
        });
        // get the email class and push the value to email array
        $('.email').each(function() {
            email.push($(this).val());
        });
        // get the mobile class and push the value to mobile array
        $('.mobile').each(function() {
            mobile.push($(this).val());
        });
        // get the level class and push the value to level array
        $('.level').each(function() {
            level.push($(this).val());
        });
        // get the class class and push the value to class array
        $('.class').each(function() {
            classs.push($(this).val());
        });
        // For loop to check whether all the fields are filled
        for (i = 0; i < firstname.length; i++) {
            if (firstname[i] == '' && lastname[i] == '' && email[i] == '' && mobile[i] == '') {
                continue;
            } else if (firstname[i] == '' || lastname[i] == '' || email[i] == '' || mobile[i] == '') {
                alert("All fields are required");
            }
        }
        // postData which contains all the data which to send using ajax
        var postData = {
            'firstname': JSON.stringify(firstname),
            'lastname': JSON.stringify(lastname),
            'email': JSON.stringify(email),
            'mobile': JSON.stringify(mobile),
            'level': JSON.stringify(level),
            'classs': JSON.stringify(classs)
        };
        // ajax request to the server
        $.ajax({
            url: "<?php echo $action; ?>",
            method: "POST",
            data: postData,
        }).then((data) => {
            if (data)
                alert(data);
            window.location.href = "addstudent";
        }).catch((error) => {
            alert(error);
        });
    });
});
</script>