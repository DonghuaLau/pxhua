<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Hua
 * @since Twenty Hua 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (gt IE 9) & !(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta content="" name="keywords">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/images/feet.jpg'; ?>" /> 
	<?php wp_head(); ?>

<!-- move to style.css later -->
<style>

.site-content{
	word-wrap: break-word;
}
.wp-video{
    margin: auto;
}

.entry-content h1{
	margin:20px 0 10px 0;
	font-size:1.6em;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}
.entry-content h2{
	margin:16px 0 16px 0;
	font-size:1.5em;
}
.entry-content p{
	text-indent:2.0em;
	font-size:1.0em;
	word-wrap: break-word;
	margin:5px 0 5px 0;
}
#cboxNext, #cboxPrevious, #cboxClose{
	display:none !important;
}
</style>

</head>

<body id="hua-body" <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
		<?php include("navbar.php"); ?>
		</header><!-- #masthead -->

		<div id="main" class="site-main">
