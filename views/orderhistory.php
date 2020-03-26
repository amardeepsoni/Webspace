
<section id="mainbannersection" >
  
</section>
<div class="top-navbar">
  <div class="nav-navbar">
    <ul class="nav-text">
      <li> <a href="<?php echo base_url();?>">Home</a></li>
      <li> <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> </a></li>
      
    </ul>
  </div>
</div>
<div class="section pt-60">
  <div class="container">
    <div class="comanhead text-center">
      <h2 class="head">My Account</h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="acc">
          <div class="profile text-center"> <img class="image" src="">
            <p class="name" style="font-family: 'Dancing Script', cursive; font-size:40px; padding-top:20px;"></p>
          </div>
          <div class="acc-detail">
            <table style="border:none">
              <tr>
                <td ><i class="fa fa-envelope" aria-hidden="true"></i> Email</td>
                <td  class="ryt email"></td>
              </tr>
              <tr>
              <tr>
                <td ><i class="fa fa-calendar" aria-hidden="true"></i> Date of Birth</td>
                <td  class="ryt dob"></td>
              </tr>
              <tr>
                <td ><i class="fa fa-phone" aria-hidden="true"></i> Phone</td>
                <td  class="ryt mobile"></td>
              </tr>
              <tr>
                <td ><i class="fa fa-map-marker" aria-hidden="true"></i> Address</td>
                <td  class="ryt address"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="acc" id="edit-show">
              <div class="profile text-center">
                <p style="font-family: 'Dancing Script', cursive; font-size:20px; padding-top:10px;">Edit Profile </p>
              </div>
              <div class="acc-detail table-responsive">
                <form id="myForm" method="POST" action="<?php echo base_url();?>myaccount/edit_profile" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td ><i class="fa fa-envelope" aria-hidden="true"></i> Email</td>
                    <td  class="ryt"><div class="order_contact_inf total_rht list_act">
                        <input class="pro_num email filwdth list_act" type="text" value=" " readonly>
                      </div></td>
                  </tr>
                  <tr>
                    <td ><i class="fa fa-phone" aria-hidden="true"></i> Phone</td>
                    <td  class="ryt"><div class="order_contact_inf  total_rht list_act">
                        <input class="pro_num mobiles list_act" type="text" readonly >
                      </div></td>
                  </tr>
                
              
                  
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> Name</td>
                      <td  class="ryt"><div class="order_contact_inf total_rht">
                          <input class="pro_num name" type="text" name="name" data-parsley-pattern="^[a-zA-Z]+$" required>
                        </div></td>
                    </tr>
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> Date of Birth</td>
                      <td  class="ryt"><div class="order_contact_inf total_rht">
                          <input type="text"  class="delhii calenderiocn dob" name="dob" placeholder="Date of Birth" id="dateProfile" />
                        </div></td>
                    </tr>
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> Gender</td>
                      <td  class="ryt"><div class="order_contact_inf  total_rht">
                          <input class="radio1" name="gender" type="radio" value="male" required>
                          <label>&nbsp; Male</label>
                          </input>
                          <input class="radio2" name="gender" type="radio" value="female">
                          <label>&nbsp;  Female</label>
                          </input>
                        </div></td>
                    </tr>
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> Address</td>
                      <td  class="ryt"><div class="order_contact_inf  total_rht">
                          <textarea class="address" name="address" required></textarea>
                        </div></td>
                    </tr>
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> Profile Picture</td>
                      <td  class="ryt"><div class="order_contact_inf  total_rht">
                         <input type="file" name="image"/>
                        </div></td>
                    </tr>
                     <tr>
                      <td ><i class="" aria-hidden="true"></i> </td>
                      <td  class="ryt"><div class="order_contact_inf  total_rht">
                           <input type="submit" onClick="fileUpload();" value="Submit" id="btn_update" style="width:100px;height:38px;padding: 0px 20px;"/>
                           <input type="button" value="Cancel" data-dismiss="modal" style="width:100px;height:38px;padding: 0px 20px;"/>
                        </div></td>
                    </tr>
                  </table>
                  <ul>
                    
                    
                    
                    <li class="reset_res" style="margin: 4px 5px 11px;width: 37%;"></li>
                   
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="modal fade" id="myModalsp" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="acc" id="edit-show">
              <div class="profile text-center">
                <p style="font-family: 'Dancing Script', cursive; font-size:20px; padding-top:10px;">Change Password </p>
              </div>
              <div class="acc-detail table-responsive">
                <form id="change-pass" data-parsley-validate="">
							 
                             <table class="table">
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> Old Password</td>
                      <td  class="ryt">
                        <input type="password" class="ch_opt" placeholder="Old Password" name="password" required="">
                        </td>
                    </tr>
                    
                    <tr>
                      <td ><i class="" aria-hidden="true"></i> New Password</td>
                      <td  class="ryt">
                         <input type="password" class="ch_opt" placeholder=" New Password" id="ghghgh" data-parsley-minlength="6" required="" data-required="true" name="changepass">
                        </td>
                    </tr>
                      
                    
                    
                     <tr>
                      <td ><i class="" aria-hidden="true"></i> Repeat New Password</td>
                      <td  class="ryt">
                         <input type="password" class="ch_opt" name="confirmpass" placeholder="Confirm New Password"  data-parsley-minlength="6"  data-parsley-equalto="#ghghgh" data-parsley-equalto-message="Password confirmation must match the password."  required="">
                        </td>
                    </tr>
                    
                     <tr>
                      <td ></td>
                      <td  class="ryt">
                         <input type="hidden" value="<?php echo $this->session->userdata('logged_in')['id'];?>" name="id">
                         <button onclick="changePass();">Update</button>
                          <input type="button" value="Cancel" data-dismiss="modal" />
                        </td>
                    </tr>
                    
                  </table>
                             
                             
				
								 
							 </form>
                
              </div>
            </div>
          </div>
        </div>
        
        
        
      </div>
      <aside class="col-lg-3 col-md-3">
        <div class="box_style_cat">
          <ul id="cat_nav">
            <li><a href="#" id="active"><i class="fa fa-user" aria-hidden="true"></i> My Account</a> </li>
            <li><a href="#myModals" data-toggle="modal" data-target="#myModals" class="edit_pro" onClick="Edits();"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a> </li>
             <li><a href="<?php echo base_url();?>/orderhistory"><i class="fa fa-sign-out" aria-hidden="true"></i> Order History </a> </li>
            <li><a href="#myModalsp" data-toggle="modal" data-target="#myModalsp" class="edit_pro" onClick="Edits();"><i class="fa fa-lock" aria-hidden="true"></i> Edit Passward</a> </li>
            <li><a href="<?php echo base_url();?>/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a> </li>
          </ul>
        </div>
        <div class="box_style_4 help text-center"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
          <h6>Need <span>Help?</span></h6>
          <a href="#" class="phone">+123456789</a> </div>
        
        <!--End filters col--> 
        
      </aside>
      <div class="widget-area align-left col-sm-3">
        <aside class="widget widget_travel_tour">
          <div class="wrapper-special-tours">
            <div class="inner-special-tours"> <a href="single-tour.html"> <img src="<?php echo base_url();?>assets/images/tour-1.jpg" alt="Discover Brazil" title="Discover Brazil" width="430" height="305"></a>
              <div class="item_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
              <div class="post_title">
                <h3> <a href="single-tour.html" rel="bookmark">Discover Brazil</a> </h3>
              </div>
              <div class="item_price"> <span class="price">$93.00</span> </div>
            </div>
            <div class="inner-special-tours"> <a href="single-tour.html"> <span class="onsale">Sale!</span> <img src="<?php echo base_url();?>assets/images/tour-1.jpg" alt="Discover Brazil" title="Discover Brazil" width="430" height="305"></a>
              <div class="item_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
              <div class="post_title">
                <h3> <a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a> </h3>
              </div>
              <div class="item_price"> <span class="price"><del>$87.00</del> <ins>$82.00</ins></span> </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>assets/js/myaccount.js"></script>
<div class="loader" style="text-align:center"></div>
