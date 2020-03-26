

        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
            <div class=" parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url(<?php echo base_url();?>school-login/images/why-choose-bg.jpg);">
                <div class="page-title section nobg">
                    <div class="container-fluid">
                        <div class="clearfix">
                            <div class="title-area pull-left">
                                <h2>Edit Password </h2>
                            </div>
                            <!-- /.pull-right -->
                            <div class="pull-right hidden-xs">
                                <div class="bread">
                                    <ol class="breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li class="active">Edit Password</li>
                                    </ol>
                                </div>
                                <!-- end bread -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <!-- end clearfix -->
                    </div>
                </div>
                <!-- end page-title -->
            </div>


            <div class="section">
                <div class="container-fluid">
                  <?php if ($this->session->flashdata('passwordmsg')) { ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata('passwordmsg') ?> </div>
                <?php } ?>
                  <form name="editpasswordform" class="defaultform row "  method="post" action="<?php echo $forgotaction; ?>" id="editpasswordform">
                        <div class="col-md-12">
                            <div class="register-widget clearfix">
                                <div class="widget-title">
                                    <h3>Edit Password</h3>
                                    <hr>
                                </div><!-- end title -->
                                <div class="row">
                                    
                                    <div class="form-group col-lg-6">
                                        <label>Password</label>
                                       <input name="password" required="" value="" type="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Confirm password</label>
                                       <input name="confirmpassword" required="" value="" type="text" id="confirmpassword" class="form-control">
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>          
                            </div>
                        </div>
                <input type="hidden" id="id" name="id" value="<?php echo $studentinfo->id; ?>">
                    </form><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
