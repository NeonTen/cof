<?php
/**
 * The ACF template part for displaying Product categories.
 *
 * @package COF
 */

$cat_num = get_sub_field( 'number_of_categories' );
?>

<section class="category-section | w-full">
	<div class="container">

		<?php
		if ( ! is_woocommerce_activated() ) {
			echo '<p class="text-center">Please install/activate <span class="font-bold">WooCommerce</span> plugin to show categories here.</p>';
		} else {
			// Products shortcode.
			echo do_shortcode( '[product_categories number="' . esc_html( $cat_num ) . '" parent="0"]' );
		}
		?>

	</div>
</section>
