
<html lang="en">

<head>

    <title>NSCP Registration Form</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/registration/images/logo.png">
    <!--===============================================================================================-->
<!--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js"></script>
    <!--===============================================================================================-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->


    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/registration/css/main.css">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>


    <!--===============================================================================================-->
</head>
<style>

.header-middle{
    background:white;
    width:100%;
}
 .collapse a{
     color:white !important;
 }
 .dropdown-menu a{
    color:black !important;
 }
  #reg-bkg{
      margin : 3em auto;
  }
 @media screen and (max-width : 481px) {
  .logo {
    display: flex;
    width: 100%;
    justify-content: center;
  }

  #logo-img {
    width: 200px;
  }

  .header-btn {

    padding: 0 !important;

  }

  #upper-btn {
    display: flex !important;

    justify-content: space-between;
    padding: inherit;
  }
  form label{
    font-weight:600;
  }
}


.container-c {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
/* Hide the browser's default checkbox */
.container-c input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.checkmark-c {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #888;
}

/* On mouse-over, add a grey background color */
.container-c:hover input ~ .checkmark-c {
  background-color: #888;
}

/* When the checkbox is checked, add a blue background */
.container-c input:checked ~ .checkmark-c {
  background-color: #2196F3;
}
/* Create the checkmark/indicator (hidden when not checked) */
.checkmark-c:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-c input:checked ~ .checkmark-c:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-c .checkmark-c:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.loaderformcon{
  position: fixed;
  width: 100%;
  height: 127vh;
  opacity: .5;
  background: #eee;
  z-index: 999;
  top:-200px;
  display: none;
}
.showload{
  display: block;
}
.loaderform {
  position: fixed;
  left: 45%;
  top:50%;
  transform: translate(-50%,-50%);
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  z-index: 999;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


<body style="background-color: #ffff">
 <?php
if (isset($flag)) {
	if ($flag) {
		echo '<script type="text/javascript"> swal({
            title: "Success",
            text: "Redirecting in 2 seconds",
            type:"Success",
            timer:2000,
            showConfirmButton: false,
            })
            .then( () =>  window.location.href ="' . base_url() . '/schoollogin' . '");
        </script>';
	} else {
		echo '<script type="text/javascript"> swal({ icon: "error" , text:"' . $message . '" }) </script>';
	}

}
?>

<!---->
<!--	<div class="container-contact100">-->
<!--		<div class="wrap-contact100">-->
<!--            <div class="contact100-more flex-col-c-m" style="background-color: #abdde5;">-->
<!--            </div>-->

<div id="refreshload" class="loaderformcon">
<div class="loaderform"></div>
</div>

<div  id="reg-bkg">


    <form style="margin: auto; background-color:#f0fff0;border-radius: 20px" class="contact100-form validate-form" method="post" enctype="multipart/form-data" data-toggle="validator">
				<span class="contact100-form-title">
					NSCP 2020 Registration Form
				</span>

        <h3 style="color:green; font-size:15px;">Personal Details</h3><br />

        <div class="wrap-input100 validate-input" data-validate="Enter Your Full Name">
            <label class="label-input100" for="firstname">Your Name *</label>
            <input id="firstname" class="input100" type="text" name="contact_person_name" placeholder="Enter Your Full Name">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100">
            <div class="label-input100">You are *</div>
            <div>
                <select class="js-select2" name="contact_person_designation">
                    <option value="principal" selected>Principal</option>
                    <option value="teacher">Teacher</option>
                    <option value="NGO">NGO Coordinator</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <label class="label-input100" for="email">Email*</label>
            <input id="email" class="input100" type="email" name="email" placeholder="Enter your email address">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Enter your password">
            <label class="label-input100" for="cpassword1">Password *</label>
            <input id="cpassword1" class="input100" type="password" name="password1" placeholder="Enter your password">
            <span class="focus-input100"></span>
            <div style="padding-left: 1em; padding-top: 1em; "><label class="container-c" style="color: #0787B2"><input type="checkbox" style="" onclick="myFunction3()"> Show Password<br/><br /><span class="checkmark-c" style="background: none!important;"></span></label></div>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Enter your password">
            <label class="label-input100" for="cpassword2">Confirm Password *</label>
            <input id="cpassword2" class="input100" type="password" name="password2" placeholder="Enter your password again">
            <span class="focus-input100"></span>
            <div style="padding-left: 1em; padding-top: 1em; "><label class="container-c" style="color: #0787B2"><input type="checkbox" onclick="myFunction4()"> Show Password<br/><br /><span class="checkmark-c" style="background: none!important;"></span></label></div>
        </div>


        <br /><h3 style="color:green; font-size:15px;">Institute's Details</h3><br />

        <div class="wrap-input100 validate-input" data-validate="The official full name of the Institute should be written">
            <label class="label-input100" for="Institutename">Institute Name *</label>
            <input id="Institutename" class="input100" type="text" name="institute_name" placeholder="Enter Your Institute Name">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter Phone Number">
            <label class="label-input100" for="phone1">Institute's Contact *</label>
            <input id="phone1" class="input100" type="text" pattern="[0-9]{10}" onkeypress="return /[0-9]/i.test(event.key)" name="mobile" placeholder="Enter Phone Number">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter Alternate Phone Number">
            <label class="label-input100" for="phone2">Institute's Alternate Contact *</label>
            <input id="phone2" class="input100" type="text" pattern="[0-9]{10}" onkeypress="return /[0-9]/i.test(event.key)" name="mobile1" placeholder="Enter Alternate Phone Number">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Institute Address is required">
            <label class="label-input100" for="address">Institute Address *</label>
            <textarea id="address" class="input100" name="address" placeholder="Address"></textarea>
            <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 validate-input" data-validate = "School State">
            <label class="label-input100" for="address">State *</label>
            <div>
                <select class="js-select2" name="state">
                            <option value="">------------Select State------------</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>

