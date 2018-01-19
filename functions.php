<?php
/**
 * SoaPatrick Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SoaPatrick_Four
 */

if ( ! function_exists( 'soapatrickfour_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function soapatrickfour_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SoaPatrick Four, use a find and replace
		 * to change 'soapatrickfour' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'soapatrickfour', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'soapatrickfour' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'quote',
			'link',
			'status'
		) );		
	}
endif;
add_action( 'after_setup_theme', 'soapatrickfour_setup' );

/**
 * Enqueue scripts and styles.
 */
function soapatrickfour_scripts() {
	wp_enqueue_style( 'soapatrickfour-style', get_stylesheet_uri() );
	wp_enqueue_script( 'soapatrickfour-scripts', get_template_directory_uri() . '/js/scripts.js', '','' , true );		
	wp_enqueue_script( 'soapatrickfour-fa5', get_template_directory_uri() . '/js/fontawesome-all.min.js', '','' , true  );		
	if ( !is_admin() ) wp_deregister_script('jquery');		
}
add_action( 'wp_enqueue_scripts', 'soapatrickfour_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Image Sizes
 * 
 * https://codex.wordpress.org/Function_Reference/add_image_size
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'list-featured-image', 300, 300, array( 'center', 'center' ) );    
}

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Remove Emojiscript
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * add featured image/video to RSS feed
 */

function featured_toRSS($content) {
	global $post;
	$post_id = get_the_ID();
	
	$video = get_post_meta( $post_id, '_format_video_embed', true);
	if ( ! empty( $video ) ) {
	    $content = '<div>' . $video . '</div>' . $content;
	}	
	
	if ( has_post_thumbnail( $post->ID ) ){
		$content = '<div>' . get_the_post_thumbnail( $post->ID, 'full', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
	}
	
	return $content;
}
 
add_filter('the_excerpt_rss', 'featured_toRSS');
add_filter('the_content_feed', 'featured_toRSS');



/**
 * Shortens title used in next and previous post links.
 *
 * Replaces the '%title' argument used in the 2nd argument of these WordPress functions:
 * previous_post_link() and next_post_link()
 *
 * Sample usage with and without optional argument:
 *      previous_post_link( %link, shorten_next_prev_title( 'prev', 25 ) );
 *      next_post_link( %link, shorten_next_prev_title( 'next' ) );
 *
 * @since 1.0.0 (Aug 9, 2015 build date)
 *
 * @see get_next_post() and get_previous_post()
 * @link http://codesport.io/coding/previous-and-next-post-titles/
 *
 * @param string $direction Use 'next' or 'prev'. If != 'next' hard defaults to 'prev'
 * @param integer $my_title_length Optional. Number of characters in title. Defaults to 33
 * @return string A shortened title.
 */
 
function shorten_next_prev_title( $direction, $my_title_length = 33 ) {
    if ( $direction == 'next' ) {
        $my_post = get_next_post();  
    } else {
        $my_post = get_previous_post(); 
    }
 
    if ( !empty( $my_post ) ) {
         $my_post_title = $my_post->post_title;
         if ( strlen( $my_post_title ) > $my_title_length ) {
              $shortened_my_post_title = substr( $my_post_title, 0, $my_title_length ) . '…';   
         } else {
             $shortened_my_post_title = $my_post_title;       
         }
    }
         
    return $shortened_my_post_title;
}


/**
 * Attach a class to linked images' parent anchors
 * Works for existing content
 */
function give_linked_images_class($content) {

  $classes = 'img-link'; // separate classes by spaces - 'img image-link'

  // check if there are already a class property assigned to the anchor
  if ( preg_match('/<a.*? class=".*?"><img/', $content) ) {
    // If there is, simply add the class
    $content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content);
  } else {
    // If there is not an existing class, create a class property
    $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
  }
  return $content;
}

add_filter('the_content','give_linked_images_class');