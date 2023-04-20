<?php
/**
 * The template part for displaying icons in header.
 *
 * @package COF
 */

$track_order = get_field( 'track_order', 'option' );
?>

<div class="flex items-center gap-4">

	<div class="mobile-menu-wrapper | xl:hidden">
		<button class="mobile-menu-button grid gap-1.5">
			<span class="w-7 h-0.5 bg-dark-color"></span>
			<span class="w-7 h-0.5 bg-dark-color"></span>
			<span class="w-7 h-0.5 bg-dark-color"></span>
		</button>
	</div>

	<div class="search-icon hidden | xl:flex items-center">
		<button><?php get_svg( 'icons/Search' ); ?></button>                        
	</div>

	<?php
	// User icon.
	if ( function_exists( 'is_woocommerce_activated' ) ) {
		echo '<a href="/my-account/">' . get_svg( 'icons/User', false ) . '</a>';
	}

	// Cart icon.
	if ( function_exists( 'cof_woocommerce_header_cart' ) ) {
		cof_woocommerce_header_cart();
	}

	// Heart icon.
	if ( defined( 'YITH_WCWL_SLUG' ) ) {
		echo '<a href="/wishlist/">' . get_svg( 'icons/Heart', false ) . '</a>';
	}

	if ( $track_order ) {
		echo '<a href="' . esc_url( $track_order ) . '">' . get_svg( 'icons/Truck', false ) . '</a>';
	}
	?>

</div>
