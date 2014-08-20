<?php
/**
 * Invisible Assassin functions and definitions
 *
 * @package Invisible Assassin
 */

/**
 * Redux Framework
 */
require get_template_directory() . '/assets/frameworks/redux/admin/admin-init.php';
require get_template_directory() . '/assets/frameworks/redux/options.php';


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'invisible_assassin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function invisible_assassin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'invisible-assassin', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'invisible-assassin' ),
		'footer' => __( 'Footer Menu', 'invisible-assassin' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'invisible_assassin_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // invisible_assassin_setup
add_action( 'after_setup_theme', 'invisible_assassin_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function invisible_assassin_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'invisible-assassin' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'invisible_assassin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function invisible_assassin_scripts() {

	//Load Default Stylesheet
	wp_enqueue_style( 'invisible-assassin-style', get_stylesheet_uri() );

	//Load Bootstrap CSS
	wp_enqueue_style('bootstrap-style',get_template_directory_uri()."/assets/frameworks/bootstrap/css/bootstrap.min.css");
	
	//Load BxSlider CSS
	wp_enqueue_style('bxslider-style',get_template_directory_uri()."/assets/css/bxslider.css");
	
	//Load Theme Structure File. Contains Orientation of the Theme.
	wp_enqueue_style('invisible-assassin-theme-structure', get_template_directory_uri()."/assets/css/main.css");

	//Load the File Containing Color/Font Information
	wp_enqueue_style('invisible-assassin-theme-style', get_template_directory_uri()."/assets/css/theme.css");

	//Load Bootstrap JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/frameworks/bootstrap/js/bootstrap.min.js", array('jquery'));

	//Load Bx Slider Js 
	wp_enqueue_script('bxslider-js', get_template_directory_uri()."/assets/js/bxslider.min.js", array('jquery'));

	//Load Theme Specific JS
	wp_enqueue_script('custom-js', get_template_directory_uri()."/assets/js/custom.js", array('jquery','hoverIntent'));


	//Load Navigation js. This is Responsible for Converting the Main Menu into Responsive, when the browser width is switched.
	wp_enqueue_script( 'invisible-assassin-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	//Comes with _s Framework.
	wp_enqueue_script( 'invisible-assassin-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	//For the Default WordPress Comment's Reply System
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'invisible_assassin_scripts' );

/*
 *	This function Contains All The scripts that Will be Loaded in the Theme Header including Slider, Custom CSS, etc.
 */
function invisible_assassin_initialize_header() {
	
	global $option_setting; //Global theme options variable
	
	//Place all Javascript Here
	echo "<script>";
	
	//Check is Slider is Enabled and Load Script
	if (count($option_setting['slider-main']) ) : ?>
		jQuery(document).ready(function(){
					jQuery('.bxslider').bxSlider( {
					mode: 'horizontal',
					captions: true,
					minSlides: 1,
					maxSlides: 1,
					adaptiveHeight: true,
					//slideWidth: 1090, 
					auto: true,
					preloadImages: 'all',
					pause: 5000,
					autoHover: true } );
					});
					
	<?php endif; ?>
	
	
	<?php
	
	
	echo "</script>";
	//Java Script Ends
	
	//CSS Begins
	echo "<style>";
	
	echo $option_setting['custom-css'];	
	
	echo "</style>";
	//CSS Ends
	
	
}
add_action('wp_head', 'invisible_assassin_initialize_header');

/*
 * Pagination Function. Implements core paginate_links function.
 */
function invisible_assassin_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}
/*
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';