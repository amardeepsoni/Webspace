
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath.'/sidebar') ?>
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="">
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>Add School</h3>
                            </div>
                            <div>
                                Download Sample
                                <a href="<?php echo base_url() ?>schoolassest/SchoolRegistration.csv" download="">CSV FILE</a>
                            </div>
                            <form role="form" method="post" action="<?php echo base_url() .adminpath.'/AddSchool/upload' ?>"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="file" id="fileToUpload" accept=".csv" required>
                                    <p class="help-block">Please upload CSV File containing the details of Students in given
                                        format.<br>
                                        <font color="red">MAX SIZE OF FILE = 30MB</font>
                                    </p>
                                </div>
                                <hr />
                                <button type="submit" name="submit1" class="btn btn-primary" onclick="showImg()"
                                    style="border-radius:3px !important;">Submit</button>
                                <!-- <button type="reset" class="btn btn-default" style="border-radius:3px !important;">Reset
                                    Data</button> -->
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>




















