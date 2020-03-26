<style>
table {
    width: 100%;
    border: none;
    table-layout: fixed;
}

td {
    text-align: left;
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
.x_panel {
    overflow: scroll;
}
</style>
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath.'/sidebar') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $heading; ?></h2>
                                <div class="container col-12 col-sm-6 col-md-6 site-form" style="margin-top: 3%;word-break: break-word;">
                                    <!-- <?php print_r($queries) ?> -->
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width:2%">S.No</th>
                                                <th style="width:4%">Subject</th>
                                                <th style="width:5%">Query</th>
                                                <th style="width:2%">School ID</th>
                                                <th style="width:5%">School Name </th>
                                                <th style="width:4%">Mobile No.</th>
                                                <th style="width:5%">Answer</th>
                                                <th style="width:2%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                                foreach ($queries as $query) {  ?>
                                                <tr style="height:46px; border-top: 1px solid #cacaca;word-break: break-word;">
                                                    <td style="width:2%"><?php echo  $i++ ?></td>
                                                    <td style="width:4%"><?php echo  $query->subject ?></td>
                                                    <td style="width:5%"><?php echo  $query->query ?></td>
                                                    <td style="width:2%"><?php echo  $query->category_id ?></td>
                                                    <td style="width:5%"><?php echo  $query->schoolname ?></td>
                                                    <?php if($query->mobile == 0){?>
                                                        <td style="width:4%">Not Available</td>
                                                    <?php } else { ?>
                                                        <td style="width:4%"><?php echo  $query->mobile ?></td>
                                                    <?php } ?>
                                                    <td style="width:5%"><?php echo $query->answer ?></td>
                                                    <?php if($query->solved == 1){?>
                                                        <td style="width:2%">Query is already answered</td>
                                                    <?php } else { ?>
                                                        <td style="width:2%"> <a class="btn btn-success" data-toggle="modal"
                                                        data-target="#editModal<?php echo  $query->id ?>"
                                                        style="border-radius:3px !important;">Answer</a> </td>
                                                    <?php } ?>
                                                </tr>
                                        </tbody>
                                        <!-- ============================= -->
                                        <!-- Modal -->
                                        <div class="modal" id="editModal<?php echo  $query->id ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Answer</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="updateForm" enctype="multipart/form-data"
                                                            class="defaultform row " method="post"
                                                            action="<?php echo base_url() . adminpath . '/SchoolQueries/answer/'.$query->id ?>"
                                                            id="updateform">
                                                            <label>Answer</label>
                                                            <textarea class="form-control" name="answer" rows="10" cols="30" required  id="answer" s>
                                                            </textarea>
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- ============================= -->


                                        <?php } ?>
                                    </table>
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
