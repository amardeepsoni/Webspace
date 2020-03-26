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

                                <h3>Add Recent News</h3>


                                <form method="post" action="<?php echo base_url() . adminpath . '/Addpopup/add' ?>" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                        <label for="heading">Heading</label>
                                        <input type="name" name="heading" class="form-control" required id="head">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Text</label>
                                        <textarea type="text" class="form-control" required name="text" id="txt">
                                        </textarea> 
                                    </div>

                                    <div class="form-group">
                                        <label for="heading">Image File/ Video File</label>
                                        <input name="file"  type="file" required accept="image/*, video/*">
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