<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Section</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examPortal/dist/styles.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body id="exam-dashboard">
    <nav class="navbar navbar-light navigation-clean">
        <p class="navbar-brand">Study Section</p>
    </nav>
    <div class="skill-boxed">
        <div class="cnt">
            <div class="row myrow">
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 2px 2px 10px #ddd;width: 250px;height: 250px;">
                        <div class="card-header text-center">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button" href="#">Study Material</a>

                                <div class="dropdown-menu">
                                    <a href="<?php echo base_url(); ?>StudyMaterial/student/lg/0" class="dropdown-item">Hindi</a>
                                    <a href="<?php echo base_url(); ?>StudyMaterial/student/lg/1" class="dropdown-item">English</a>

                                </div>

                            </div>



                        </div>
                        <div class="card-body text-center">
                        <i class="fas fa-book" style="font-size: 100px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="box-shadow: 2px 2px 10px #ddd;width: 250px;height: 250px;">
                        <div class="card-header text-center"><a class="btn btn-primary" type="button" href="<?php echo base_url(); ?>StudyMaterial/studentCritical">Critical Thinking</a>

                        </div>
                        <div class="card-body text-center">
                        <i class="  fas fa-brain" style="font-size: 100px;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                       <div class="card" style="box-shadow: 2px 2px 10px #ddd;width: 250px;height: 250px;">
                        <div class="card-header text-center"><a class="btn btn-primary" type="button" href="<?php echo base_url(); ?>StudyMaterial/studentResources">Resources</a>
                </div>
                <div class="card-body text-center">
                        <i class="fas fa-folder" style="font-size: 100px;"></i>
                        </div>

            </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>