<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<header class="page-header">
	<h1 class="search-title"><?php printf( __( '糟糕，没有搜索到与"%s"的相关文章。', 'twentythirteen' ), get_search_query() ); ?></h1>
</header>

<div class="page-content">
</div><!-- .page-content -->
