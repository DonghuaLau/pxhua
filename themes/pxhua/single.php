<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 
?>
	
<div class="container">
<div class="row">

<div class="col-md-9">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php twentythirteen_post_nav(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php comments_template(); ?>
</div><!-- col-md-9 -->

<div class="col-md-3">
	<?php get_template_part( 'templates/sidebar', 'left' ); ?>
</div><!-- col-md-3 -->

</div><!-- row -->

</div><!-- container -->

<div class="padding-top40"></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
