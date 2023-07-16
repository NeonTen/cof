<?php
/**
 * COF functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package COF
 */

if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cof_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cof_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on COF, use a find and replace
		 * to change 'cof' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cof', get_template_directory() . '/languages' );

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
		register_nav_menus(
			[
				'main-menu' => esc_html__( 'Primary', 'cof' ),
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cof_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
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
			[
				'height'      => 50,
				'width'       => 138,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);
	}
endif;
add_action( 'after_setup_theme', 'cof_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cof_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cof_content_width', 640 );
}
add_action( 'after_setup_theme', 'cof_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cof_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'WooCommerce Sidebar', 'cof' ),
			'id'            => 'wc-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'cof' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}
add_action( 'widgets_init', 'cof_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cof_scripts() {

	$version = CUSTOMCACHE_VERSION;
	$path    = get_template_directory_uri();

	/**
	 * Styles
	 */
	// Main style css.
	wp_enqueue_style( 'cof-style', get_stylesheet_uri(), [], $version );
	wp_enqueue_style( 'cof-theme-style', $path . '/css/theme.css', [], $version );

	// Slick css.
	wp_enqueue_style( 'cof-slick-css', $path . '/css/slick.css', [], $version );

	// Custom css for override.
	wp_enqueue_style( 'cof-custom-css', $path . '/css/custom.css', [], $version );

	/**
	 * Scripts
	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Theme's scrips.
	wp_enqueue_script( 'cof-custom-js', $path . '/js/custom.js', [ 'jquery' ], $version, true );

	// Slick JS.
	wp_enqueue_script( 'cof-slick-js', $path . '/js/slick.min.js', [], $version, true );

	// Fontawesome icons.
	wp_enqueue_script( 'fontawesome5', 'https://kit.fontawesome.com/371f3e2957.js', [], $version, false );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Meie+Script&amp;family=Outfit:wght@400;700&amp;display=swap', false ); //phpcs:ignore

}
add_action( 'wp_enqueue_scripts', 'cof_scripts' );

/**
 * Add extra attributes to enqueued scripts.
 *
 * @param string $tag default.
 * @param string $handle default.
 */
function add_extra_attributes( $tag, $handle ) {
	return false !== strpos( $handle, 'fontawesome5' )
		? str_replace( ' src', ' crossorigin="anonymous" src', $tag )
		: $tag;
}
add_filter( 'script_loader_tag', 'add_extra_attributes', 10, 2 );

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
 * All classes here
 */
require get_template_directory() . '/inc/class-cof-menu-walker.php';
require get_template_directory() . '/inc/class-cof-actions.php';
require get_template_directory() . '/inc/class-custom-post-types.php';
require get_template_directory() . '/inc/class-svg-enable.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'wooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';

	// Load WooCommerce extra funtionality.
	require get_template_directory() . '/inc/class-cof-woocommerce.php';
}

/**
 * Load ACF Options panel.
 */
require get_template_directory() . '/inc/class-acf-options-panel.php';

/**
 * Update settings from options.
 */
function add_theme_options() {
	// $primary_color   = get_field( 'primary_color', 'options' );
	// $secondary_color = get_field( 'secondary_color', 'options' );
	// $dark_color      = get_field( 'dark_color', 'options' );
	// $light_color     = get_field( 'light_color', 'options' );
	?>
	<style>
		/* :root {
			--color-primary: <?php // echo esc_html( $primary_color ); ?>;
			--color-secondary: <?php // echo esc_html( $secondary_color ); ?>;
			--color-dark: <?php // echo esc_html( $dark_color ); ?>;
			--color-light: <?php // echo esc_html( $light_color ); ?>;
		} */
	</style>
	<?php
}
add_filter( 'wp_head', 'add_theme_options', 10 );

/**
 * ACF content filter preview path.
 */
function get_acf_preview_path() {
	$path = 'template-parts/acf/images';
	if ( is_child_theme() ) {
		$path = '../cof-cms/template-parts/acf/images';
	}
	return $path;
}
add_filter( 'acf-flexible-content-preview.images_path', 'get_acf_preview_path' );

/**
 * This will remove the default image sizes and the medium_large size.
 *
 * @param array $sizes default sizes.
 */
function prefix_remove_default_images( $sizes ) {
	unset( $sizes['small'] ); // 150px.
	unset( $sizes['medium'] ); // 300px.
	unset( $sizes['large'] ); // 1024px.
	unset( $sizes['medium_large'] ); // 768px.
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );

/**
 * This will remove the default image sizes and the medium_large size.
 */
function remove_big_image_sizes() {
	remove_image_size( '1536x1536' ); // 2 x Medium Large (1536 x 1536)
	remove_image_size( '2048x2048' ); // 2 x Large (2048 x 2048)
}
add_action( 'init', 'remove_big_image_sizes' );

/**
 * Convert Flex slider into Thumbnail Slider
 */
function woo_flexslider_thumbnail( $options ) {
    $options['controlNav'] = 'thumbnails';
    return $options;
}
add_filter( 'woocommerce_single_product_carousel_options', 'woo_flexslider_thumbnail' );

function my_custom_discount_percentage_sale_badge( $html, $post, $product ) {
	if( $product->is_type('variable')){
		$percentages = array();

		$prices = $product->get_variation_prices();
	
		foreach( $prices['price'] as $key => $price ){
			if( $prices['regular_price'][$key] !== $price ){
				$percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
			}
		}
		$percentage = round(max($percentages)) . '%';
		} else {
			$regular_price = (float) $product->get_regular_price();
			$sale_price    = (float) $product->get_sale_price();
		
			$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
		}
		return '<span class="onsale">' . $percentage . esc_html__( ' off', 'woocommerce' ) . '</span>';
	}
  
add_filter( 'woocommerce_sale_flash', 'my_custom_discount_percentage_sale_badge', 20, 3 );
