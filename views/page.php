
<section id="innerbanner"><img src="<?php echo $banner;?>" width="100%"/></section>
<h2><?php echo $name; ?></h2>
<ol >
  <?php foreach($breadcrumbs as $breadcrumb){?>
  <li><a href="<?php echo $breadcrumb['href'];?>"><?php echo $breadcrumb['text'];?></a></li>
  <?php } ?>
</ol>
<div class="section lightbg onecourse">
  <div class="container"> <?php echo $description; ?> </div>
</div>
<div id="aboutussubpahges">
  <div class="container">
    <?php if($subpages){?>
    <div class="row" >
      <?php foreach($subpages as $productrw) {?>
      <div class="col-sm-6">
        <div class="aboutpage"> <img src="<?php echo $productrw['image']; ?>" width="100%" class="topimg"/>
          <div  class="caption">
            <h4><?php echo $productrw['name']; ?></h4>
            <?php echo $productrw['description']; ?></div>
          <img src="<?php echo $productrw['image']; ?>" width="100%" class="bottomimg"/></div>
      </div>
      <?php  }?>
    </div>
    <?php  }?>
  </div>
</div>
<div  id="teamcontainer">
  <div class="container">
    <h3>Meet People Behind This Initiative</h3>
    <?php 
       if($catproducts){ 

       foreach($catproducts as $catproduct){ ?>
    <h4 class="text-center"><span><?php echo  $catproduct['name'];?></span></h4>
    <?php     if($catproduct['products']){ ?>
    <div class="row">
      <?php $ab=1;  foreach($catproduct['products'] as $product){?>
      <div class="col-md-3 col-sm-6 wow animated  bounceInUp" data-wow-delay="<?php echo $ab;?>00ms">
        <div class="teammembers"> <img src="<?php echo  $product['image'];?>"  alt="<?php echo  $product['name'];?>">
          <div class="teamcaption" >
            <h5><?php echo  $product['name'];?></h5>
            <p><b><?php echo  $product['designation'];?></b></p>
            <?php echo  $product['shortdescription'];?></div>
        </div>
      </div>
      <?php  $ab++;}?>
    </div>
    <br />
    <br />
    <?php  } ?>
    <?php  }} ?>
  </div>
</div>
<?php if($testimonials) {?>
<section class="testimonial padding-lg">
  <div class="container">
    <div class="wrapper">
      <h2>Client Testimonials</h2>
      <ul class="testimonial-slide">
        <?php 
  foreach($testimonials as $testimonial) { ?>
        <li> <?php echo $testimonial['description']; ?> <span><?php echo $testimonial['name']; ?>, <span><?php echo $testimonial['designation']; ?></span></span> </li>
        <?php } ?>
      </ul>
      
      <!--<div id="bx-pager"> <a data-slide-index="0" href="#"><img  src="<?php echo base_url();?>images/testimonial-thumb1.jpg" class="img-circle" alt=""/></a> <a data-slide-index="1" href="#"><img  src="<?php echo base_url();?>images/testimonial-thumb2.jpg" class="img-circle" alt="" /></a> <a data-slide-index="2" href="#"><img  src="<?php echo base_url();?>images/testimonial-thumb3.jpg" class="img-circle" alt="" /></a> <a data-slide-index="3" href="#"><img  src="<?php echo base_url();?>images/testimonial-thumb3.jpg" class="img-circle" alt="" /></a></div>--> 
    </div>
  </div>
</section>
<br />
<br />
<?php } ?>
