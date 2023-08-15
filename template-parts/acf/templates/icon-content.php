<?php
/**
 * The ACF template part for displaying Icon with content.
 *
 * @package COF
 */

?>

<section class="w-full bg-light-color py-12">
	<div class="container">

	<?php
	if ( have_rows( 'add_content' ) ) :

		echo '<div class="grid md:grid-cols-2 xl:grid-cols-4 justify-center items-start gap-8">';

		// Loop through rows.
		while ( have_rows( 'add_content' ) ) :
			the_row();

			// Load sub field value.
			$icon    = get_sub_field( 'icon' );
			$content = get_sub_field( 'content' );

			$icon_html = '';

			if ( $icon ) {
				$icon_html = '<img class="w-[60px] h-[60px] mx-auto" src="' . $icon . '">';
			}

			printf(
				'<div class="grid justify-center gap-4 text-center">
					%s
					<p>%s</p>
				</div>',
				wp_kses_post( $icon_html ),
				wp_kses_post( $content )
			);

		endwhile;

		echo '</div>';

	endif;
	?>

	</div>
</section>
