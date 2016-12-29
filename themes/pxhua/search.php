<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="container">
<div class="padding-top40"></div>
<div class="row">

<div class="col-md-9">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="search-header">
				<h1 class="search-title"><?php printf( __( '为您搜索"%s"结果:', 'twentythirteen' ), get_search_query() ); ?></h1>
			</header>

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
	<div class="col-md-8">
	<div class="padding-top40"></div>
	</div><!-- col-md-8 -->
</div><!-- row -->

</div><!-- container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
