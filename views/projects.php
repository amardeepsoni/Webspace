<div id="innerbaner">

<img src="<?php echo base_url();?>images/innerbanner.jpg" width="1000"  alt="" />


<div class="overlayhead">
<div class="container"><div  class="clearfix">
  <h1><?php echo $heading; ?></h1>
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
  </ul></div></div>
</div></div>
<?php if($projects) {?>
<section class="pr-sec">
  <div class="container">
    <ul id="projects" >
      <?php 
  foreach($projects as $project) { ?>
      <li id="project<?php echo $project['id']; ?>" >
      
      <div class="project">
              <h2><?php echo $project['name']; ?></h2>
              <h3><?php echo $project['subhead']; ?></h3></div>
      
        <div class="row">
          <div class="col-md-4 leftimg"><img src="<?php echo $project['image']; ?>" width="100%"  alt="<?php echo $project['name']; ?>" title="<?php echo $project['name']; ?>"/></div>
          <div class="col-md-8">
            <div class="project">
         
              <h4> <?php echo $project['shortdescription']; ?></h4>
              <?php echo $project['description']; ?></div>
          </div>
          <div class="col-md-4 rightimg"><img src="<?php echo $project['image']; ?>" width="100%"  alt="<?php echo $project['name']; ?>" title="<?php echo $project['name']; ?>"/></div>
        </div>
        
        
      <img src="images/portfolio-shadow.jpg" width="1261" height="35" class="shodow" alt="" /> </li>
      <?php } ?>
    </ul>
  </div>
</section>
<?php } ?>
