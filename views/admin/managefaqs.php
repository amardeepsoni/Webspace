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
                                <h3>Manage FAQ's</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>FAQ ID</th>
                                            <th>Questions</th>
                                            <th>Answers</th>
                                            <th>Audio_url</th>                   
                                            <th>Enable/ Disable</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <!-- for loop -->
                                    <tbody>
                                        <tr></tr>

                                        <?php
                                        $count = 1;
                                        foreach ($faqs as $faq) { ?>
                                            <tr>
                                                <td><?php echo  $faq->id ?></td>
                                                <td><?php echo  $faq->questions ?></td>
                                                <td><?php echo  $faq->answers ?></td>
                                                <td><?php echo  $faq->audio_url ?></td>
                                                

                                                <td><?php if ($faq->enabled == 1) { ?>
                                                        <a class="btn btn-danger" href="<?php echo base_url() . adminpath . '/Managefaq/disable/' . $faq->id ?>"> Disable </a>

                                                    <?php } else { ?>
                                                        <a class="btn btn-primary" href="<?php echo base_url() . adminpath . '/Managefaq/enable/' . $faq->id ?>"> Enable </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="<?php echo base_url() . adminpath . '/Managefaq/delete/' . $faq->id ?>">Delete</a>
                                                </td>

                                               
                                                </td>
                                            <?php } ?>
                                </table>

                                <br>

                                <a class="btn btn-primary" href="<?php echo base_url() . adminpath . '/Addfaq' ?>">Add New</a>
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
                                                            <option disabled selected value> -- select an option --
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