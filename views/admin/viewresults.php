<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <div class="right_col" role="main">
            <div class="section">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="register-widget clearfix">
                            <div class="widget-title">
                                <h3>View Result</h3>

                                <br>

                                <form class="form-inline" action="<?php echo base_url() . 'admin/Viewresults/student' ?>" method="post">
                                    <div class="form-group mb-2">
                                        <label for="StudentID">Enter the student's user ID</label>
                                        <input type="number" placeholder="Student userid" required name="Stureg" class="Stureg" id="Stureg" />
                                    </div>
                                    <input class="btn btn-primary mb-2" type="submit" value="Search" />
                                </form>
                                <br>


                                <form action="<?php echo base_url() . 'admin/Viewresults/school' ?> " method="post">

                                    <label for="SchoolID">Enter the Schools's Registration Number</label>
                                    <input type="number" required placeholder="School Registration Number" name="Schoolreg" id="Schoolreg" />
                                    <input class="btn btn-primary mb-2" type="submit" value="Search" />
                                </form>

                                <form action="<?php echo base_url() . 'admin/Viewresults/all' ?> " method="post">

                                    <label for="">Number qualified from all schools.</label>
                                    <select name = "level">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="all">All</option>
                                    </select>
                                    <input class="btn btn-primary mb-2" type="submit" value="Search" />
                                </form>

                                <!-- =========================================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>