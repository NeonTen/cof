<?php
/**
 * All custom actions here.
 *
 * @package COF
 */

defined( 'WPINC' ) || exit;

/**
 * Main class for Actions
 */
class COF_Actions {

	/**
	 * The Construct
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks and Filters.
	 */
	public function hooks() {
		// add_action( 'cof_after_header', [ $this, 'get_after_header' ], 10 );
	}

	/**
	 * Prints HTML of title section after header.
	 */
	public function get_after_header() {
		if ( is_front_page() || ( is_post_type_archive( 'testimonials' ) || is_singular( 'testimonials' ) ) || has_post_parent() ) {
			return;
		}

		?>
		<section class="w-full bg-gradient-to-r from-blue-dark to-blue-medium text-white py-8">
			<div class="container">
				<h1 class="text-4xl font-bold">
					<?php $this->get_custom_title(); ?>
				</h1>
			</div>
		</section>
		<?php
	}

	/**
	 * Get titles according to pages.
	 */
	public function get_custom_title() {

		$output = wp_kses_post( get_the_title( get_the_id() ) );

		if ( is_archive() ) {
			$output = get_the_archive_title();
		}
		if ( is_page() ) {
			$output = wp_kses_post( get_the_title( get_the_id() ) );
		}
	}

}

// Init.
new COF_Actions();
