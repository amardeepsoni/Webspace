<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round 2 | login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examPortal/dist/styles.min.css">
</head>

<body><body id="r2-login-page">
<div class="login-clean">
    <form name="loginform"  method="post" action="<?php echo $action; ?>" id="loginform">
        <div class="illustration"><img src="https://codepipeline-ap-south-1-323045938757.s3.ap-south-1.amazonaws.com/Intellify_IMG/logo.png" style="  height:100px;
  width:auto;
" />
            <h4 style="color: #347ab6">International Science Creativity Olympiad</h4>
            <h4 style="color: #347ab6; font-weight: bold">ROUND 2</h4>
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Registration ID" name="username"  value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" type="text" id="username"  required>
        </div>
        <div class="form-group">
            <input name="password"  value="" type="password" id="password" class="form-control" placeholder="Password"  required>
        </div>
        <div class="form-group"><button class="btn btn-primary btn-block" style="background: #347ab6" type="submit">Log In</button></div>
    </form>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
