
<div id="page-content-wrapper">
  <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
  <div class="demo-parallax parallax section looking-photo nopadbot" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url(); ?>schoolassest/upload/demo_02.jpg');">
    <div class="page-title section nobg">
      <div class="container-fluid">
        <div class="clearfix">
          <div class="title-area pull-left">
            <h2><?php echo $heading; ?> <small></small></h2>
          </div>
          <!-- /.pull-right -->
          <div class="pull-right hidden-xs">
            <div class="bread">
              <ol class="breadcrumb">
                <?php if (isset($breadcrumbs)) {
	$bi = 0;
	foreach ($breadcrumbs as $rw) {
		if ($bi > 0) {
			echo "";
		}
		echo "<li><a href='" . $rw['href'] . "'>" . $rw['text'] . "</a></li>";
		$bi++;
	}
}?>
              </ol>
            </div><!-- end bread -->
          </div><!-- /.pull-right -->
        </div><!-- end clearfix -->
      </div><!-- end container -->
    </div><!-- end page-title -->
  </div><!-- end parallax -->
</div> <!-- end page -->

<div class="section">
  <div class="container-fluid">
    <?php if ($catproducts) {?>
      <div class="studymetrial">
        <div class="row">
          <?php $j = 1;foreach ($catproducts as $catproduct) {?>
            <div class="col-md-4">
              <h2>
                <?php echo $catproduct['name']; ?>
              </h2>
              <?php if ($catproduct['products']) {?>
                <ul>
                  <?php foreach ($catproduct['products'] as $product) {?>
                    <li> <a href="<?php echo $product['image']; ?>" target="_blank"><i class="fa fa-download"></i> <?php echo $product['name']; ?></a></li>
                  <?php }?>
                </ul>
              <?php }?>
            </div>
          <?php $j++;}?>
        </div><!-- end row -->
      </div><!-- end studymetrail -->
    <?php }?>
  </div><!-- end container -->
</div><!-- end section -->
