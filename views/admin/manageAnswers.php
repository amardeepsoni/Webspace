
<style>
    .table {
        /* padding-left: 5%; */
    }

    table {
        /* border-collapse: collapse; */
        width: 100%;
        border: none;
    }
    tr{
        padding: 5px;
    }
    th{
        width: 40px;
    }
    td {
        text-align: left;
        /* background: pink;
    color: white !important; */
        font-size: 15px;
        font-size: 800;
        height: 50px;
        border-left: 1px solid;
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
        <?php $this->load->view(adminpath . '/sidebar')?>
        <div class="right_col" role="main">
            <div class="section">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="register-widget clearfix">
                            <div class="widget-title">
                                <div class="container card">
                                    <div class="card-body" style="font-size: 1.5em;">
                                        <?php echo '<strong>Question : </strong>' . $post[0]['post_text']; ?>
                                    </div>
                                </div>
                                <h3>Manage Ans</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>Ans ID</th>
                                            <th>Answer</th>
                                            <th style="width: 80px; overflow: auto;">Name</th>
                                            <th>Ans Date/Time</th>
                                            <th>Only Disable</th>
                                            <th>Delete</th>


                                        </tr>
                                    </thead>
                                    <!-- for loop -->
                                    <tbody>
                                        <tr></tr>

                                        <?php

if ($post_ans) {
	$count = 1;
	foreach ($post_ans as $ans) {?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $ans["ans_id"]; ?></td>
                                            <td><?php echo $ans["ans"]; ?></td>
                                            <td><?php echo $ans["ans_owner"]; ?><br> (

                                                <a class="btn-link" href="mailto:<?php ?>"></a>
                                            ) </td>

                                            <td><?php echo $ans["created_at"]; ?></td>

                                            <?php if ($ans['status'] == null) {?>
                                            <td>
                                                     <a class="btn btn-warning" href="<?php echo base_url() . 'admin/Manage_ans/disable/' . $ans['ans_id']; ?>"> <i class="fa fa-eye" style="font-size:25px"></i> </a>

                                             </td>
                                                <?php } else {?>
                                                <td>
                                                <a class="btn btn-info" href="" disabled> <i class="fa fa-eye-slash" style="font-size:25px"></i> </a>
                                                </td>
                                                <?php }?>



                                            <td>
                                                <a class="btn btn-danger" href="<?php echo base_url() . adminpath . '/Manage_ans/delete/' . $ans['ans_id']; ?>">Delete</a>
                                            </td>

                                                <!-- <td><a class="btn btn-danger"
                                                    href="<?php echo base_url() . adminpath . '/ManageSkills/delete/' . $skill->skill_id ?>">Delete</a>
                                                <a class="btn btn-success" data-toggle="modal"
                                                    data-target="#editModal<?php echo $skill->skill_id ?>"
                                                    style="border-radius:3px !important;">Edit</a> -->

                                            </tr>
                                            <?php $count++;}} else {?>
                                            <tr>
                                                <td>
                                                    <h3 class="class"></h3>
                                                </td>
                                            </tr>
                                            <?php }?>
                                </table>

                                <br>


                                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1"
                                    style="border-radius:3px !important;">Add Skill</button> -->
                                <!-- ========================================================= -->
                                <!-- <div class="modal" id="myModal1">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Skill.</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="defaultform row" enctype="multipart/form-data"
                                                    method="post"
                                                    action="<?php echo base_url() . adminpath . '/ManageSkills/add' ?>">
                                                    <div class="form-group col-lg-12">
                                                        <label>Skill Name</label>
                                                        <input name="skill_name" required type="text" id="skillname"
                                                            class="form-control">
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label>Belongs To</label>
                                                        <select name="round" required id="class" class="form-control">
                                                            <option disabled selected value>  select an option
                                                            </option>
                                                            <option value="1">Round 1</option>
                                                            <option value="2">Round 2</option>
                                                            <option value="3">Weekly Quiz</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <label>Image</label>
                                                        <input name="file" required type="file" id="image"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- =========================================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>