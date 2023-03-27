<?php
/**
 * CyberWeek functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CyberWeek
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cyberweek_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on CyberWeek, use a find and replace
		* to change 'cyberweek' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cyberweek', get_template_directory() . '/languages' );

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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cyberweek_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'cyberweek_setup' );

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
	  $classes[] = 'nav__active';
	}
	return $classes;
  }

add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu(){
	register_nav_menu('header_nav', 'Header navigation');
	register_nav_menu('main_tag_nav', 'Esport games');
	register_nav_menu('footer_upper', 'Footer upper');
	register_nav_menu('footer_lower', 'Footer lower');
	register_nav_menu('mobile_nav', 'Mobile mnavigation');
	register_nav_menu('socials', 'Socials');
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cyberweek_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cyberweek_content_width', 640 );
}
add_action( 'after_setup_theme', 'cyberweek_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cyberweek_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cyberweek' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cyberweek' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'cyberweek_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cyberweek_styles() {
	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/assets/styles/style.css' );
	wp_enqueue_style( 'single page', get_template_directory_uri() . '/assets/styles/single.css' );
	wp_enqueue_style( 'default page', get_template_directory_uri() . '/assets/styles/page.css' );
	wp_enqueue_style( 'not found page', get_template_directory_uri() . '/assets/styles/404.css' );
	wp_enqueue_style( 'search', get_template_directory_uri() . '/assets/styles/search.css' );

	wp_style_add_data( 'cyberweek-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cyberweek_styles' );

function cyberweek_scripts() {
	wp_enqueue_script('search animation', get_template_directory_uri() . '/assets/scripts/searchAnim.js');
    wp_enqueue_script('slider', get_template_directory_uri() . '/assets/scripts/slider.js');
    wp_enqueue_script('matches', get_template_directory_uri() . '/assets/scripts/matches.js');
	wp_enqueue_script('burger animation', get_template_directory_uri() . '/assets/scripts/mobileNavAnim.js');
}
add_action('wp_footer', 'cyberweek_scripts');

wp_register_script( 'my-script', 'myscript_url' );
wp_enqueue_script( 'my-script' );
$translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
wp_localize_script( 'my-script', 'object_name', $translation_array );

add_filter( 'use_widgets_block_editor', '__return_false' );

function wpsnipp_enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
            wp_enqueue_script('comment-reply');
        }
}
add_action('get_header', 'wpsnipp_enable_threaded_comments');

add_filter( 'comment_form_field_comment', 'wp_kama_comment_form_field_filter' );

/**
 * Function for `comment_form_field_comment` filter-hook.
 * 
 * @param string $field The HTML-formatted output of the comment form field.
 *
 * @return string
 */
function wp_kama_comment_form_field_filter( $field ){

	$field = '<p class="comment-form-comment">
	<input type="text" id="comment" name="comment" aria-required="true" required="required" placeholder="Поделись своими мыслями">
	</p>';
	
	return $field;
}

add_filter( 'comment_form_logged_in', 'wp_kama_comment_form_logged_in_filter', 10, 3 );

/**
 * Function for `comment_form_logged_in` filter-hook.
 * 
 * @param string $args_logged_in The HTML for the 'logged in as [user]' message, the Edit profile link, and the Log out link.
 * @param array  $commenter      An array containing the comment author's username, email, and URL.
 * @param string $user_identity  If the commenter is a registered user, the display name, blank otherwise.
 *
 * @return string
 */
function wp_kama_comment_form_logged_in_filter( $args_logged_in, $commenter, $user_identity ){

	$args_logged_in = '';
	return $args_logged_in;
}

add_filter( 'comment_form_submit_button', 'wp_kama_comment_form_submit_button_filter', 10, 2 );

/**
 * Function for `comment_form_submit_button` filter-hook.
 * 
 * @param string $submit_button HTML markup for the submit button.
 * @param array  $args          Arguments passed to comment_form().
 *
 * @return string
 */
function wp_kama_comment_form_submit_button_filter( $submit_button, $args ){

	$submit_button = '
	<button name="submit" type="submit" id="submit" class="submit">
		<img src="' . get_template_directory_uri() . '/assets/img/comment.svg' . '" alt="Comment icon" />
	</button>';

	if ($_POST['comment'] == ''){

	}
	return $submit_button;
}

add_filter('duplicate_comment_id', '__return_false');

function prefix_remove_arpw_style() {
    wp_dequeue_style( 'arpw-style' );
}
add_action( 'wp_enqueue_scripts', 'prefix_remove_arpw_style', 10 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
