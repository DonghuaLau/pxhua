<?php 
/*
 *	Home page
 *	
 *	Tips: comment main stylesheet in functions.php 'twentythirteen_scripts_styles'
 */
get_header(); 
?>

<div class="container">
<div class="padding-top40"></div>
<div class="row">

<div class="col-md-9">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<?php /*<h1 class="archive-title"><?php printf( __( '文章分类 > %s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1> */ ?>

				<?php 
					//if ( category_description() ) : // Show an optional category description 
					if (0) :
						echo category_description(); 
					endif; 
				?>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-summary', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- col-md-9 -->

<div class="col-md-3">
	<?php get_template_part( 'templates/sidebar', 'left' ); ?>
</div><!-- col-md-3 -->

</div><!-- row -->

<div class="row">
	<div class="col-md-12">
	<div class="padding-top40"></div>
	</div><!-- col-md-8 -->
</div><!-- row -->

</div><!-- container -->

<?php get_footer(); ?>
