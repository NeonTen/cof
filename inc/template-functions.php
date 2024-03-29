<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package COF
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cof_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cof_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cof_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cof_pingback_header' );


/**
 * Get svg file content.
 *
 * @param string $path path of the SVG file.
 * @param string $echo print|return.
 *
 * @return string
 */
function get_svg( $path, $echo = true ) {

	$file = get_template_directory() . '/images/' . $path . '.svg';

	if ( ! file_exists( $file ) ) {
		return;
	}

	$svg = file_get_contents( $file ); // phpcs:ignore

	if ( $echo ) {
		echo $svg; // phpcs:ignore
	} else {
		return $svg;
	}
}

/**
 * Remove 'Category:', 'Tag:', 'Author:', 'Archives:' and Other 'taxonomy name:' in the archive title
 *
 * @param string $title default title.
 * @return $title       modified title.
 */
function archive_remove_title_prefix( $title ) {
	return preg_replace( '/^\w+: /', '', $title );
}
add_filter( 'get_the_archive_title', 'archive_remove_title_prefix' );

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	/**
	 * Check if WooCommerce is activated
	 */
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * Check if WooCommerce page
 *
 * @return boolean
 */
function is_woocommerce_page() {
	if ( function_exists( 'is_woocommerce' ) ) {
		if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
			return true;
		}
	}
	return false;
}
