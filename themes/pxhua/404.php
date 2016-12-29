<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<style>
.row{
    margin-right: 0px;
    margin-left: 0px;
}
</style>

	<div id="primary" class="content-area container">
		<div id="content" class="site-content row" role="main">

			<header class="page-header">
				<h1 style="font-size:25px;" class="page-title"><?php _e( '页面未找到，好尴尬！', 'pxhua' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<?php my_get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
