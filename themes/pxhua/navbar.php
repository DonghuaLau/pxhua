<?php
	$nav_active = get_active_nav();
?>
		<nav id="hua-nav" class="navbar navbar-default <?php if(defined("NAV_FIX")){echo " navbar-fixed-top";} ?>">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hua-navbar-collapse" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">
				<img alt="Brand" src="<?php echo get_template_directory_uri().'/images/feet.jpg'; ?>">
		 	  </a>
			  <div style="height:50px;float:left;font-size:1.3em;margin: 18px 0px -10px 0px;">
		      	<span href="javascript:;" style="padding:0px">
				<?php 
					if(is_single()){ 
						the_title();
					}else{
						echo '<a href="/">';
						echo get_bloginfo( 'name' ); 
						echo '</a>';
					}
				?>
				</span>
		 	  </div>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="hua-navbar-collapse">
		      <ul class="nav navbar-nav navbar-right">

		        <form class="navbar-form" role="search" method="get" action="/">
				<div class="input-group"> 
					<input id="search-word" type="text" class="form-control" placeholder="输入关键词搜索" value="<?php if(isset($_GET['s'])){ echo $_GET['s']; } ?>" name="s" aria-label="">
				    <div class="input-group-btn"> 
				      <button type="submit" class="btn btn-default"><div class="glyphicon glyphicon-search"></div></button> 
				    </div>
				</div>
		        </form>
				<?php /*if(is_user_logged_in()){
                         $current_user = wp_get_current_user();
                ?>
                   <li><a href="<?php echo admin_url('post-new.php'); ?>"><?php echo "发表文章"; ?></a></li>
                   <li><a href="<?php echo admin_url(); ?>"><?php echo $current_user->user_login; ?></a></li>
                   <li><a href="<?php echo wp_logout_url("http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>"><span>退出</span></a></li>
                 <?php }else{ ?>
                   <li><a href="<?php echo wp_login_url("http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>"><span>登录</span></a></li>
                 <?php } ?>
		      </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>	

<!-- additional code -->
<div style="display:none">
	<form id="google-search-form" method="get" action="https://www.google.com/#newwindow=1&q=word" target="_blank">
		<!--<input id="google-search-word" type="text" name="q"/>-->
	</form>
	<form id="baidu-search-form" method="get" action="https://www.baidu.com/s" target="_blank">
		<input id="baidu-search-word" type="text" name="wd"/>
	</form>
</div>
<script type="text/javascript">
</script>