</select>
<div class="dropDownSelect2"></div>
</div>
 <span class="focus-input100"></span>
</div>

        <div class="wrap-input100 validate-input" data-validate = "School City">
            <label class="label-input100" for="address">city*</label>
            <input id="city" class="input100" type="text" onkeypress="return /[a-z]/i.test(event.key)" name="city" placeholder="City">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "School Address is required">
            <label class="label-input100" for="address">Pin Code*</label>
            <input id="pincode" class="input100" pattern="[0-9]{6}" onkeypress="return /[0-9]/i.test(event.key)" type="text" name="pincode" placeholder="Pin Code">
            <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100">
            <div class="label-input100">Institute Type *</div>
            <div>
                <select class="js-select2" name="Institute_type">
                    <option value="government" selected>Government</option>
                    <option value="private">Private</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100">
            <label class="label-input100" for="internID">Referral ID (optional) </label>
            <input id="internID" class="input100" type="text" name="intern_id" placeholder="Enter Referral Code">
            <span class="focus-input100"></span>
        </div>

        <br /><h3 style="color:green; font-size:15px;">School's Program Manager (If Any)</h3><br />

        <div class="wrap-input100">
            <label class="label-input100" for="mName">Name </label>
            <input id="mName" class="input100" type="text" name="manager_name" placeholder="Enter Manager's Name">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100">
            <label class="label-input100" for="mEmail">Email </label>
            <input id="mEmail" class="input100" type="email" name="manager_email" placeholder="Enter Manager's Email">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100">
            <label class="label-input100" for="mContact">Contact Number </label>
            <input id="mContact" class="input100" type="text" pattern="[0-9]{10}" name="manager_contactno" placeholder="Contact Number">
            <span class="focus-input100"></span>
        </div>


        <label class="container-c"><font style="color: black!important;">I agree</font> <a style="color:#499df1;" href="<?php echo base_url(); ?>Guidelines_NSCP.pdf" target="_blank">*Terms and Conditions</a>
        <input type="checkbox" id="iagree" required>
        <span class="checkmark-c"></span>
        </label>

        <div class="container-contact100-form-btn">

            <button id="submit" class="contact100-form-btn">
                Submit
            </button>

        </div>

        <p class="copyright-w3ls" style="text-align: center;font-size: 1em;font-weight: normal;padding: 1em 0 2em 0;color: #000;letter-spacing: 1px;">© 2020 Intellify. All Rights Reserved <br>
            <img src="<?php echo base_url() ?>/assets/registration/images/logo.png" height="30px" width="auto">
        </p>
    </form>



</div>
<!---->
<!--			<div class="contact100-more flex-col-c-m" style="background-color: #abdde5;">-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->





