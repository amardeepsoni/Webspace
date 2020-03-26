<style>
label{
    font-size:20px;
}

#edit-password{
    margin-left : 40px;
}

#edit-password a{
    text-decoration : none;
    color : #fff;
}


</style>

<div id="page-content-wrapper">
    <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <!-- <div class=" parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>school-login/images/why-choose-bg.jpg'); ?>');"> -->
    <div>  
    <div class="page-title section nobg">
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="title-area pull-left">
                        <h2>Edit Profile </h2>
                    </div>
                    <!-- /.pull-right -->
                    <div class="pull-right hidden-xs">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Edit Profile</li>
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
            <?php
                if ($this->session->flashdata('editprofilemsg'))
                   echo '<div class="alert alert-success">'. $this->session->flashdata('editprofilemsg') .' </div>';
                else if ( $this->session->flashdata('exception'))
                    echo '<div class="alert alert-danger">'. $this->session->flashdata('exception') .' </div>';
                ?>
            <form name="editprofileform" class="defaultform row "  method="post" action="<?php echo $action; ?>" id="editprofileform">
                <div class="col-md-12">
                    <div class="register-widget clearfix">
                        <div class="widget-title">
                            <h3>Edit Profile</h3>
                            <hr>
                        </div><!-- end title -->
                        <div class="row">
                            
                            <div class="form-group col-lg-6">
                                <label>First Name</label>
                                <input name="firstname" required="yes" value="<?php echo $studentinfo->firstname; ?>" type="text" id="firstname" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Last Name</label>
                                <input name="lastname"  value="<?php echo $studentinfo->lastname; ?>" type="text" id="lastname" class="form-control">
                            </div>

                            <!-- <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input name="email" required="" value="--><?php //echo $studentinfo->email; ?><!--" type="text" id="email" class="form-control">-->
<!--                                    </div>-->
                            <div class="form-group col-lg-6">
                                <label>Mobile</label>
                                <input name="mobile" required value="<?php echo $studentinfo->mobile; ?>" type="text" pattern="[6789][0-9]{9}" id="mobile" class="form-control">
                            </div>


                                <div class="form-group col-lg-6">
                                <label>Date of Birth</label>
                                <input name="dob" required value="<?php echo $studentinfo->dob; ?>" type="date" min='1899-01-01' max='2014-01-01' id="dob" class="form-control delhii calenderiocn dob">
                            </div>


                <div class="form-group col-lg-6">
                                <label>Gender</label>
                            <div class="order_contact_inf  total_rht">
        <input class="radio1" name="gender" required type="radio" value="male" <?php if($studentinfo->gender=='male'){?> checked <?php } ?> />
        <label>Male </label>
         &nbsp; &nbsp; 
        <input class="radio2" name="gender" type="radio" value="female" <?php if($studentinfo->gender=='female'){?> checked <?php } ?> />
        <label> Female</label>
        </div></div>

                <div class="form-group col-lg-12">
                                <label>Address</label>
                            <textarea class="form-control address"  name="address" required><?php echo $studentinfo->address; ?></textarea>
                            </div>
                <div class="form-group col-lg-12">
                                <label>Email</label>
                            <input type = "text" class="form-control email"  name="email" required value = "<?php echo $studentinfo->email; ?>" />
                             </div>


                                    <div class="col-lg-12 update-btn">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button class="btn btn-primary" id="edit-password"><a href="<?php echo base_url('editpassword');?>">Edit Password</a></button>
                                    </div>
                                </div>          
                            </div>
                        </div>
                <input type="hidden" id="id" name="id" value="<?php echo $studentinfo->registrationno; ?>">
                    </form><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

