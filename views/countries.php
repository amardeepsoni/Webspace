<section id="top-banner"> <img src="<?php echo HTTP_ASSET_PATH; ?>images/country-banner.jpg"><span class="overlapp"></span>
  <div class="maininnerheading">
    <div class="container">
      <h1 class="big-heading"><?php echo $heading; ?></h1>
    </div>
  </div>
</section>
<section class="breadcrumss">
  <div class="container">
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
</section>
<section id="abouttsection">
  <div class="container">
    <div class="selectcountry">
      <ul class="row">
        <?php foreach(getselectcountry('0') as $catrw) {?>
        <?php if($catrw['home']) {?>
        <li class="col-sm-4 col-lg-13 col-md-3" > <a href="<?php echo $catrw['href']; ?>" >
          <p> <img src="<?php echo base_url(); ?>uploads/<?php echo $catrw['flagiocn']; ?>"/></p>
          <b><?php echo $catrw['countryhead']; ?></b> </a> </li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
</section>
