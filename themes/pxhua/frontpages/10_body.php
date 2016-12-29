<div class="page-main">
<!-- page left -->
<div id="page-left-id" class="page-main-item page-left">
<?php //require_once("left.php"); ?>
</div>
<!-- page left end -->

<!-- page middle -->
<!-- carousel -->
<div id="page-middle-id" class="page-main-item page-middle">
<div id="carousel-container">
<div id="main-carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#main-carousel" data-slide-to="000" class="active"></li>
    <li data-target="#main-carousel" data-slide-to="111"></li>
    <li data-target="#main-carousel" data-slide-to="222"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/sample01.jpg'; ?>" class="img-responsive" alt="smaple01">
      <div class="carousel-caption">
		<h3>First slide label</h3>
    	<p>Sample 01, tooltip, tab, modal, dropdown, scrollspy, popover, alert, button</p>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/sample02.jpg'; ?>" class="img-responsive" alt="smaple02">
      <div class="carousel-caption">
		<h3>Second slide label</h3>
    	<p>Sample 02, tooltip, tab, modal, dropdown, scrollspy, popover, alert, button</p>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/sample03.jpg'; ?>" class="img-responsive" alt="smaple03">
      <div class="carousel-caption">
		<h3>Third slide label</h3>
    	<p>Sample 03, tooltip, tab, modal, dropdown, scrollspy, popover, alert, button</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<!-- content show as thumbnail -->
<?php
for($i=0;$i<2;$i++){
?>
<div class="contens-tb">
<div class="page-header">
  <h4>Tango category <small>Yoyoyo, subtext for header</small></h4>
</div>

<div class="row category-1">
    <div class="thumbnail col-sm-2">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/tb001.jpg'; ?>" alt="...">
      <div class="caption">
        <h5><a href="#">Thumbnail label</a></h5>
        <small>show words.</small><br>
        <small>10,000 views * 1 days ago</small>
      </div>
    </div>
    <div class="thumbnail col-sm-2">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/tb002.jpg'; ?>" alt="...">
      <div class="caption">
        <h5><a href="#">Thumbnail label</a></h5>
        <small>show words.</small><br>
        <small>10,000 views * 1 days ago</small>
      </div>
    </div>
    <div class="thumbnail col-sm-2">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/tb003.jpg'; ?>" alt="...">
      <div class="caption">
        <h5><a href="#">Thumbnail label</a></h5>
        <small>show words.</small><br>
        <small>10,000 views * 1 days ago</small>
      </div>
    </div>
    <div class="thumbnail col-sm-2">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/tb004.jpg'; ?>" alt="...">
      <div class="caption">
        <h5><a href="#">Thumbnail label</a></h5>
        <small>show words.</small><br>
        <small>10,000 views * 1 days ago</small>
      </div>
    </div>
    <div class="thumbnail col-sm-2">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/tb005.jpg'; ?>" alt="...">
      <div class="caption">
        <h5><a href="#">Thumbnail label</a></h5>
        <small>show words.</small><br>
        <small>10,000 views * 1 days ago</small>
      </div>
    </div>
    <div class="thumbnail col-sm-2">
      <img src="<?php echo get_template_directory_uri().'/images/10_carousel/tb006.jpg'; ?>" alt="...">
      <div class="caption">
        <h5><a href="#">Thumbnail label</a></h5>
        <small>show words.</small><br>
        <small>10,000 views * 1 days ago</small>
      </div>
    </div>
</div>

</div>
</div>
<?php } ?>
<!-- page middle end -->

<!-- page right -->
<div id="page-right-id" class="page-main-item page-right">
<?php //require_once("right.php"); ?>
</div>
<!-- page right end -->
</div>
