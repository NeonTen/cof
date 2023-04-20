<?php
/**
 * The ACF template part for displaying Products grid.
 *
 * @package COF
 */

$post_num = get_sub_field( 'number_of_products' );
$order_by = get_sub_field( 'filter_by' );
$args     = '';

if ( 'popularity' === $order_by ) {
	$args = ' class="quick-sale" on_sale="true"';
}
?>

<section class="w-full">
	<div class="container">

		<?php
		if ( ! is_woocommerce_activated() ) {
			echo '<p class="text-center">Please install/activate <span class="font-bold">WooCommerce</span> plugin to show products here.</p>';
		} else {
			// Products shortcode.
			echo do_shortcode( '[products limit="' . esc_html( $post_num ) . '" columns="4" orderby="' . esc_html( $order_by ) . '"' . $args . ']' );
		}
		?>

	</div>
</section>
