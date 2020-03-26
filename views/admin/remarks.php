<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <?php
                                if ($this->session->flashdata('Success'))
                                    echo '<div id="notifications1" class="formmsg">' . $this->session->flashdata("Success") . '</div>';
                                else if ($this->session->flashdata('Exception'))
                                    echo '<div id="notifications1" class="formmsg">' . $this->session->flashdata("Exception") . '</div>';
                                ?>
                                <h3>Add Remarks</h3>
                                <form id="my-form" action="<?php echo base_url() . adminpath . '/remarks/add' ?>" method="post">
                                    <div class="form-group">
                                        <label>School or Student</label>
                                        <select name="user_type" id="school_student">
                                            <option value="school">School</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 0-10</label>
                                        <input type="hidden" name="below_10" value="10">
                                        <input class="form-control" type="text" name="remarks_10" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 10-20</label>
                                        <input type="hidden" name="below_20" value="20">
                                        <input class="form-control" type="text" name="remarks_20" placeholder="Enter Remarks" autofocus id="title" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 20-30</label>
                                        <input type="hidden" name="below_30" value="30">
                                        <input class="form-control" type="text" name="remarks_30" placeholder="Enter Remarks" autofocus id="title" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 30-40</label>
                                        <input type="hidden" name="below_40" value="40">
                                        <input class="form-control" type="text" name="remarks_40" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 40-50</label>
                                        <input type="hidden" name="below_50" value="50">
                                        <input class="form-control" type="text" name="remarks_50" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 50-60</label>
                                        <input type="hidden" name="below_60" value="60">
                                        <input class="form-control" type="text" name="remarks_60" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 60-70</label>
                                        <input type="hidden" name="below_70" value="70">
                                        <input class="form-control" type="text" name="remarks_70" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 70-80</label>
                                        <input type="hidden" name="below_80" value="80">
                                        <input class="form-control" type="text" name="remarks_80" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 80-90</label>
                                        <input type="hidden" name="below_90" value="90">
                                        <input class="form-control" type="text" name="remarks_90" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks for percentage 90-100</label>
                                        <input type="hidden" name="below_100" value="100">
                                        <input class="form-control" type="text" name="remarks_100" placeholder="Enter Remarks" autofocus id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="sumbit">Sumbit</button>
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