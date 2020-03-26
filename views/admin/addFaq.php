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

                                <h3>Add FAQ's</h3>


                                <form method="post" action="<?php echo base_url() . adminpath . '/AddFaq/add' ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="heading">Question</label>
                                        <input type="text" name="questions" class="form-control" required id="head">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Answer</label>
                                        <textarea type="text" class="form-control" required name="answers" id="txt">
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="heading">Audio File</label>
                                        <input name="audio_url" type="text" accept="Audio/*">
                                    </div>

                                    
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>