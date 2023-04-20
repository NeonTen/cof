<?php
/**
 * The ACF template part for displaying Clients.
 *
 * @package COF
 */

$heading = get_sub_field( 'heading' );
?>

<section class="w-full">
	<div class="container">

	<?php
	if ( $heading ) {
		echo '<h2 class="text-32 lg:text-58 text-text-color font-medium leading-[1.1]">' . wp_kses_post( $heading ) . '</h2>';
	}

	if ( have_rows( 'add_logos' ) ) :

		echo '<div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 gap-5 mt-10 lg:mt-14">';

		// Loop through rows.
		while ( have_rows( 'add_logos' ) ) :
			the_row();

			// Load sub field value.
			$logo = '';
			if ( get_sub_field( 'logo' ) ) {
				$logo = df_resize( get_sub_field( 'logo' ), '', 124, 54, true, true );
			}
			$url = get_sub_field( 'link' );

			if ( $url ) {
				printf(
					'<a href="%s" target="_blank" class="w-full grid place-content-center aspect-square bg-white rounded-14">
						<img class="w-full object-scale-down" src="%s">
					</a>',
					esc_url( $url ),
					esc_url( $logo['url'] )
				);
			}

			if ( ! $url ) {
				printf(
					'<div class="w-full grid place-content-center aspect-square bg-white rounded-14">
						<img class="w-full object-scale-down" src="%s">
					</div>',
					esc_url( $logo['url'] )
				);
			}

		endwhile;

		echo '</div>';

	endif;
	?>

	</div>
</section>
