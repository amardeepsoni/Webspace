<style>
.contact-us {
    display: flex;
    height: 100%;
    justify-content: flex-end;
    align-items: space-between;
}

.input-styling {
    border-radius: 10px;
    width: 249px;
    height: 43px;
    padding: 10px;

}

.input-styling-textarea {
    border-radius: 10px;
    padding: 10px;
}

.submit-btn {
    width: 95px;
    border: none;
    border-radius: 5px;
    height: 33px;
    margin-left: 10%;
    color: #fff;
    background: #24A0ED;
}

#footer-dropdown {
    background: #234a66;
    border: none;
    width: 100px;
    cursor: pointer;
}

.foot-col {
    margin-top: 20px;
}

.foot-col a {
    color: #8eb6d6;
}

/* .contact-form {
  float: right;
} */

.form-input {
    width: 100%;
}

.contact-details {
    color: #8eb6d6;
    font-size: 100%;
    font: inherit;
}
.blink{
     color: white;
}
a.blink:hover
{
    text-decoration: underline!important;
    color: #ddd;
}
/* Media Queries */
@media screen and (max-width:500px) {
    .row_ {
        display: flex;
        flex-direction: column;
    }

    .connect {
        display: none;
    }

}
</style>
<footer class="footer">
    <!-- Start Footer Top -->

    <div class="container" style="padding : 20px">
        <div class="row">
            <div class="col-sm-2 foot-col">
                <div>
                    <h3>NSCP</h3><br>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>Registration">Register your School </a></li>
                        <li><a href="<?php echo base_url(); ?>NSCP/Year/2020">NSCP 2020 Guidelines </a></li>

                      </ul>
                </div>
            </div>
            <div class="col-sm-2 foot-col">
                <div>
                    <h3>Partners</h3><br>
                    <ul>
                        <li><a href="https://delhi.gov.in/">Delhi Government</a></li>
                        <li><a href="https://www.teachforindia.org/">Teach for India</a></li>
                        <li><a href="initiatives.iitgn.ac.in/ccl/">CCL IIT Gandhinagar</a></li>
                        <li><a href="http://nss.iitd.ac.in/">NSS IIT Delhi</a></li>
                        <li><a href="https://www.youtube.com/watch?v=daeFULymB7A&feature=emb_logo">iSAFE</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-sm-2 foot-col">
                <h3>Be a part</h3><br>
                <ul>
                    <li>
                        <a href="https://internshala.com/internships/internship-at-Intellify">Internships</a>
                    </li>
                    <li>
                        <a href="https://forms.gle/Q5ci3c3nyYqt5bhg6">Volunteer</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 foot-col">
                <h3>Connect with Us</h3><br>
                <div>
                    <ul class="follow-us" style='padding-bottom: 10px;'>
                        <li><a href="https://www.facebook.com/iitd.intellify/" target='_blank'><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/intellifyiitd/" target='_blank'"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCe-v9_zFdD_kNASv7r5yrEQ" target='_blank'><i
                                    class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a href="https://instagram.com/intellify?igshid=t0y08tzhl7bu" target='_blank'><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a></li>
                        <li><a href="https://goo.gl/maps/WAXAGMp9r23pfjZg6" target='_blank'><i class="fa fa-map-marker"></i></a></li>
                    </ul>
                </div>
                <br>
                <div class="footer-copy">
                    <div class="footer-logo hidden-xs">
                        <!-- <img src="<?php echo base_url(); ?>images/logo-new.png" class="img-responsive intellify-logo" alt=""> -->
                    </div>
                </div>
                <div>
                    <div class='contact-details'>Email: <a class="blink" href="mailto:info@intellify.in" >info@intellify.in</a></div>
                    <!-- <div class='contact-details'>Phone: +91-8708388722</div> -->
                    <div class='contact-details'>Address: 262, Lane No. 4, Westend Marg, Saket, Delhi - 110030</div>
                </div>
                <div class="footer-copy">
                    <div class="footer-logo hidden-xs">
                        <!-- <img src="<?php echo base_url(); ?>images/logo-new.png" class="img-responsive intellify-logo" alt=""> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-3 foot-col contact-form">
                <div>
                    <form method='POST' action='https://formspree.io/info@intellify.in'>
                        <input type="text" placeholder="Name" required name="name"
                            class="form-input input-styling" style="" /><br>

                            <select class="form-input input-styling" name="contact_person_designation" style="margin-top: 8px;">
                                <option value="student" selected>Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="School">School</option>
                                <option value="Parent">Parent</option>
                                <option value="Other">Other</option>
                            </select>
                        </input><br>

                        <input type="email" placeholder="Email" required name="email"
                            class="form-input input-styling" style="margin-top: 8px;"/><br>
                        <textarea required name="textarea" placeholder='Message' rows="3" cols="27"
                            class="form-input input-styling-textarea" style="margin-top: 8px;"></textarea><br>
                        <button class="submit-btn" style="margin-top: 8px;">Submit</button>
                    </form>
                </div>
            </div>
                <p class="text-center"> © 2020 <span>Intellify</span>. All rights reserved</p>


</footer>
<!-- End Footer -->
<!-- Scroll to top -->
<a href="#" class="scroll-top" style="position: fixed; bottom: 10px; display: none; z-index: 99;"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.2.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/valiation/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/valiation/formvalidation.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/valiation/additional-methods.min.js'); ?>"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Bootsrap JS -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/ISCO_assets/js/plugins.js"></script> -->
<!-- Select2 JS -->
<script src="<?php echo base_url(); ?>assets/select2/js/select2.min.js"></script>
<!-- Match Height JS -->
<script src="<?php echo base_url(); ?>assets/matchHeight/js/matchHeight-min.js"></script>
<!-- Bxslider JS -->
<script src="<?php echo base_url(); ?>assets/bxslider/js/bxslider.min.js"></script>
<!-- Waypoints JS -->
<script src="<?php echo base_url(); ?>assets/waypoints/js/waypoints.min.js"></script>
<!-- Counter Up JS -->
<script src="<?php echo base_url(); ?>assets/counterup/js/counterup.min.js"></script>
<!-- Magnific Popup JS -->
<script src="<?php echo base_url(); ?>assets/magnific-popup/js/magnific-popup.min.js"></script>
<!-- Owl Carousal JS -->
<script src="<?php echo base_url(); ?>assets/owl-carousel/js/owl.carousel.min.js"></script>
<!-- Modernizr JS -->
<script src="<?php echo base_url(); ?>js/modernizr.custom.js"></script>
<!-- Custom JS -->
<script src="<?php echo base_url(); ?>js/custom.js"></script>
</body>

</html>





<!-- <div>
                <h3>Connect with Us</h3>
                <div style="padding : 10px">
                <ul class="follow-us">
                  <li><a href="https://www.facebook.com/iitd.intellify/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="https://www.linkedin.com/company/intellify_foundation/about/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li><a href="https://www.youtube.com/channel/UCe-v9_zFdD_kNASv7r5yrEQ"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                  <li><a href="https://instagram.com/intellify?igshid=t0y08tzhl7bu"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
              </div>
              <div>
              <div class='contact-details'>Email: info@intellify.in</div>
                  <div class='contact-details'>Phone: +91-9856478569</div>
              </div>
              </div>
            <div class="footer-copy">
                <div class="footer-logo hidden-xs">
                  <img src="<?php echo base_url(); ?>images/logo-new.png" class="img-responsive intellify-logo" alt="">
                </div>
                <p>© 2019 <span>Intellify</span>. <br>All rights reserved</p>
            </div> -->
