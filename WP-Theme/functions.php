<?php
/**
 * TravelGram functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TravelGram
 */

if ( ! function_exists( 'travelgram_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travelgram_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TravelGram, use a find and replace
		 * to change 'travelgram' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travelgram', get_template_directory() . '/languages' );

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
			'menuTop' => esc_html__( 'Top-menu', 'travelgram' ),
			'menubottom' => esc_html__( 'bottom-menu', 'travelgram' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travelgram_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,

		) );
	}
endif;
add_action( 'after_setup_theme', 'travelgram_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelgram_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travelgram_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelgram_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelgram_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'SidebarLeft', 'travelgram' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travelgram' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travelgram_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travelgram_scripts() {

	wp_enqueue_style( 'fontello', get_template_directory_uri() . '/assets/css/fontello.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );

	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ));
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js');
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travelgram_scripts' );



// функция пагинации
function my_pagenavi() {
	global $custom_query;

	$big = 999999999; // уникальное число для замены

	$args = array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total'   => $custom_query->max_num_pages
	);

	$result = paginate_links( $args );

	// удаляем добавку к пагинации для первой страницы
	$result = preg_replace( '~/page/1/?([\'"])~', '\1', $result );

	echo $result;
}

add_image_size( 'slider', 1920, 1080, true );
add_image_size( 'small', 580, 580, true );
add_image_size( 'medium', 1260, 566, true );
add_image_size( 'verysmall', 200, 100, true );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'slider' => 'для слайдов',
		'small' => 'маленькие',
		'medium' => 'средне',
	) );
}




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


add_filter('show_admin_bar', '__return_false'); // отключить

add_filter( 'excerpt_length', function(){
	return 10;
} );

//получение контента для слайдера
function slider_content ($id) {
	$media = get_attached_media( 'image', $id);
	$media = array_shift( $media );
	$image_url = $media->guid;
	$post_id = get_post( $id);
	$title = $post_id->post_title;
	$content = $post_id->post_excerpt;

	$url = get_permalink($id);
	return array ($image_url,$title,$content,$url);
}

//получение картинки из поста
function send_img ($content){
	$posend = strpos($content, '</figure>');
	$posstart = strpos($content, '<img');
	$len= $posend - $posstart;
	$img = substr($content,$posstart,$len);


	return $img;
}

function replace_class ($html){
	$html = str_replace( 'class=', 'class="wow zoomIn" data-wow-offset="200" data-wow-duration="1.5s"', $html );
	return $html;
}


// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination( array(
	'end_size' => 2,
) );
