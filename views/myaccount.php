<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
  table {
    /* border-collapse: collapse; */
    width: 100%;
    border: none;
  }

  td {
    text-align: left;
    /* background: pink;
    color: white !important; */
    font-size: 22px;
    font-size: 800;
    border: 1px solid #ddd;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .botton {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .btn {
    margin: 5%;
    width: 80%;
  }

  .key {
    /* font-weight : bold !important; */
    background: #f2f2f2 !important
  }


  .table-row {
    background: #fff !important;
  }

  .breadcrumb {
    background: none !important;
  }
  #popupimg {
    width : 100%;
  }

  @media screen and (max-width : 481px) {
    .section.nobg {
      display: none;
    }
    #popupimg {
      width :88vw;
    }
  }
</style>
<div id="page-content-wrapper">
  <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
  <!-- <div class=" parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url(); ?>schoolassest/upload/Intellify_collage.jpg');"> -->
  <div>
    <div class="page-title section nobg">
      <div class="container-fluid">
        <div class="clearfix">
          <div class="title-area pull-left">
            <h2>Student account <small></small></h2>
          </div>
          <!-- /.pull-right -->
          <div class="pull-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Student account</li>
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
</div>
<div class="section">
  <div class="container-fluid">

    <!--      <img src="--><?php //echo base_url().'/uploads/image/Student Report PNG.png'
                            ?>
    <!--" width="100%" height="700px">-->
    <?php if ($this->session->flashdata('loginnotify')) { ?>
      <div class="alert alert-danger">
        <?= $this->session->flashdata('loginnotify') ?>
      </div>
    <?php } ?>



    <!-- Trigger the modal with a button -->
    
    <h3>Welcome <?php echo $studentinfo->firstname; ?> <?php echo $studentinfo->lastname; ?></h3>
    <div class="cnt-block">
      <div class="row">
        <div class="col-lg-8 table">
          <table>

            <?php if ($studentinfo->email) { ?>
              <tr class="table-row">
                <td class="key">Email</td>
                <td><?php echo $studentinfo->email; ?></td>
              </tr>
            <?php } ?>
            <?php if ($studentinfo->mobile) { ?>
              <tr class="table-row">
                <td class="key">Mobile</td>
                <td> <?php echo $studentinfo->mobile; ?> </td>
              </tr>
            <?php } ?>
            <tr class="table-row">
                <td class="key">Level</td>
                <td> <?php echo $studentinfo->level; ?> </td>
              </tr>
              <tr class="table-row">
                <td class="key">Class</td>
                <td> <?php echo $studentinfo->class; ?> </td>
              </tr>
              <tr class="table-row">
                <td class="key">School</td>
                <td> <?php echo $school; ?> </td>
              </tr>
            <?php if ($studentinfo->registrationno) { ?>
              <tr class="table-row">
                <td class="key">Registration No</td>
                <td> <?php echo $studentinfo->registrationno; ?> </td>
              </tr>
            <?php } ?>
            <?php if ($studentinfo->dob) { ?>
              <tr class="table-row">
                <td class="key">Date of Birth</td>
                <td> <?php echo $studentinfo->dob; ?> </td>
              </tr>
            <?php } ?>

            <?php if ($studentinfo->gender) { ?>
              <tr class="table-row">
                <td class="key">Gender</td>
                <td> <?php echo $studentinfo->gender; ?> </td>
              </tr>
            <?php } ?>
            <?php if ($studentinfo->address) { ?>
              <tr class="table-row">
                <td class="key">Address</td>
                <td> <?php echo $studentinfo->address; ?> </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-4 botton">
        <a href="<?php echo base_url('editprofile'); ?>" class="btn btn-secondary">Edit Profile</a>
      </div>

    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>
<!-- end section -->
<?php if ($studentinfo->dob == '0000-00-00') { ?>
  <div class="modal show" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit details.</h4>
          <!-- <button type="button" class="close"
                    data-dismiss="modal">&times;</button> -->
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form name="Updateform" class="defaultform row " method="post" action="<?php echo base_url() . 'myaccount/updateDOB' ?>" id="updateform">

            <div class="form-group col-lg-12">
              <label>Date Of Birth</label>
              <input name="dob" type="date" required id="dob" class="form-control">
            </div>
            <div class="form-group col-lg-12" style="align=center">
              <button type="submit" name="update" id="update" class="btn btn-info">Update</button>
              <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
 
</script> -->