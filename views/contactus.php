
   <!-- Start Banner Carousel -->
      <div class="inner-banner contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <h1><?php echo $heading; ?></h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-3"> <a href="#" class="apply-online clearfix">
                        <div class="left clearfix"> <span class="icon"><img src="images/apply-online-sm-ico.png" class="img-responsive" alt=""></span> <span class="txt">Apply Online</span> </div>
                        <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </a></div>
                </div>
            </div>
        </div>
        <!-- End Banner --> 

        <!-- Start Contact Us -->
        <section class="form-wrapper padding-lg">
            <div class="container">
                <form name="contact-form" id="ContactForm">
                    <div class="row input-row">
                        <div class="col-sm-6">
                            <input name="first_name" type="text" placeholder="First Name">
                        </div>
                        <div class="col-sm-6">
                            <input name="last_name" type="text" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row input-row">
                        <div class="col-sm-6">
                            <input name="company" type="text" placeholder="Company">
                        </div>
                        <div class="col-sm-6">
                            <input name="phone_number" type="text" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="row input-row">
                        <div class="col-sm-6">
                            <input name="business_email" type="text" placeholder="Business Email">
                        </div>
                        <div class="col-sm-6">
                            <input name="job_title" type="text" placeholder="Job Tittle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn">Apply Now <span class="icon-more-icon"></span></button>
                            <div class="msg"></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- end Contact Us --> 

        <!-- Start Google Map -->
        <section class="google-map">
            <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d447986.8531463029!2d76.81115099336583!3d28.69271888103785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d047309fff32f%3A0xfc5606ed1b5d46c3!2sDelhi!5e0!3m2!1sen!2sin!4v1539124830411" frameborder="0" style="border:0" allowfullscreen></iframe></div>
            <div class="container">
                <div class="contact-detail">
                    <div class="address">
                        <div class="inner">
                            <h3>INTELLIFY</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has...</p>
                        </div>
                        <div class="inner">
                            <h3>+91 9891193363</h3>
                        </div>
                        <div class="inner"> <a href="#">info@intellify.in</a> </div>
                    </div>
                    <div class="contact-bottom">
                        <ul class="follow-us clearfix">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Google Map --> 

        <!-- Start Have Questions -->
        <section class="our-impotance have-question padding-lg">
            <div class="container">
                <h2>Still have questions?</h2>
                <ul class="row">
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> <img src="images/help-center-ico.jpg" alt="Malleable Study Time">
                            <h3>Help Center</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                        </div>
                    </li>
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> <img src="images/faq-ico.jpg" alt="Placement Assistance">
                            <h3>Faq's</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                        </div>
                    </li>
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> <img src="images/document-ico.jpg" alt="Easy To Access">
                            <h3>Technical Documents</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>












<!-------w-w-w-w-w-w--w-w--w--w-w-w-w--w-w-w-w-w--w--w-w--w-w-w--w-w-w-w--w-w
<div class="top-banner"> <span class="overlapp"></span>
  <div class="overheading">
    <div class="container">
      <h1></h1>
      <div class="breadcrumss">
        <ul class="clearfix">
          <?php 
              if(isset($breadcrumbs)) {
                $bi=0;
                foreach($breadcrumbs as $rw) {
                  if($bi>0) {
                    echo "";
                  }
                  echo "<li><a href='".$rw['href']."'>".$rw['text']."</a></li>";
                $bi++;}
              }
            ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<section id="abouttsection">
  <div class="container">
    <h2 class="innermainhead"><?php echo webdata()->page_title; ?></h2>
    <div class="abbcontent clearfix">
      <?php echo webdata()->context; ?>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div class="contact-info-box"> <i class="fa fa-location-arrow fa1"></i>
          <h4>Address: </h4>
          <p><?php echo webdata()->address; ?></p>
        </div>
        <div class="contact-info-box"> <i class="fa fa-envelope-o fa1">&nbsp;</i>
          <h4>Email: </h4>
          <p><a href="mailto:<?php echo webdata()->email; ?>"><?php echo webdata()->email; ?></a></p>
        </div>
        <div class="contact-info-box"> <i class="fa fa-whatsapp fa1">&nbsp;</i>
          <h4>Whatsapp</h4>
          <p><?php echo webdata()->fax; ?></p>
        </div>
        <div class="contact-info-box"> <i class="fa fa-phone fa1">&nbsp;</i>
          <h4>Mobile : </h4>
          <p><?php echo webdata()->phone; ?></p>
        </div>
      </div>
      <div class="col-sm-7">
        <div id="formsection" > <b>Quick Enquiry</b>
          <form name="form2" class="feedbackform" method="post" action="<?php echo base_url(); ?>consendmail.php" id="contactform">
            <div class="row">
              <div class="col-md-6">
                <div class="qufron">
                  <input type="text" placeholder="Name" name="name" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="qufron">
                  <input type="text" placeholder="Email" name="email" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="qufron">
                  <input type="text" placeholder="Phone" name="phone" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="qufron">
                  <select name="services" >
                    <option>Select Services</option>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  </select>
                </div>
              </div>
            </div>
            <div class="qufron">
              <textarea rows="3" placeholder="Message"  name="message" ></textarea>
            </div>
            <div class="row">
              <div class="col-md-7">
                <div class="capta qufron"><img src="<?php echo base_url(); ?>CaptchaSecurityImages.php?width=100&amp;height=30&amp;characters=5" alt="" />
                  <input type="text"  name="captchacode" id="captchacode" size="15" value="" placeholder="Enter Code *" width="50"/>
                </div>
              </div>
            </div>
            <div class="qufron">
              <input type="submit" value="Submit" name="submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php echo webdata()->googlemap; ?> ___--------->
