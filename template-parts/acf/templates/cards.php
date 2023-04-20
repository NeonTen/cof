<?php
/**
 * The ACF template part for displaying Cards.
 *
 * @package COF
 */

$count = 1;
?>

<section class="w-full">
	<div class="container">

	<?php
	if ( have_rows( 'add_cards' ) ) :

		echo '<div class="grid xl:grid-cols-2 gap-8">';

		// Loop through rows.
		while ( have_rows( 'add_cards' ) ) :
			the_row();

			// Load sub field value.
			$bg_image   = get_sub_field( 'background_image' );
			$card_title = get_sub_field( 'title' );
			$btn        = get_sub_field( 'button' );
			$class      = '';

			if ( 2 === $count ) {
				$class = ' right-0';
			}

			if ( $bg_image || $card_title || $btn ) {
				printf(
					'<div class="w-full border-10 border-primary relative">
						<img class="w-full object-cover" src="%1$s" alt="%2$s">
						<div class="absolute top-1/2 -translate-y-1/2%6$s p-14">
							<h3 class="text-3xl 2xl:text-[40px] font-bold">%2$s</h3>
							<a href="%3$s" class="button mt-5" target="%4$s">%5$s</a>
						</div>
					</div>',
					esc_url( $bg_image ),
					esc_html( $card_title ),
					esc_url( $btn['url'] ),
					esc_html( $btn['target'] ),
					esc_html( $btn['title'] ),
					esc_html( $class )
				);
			}

			++$count;

		endwhile;

		echo '</div>';

	endif;
	?>
	</div>
</section>
