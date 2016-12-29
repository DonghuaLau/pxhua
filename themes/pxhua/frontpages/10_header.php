<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/images/avatar_64.jpg'; ?>" /> 
	<link href="<?php echo get_template_directory_uri().'/css/10_style.css'; ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri().'/css/bootstrap.min.css'; ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri().'/css/bootstrap-theme.min.css'; ?>" rel="stylesheet">
	<script src="<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script src="<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery-migrate.min.js"></script>
	<script src="<?php echo get_template_directory_uri().'/js/bootstrap.min.js'; ?>"></script>
</head>
