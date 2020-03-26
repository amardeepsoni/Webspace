
<div class="container body">
    <div class="main_container">
        <?php $this->load->view(adminpath.'/sidebar') ?>
        <div class="right_col" role="main">
        <div class="section">
  <div class="container-fluid">

      <div class="col-md-12">
        <div class="register-widget clearfix">
          <div class="widget-title">
            <h3>Add Student</h3>
              <?php
              if ($this->session->flashdata('registrationSuccess'))
                  echo '<div id="notifications1" class="formmsg">'.$this->session->flashdata("registrationSuccess").'</div>';
              else if ($this->session->flashdata('registrationFail'))
                  echo '<div id="notifications1" class="formmsg">'.$this->session->flashdata("registrationFail").'</div>';
              else if ($this->session->flashdata('uploadSuccess'))
                  echo '<div id="notifications1" class="formmsg">'.$this->session->flashdata("uploadSuccess").'</div>';
              else if ($this->session->flashdata('uploadFail'))
                  echo '<div id="notifications1" class="formmsg">'.$this->session->flashdata("uploadFail").'</div>';
              ?>
            <hr>
            <div class="col-lg-6">
                  <h3>Instructions for Uploading Sheet</h3><br>
                  <ol>
                      <li>DOWNLOAD 
                        <a href="<?php echo base_url()?>schoolassest/StudentRegistration.xlsx">EXCEL FILE</a>
                        .</li>
                      <li> ADD DETAILS
                        <ul>
                              <li> Note if you have already added some students and want to add more, please upload a fresh CSV with details of new students only. </li>
                              <li> You can also use “ADD INDIVIDUAL STUDENT” button in case the number of students to be added are only a few.</li>
                              <li> Note if you want to edit details of any participant, please use edit button in STUDENTS LIST page.</li>
                              <li> You can use RESET DATA button to delete data of all participants from the sheet. </li>
                              <li> Class , student should be in class between 5 to 12 </li>
                        </ul>
                      </li>  
                      <li>Upload CSV</li>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="border-radius:3px !important; margin-top:5%; margin-left:-40px;">ADD INDIVIDUAL STUDENT</button> 
                      <!-- <a type="button" class="btn btn-default" href="<?php echo base_url()?>schoolassest/StudentRegistration.xlsx" download>Registration sheet</a> -->
                      <br><br>
                  </ol>
                  <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="border-radius:3px !important; margin-top:3%;">ADD INDIVIDUAL STUDENT</button> -->
              </div>
              <div class="col-lg-6">
                  <form role="form" method="post" action="<?php echo base_url().adminpath.'/StudentRegistration/upload' ?>" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>File input</label>
                          <input type="file" name="file" id="fileToUpload" accept=".csv" required>
                          <p class="help-block">Please upload CSV File containing the details of Students in given format.<br><font color="red">MAX SIZE OF FILE = 30MB</font></p>
                      </div>
                      <div class="form-group">
                          <label>School ID</label>
                          <input type="number" name="school_id" id="school_id"  required>
                      </div>
                      <hr/>
                      <button type="submit" name="submit1" class="btn btn-default" onclick="showImg()" style="border-radius:3px !important;">Submit</button>
                      <button type="reset" class="btn btn-default" style="border-radius:3px !important;">Reset Data</button>
                      <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="border-radius:3px !important;">ADD INDIVIDUAL STUDENT</button> -->
                  </form>
                  <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Register Student</button> -->
                  <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add Student.</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form name="Updateform" class="defaultform row "  method="post" action="<?php echo base_url().adminpath.'/StudentRegistration/addStudent' ?>" id="updateform">
                              <div class="form-group col-lg-6">
                                  <label>School ID</label>
                                  <input name="school_id" required type="number" id="level" class="form-control">
                              </div>
                              <div class="form-group col-lg-6">
                                  <label>First Name</label>
                                  <input name="firstname" required type="text" id="firstname" class="form-control">
                              </div>
                              <div class="form-group col-lg-6">
                                  <label> Last Name</label>
                                  <input name="lastname" required type="text" id="lastName" class="form-control">
                              </div>
                              <!-- <div class="form-group col-lg-6">
                                  <label>Level</label>
                                  <input name="level" required="yes" type="text" id="level" class="form-control">
                              </div> -->
                              <div class="form-group col-lg-6">
                                  <label>Class</label>
                                  <!-- <input name="stud_class" required="yes" type="text" id="class" class="form-control"> -->
                                  <select name="class" required  id="class" class="form-control">
                                  <option disabled selected value> -- select an option -- </option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                </select>
                              </div>
                              <div class="form-group col-lg-6">
                                  <label>Email</label>
                                  <input name="email" required type="email" id="email" class="form-control">
                              </div>
                              <div class="form-group col-lg-6">
                                  <label>Contact</label>
                                  <input name="contact" required type="number" id="number" class="form-control">
                              </div>
                              <div class="form-group col-lg-6">
                              <button type="submit" class="btn btn-primary">Register</button>
                              </div>
                              
                          </form>
                        </div>
                      </div>
                  </div>
          </div><!-- end title-->
        </div>
      </div>
  </div>
</div>

            
        </div>

    </div>
</div>