<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>/assets/registration/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>/assets/registration/vendor/bootstrap/js/popper.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script><!--===============================================================================================-->
<script src="<?php echo base_url() ?>/assets/registration/vendor/select2/select2.min.js"></script>
<script>
    function passCheck() {
        var x = document.getElementById("cpassword1").value;
        var y = document.getElementById("cpassword2").value;
        //console.log(x,y);
        if( x === y){
            console.log('same');
            document.getElementById("submit").disabled = false;
            document.getElementById("cpassword2").style.color = 'black';
        }
        else{
            //console.log("avasv");
            document.getElementById("submit").disabled = true;
            document.getElementById("cpassword2").style.color = 'red';
        }

    }


    $("#cpassword1, #cpassword2")
        .on("keydown", function(e){
            if(e.keyCode == 13 && e.keyCode == 9){
                passCheck();
            }
        })
        .on("blur",function(){
            passCheck();
        })
        .on("focus",function(){
            passCheck();
        });
    function myFunction3() {
        var x = document.getElementById("cpassword1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function myFunction4() {
        var x = document.getElementById("cpassword2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    $(".js-select2").each(function(){
        $(this).on('select2:open', function (e){
            $(this).parent().next().addClass('eff-focus-selection');
        });
    });
    $(".js-select2").each(function(){
        $(this).on('select2:close', function (e){
            $(this).parent().next().removeClass('eff-focus-selection');
        });
    });



//send data
              $(document).ready(function(){

               $('#submit').prop('disabled',true);
                  $('#iagree').change(function(){
                    if ($(this).is(':checked') == true) {
                    document.getElementById("submit").disabled = false;
                  } else{
                    document.getElementById("submit").disabled = true;
                  }
                  });




                    function alphaOnly(event) {
                      var key = event.keyCode;
                      return ((key >= 65 && key <= 90) || key == 8);
                        };


                    $("form").submit(function(){
                         return false;
                      });

                  $('#submit').click(function(){

                        $('#refreshload').addClass('showload')
                       var contact_person_name        = $("[name=contact_person_name]").val();
                       var contact_person_designation = $("[name=contact_person_designation]").val();
                       var email                      = $("[name=email]").val();
                       var password1                  = $("[name=password1]").val();
                       var password2                  = $("[name=password2]").val();
                       var institute_name             = $("[name=institute_name]").val();
                       var mobile                     = $("[name=mobile]").val();
                       var mobile1                    = $("[name=mobile1]").val();
                       var address                    = $("[name=address]").val();
                       var state                      = $("[name=state]").val();
                       var city                       = $("[name=city]").val();
                       var pincode                    = $("[name=pincode]").val();
                       var Institute_type             = $("[name=Institute_type]").val();
                       var intern_id                  = $("[name=contact_person_name]").val();
                       var manager_name               = $("[name=manager_name]").val();
                       var manager_email              = $("[name=manager_email]").val();
                       var manager_contactno          = $("[name=manager_contactno]").val();

                     $.ajax({
      type  : 'POST',
      data  : {
            contact_person_name :contact_person_name,
            contact_person_designation:contact_person_designation,
            email:email,
            password1:password1,
            institute_name:institute_name,
            mobile:mobile,
            mobile1:mobile1,
            address:address,
            state:state,
            city:city,
            pincode:pincode,
            Institute_type:Institute_type,
            intern_id:intern_id,
            manager_name:manager_name,
            manager_email:manager_email,
            manager_contactno:manager_contactno

          },
      url   : '<?php echo $action; ?>',

      success : function(data){


                   var data2 = JSON.parse(data);
                     if(data2.flag == 0){
                      console.log("email already registered");
                      $('#refreshload').removeClass('showload');
                        swal({ icon: "error" , text: data2.message })
                     }
                     else if(data2.flag == 1){
                      console.log("success");
                      $('#refreshload').removeClass('showload');
                      swal({
                              title: "Success",
                              text: "Redirecting in 2 seconds",
                              type:"Success",
                              timer:2000,
                              showConfirmButton: false,
                              }).then( () =>  window.location.href ="<?php echo base_url(); ?>/schoollogin");


                     } else if(data2.flag == 2){

                      console.log("all field required");

                      swal({ icon: "error" , text: data2.message })
                      $('#refreshload').removeClass('showload');


                      }



      }

    })


  });





              });




</script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>/assets/registration/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url() ?>/assets/registration/vendor/daterangepicker/daterangepicker.js"></script>

<!--===============================================================================================-->
<script src="<?php echo base_url() ?>/assets/registration/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url() ?>/assets/registration/js/main.js"></script>


</body>
</html>
