<style>
.panel-body li a{
    margin-left: -18px;
}
</style>
<div class="padding-top40"></div>
<div class="row">
	<!-- newest articles -->
	<div class="panel">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo __("最新文章", "hua"); ?><!--<a class="panel-title-right" href="#">更多>></a>--></h3>
	  </div>
	  <div class="panel-body">
	  <?php echo my_get_recent_posts(20); ?>
	  </div>
	</div>
</div><!-- row -->

<div class="row">
	<!-- hotest articles -->
	<div class="panel">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo __("热门文章", "hua"); ?><!--<a class="panel-title-right" href="#">更多>></a>--></h3>
	  </div>
	  <div class="panel-body">
	  <?php echo get_popular_posts(20); ?>
	  </div>
	</div>
</div><!-- row -->
