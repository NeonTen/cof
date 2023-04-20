<?php
/**
 * The template part for displaying Widget 4 in footer.
 *
 * @package COF
 */

$heading    = get_field( 'fw4_heading', 'option' );
$facebook   = get_field( 'facebook_url', 'option' );
$twitter    = get_field( 'twitter_url', 'option' );
$instagram  = get_field( 'instagram_url', 'option' );
$pinterest  = get_field( 'pinterest_url', 'option' );
$is_payment = get_field( 'payment_options', 'option' );

if ( ! $heading && ! have_rows( 'fw4_links', 'option' ) ) {
	return;
}
?>
<div class="f-widget | text-white">

	<?php
	if ( $heading ) {
		echo '<h3 class="widget-title | text-lg font-bold text-white">' . esc_html( $heading ) . '</h3>';
	}

	if ( $facebook || $twitter || $instagram || $pinterest ) {
        echo '<ul class="flex gap-4 mt-4">';

        if ( $facebook ) {
            echo '<li><a class="fill-white hover:fill-primary transition-all" href="' . esc_url( $facebook ) . '">' . get_svg( 'icons/facebook', false ) . '</a></li>'; //phpcs:ignore
        }
        if ( $twitter ) {
            echo '<li><a class="fill-white hover:fill-primary transition-all" href="' . esc_url( $twitter ) . '">' . get_svg( 'icons/twitter', false ) . '</a></li>'; //phpcs:ignore
        }
        if ( $instagram ) {
            echo '<li><a class="fill-white hover:fill-primary transition-all" href="' . esc_url( $instagram ) . '">' . get_svg( 'icons/instagram', false ) . '</a></li>'; //phpcs:ignore
        }
        if ( $pinterest ) {
            echo '<li><a class="fill-white hover:fill-primary transition-all" href="' . esc_url( $pinterest ) . '">' . get_svg( 'icons/pinterest', false ) . '</a></li>'; //phpcs:ignore
        }

        echo '</ul>';
    }

    if ( $is_payment ) {
        echo '<h3 class="widget-title | text-lg font-bold text-white mt-8">' . esc_html__( 'Payment Options', 'cof' ) . '</h3>';

        echo '<ul class="flex flex-wrap gap-4 mt-4">';
            echo '<li>' . get_svg( 'icons/AmazonPay', false ) . '</li>'; //phpcs:ignore
            echo '<li>' . get_svg( 'icons/ApplePay', false ) . '</li>'; //phpcs:ignore
            echo '<li>' . get_svg( 'icons/Mastercard', false ) . '</li>'; //phpcs:ignore
            echo '<li>' . get_svg( 'icons/Paypal', false ) . '</li>'; //phpcs:ignore
            echo '<li>' . get_svg( 'icons/Stripe', false ) . '</li>'; //phpcs:ignore
            echo '<li>' . get_svg( 'icons/Visa', false ) . '</li>'; //phpcs:ignore
        echo '</ul>';
    }
	?>

</div>
