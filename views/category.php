<div class="page-title section lb">
  <div class="container">
    <div class="clearfix">
      <div class="title-area pull-left">
        <h2><?php echo $name; ?></h2>
      </div>
      <!-- /.pull-right -->
      <div class="pull-right hidden-xs">
        <div class="bread">
          <ol class="breadcrumb">
            <?php foreach($breadcrumbs as $breadcrumb){?>
            <li><a href="<?php echo $breadcrumb['href'];?>"><?php echo $breadcrumb['text'];?></a></li>
          <?php } ?>
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

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="shoptop clearfix">
          <div class="pull-left hidden-xs">
          </div>
          <!-- end col -->
          
          <div class="pull-right">
            <select class="form-control">
              <option>Sort Descending</option>
              <option>Sort by multiplying</option>
              <option>Alphabetical order</option>
            </select>
          </div>
          <!-- end col --> 
        </div>
        <!--- end shop-top --> 
      </div>
      <!-- end col --> 
    </div>
    <!-- end row -->
    
    <hr class="invis">
    <div class="course-list normal-list">
      <div class="video-wrapper course-widget clearfix">

        <?php 
          if($alltest){
            foreach($alltest as $row){?>
        <div class="row">
          <div class="col-md-3">
            <div class="post-media">
              <div class="entry"> <img src="<?php echo $row['image']; ?>" alt="" class="img-responsive">
                <!-- end magnifier --> 
              </div>
            </div>
          </div>
          <!-- end col-->
          <div class="col-md-9">
            <div class="widget-title clearfix">
              <h3><a href="#"><?php echo $row['name']; ?></a></h3>
              <hr>
              <p><b>Date:</b> <?php echo $row['startdate']; ?> </p>
             <?php echo $row['description']; ?>
              <hr>
              <div class="bottom-line clearfix">
                <div class="pull-right"> <a href="<?php echo $row['href']; ?>" class="btn btn-success">Start Test</a> </div>
              </div>
              <!-- end bottom --> 
            </div>
            <!-- end title --> 
          </div>
          <!-- end col --> 
        </div>
      <?php } }?>


      </div>
      <!--widget --> 
    </div>
    <!-- end row --> 





  </div>
  <!-- end container --> 
</div>
<!-- end section --> 
