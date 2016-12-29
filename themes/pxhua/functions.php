<?php
/**
 * Twenty Hua functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development
 * and https://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Hua
 * @since Twenty Hua 1.0
 */

define( 'TWENTY_HUA_VERSION', '1.0.0' );
define("LOG_FILE", getcwd()."/var/log/ds.log");

require_once('config.php');
require_once('hua_route_page.php');

global $g_hua;
$g_hua = array(
			 'title' => false // string
			,'func_static_files' => false // function
		);

/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Twenty Hua only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * Twenty Thirteen setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentyhua' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyhua', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	//add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'twentyhua' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentyhua' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentyhua' );

	//if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
	if (false){
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		//$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Thirteen 1.0
 */
function twentyhua_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );


	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentyhua-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160302', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyhua-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentyhua-style', get_stylesheet_uri(), array(), '2016-12-15' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyhua-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyhua-style' ), '2016-03-18' );
	wp_style_add_data( 'twentyhua-ie', 'conditional', 'lt IE 9' );

	/* added by Donghua */
	// bootstrap
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20160301', true );
	wp_enqueue_style( 'twentythirteen-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20160301' );
	wp_enqueue_style( 'twentythirteen-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '20160301' );

	global $g_hua;
	if($g_hua['func_static_files'] != false){
		$g_hua['func_static_files']();
		//echo "func_static_files<br>";
	}
}
add_action( 'wp_enqueue_scripts', 'twentyhua_scripts_styles' );
function myshortcode($atts) {
  // Enqueue jquery script and plugin's script
  //wp_enqueue_script("jquery");
  wp_enqueue_script('twentyhua');
}

/**
 *
 *	rewrite URL
 *
 */
function custom_routing_init() {

	// forece enable SSL detection if needed. 
	// * two problems *:
	//		1.if enable SSL, can't run https js scripts, eg: dashangcloud.com
	//		2.firefox not trust free SSL certificates(Symantec)
	//$_SERVER['HTTPS'] = 'on';

    custom_routing_register_rewrites();

    global $wp;
    $wp->add_query_var( 'hua_route' );
}
add_action( 'init', 'custom_routing_init' );

function custom_routing_register_rewrites() {
    add_rewrite_rule( '^' . get_custom_routing_url_prefix() . '/?$','index.php?hua_route=/','top' );
    add_rewrite_rule( '^' . get_custom_routing_url_prefix() . '(.*)?','index.php?hua_route=$matches[1]','top' );
}

/**
 * Get the URL prefix for any API resource.
 *
 * @return string Prefix.
 */
function get_custom_routing_url_prefix() {
    return apply_filters( 'custom_routing_url_prefix', 'front' );
}

function custom_routing_maybe_flush_rewrites() {
    $version = get_option( 'custom_routing_plugin_version', null );

    if ( empty( $version ) ||  $version !== TWENTY_HUA_VERSION) {
        flush_rewrite_rules();
        update_option( 'custom_routing_plugin_version', TWENTY_HUA_VERSION);
    }

}
add_action( 'init', 'custom_routing_maybe_flush_rewrites', 999 );

