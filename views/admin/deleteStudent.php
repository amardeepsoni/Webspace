<link type='text/css' rel='stylesheet' href='<?php echo base_url() ?>assets/admincss/Studentdelete.css'>
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <div class="right_col" role="main">
            <?php
            if ($this->session->flashdata('deleteSuccess'))
                echo '<div id="notifications1" class="formmsg">' . $this->session->flashdata("deleteSuccess") . '</div>';
            else if ($this->session->flashdata('deleteFail'))
                echo '<div id="notifications1" class="formmsg">' . $this->session->flashdata("deleteFail") . '</div>';
            ?>
            <form method="post" action="<?php echo base_url() . adminpath . '/DeleteStudent/delete'; ?>">
                <div class="login-clean">
                    <h2 class="sr-only">Delete Student</h2>
                    <div class="form-group">
                        <input class="form-control" type="number" name="student_id" placeholder="Registration Number" />
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Delete Student Record</button>
                    </div>
                </div>
            </form>
            <form id="searchForm" method="post" action="<?php echo base_url() . adminpath . '/DeleteStudent/search_student' ?>">
                <div class="form-group">
                    <input class="form-control" type="name" id="student_Fname" name="student_Fname" placeholder="First Name" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="name" id="student_Lname" name="student_Lname" placeholder="Last Name" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="name" id="school_name" name="school_name" placeholder="School Name" />
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-info btn-block" onclick="onSearch();">Search</button>
                </div>
            </form>
            <?php if ($students != null) { ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Registration Number</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">School Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($students as $student) { ?>
                    <tr>
                        <th scope="row"><?php echo $student->registrationno; ?></th>
                        <td><?php echo $student->firstname; ?></td>
                        <td><?php echo $student->lastname; ?></td>
                        <td><?php echo $student->name; ?></td>
                        <td><?php echo $student->class; ?></td>
                        <td>
                            <form action="<?php echo base_url() . adminpath . '/DeleteStudent/delete' ?>" method="post">
                                <input type="text" style="display:none" name="student_id" value="<?php echo $student->registrationno ?>">
                                <button class="btn btn-danger"> Delete </button>
                        </td>
                    </tr>


                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>



            <!-- <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">

                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>            
    </div>
</div>
<script>
    function onSearch() {
        if ((document.getElementById('student_Fname').value.length == 0) &&
            (document.getElementById('student_Lname').value.length == 0) &&
            (document.getElementById('school_name').value.length == 0))
            alert("Please input atleast one field for searching");

        else
            document.getElementById('searchForm').submit();

    }
</script>

<script>
    console.log("<?php echo $students ?>")
</script>