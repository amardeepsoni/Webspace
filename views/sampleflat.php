
<div class="clearfix"></div>
<section class="clearfix" id="innerbanner">
  <div class="nagvation">
    <div class="container">
      <ul class="clearfix ">
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
</section>
<section id="inercontentsectoin"> 
  <!--end section-->
  <div class="clearfix"></div>
  <div class="container">
    <h1 class="innerhead"> <?php echo $heading; ?></h1>
    <div class="clearfix"></div>
    <ul id="costmorfeedback">
      <?php if($sampleflats) {?>
      <?php   
  foreach($sampleflats as $sampleflat) { ?>
      <?php  if($sampleflat['home']=='1'){ ?>
      <li><a href="<?php echo $sampleflat['image']; ?>" data-fancybox-group="gallery" class="fancybox" title="<?php echo $sampleflat['name']; ?>"> <img src="<?php echo $sampleflat['image']; ?>" width="350" height="250" alt="<?php echo $sampleflat['name']; ?>">
        <h6 class="text-green-3 paddtop2"><?php echo $sampleflat['name']; ?></h6>
        </a></li>
      <?php   } ?>
      <?php   } ?>
      <?php } ?>
    </ul>
  </div>
</section>
<!--end section-->
<div class="clearfix"></div>
