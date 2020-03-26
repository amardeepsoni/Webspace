<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath . '/sidebar') ?>
        <div class="right_col" role="main">
            <div class="section">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <?php
                        if ($this->session->flashdata('updateSchoolDetailSuccess'))
                            echo '<div class="alert alert-success">'. $this->session->flashdata('updateSchoolDetailSuccess') .' </div>';
                        else if ( $this->session->flashdata('updateSchoolDetailFail'))
                            echo '<div class="alert alert-danger">'. $this->session->flashdata('updateSchoolDetailFail') .' </div>';
                        ?>
                        <div class="register-widget clearfix">
                        <form class="defaultform row" method="post" action="<?php echo base_url().adminpath.'/EditSchoolDetails/updatePassword' ?>">
                            <div class="form-group col-lg-12">
                                <label>School Id</label>
                                <input name="category_id" required type="number" id="category_id"
                                    class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input name="password" required type="text" id="password"
                                    class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-primary">EDIT PASSWORD</button>
                            </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