function custom_routing_loaded() {

	if ( !empty( $GLOBALS['wp']->query_vars['hua_route'] ) ){
		$route = strtolower($GLOBALS['wp']->query_vars['hua_route']);
        hua_routing_load($route);
        die();
	}

	return;
}
add_action( 'template_redirect', 'custom_routing_loaded', -100 );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyhua' ), max( $paged, $page ) );

	global $g_hua;
	if($g_hua['title'] != false){
		$title = $g_hua['title'] . ' | ' . $title;
	}

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentyhua' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyhua' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'twentyhua' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'twentyhua' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<div class="padding-top40"></div>
	<nav class="navigation paging-navigation" role="navigation">
		<!--<h1 class="screen-reader-text"><?php _e( '文章导航', 'twentyhua' ); ?></h1>-->
		<div class="nav-links nav-xyz">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> 以前的文章', 'twentyhua' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '最新文章 <span class="meta-nav">&rarr;</span>', 'twentyhua' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="padding-top40"></div>
	<nav class="navigation post-navigation" role="navigation">
		<!--<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyhua' ); ?></h1>-->
		<div class="nav-links">
			<span><?php echo __("上一篇","hua");?>:&nbsp;</span><?php previous_post_link( '%link', _x( '%title', 'Previous post link', 'twentyhua' ) ); ?>
			<br>
			<span><?php echo __("下一篇","hua");?>:&nbsp;</span><?php $next = next_post_link( '%link', _x( '%title', 'Next post link', 'twentyhua' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'twentyhua' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentyhua' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentyhua' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyhua' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentyhua' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentyhua' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'twentythirteen_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Twenty Thirteen 1.4
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function twentythirteen_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			//sprintf( __( '阅读全文 %s <span class="meta-nav">&rarr;</span>', 'twentyhua' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
			sprintf("<div>". __( '阅读全文 >>', 'twentyhua' )."</div>")
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentythirteen_excerpt_more' );
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentyhua-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

// Hide the admin bar
add_filter('show_admin_bar', '__return_false');

// wp_trim_words does not support Chinese
function new_trim_excerpt($text) 
{
	if(strlen($text) <= 0){
		return $text;
	}
	$excerpt_length = 30;
	$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
    $excerpt_text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	//echo "<h2>text len: ".strlen($text).", excerpt len: ".strlen($excerpt_text)."</h2>";
	//if(strlen($text) == strlen($excerpt_text)){
	if(strlen($excerpt_text) > $excerpt_length){
		$excerpt_text = mb_strimwidth($text, 0, $excerpt_length * 20, $excerpt_more);
	}
	return $excerpt_text ;
}
add_filter('wp_trim_excerpt', 'new_trim_excerpt');


function get_active_nav()
{
	$uri = $_SERVER['REQUEST_URI'];
	$page = 'home';
	$active_html = ' class="active"';
	if(strrpos($uri, "category", 1) === 1){
		$active_html = ' active';
		$page = 'category';
	}else if(strrpos($uri, "tools", 1) === 1){
		$active_html = ' active';
		$page = 'tools';
	}else if(strrpos($uri, "about", 1) === 1){
		$active_html = ' class="active"';
		$page = 'about';
	}

	$nav_active = array(
		 'home' => ''
		,'category' => ''
		,'tools' => ''
		,'about' => ''
	);
	$nav_active[$page] = $active_html;

	return $nav_active;
}

/*
 *  My route definition
 */
global $g_hua_routing;
$g_hua_routing = array(
             //array(need login?, '/router/uri', 'router_handler')
             array(0, '/home10', 'hua_page_home10')
            ,array(0, '/home11', 'hua_page_home11')
	);

function hua_routing_load($route)
{
	global $g_hua_routing;
    foreach($g_hua_routing as $routing){
        if($routing[1] == $route){
        	$routing[2]();
        }
    }

}

function get_popular_posts($num) {
    global $wpdb;
    
    $posts = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts where post_type = 'post' and post_status = 'publish' ORDER BY comment_count DESC LIMIT 0 , $num");
    
    foreach ($posts as $post) {
        setup_postdata($post);
        $id = $post->ID;
        $title = $post->post_title;
        $count = $post->comment_count;
        
        //if ($count != 0) {
        if (1) {
            $popular .= '<li>';
            $popular .= '<a href="' . get_permalink($id) . '" title="' . $title . '">' . $title . '</a> ';
            $popular .= '</li>';
        }
    }
    return $popular;
}

function my_get_search_form()
{
	$form =  '<form role="search" method="get" class="row" action="/">'
			//.'	<div class="col-xs-2 col-ms-1">'
			//.'	  <label>'
			//.'		<span class="screen-reader-text">搜搜看: </span>'
			//.'	  </label>'
			//.'	</div>'
			//.'	<div class="col-xs-3">'
			.'		<input type="search" class="form-control" placeholder="搜搜看..." value="" name="s" style="width:160px;float:left;">'
			//.'	</div>'
			.'	<input type="submit" class="search-submit btn btn-default" value="搜索" style="width:80px;margin-left:10px;">'
			.'</form>';
	echo $form;
}

function dslog($tag, $msg)
{
    date_default_timezone_set("PRC");
    $timestr = date('Y-m-d H:i:s', time());
    $log_suffix = date('.Ymd', time());
    $logfile = LOG_FILE.$log_suffix;
    file_put_contents($logfile, "$timestr [$tag] $msg\n", FILE_APPEND | LOCK_EX);
}

function var_dump_string($obj)
{
    ob_start();
    var_dump($obj);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
