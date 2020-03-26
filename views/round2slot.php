<style>
    .addinner {
        margin: 10px;
        /* border-radius:100px; */

    }

    .addstudent:after {
        border: none !important;
        /* background-color:#31334D; */
    }

    .addstudent {
        /* background-color:#31334D; */
    }

    .col-sm-12 {
        /* height:100px; */
        /* width:20%; */
        /* background:#31334D; */
        /* color:#31334D; */
        margin: 2%;
    }

    .col-sm-12 a {
        color: #31334D;
        font-size: 20px;
        font-weight: 600;
    }

    .fa {
        margin-right: 2%;
    }

    @media screen and (max-width:500px) {
        .col-sm-12 a {
            font-size: 15px;
        }

        .row {
            margin-top: 20%;
        }
    }
</style>
<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <div class="page-title section nobg">
        <div class="container-fluid">
            <div class="clearfix">
            </div>
        </div>
        <!-- end Menu -->
    </div>
    <!-- end-->
</div>
<!-- Section for main Content -->
<!-- <i class="fas fa-cogs"></i> -->
<div class="section">
    <div class="container-fluid">
        <p>
        Select slots in which your students will appear for Round 2. You will be prompted to enter the number of current of computers available for every slot you select. Your choice will be final.
        </p>
        <table>

            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Available Slots</th>
            <th>Book</th>

            <?php foreach ($slots as $slot) { ?>
                <tr>
                    <td><?php echo $slot['date'] ?></td>
                    <td><?php echo $slot['start'] ?></td>
                    <td><?php echo $slot['end'] ?></td>
                    <td><?php echo $slot['count'] - $slot['regcount'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $slot['id']?>">
                            book
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal<?php echo $slot['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Round 2 Slot booking</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <form method="post" action="<?php echo base_url() . 'Round2slot/book/' . $slot['id'] ?> ">
                                                <label style="display:none" >id</label>
                                                <input type="number" disabled value="<?php echo $slot['id'] ?>" style="display:none" />
                                                <br>
                                                <label>Enter the number of computers for this slot</label>
                                                <input type="number" min="0" max = "<?php echo min($r2count-$regcount, $slot['count'])?>" required id="count" name="count" />
                                                <input type="submit" value="Book Slot" />
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>
</div>



<script>
    function book() {
        var nComp = document.getElementById("nComputers").value;
        console.log("Hello ")
        if (!nComp)
            window.alert("Please select number of computers");
        else
            console.log(nComp);
    }
</script>