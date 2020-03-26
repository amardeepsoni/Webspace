<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php

    if (isset($this->session->flashdata('register')['flag'])) {
        if ($this->session->flashdata('register')['flag'] == 1) {
            echo '<script type="text/javascript"> swal({
           icon : "success",
            title: "' . $this->session->flashdata('register')['message'] . '",            
            type:"Success",
            showConfirmButton: false,
            })
        </script>';
        } else  if ($this->session->flashdata('register')['flag'] == 0) {
            echo '<script type="text/javascript"> swal({
           icon : "error",
            title: "' . $this->session->flashdata('register')['message'] . '",
            text: "Try Again!!",
            type:"error",
            showConfirmButton: false,
            })
        </script>';
        }
    }
    ?>
</head>
<div class="container pt-4" style="margin-top: 80px;">
    <h3><u>Add Teacher</u></h3>
    <div class="col-md-10 col-md-offset-1 boarder">
        <form action="addteacher/add_record" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputname">Name</label>
                    <input type="text" class="form-control" pattern="^[a-zA-Z ]{1,30}$" name="name" id="inputname" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" pattern="[a-z0-9._%+-]{2,22}+@[a-z0-9.-]{2,22}+\.[a-z]{2,4}$" name="email" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputContact">Contact</label>
                    <input type="tel" class="form-control" name="contact" pattern="[0-9]{10}" id="inputContact" placeholder="Contact">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSchool">School</label>
                    <input type="text" disabled class="form-control" id="inputSchool" value="<?php echo $this->session->userdata('schoollogged_in')['name'];    ?>">
                </div>
            </div>
            <div class="form-row"><label>Gender&nbsp;&nbsp; </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="inlineRadio1" value="m"> Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="inlineRadio2" value="f"> Female
                </label>
            </div>
            <button type="submit" class="mt-3 btn-lg btn btn-primary">Add details</button>
        </form>
   
     </div>
</div>