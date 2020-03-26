<style>
    table {
        width: 100%;
        border: none;
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
</style>
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $heading; ?></h2>
                                <div class="container col-12 col-sm-6 col-md-6 site-form" style="margin-top: 3%;">
                                <h3> Add slot </h3>
                                    <form action=<?php echo base_url().adminpath.'/Round2Slot/addSlot' ?> method= "POST">
                                        Start time <input type='time' name="startTime" placeholder="Start Time"><br>
                                        End time <input type='time' name="endTime" placeholder="End Time"><br>
                                        Date <input type="date" name="slotDate" placeholder="Slot Date"><br>
                                        Count <input type="number" min="0" max="200" name="count" placeholder="Count"><br>
                                        <input type="submit" class="btn btn-primary" value="Add">
                                    </form>
                                    <h3> Manage Slots </h3>
                                    <table>
                                        <tr>
                                            <th>id</th>
                                            <th>Date</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Count</th>
                                            <th>Delete</th>
                                        </tr>
                                        <?php
                                        foreach ($slots as $slot) {  ?>
                                            <tr>
                                                <td><?php echo $slot['id'] ?></td>
                                                <td><?php echo $slot['date'] ?></td>
                                                <td><?php echo $slot['start'] ?></td>
                                                <td><?php echo $slot['end'] ?></td>
                                                <td><?php echo $slot['count'] ?></td>
                                                <td><a href="<?php echo base_url().adminpath.'/Round2Slot/deleteSlot/'?><?php echo $slot['id']?>" class="btn btn-primary">Delete</a>
                                            </tr>
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