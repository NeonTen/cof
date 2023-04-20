<?php
/**
 * The ACF template part for displaying Instragram feeds.
 *
 * @package COF
 */

$shortcode = get_sub_field( 'shortcodes' );
?>

<section class="w-full">
	<div class="container">

		<?php echo do_shortcode( $shortcode ); ?>

	</div>
</section>
