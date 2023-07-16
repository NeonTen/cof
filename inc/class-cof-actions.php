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
		add_action( 'cof_before_header', [ $this, 'get_before_header' ], 10 );
	}

	/**
	 * Prints HTML of notification section before header.
	 */
	public function get_before_header() {
		$notification = get_field( 'notification', 'option' );
		if ( ! $notification ) {
			return;
		}
		?>
		<section class="w-full bg-secondary text-center py-2">
			<div class="container">
				<h6 class="text-lg text-white">
					<?php echo wp_kses_post( $notification ); ?>
				</h6>
			</div>
		</section>
		<?php
	}

}

// Init.
new COF_Actions();
