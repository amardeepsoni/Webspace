<style>
        table{
    /* border-collapse: collapse; */
    width: 100%;
    border: none;
}
td{
    text-align: left;
    /* background: pink;
    color: white !important; */
    font-size: 15px;
    font-size: 800;
    border: none;
}
.tdlink {
    cursor: pointer;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
        .table {
            display: table;
        }
        .row {
            display: table-row;
        }
        .row:nth-child(even) {
            background-color: #f2f2f2;
        }
        .cell {
            display: table-cell;
            padding: 3px;
        }
    .modal-dialog {
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
    }
    .modal-content {
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
                <div class="">
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <div class="x_panel">
                            <div class="x_title">
                            <h3> <?php echo $this->session->userdata('logged_in')["usertype"] ?></h3>
                                <h3>Registration Statistics</h3>
                                
                            </div>
                            
                        </div>
                        <div class="float-right">
                            <a class= "btn btn-primary" href = <?php echo base_url('admin/registrationStats/export_csv_all')?>>Export</a> 
                        </div>


                        <h4>Total no. of schools: <?php echo count($schools) ?></h4>
                        <table style="margin: 10px">
                            <thead>
                                <tr>
                                    <th>School Name</th>
                                    <th>Level 0</th>
                                    <th>Level 1</th>
                                    <th>Level 2</th>
                                    <th>Level 3</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($schools as $school) { ?>
                                    <tr>
                                        <td class="tdlink" id="school_name_1" data-toggle="modal"
                                            data-target="<?php echo "#mainModal" .$school->category_id; ?>">
                                            <?php echo $school->name ?>
                                        </td>
                                        <td class="tdlink" data-toggle="modal"
                                            data-target="<?php echo "#l0Modal" .$school->category_id; ?>"
                                            id="level_0_<?php echo $school->category_id ?>">
                                        </td>
                                        <td class="tdlink"  data-toggle="modal"
                                            data-target="<?php echo "#l1Modal" .$school->category_id; ?>"
                                            id="level_1_<?php echo $school->category_id ?>">
                                        </td>
                                        <td class="tdlink" data-toggle="modal"
                                            data-target="<?php echo "#l2Modal" .$school->category_id; ?>"
                                            id="level_2_<?php echo $school->category_id ?>">
                                        </td>
                                        <td class="tdlink" data-toggle="modal"
                                            data-target="<?php echo "#l3Modal" .$school->category_id; ?>"
                                            id="level_3_<?php echo $school->category_id ?>">
                                        </td>
                                        <td class="tdlink" id="school_total_<?php echo $school->category_id ?>" data-toggle="modal"
                                            data-target="<?php echo "#mainModal" .$school->category_id; ?>">
                                        </td>
                                        <div class="modal" id="<?php echo "mainModal" . $school->category_id; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Student details</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div  style="width:auto">
                                                    
                                                    <a class = " float-right btn btn-info" href=<?php echo base_url('admin/registrationStats/export_csv/')."$school->category_id"?>>Export</a>
                                                    
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="table">
                                                            <div class="row">
                                                                <div class="cell"><strong>First Name</strong></div>
                                                                <div class="cell"><strong>Last Name</strong></div>
                                                                <div class="cell"><strong>Email</strong></div>
                                                                <div class="cell"><strong>Mobile</strong></div>
                                                                <div class="cell"><strong>Reg No</strong></div>
                                                                <div class="cell"><strong>Class</strong></div>
                                                                <div class="cell"><strong>Status</strong></div>
                                                            </div>
                                                            <?php
                                                                foreach ($school->students as $student) { ?>
                                                                    <div class="row">
                                                                        <div class="cell"> <?php echo $student->firstname; ?></div>
                                                                        <div class="cell"> <?php echo $student->lastname; ?></div>
                                                                        <div class="cell"> <?php echo $student->email; ?></div>
                                                                        <div class="cell"> <?php echo $student->mobile; ?></div>
                                                                        <div class="cell"> <?php
                                                                                if ($student->status == -1) echo "-";
                                                                                else echo $student->registrationno; ?>
                                                                        </div>
                                                                        <div class="cell"> <?php echo $student->class; ?></div>
                                                                            <?php
                                                                                if ($student->status == -1) { ?>
                                                                                    <div style="color: red" class="cell">Waiting for
                                                                                        approval
                                                                                    </div>
                                                                                    <?php
                                                                                         } else { ?>
                                                                                    <div style="color: green" class="cell">Approved</div>
                                                                            <?php } ?>
                                                                    </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="<?php echo "l0Modal" . $school->category_id; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Student details for level-0</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="table">
                                                            <div class="row">
                                                                <div class="cell"><strong>First Name</strong></div>
                                                                <div class="cell"><strong>Last Name</strong></div>
                                                                <div class="cell"><strong>Email</strong></div>
                                                                <div class="cell"><strong>Mobile</strong></div>
                                                                <div class="cell"><strong>Reg No</strong></div>
                                                                <div class="cell"><strong>Class</strong></div>
                                                                <div class="cell"><strong>Status</strong></div>
                                                            </div>
                                                            <?php
                                                            foreach ($school->students as $student) { ?>
                                                                <?php if($student->level == 0) { ?>
                                                                <div class="row">
                                                                    <div class="cell"> <?php echo $student->firstname; ?></div>
                                                                    <div class="cell"> <?php echo $student->lastname; ?></div>
                                                                    <div class="cell"> <?php echo $student->email; ?></div>
                                                                    <div class="cell"> <?php echo $student->mobile; ?></div>
                                                                    <div class="cell"> <?php
                                                                        if ($student->status == -1) echo "-";
                                                                        else echo $student->registrationno; ?>
                                                                    </div>
                                                                    <div class="cell"> <?php echo $student->class; ?></div>
                                                                    <?php
                                                                    if ($student->status == -1) { ?>
                                                                        <div style="color: red" class="cell">Waiting for
                                                                            approval
                                                                        </div>
                                                                        <?php
                                                                    } else { ?>
                                                                        <div style="color: green" class="cell">Approved</div>
                                                                    <?php } ?>
                                                                </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="<?php echo "l1Modal" . $school->category_id; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Student details for level-1</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="table">
                                                            <div class="row">
                                                                <div class="cell"><strong>First Name</strong></div>
                                                                <div class="cell"><strong>Last Name</strong></div>
                                                                <div class="cell"><strong>Email</strong></div>
                                                                <div class="cell"><strong>Mobile</strong></div>
                                                                <div class="cell"><strong>Reg No</strong></div>
                                                                <div class="cell"><strong>Class</strong></div>
                                                                <div class="cell"><strong>Status</strong></div>
                                                            </div>
                                                            <?php
                                                            foreach ($school->students as $student) { ?>
                                                                <?php if($student->level == 1) { ?>
                                                                    <div class="row">
                                                                        <div class="cell"> <?php echo $student->firstname; ?></div>
                                                                        <div class="cell"> <?php echo $student->lastname; ?></div>
                                                                        <div class="cell"> <?php echo $student->email; ?></div>
                                                                        <div class="cell"> <?php echo $student->mobile; ?></div>
                                                                        <div class="cell"> <?php
                                                                            if ($student->status == -1) echo "-";
                                                                            else echo $student->registrationno; ?>
                                                                        </div>
                                                                        <div class="cell"> <?php echo $student->class; ?></div>
                                                                        <?php
                                                                        if ($student->status == -1) { ?>
                                                                            <div style="color: red" class="cell">Waiting for
                                                                                approval
                                                                            </div>
                                                                            <?php
                                                                        } else { ?>
                                                                            <div style="color: green" class="cell">Approved</div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="<?php echo "l2Modal" . $school->category_id; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Student details for level-2</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="table">
                                                            <div class="row">
                                                                <div class="cell"><strong>First Name</strong></div>
                                                                <div class="cell"><strong>Last Name</strong></div>
                                                                <div class="cell"><strong>Email</strong></div>
                                                                <div class="cell"><strong>Mobile</strong></div>
                                                                <div class="cell"><strong>Reg No</strong></div>
                                                                <div class="cell"><strong>Class</strong></div>
                                                                <div class="cell"><strong>Status</strong></div>
                                                            </div>
                                                            <?php
                                                            foreach ($school->students as $student) { ?>
                                                                <?php if($student->level == 2) { ?>
                                                                    <div class="row">
                                                                        <div class="cell"> <?php echo $student->firstname; ?></div>
                                                                        <div class="cell"> <?php echo $student->lastname; ?></div>
                                                                        <div class="cell"> <?php echo $student->email; ?></div>
                                                                        <div class="cell"> <?php echo $student->mobile; ?></div>
                                                                        <div class="cell"> <?php
                                                                            if ($student->status == -1) echo "-";
                                                                            else echo $student->registrationno; ?>
                                                                        </div>
                                                                        <div class="cell"> <?php echo $student->class; ?></div>
                                                                        <?php
                                                                        if ($student->status == -1) { ?>
                                                                            <div style="color: red" class="cell">Waiting for
                                                                                approval
                                                                            </div>
                                                                            <?php
                                                                        } else { ?>
                                                                            <div style="color: green" class="cell">Approved</div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="<?php echo "l3Modal" . $school->category_id; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Student details for level-3</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="table">
                                                            <div class="row">
                                                                <div class="cell"><strong>First Name</strong></div>
                                                                <div class="cell"><strong>Last Name</strong></div>
                                                                <div class="cell"><strong>Email</strong></div>
                                                                <div class="cell"><strong>Mobile</strong></div>
                                                                <div class="cell"><strong>Reg No</strong></div>
                                                                <div class="cell"><strong>Class</strong></div>
                                                                <div class="cell"><strong>Status</strong></div>
                                                            </div>
                                                            <?php
                                                            foreach ($school->students as $student) { ?>
                                                                <?php if($student->level == 3) { ?>
                                                                    <div class="row">
                                                                        <div class="cell"> <?php echo $student->firstname; ?></div>
                                                                        <div class="cell"> <?php echo $student->lastname; ?></div>
                                                                        <div class="cell"> <?php echo $student->email; ?></div>
                                                                        <div class="cell"> <?php echo $student->mobile; ?></div>
                                                                        <div class="cell"> <?php
                                                                            if ($student->status == -1) echo "-";
                                                                            else echo $student->registrationno; ?>
                                                                        </div>
                                                                        <div class="cell"> <?php echo $student->class; ?></div>
                                                                        <?php
                                                                        if ($student->status == -1) { ?>
                                                                            <div style="color: red" class="cell">Waiting for
                                                                                approval
                                                                            </div>
                                                                            <?php
                                                                        } else { ?>
                                                                            <div style="color: green" class="cell">Approved</div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                            <?php  } ?>
                            <tr>
                                <td><strong>Total Students</strong></td>
                                <td><strong><span id="level_0_total">0</span></strong></td>
                                <td><strong><span id="level_1_total">0</span></strong></td>
                                <td><strong><span id="level_2_total">0</span></strong></td>
                                <td><strong><span id="level_3_total">0</span></strong></td>
                                <td><strong><span id="overall_total">0</span></strong></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        
    </div>
</div>


<script>


    <?php
    foreach ($schools as $school) {
        echo
            '$.ajax({'.
                'url: "https://api.intellify.in/api/GetParticipants/'.$school->category_id.'",'.
                'crossDomain: true,
                 cors: true,
                 dataType: "json",
                 type: "GET",
                 success: function(jsonObject, status) {
                 var data = jsonObject.participants;
                 $("#level_0_'.$school->category_id.'").html(data[0]);
                 $("#level_1_'.$school->category_id.'").html(data[1]);
                 $("#level_2_'.$school->category_id.'").html(data[2]);
                 $("#level_3_'.$school->category_id.'").html(data[3]);
                 $("#school_total_'.$school->category_id.'").html(data[0]+data[1]+data[2]+data[3]);
                 $("#level_0_total").html(Number($("#level_0_total").text()) + data[0]);    
                 $("#level_1_total").html(Number($("#level_1_total").text()) + data[1]);
                 $("#level_2_total").html(Number($("#level_2_total").text()) + data[2]);
                 $("#level_3_total").html(Number($("#level_3_total").text()) + data[3]);
                 $("#overall_total").html(Number($("#overall_total").text()) + data[0]+data[1]+data[2]+data[3]);
                 }
            });'
        ;
    }
    ?>


</script>