<style>
    .table {
        /* padding-left: 5%; */
    }

    table {
        /* border-collapse: collapse; */
        width: 100%;
        border: none;
    }

    td {
        text-align: left;
        /* background: pink;
    color: white !important; */
        font-size: 15px;
        font-size: 800;
        border: none;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .dataTables_filter {
        margin: 2%;
    }

    img {
        height: 30px;
        width: 30px;
    }

    @media screen and (max-width:500px) {
        .modal-content {
            width: 350px;
        }
    }
</style>
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <div class="right_col" role="main">
            <div class="section">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="register-widget clearfix">
                            <div class="widget-title">
                                <h3>Manage Skills</h3>
                                <?php
                                if ($this->session->flashdata('skillDeleteSuccess'))
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('skillDeleteSuccess') . ' </div>';
                                else if ($this->session->flashdata('skillDeleteFail'))
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('skillDeleteFail') . ' </div>';
                                else if ($this->session->flashdata('skillAddSuccess'))
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('skillAddSuccess') . ' </div>';
                                else if ($this->session->flashdata('skillAddFail'))
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('skillAddFail') . ' </div>';
                                else if ($this->session->flashdata('skillUpdateSuccess'))
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('skillUpdateSuccess') . ' </div>';
                                else if ($this->session->flashdata('skillUpdateFail'))
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('skillUpdateFail') . ' </div>';
                                $roundVal = array(" Round 1 ", " Round 1 ", " Round 2", " Weekly Quiz ");
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Skill ID</th>
                                            <th>Name</th>
                                            <th>Belongs To</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- for loop -->
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach ($skills as $skill) { ?>
                                            <tr>
                                                <td><?php echo  $count++ ?></td>
                                                <td><?php echo  $skill->skill_name ?></td>
                                                <td><?php echo  $roundVal["$skill->round"] ?></td>
                                                <td><img src="<?php echo $skill->image ?>"></td>
                                                <td><a class="btn btn-danger" href="<?php echo base_url() . adminpath . '/ManageSkills/delete/' . $skill->skill_id ?>">Delete</a>
                                                    <a class="btn btn-success" data-toggle="modal" data-target="#editModal<?php echo $skill->skill_id ?>" style="border-radius:3px !important;">Edit</a></td>

                                                <div class="modal" id="editModal<?php echo $skill->skill_id ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Skill.</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form name="updateForm" enctype="multipart/form-data" class="defaultform row " method="post" action="<?php echo base_url() . adminpath . '/ManageSkills/update/' ?>" id="updateform">
                                                                    <input type="hidden" name="skill_id" value="<?php echo $skill->skill_id ?>">
                                                                    <label>Skill Name</label>
                                                                    <input value="<?php echo $skill->skill_name ?>" name="skill_name" required type="text" id="skillname" class="form-control">
                                                                    <label>Belongs To</label>
                                                                    <select name="round" required id="class" class="form-control">
                                                                        <?php for ($i = 1; $i <= 3; $i++)
                                                                                if ($i == $skill->round) { ?>
                                                                            <option selected value="<?php echo  $i ?>">
                                                                                <?php echo $roundVal["$i"] ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $i ?>">
                                                                                <?php echo $roundVal["$i"] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <label>Image</label><br />
                                                                    <a href="<?php echo $skill->image ?>">
                                                                        <img src="<?php echo $skill->image ?>" class="rounded" width="150" height="150" alt="skill image" />
                                                                    </a>
                                                                    <input name="file" type="file" accept=".jpg,.jpeg,.png" id="image" class="form-control" value="<?php echo $skill->image ?>">
                                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                </table>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1" style="border-radius:3px !important;">Add Skill</button>
                                <!-- ========================================================= -->
                                <div class="modal" id="myModal1">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Skill.</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="defaultform row" enctype="multipart/form-data" method="post" action="<?php echo base_url() . adminpath . '/ManageSkills/add' ?>">
                                                    <div class="form-group col-lg-12">
                                                        <label>Skill Name</label>
                                                        <input name="skill_name" required type="text" id="skillname" class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Belongs To</label>
                                                        <select name="round" required id="class" class="form-control">
                                                            <option disabled selected value> -- select an option --
                                                            </option>
                                                            <option value="1">Round 1</option>
                                                            <option value="2">Round 2</option>
                                                            <option value="3">Weekly Quiz</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Image</label>
                                                        <input name="file" required type="file" id="image" class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- =========================================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>